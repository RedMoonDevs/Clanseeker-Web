<h1>Clan Search</h1>
<p class="lead">Put the Clan's Name (or Clan Tag if you have it)</p>
<form method="GET" action="">
	<div class="input-group">
	    <input name="search" type="text" class="form-control" placeholder="Search for..." id="search_input"
		   <?php if (isset($search)) {
			   echo ' value="' . $search . '"';
		   } ?> >
		<span class="input-group-btn" id="search_btn" onclick="">
			<button class="btn btn-info" type="submit">Go!</button>
		</span>
		<input type="hidden" name="page" value="clan"/>
	</div>
</form>