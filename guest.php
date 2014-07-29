<?php

//See POSTS and Search


?>

<div class="row"  style="height:100%;">

	<div class="col-lg-6 col-lg-offset-1">
		<div class="col-lg-12" style="background-color:grey">
			
		</div>
	</div>
	<div class="col-lg-5"  style="background-color:grey; height:100%;">
		<div class="col-lg-10 col-lg-offset-1" style="margin-top: 35%;background-color:lightgrey; height:40%;">
			<h2 align="center">Login</h2>
			<br/>
			<form class="form-horizontal" role="form" action="login.php" method="post">
			  <div class="form-group">
				<label for="edtEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="edtPassword" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Sign in</button>
				</div>
			  </div>
			</form>
		</div>
	</div>

</div>