<style>
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>
<?php 

	$isRegister = (strcmp($_GET['p'], 'registrera') == 0);
	$isLogin = (strcmp($_GET['p'], 'loggain') == 0);

	if($isRegister)
		{
			$redirPath = 'index.php?p=loggain';
			if(isset($_POST['user']) && isset($_POST['password']))
			{
			$user = $_POST['user'];
			$password = $_POST['password'];
			$GEngine->AddNewUser($user,$password);
			}
		}
		if($isLogin) {
			$redirPath = 'index.php?p=registrera';
			if(isset($_POST['user']) && isset($_POST['password']))
			{
			$user = $_POST['user'];
			$password = $_POST['password'];
			$GEngine->LogInUser($user,$password);
			}
		}



?>   
   <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">
			<?php
				if ($isRegister) {
					echo "Registrera";
				} else if ($isLogin) {
					echo "Logga in";
				}
			?>
			</h1>
            <div class="account-wall">
                <form class="form-signin" action="" method="post">
                <input type="text" name="user" class="form-control" placeholder="Användarnamn" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Lösenord" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
					<?php
						if ($isRegister) {
							echo "Bli otrogen";
						} else if ($isLogin) {
							echo "Var otrogen";
						}
					?>
				</button>
                <a href="#" class="pull-right need-help">Medlemsvillkor</a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo $redirPath; ?>" class="text-center new-account">
			<?php
				if ($isRegister) {
					echo "Logga in";
				} else if ($isLogin) {
					echo "Registrera";
				}
			?></a>
        </div>
    </div>