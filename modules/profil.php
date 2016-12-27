<?php
$user = $GEngine->GetProfil($_GET['user']);

//Ändra profil
$userChangeProfile = '<form class="form-signin" action="" method="post">
<input type="text" name="profil" class="form-control">
 <button class="" type="submit">Uppdatera min profil</button>
</form>';

if(isset($_POST['profil']))
			{
			$profil = $_POST['profil'];
			$GEngine->ChangeProfile($_SESSION['username'],$profil);
			header("Location: ".$_SERVER['PHP_SELF']."?p=MinProfil&user=".$_SESSION['username']);
			}
?>
<h3><?php echo $_GET['user']."'s Profil"; ?></h3>

<p><?php echo $user["user_profile"];?></p>

<?php
if($_SESSION['username'] == $user["user_name"])
{
	echo $userChangeProfile;
}
	
?>
