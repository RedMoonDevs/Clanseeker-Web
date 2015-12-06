<?php
require "libs/ClanSeekerAPI.php";
require "libs/WebsiteEngine.php";

$web = WebsiteEngine::handle($_GET);
$cs = new ClanSeekerAPI();

if ($web->getPage() == "") {
    $web->addPage("pages/home.php");
} elseif ($web->getPage() == "clan") {
    if (isset($web->getOriginal()["search"])) {
        $web->addPage("pages/clan_search.php");
        $search = htmlentities($web->getOriginal()["search"]);
        $clan_results = $cs->searchClan($web->getOriginal()["search"]);
        $web->addPage("pages/clan_results.php");
    } elseif (isset($web->getOriginal()["id"])) {
        $clan_details = $cs->clanDetails($web->getOriginal()["id"])->{"clan"};
        $web->addPage("pages/clan_details.php");
    } else {
        $web->addPage("pages/clan_search.php");
    }
} elseif ($web->getPage() == "player") {
    if (isset($web->getOriginal()["id"])) {
        $web->addPage("pages/player.php");
        $player = $cs->searchPlayer($web->getOriginal()["id"])->{"player"};
		$avatar = $player->{"avatar"};
		$village = $player->{"village"};
    }
}

// Show the page
include("pages/header.php");
eval($web->pageContent());
include("pages/footer.php");
?>
