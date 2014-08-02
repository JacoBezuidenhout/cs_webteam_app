<div class="row">
	<div class="col-lg-12">
		<h1 align="center">Admin Panel</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-6" >
		<table class="table table-hover">
		  <tr style="text-align:center; background-color:lightgrey"><td><strong>Name</strong></td><td><strong>Surname</strong></td><td><strong>Email</strong></td><td><strong>Preferred Country</strong></td><td><strong>Plan Count</strong></td><td colspan=2><strong>Tools</strong></td></tr>
		          <?php
        $users = getUsers();
        //echo print_r($posts);
        foreach ($users as $user) {
            ?>
		  
		  	<div class="modal fade" id="editprofile<?php echo $user['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">	
				  <div class="modal-header">
					<h1 class="modal-title">Edit Profile</h1>
				  </div>
				  <div class="modal-body">
				  	<form action="update.php" method="post">
						<input type="hidden" name="type" value="user" />
						<input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>" />
						<input type="text" name="name" value="<?php echo $user['user_name'];?>" class="form-control"/>
						<input type="text" name="surname" value="<?php echo $user['user_surname'];?>" class="form-control"/>
						<input type="email" name="email" value="<?php echo $user['user_email'];?>" class="form-control"/>
						<input type="text" name="country" value="<?php echo $user['user_country'];?>" class="form-control"/>
                                                <input type="number" name="user_type" value="<?php echo $user['user_type'];?>" class="form-control"/>
				  </div>
				  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		  
	
						
                  <tr><td><?php echo $user['user_name'];?></td><td><?php echo $user['user_surname'];?></td><td><?php echo $user['user_country'];?></td>
                      <td><?php echo $user['user_email']; ?></td>
                      <td><?php echo getPostCount($user['user_id']); ?></td>
		  		<td>
		  			<button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#editprofile<?php echo $user['user_id'];?>"><span class="glyphicon glyphicon-edit"></span></button>
		  		</td>
		  		<td>
		  			<form action="delete.php" method="post">
		  				<input name="type" type="hidden" value="user">
                                                <input name="user_id" type="hidden" value="<?php echo $user['user_id'];?>">
		  				<button class="btn btn-sm btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
		  			</form>
		  		</td></tr>
		  <?php } ?>
		</table>
	</div>
</div>