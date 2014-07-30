<div class="row">
	<div class="col-lg-12">
		<h1 align="center">Admin Panel</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6" >
		<table class="table table-hover">
		  <tr style="text-align:center; background-color:lightgrey"><td><strong>Name</strong></td><td><strong>Surname</strong></td><td><strong>Preferred Country</strong></td><td><strong>Plan Count</strong></td><td colspan=2><strong>Tools</strong></td></tr>
		  <?php for ($k = 1; $k < 30; $k++) { ?>
		  
		  	<div class="modal fade" id="editprofile<?php echo $k;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">	
				  <div class="modal-header">
					<h1 class="modal-title">Edit Profile</h1>
				  </div>
				  <div class="modal-body">
				  	<form action="updateProfile.php" method="post">
						<input type="text" name="profile_name" value="Jaco" class="form-control"/>
						<input type="text" name="profile_surname" value="Bezuidenhout" class="form-control"/>
						<input type="text" name="profile_country" value="South Africa" class="form-control"/>
				  </div>
				  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  
	
						
		  	<tr><td>Jaco</td><td>Bezuidenhout</td><td>South Africa</td><td>30</td>
		  		<td>
		  			<button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#editprofile<?php echo $k;?>"><span class="glyphicon glyphicon-edit"></span></button>
		  		</td>
		  		<td>
		  			<form action="delete.php" method="post">
		  				<input type="hidden" value="<?php echo $k;?>">
		  				<button class="btn btn-sm btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
		  			</form>
		  		</td></tr>
		  <?php } ?>
		</table>
	</div>
</div>