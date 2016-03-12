<div class="col-sm-12 c2">
	<div class="login-control"><h2>Control-2: Allotments (Kit, ID and Room)</h2></div>
	<div class="login-control"><span class="btn btn-success">Refresh</span></div>
	<table class="table allotments">
		<tr>
			<th>Cogni-ID</th> <!-- Email is also allowed here, but its deprecated. -->
			<th>Kit Issued</th>
			<th>ID Issued</th>
			<th>Bhawan</th>
			<th>Room No.</th>
			<th></th>
		</tr>
		<tr>
			<td><input type="text" class="form-control" placeholder="Cogni-ID" id="cogni_id" disabled></td>
			<td><input type="checkbox" class="form-control" name="kit" value="1" id="kit"></td>
			<td><input type="checkbox" class="form-control" name="id" value="1" id="id"></td>
			<td><input type="text" class="form-control" placeholder="Bhawan" id="bhawan"></td>
			<td><input type="text" class="form-control" placeholder="Room No." id="room"></td>
			<td></td>
		</tr>
	</table>
	<div class="login-control"><span class="btn btn-success" id="summit">Submit</span></div>
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