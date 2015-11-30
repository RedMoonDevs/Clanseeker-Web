<h2>
    <?php
        echo $player->{"userName"};
        if(isset($player->{"clanId"})) {
            $id = $player->{"clanId"};
            $clanName = $player->{"clanName"};
            echo " <a href=\"?page=clan&id=$id\" role=\"button\" class=\"btn btn-primary btn-xs\">(Clan : $clanName)</a>";
        }
    ?>
</h2>

<p>
    <b>Trophies:</b> <?=$player->{"trophies"}?>
</p>

<p>
    <b>League:</b> <?=$player->{"league"}?>
</p>

<p>
    <b>Level:</b> <?=$player->{"level"}?>
</p>

<p>
    <b>XP:</b> <?=$player->{"XP"}?>
</p>

<p>
    <b>TownHall Level:</b> <?=$player->{"townHallLevel"}?>
</p>
<p>
    <p>
        <b>Village: </b>
    </p>
    <?php
    $src = 'data: image/png;base64,'.$player->{'villageImg'};
    echo '<img src="', $src, '" class="img-responsive">';
    ?>
</p>