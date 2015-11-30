<h2>
    <?= $clan_details->{'name'} ?>
</h2>
<p>
    <b>Trophies : </b>
    <?= $clan_details->{'score'} ?>
</p>

<p>
    <b>Description : </b>
    <?= $clan_details->{'description'} ?>
</p>

<p>
    <b>Players : </b>
    <?= $clan_details->{'playerCount'} ?>
</p>

<p>
    <b>Wars Won : </b>
    <?= $clan_details->{'warsWon'} ?>
</p>

<p>
    <b>Wars Lost : </b>
    <?= $clan_details->{'warsLost'} ?>
</p>

<p>
    <b>Wars Tied : </b>
    <?= $clan_details->{'warsTied'} ?>
</p>

<p>
    <b>Required Trophies : </b>
    <?= $clan_details->{'requiredTrophies'} ?>
</p>

<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Level</th>
        <th>Trophies</th>
        <th>League</th>
        <th>Given Troops</th>
        <th>Received Troops</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $scope = 0;
    foreach ($clan_details->{'players'} as $player) {
        $scope++;
        $avatar = $player->{'avatar'};

        $name = $avatar->{'userName'};
        $id = $avatar->{"userId"};
        $level = $avatar->{'level'};
        $score = $avatar->{'trophies'};
        $league = $avatar->{'league'};
        $given = $avatar->{'givenTroops'};
        $received = $avatar->{'receivedTroops'};
        $role = $avatar->{'clanRole'};

        echo "<tr><th scope=\"row\">$scope</th>
            <th><a href=\"?page=player&id=$id\" role=\"button\" class=\"btn btn-primary btn-xs\">$name</a></th>
            <th>$level</th>
            <th>$score</th>
            <th>$league</th>
            <th>$given</th>
            <th>$received</th>
            <th>$role</th>
            </tr>
        ";
    }
    ?>
    </tbody>
</table>
