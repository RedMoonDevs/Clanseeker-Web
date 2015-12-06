<div class="jumbotron">
    <h1>ClanSeeker</h1>
    <p class="lead">ClanSeeker Util to view clans and players without your account.
    </p>
    <p>Current Version: <?php echo $cs->apiRequest("version")->{'nameCode'}; ?></p>
    <p>
        <a class="btn btn-lg btn-success" href="?page=clan" role="button">Let's get started!</a>
    </p>
</div>

<div class="row marketing">
    <div class="col-lg-6">
        <h4>BlackElixir revived as ClanSeeker!</h4>
        <p>Do you remember BlackElixir? It is back with new features and a new village viewer. Enjoy :)</p>
    </div>
    <div class="col-lg-6">
        <h4>JSON API</h4>
        <p>
            There's an API for that too. Make sure to check that
            out <a href="https://github.com/DevilMental/DarkElixir/wiki/">here</a>,
            it's super cool!
        </p>
    </div>
</div>
