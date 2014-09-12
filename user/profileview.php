<?php
require_once ($root . '/user/userclass.php');
$user =  new user;
echo<<<profilehtml
<body>
	<div class="container">
		<div class="row" style="margin-top:20px;">
			<div class="col-md-6">
				<img class="img-circle" alt="Circular Image" src="/images/users/$user->userimg" width="40%"/>
				
			</div>
			
			<div class="col-md-6" style="text-align:right;">
				<h2>$user->username</h2>
				<p class="h4">$user->realname</p>
				<p class="h4">Email: $user->useremail</p>
				<p class="h4">Date Joined: $user->datejoined</p>
				<p class="h4">Website: $user->userwebsite</p>
				<h2>About me</h2>
				<p class="h4">Country: $user->usercountry</p>
				<p class="h4">State: $user->userstate</p>
				<p class="h4">City: $user->usercity</p>
				<p class="h4">DOB: $user->dateofbirth</p>
					<div class="panel panel-default">
						<div class="panel-body"><p class="h4">$user->userabout</p></div>
					</div>
			</div>
		</div>
		
		<div class="row">
			<center><div class="col-md-12">
				<form action="index.php" method="POST">
					<button class="btn btn-info" type="submit" name="editprofilebutton">Edit Profile</button>
				</form>
			</div></center>
		</div>
	</div>
</body>
profilehtml;
?>