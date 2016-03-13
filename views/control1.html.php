<div class="col-sm-12 c1">
	<div class="login-control"><h2>Control-1: Payment and ID Verification</h2></div>
	<input type="text" class="form-control" placeholder="Cogni-ID" id="cogni_id_search" autofocus>
	<button class="btn btn-primary" id="search">Search</button>
	<div class="clear"></div><br />
	<div class="c1-success alert alert-success">Succssfully checked-in <span></span> participants.</div>
	<div class="c1-tables">
		<table class="table payments-check">
			<tr>
				<th>Cogni-ID</th> <!-- Email is also allowed here, but its deprecated. -->
				<th>NOC</th>
				<th>Name</th>
				<th>College</th>
				<th>Events</th>
				<th>ID Verified</th>
			</tr>
		</table>
		<table class="table c1-details">
			<tr>
				<th>Cogni-ID</th>
				<th>Ticket-ID</th>
				<th>Ticket-Type</th>
				<th>Cost</th>
			</tr>
		</table>
		<img src="/public/images/loading.gif" class="login-control loading">
		<div class="login-control" id="info"></div>
		<div class="login-control"><span class="btn btn-success" id="c1_submit">Check-In Verified Participants</span></div>
	</div>
</div>