<hr>
<p></p>
<table class="table table-hover">
    <h2>Results Count : <?php echo count($clan_results->{'clans'});?></h2>
    <thead>
    <tr>
        <th>#</th>
        <th>Clan Name</th>
        <th>Trophies</th>
        <th>Players</th>
        <th>Status</th>
        <th>Required Trophies</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $scope = 0;
    foreach ($clan_results->{'clans'} as $clan) {
        $scope++;
        $score = $clan->{'score'};
        $playerCount = $clan->{'playerCount'};
        $status = $clan->{'status'};
        $requiredTrophied = $clan->{'requiredTrophies'};
        $id = $clan->{'id'};
        $name = $clan->{'name'};

        echo "<tr><th scope=\"row\">$scope</th>
            <th><a href=\"?page=clan&id=$id\" role=\"button\" class=\"btn btn-primary btn-xs\">$name</a></th>
            <th>$score</th>
            <th>$playerCount</th>
            <th>$status</th>
            <th>$requiredTrophied</th>
            </tr>
        ";
    }
    ?>
    </tbody>
</table>
