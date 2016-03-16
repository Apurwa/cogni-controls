<?php //$cn = var_dump($cn); ?>
<script type="text/javascript" src="public/js/control3.js"></script>
<div class="col-sm-12 c2">
	<div class="login-control"><h2>Control-3: Accomodation</h2></div>
	<div class="login-control">
		<span class="mdm-font">Pending participants: <span class="label label-warning"><?= sizeof($cn) ?></span>&nbsp;
		</span><span class="btn btn-success refresh">Refresh</span><img src="/public/images/loading.gif" class="loading" />
	</div>
	<div class="col-sm-offset-3 col-sm-6">
		<table class="table table-striped">
			<tr>
				<th>Bhawan</th>
				<th>Room No. (Availability)</th>
				<th class="hidden">Available Beds</th>
			</tr>
			<tr>
				<td>
					<select name="bhawan" id="bhawan" class="form-control">
						<?php foreach ($acco as $i => $v) { ?>
							<option value="<?= $v['bhawan'] ?>" class="<?= $v['bhawan'] ?>"><?= $v['bhawan'] ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					<select name="room_no" id="room_no"	 class="form-control">
						<option value="" class="default_room_no">-- select room number --</option>
						<?php foreach ($acco as $i => $v) { ?>
							<option value="<?= $v['room_no'] ?>" class="<?= $v['bhawan'] ?> room_no"><?= $v['room_no'] ?>, <?= $v['bhawan'] ?> #<?= $v['available'] ?></option>
						<?php } ?>
					</select>
				</td>
				<td class="hidden">
					<input type="text" id="available" value="" class="form-control" disabled>
				</td>
			</tr>
		</table>
	</div>
	<div class="clear"></div>
	<?php if (sizeof($cn) == 0){ ?>
		<h4 class="login-control" id="info">Grab a cup of coffee or take a nap, no pending allotments for now.</h4>
	<?php } else{ ?>
		<table class="table table-striped allotments">
			<tr>
				<th>Cogni-ID</th> <!-- Email is also allowed here, but its deprecated. -->
				<th>Receipt-ID</th>
				<th>Caution Money submitted</th>
				<th>Name</th>
				<th>College</th>
				<th></th>
			</tr>

			<?php foreach ($cn as $key => $value) { ?>
				<tr id="row_<?= $value['receipt_id'] ?>">
					<td id="cogni_id"><?= $value['cogni_id'] ?></td>
					<td id="cogni_id"><?= $value['receipt_id'] ?></td>
					<td><input type="checkbox" class="form-control" name="caution_<?= $value['receipt_id'] ?>" value="1" id="caution_<?= $value['receipt_id'] ?>" <?php if ($value['caution']) echo 'checked'; ?>></td>
					<td><?= $value['name'] ?></td>
					<td><?= $value['college'] ?></td>
					<td><span class="btn btn-success allot" id="<?= $value['receipt_id'] ?>">Allot</span></td>
				</tr>
			<?php } ?>
		</table>
	<?php } ?>
	<div class="login-control" id="info"></div>
</div>