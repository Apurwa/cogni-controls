<div class="col-sm-12 c1">
	<div class="login-control"><h2>Control-1: Payment and ID Verification</h2></div>
	<table class="table payment-check">
		<tr>
			<th>Cogni-ID</th> <!-- Email is also allowed here, but its deprecated. -->
			<th></th>
			<th>NOC</th>
			<th>College ID</th>
			<th>Ticket-ID</th>
			<th>Ticket-Type</th>
			<th>Cost</th>
			<th></th>
		</tr>
		<tr>
			<td><input type="text" class="form-control" placeholder="cogni-id" id="cogni_id"></td>
			<td><button class="btn btn-primary">Search</button></td>
			<td><input type="checkbox" class="form-control" name="noc" value="1" id="noc"></td>
			<td><input type="checkbox" class="form-control" name="college_id" value="1" id="college_id"></td>
			<td><input type="text" class="form-control" placeholder="ticket-id" id="ticket_id"></td>
			<td><input type="text" class="form-control" placeholder="ticket-type" id="type"></td>
			<td><input type="text" class="form-control" placeholder="cost" id="cost"></td>
			<td></td>
			<form action="login" method="post">
			</form>
		</tr>
	</table>
	<div class="login-control"><span class="btn btn-success" id="submit">All OK</span></div>
	<table class="table c1-details">
		<tr>
			<th>Cogni-ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>City</th>
			<th>College</th>
		</tr>
	</table>
</div>