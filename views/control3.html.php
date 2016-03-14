<?php //$cn = var_dump($cn); ?>
<script type="text/javascript" src="public/js/control3.js"></script>
<div class="col-sm-12 c2">
	<div class="login-control"><h2>Control-3: Accomodation</h2></div>
	<div class="login-control">
		<span class="mdm-font">Pending participants: <span class="label label-warning"><?= sizeof($cn) ?></span><br />
		</span><span class="btn btn-success">Refresh</span><img src="/public/images/loading.gif" class="loading" />
	</div>
	<?php if (sizeof($cn) == 0){ ?>
		<h4 class="login-control" id="info">Grab a cup of coffee or take a nap, no pending allotments for now.</h4>
	<?php } else{ ?>
		<table class="table table-striped allotments">
			<tr>
				<th>Cogni-ID</th> <!-- Email is also allowed here, but its deprecated. -->
				<th>Receipt-ID</th>
				<th>Caution Money submitted</th>
				<th>Bhawan</th>
				<th>Room No.</th>
				<th></th>
			</tr>

			<?php foreach ($cn as $key => $value) { ?>
				<tr id="row_<?= $value['receipt_id'] ?>">
					<td id="cogni_id"><?= $value['cogni_id'] ?></td>
					<td id="cogni_id"><?= $value['receipt_id'] ?></td>
					<td><input type="checkbox" class="form-control" name="caution_<?= $value['receipt_id'] ?>" value="1" id="caution_<?= $value['receipt_id'] ?>" <?php if ($value['caution']) echo 'checked'; ?>></td>
					<td>
					<select>
						<option></option>
					</select>
					<input type="text" class="form-control" placeholder="Bhawan" name="bhawan_<?= $value['receipt_id'] ?>" id="bhawan_<?= $value['receipt_id'] ?>">
					</td>
					<td><input type="text" class="form-control" placeholder="Room No." name="room<?= $value['receipt_id'] ?>" id="room_<?= $value['receipt_id'] ?>"></td>
					<td><span class="btn btn-success allot" id="<?= $value['receipt_id'] ?>">Confirm</span></td>
				</tr>
			<?php } ?>
		</table>
	<?php } ?>
	<div class="login-control" id="info"></div>
</div>