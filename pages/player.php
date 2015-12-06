<h2>
    <?php
        echo $avatar->{"userName"};
        if(isset($avatar->{"clanId"})) {
            $id = $avatar->{"clanId"};
            $clanName = $avatar->{"clanName"};
            echo " <a href=\"?page=clan&id=$id\" role=\"button\" class=\"btn btn-primary btn-xs\">(Clan : $clanName)</a>";
        }
    ?>
</h2>

<p>
    <b>Trophies:</b> <?=$avatar->{"trophies"}?>
</p>

<p>
    <b>League:</b> <?=$avatar->{"league"}?>
</p>

<p>
    <b>Level:</b> <?=$avatar->{"level"}?>
</p>

<p>
    <b>XP:</b> <?=$avatar->{"XP"}?>
</p>

<p>
    <b>TownHall Level:</b> <?=$avatar->{"townHallLevel"}?>
</p>
<p>
    <p>
        <b>Village: </b>
    </p>
    <?php
    $src = 'data: image/png;base64,'.$village->{'image'};
    echo '<img src="', $src, '" class="img-responsive">';
    ?>
</p>
