<?php
require_once ($root . '/user/userclass.php');
$user =  new user;
echo<<<profilehtml
<body>
	<div class="container">
		<div class="row" style="margin-top:20px;">
			<div class="col-md-6">
				<img src="/images/users/$user->userimg" class="img-circle pull-left" width="50%"/>
			</div>
			
			<div class="col-md-6">
				<form action="index.php" method="POST" style="background-color:rgba(125,125,125,1); padding:20px; ">
					<div class="form-group">
						Username: <input class="form-control" type="text" name="usernameedit" value="$user->username"/>
					</div>
					
					<!--<div class="form-group">
						Password: <input class="form-control" type="password" name="passwordedit" value=$user->userpassword />
					</div>-->
					
					<div class="form-group">
						Email: <input class="form-control" type="text" name="emailedit" value=$user->useremail />
					</div>
					
					<div class="form-group">
						Name: <input class="form-control" type="text" name="nameedit" value=$user->realname />
					</div>
					
					<div class="form-group">
						City <input class="form-control" type="text" name="cityedit" value=$user->usercity />
					</div>
					
					<div class="form-group">
						State: <input class="form-control" type="text" name="stateedit" value=$user->userstate />
					</div>
					
					<div class="form-group">
						Country: <input class="form-control" type="text" name="countryedit" value=$user->usercountry />
					</div>
					
					<div class="form-group">
						Website: <input class="form-control" type="text" name="websiteedit" value=$user->userwebsite />
					</div>
					
					<div class="form-group">
						Date of Birth: <input class="form-control" type="date" name="birthedit" value=$user->dateofbirth />
					</div>
					
					<div class="form-group">
						About: <textarea class="form-control" name="editabout">$user->userabout</textarea>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-info" name="submitchanges">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
profilehtml;
?>