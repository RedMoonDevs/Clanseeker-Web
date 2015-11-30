$(window).load(function() {
	loadDynamically(window.location.hash);
});

$(window).on("hashchange", function() {
	loadDynamically(window.location.hash);
});

function searchBtn() {
	location.href = "#ClanSearch_"
			+ encodeURIComponent($('#search_input').val());
}

function loadPage(page, secondpage) {
	$.get(page, function(data) {
		$(".page").html(data);
		if (secondpage) {
			$.get(secondpage, function(a) {
				$(".page").html($(".page").html() + "<br/>" + a);
			});
		}
	});
}

function loadDynamically(vhash) {
	if (vhash) {
		var abc;
		if (vhash.indexOf("#") === 0) {
			abc = vhash.substring(1);
		} else {
			abc = vhash;
		}
		if (abc == "Clan") {
			loadPage("clan_page.html");
		} else if (abc.indexOf("ClanSearch") === 0) {
			var clanName = abc.substring(11, abc.length);
			if (clanName.length > 0) {
				loadPage("clan_page.html", "clan_search.html");
				searchClan(encodeURIComponent(clanName));
			}
		} else if (abc.indexOf("ClanDetails") === 0) {
			var clanId = abc.substring(12, abc.length);
			if (clanId.length > 0) {
				loadPage("clan_detail.html");
				loadClan(clanId);
			}
		} else if (abc.indexOf("PlayerVillage") === 0) {
			alert("Viewing Player is not supported yet. Check the Android app!");
		}
	} else {
		loadPage("home_page.html");
	}
}

function searchClan(clanName) {
	$.getJSON("/api/clan_search/" + clanName, function(data) {
		var dat = "";
		$.each(data["clanList"], function(key, val) {
			dat += "<tr>";
			dat += "<th scope=\"row\">" + (key + 1) + "</th>";
			dat += "	<th><a href=\"#ClanDetails_" + val["id"]
					+ "\" role=\"button\" class=\"btn btn-primary btn-xs\">"
					+ val["name"] + "</button></th>";
			dat += "	<th>" + val["score"] + "</th>";
			dat += "	<th>" + val["playerCount"] + "</th>";
			dat += "	<th>" + val["status"] + "</th>";
			dat += "	<th>" + val["requiredTrophies"] + "</th>";
			dat += "</tr>\n";
		});
		$("tbody").html(dat);
	});
}

function loadClan(clanId) {
	$.getJSON("/api/clan_details/" + clanId, function(data) {
		$.each(data, function(key, val) {
			if (key != "players") {
				$("." + key).html(val);
			}
		});

		var dat = "";
		$.each(data["players"], function(key, val) {
			var avatar = val["avatar"];
			dat += "<tr>";
			dat += "<th scope=\"row\">" + (key + 1) + "</th>";
			dat += "	<th><a href=\"#PlayerVillage_" + avatar["userId"]
					+ "\" role=\"button\" class=\"btn btn-primary btn-xs\">"
					+ avatar["userName"] + "</button></th>";
			dat += "	<th>" + avatar["level"] + "</th>";
			dat += "	<th><img src=\"img/" + avatar["league"]
					+ ".png\" width=\"25\" height=\"25\"></th>";
			dat += "	<th>" + avatar["trophies"] + "</th>";
			dat += "	<th>" + avatar["givenTroops"] + "</th>";
			dat += "	<th>" + avatar["receivedTroops"] + "</th>";
			dat += "</tr>\n";
		});

		$("tbody").html(dat);
	});
}