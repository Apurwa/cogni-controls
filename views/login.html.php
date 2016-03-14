<div class="col-sm-offset-3 col-sm-6 login jumbotron">
	<div class="login-control login-head">
		<h2>Login to Controls</h2>
	</div>
	<form action="/login" method="post">
		<div class="col-sm-12">
			<div class="login-control col-sm-4">
				<label for="control1">Control-1</label>			
			  <input type="radio" class="form-control" name="control_num" value="1" id="control1">
			</div>
			<div class="login-control col-sm-4">
				<label for="control2">Control-2</label>			
			  <input type="radio" class="form-control" name="control_num" value="2" id="control2">
			</div>
			<div class="login-control col-sm-4">
				<label for="control3">Control-3</label>		  
			  <input type="radio" class="form-control" name="control_num" value="3" id="control3">
			</div>
			<div class="input-group col-sm-12">
			  <input type="password" class="form-control" placeholder="password">
			</div>
			<br />
			<div class="input-group col-sm-12">
			  <input type="submit" class="form-control btn btn-success" value="Login">
			</div>
		</div>
	</form>
</div>