<?php 
include('inc/config.php');

class CEngine
{
	/*
	 * Connects to mySQL Database.
	 */
	public function Connect()
	{
		global $dating;
		mysql_connect($dating['mysql_host'], $dating['mysql_username'], $dating['mysql_password']);
		mysql_select_db($dating['mysql_database']);
	}	
	
	/*
	 * Disconnects from mySQL Database.
	 */
	public function Disconnect()
	{
		mysql_close();
	}
	
	public function GetProfil($user)
	{
		$query = mysql_query("SELECT * FROM user WHERE user_name='$user'") or die(mysql_error());
		return mysql_fetch_array($query, MYSQL_ASSOC);
		
	}
	
	/*
	*Update user profile
	*/
	public function ChangeProfile($user,$profile)
	{
		$query = mysql_query("SELECT * FROM user WHERE user_name='$user'") or die(mysql_error());
		if(mysql_num_rows($query) == 1)
		{
			
			mysql_query("UPDATE user SET user_profile='$profile' WHERE user_name='$user'");
		}
		else
		{
			echo "kuken du finns";
		}
		
	}
	
	/*
	 * Add NewUser
	 */
	public function AddNewUser($user, $password)
	{
		$query = mysql_query("SELECT * FROM user WHERE user_name='$user'") or die(mysql_error());
		if(mysql_num_rows($query) == 0)
		{
			//Doesnt exist.
			mysql_query("INSERT INTO user(user_name, user_password) VALUES('$user', '$password')");
		}
		else
		{
			echo "kuken du finns";
		}
		
	}
	
	
	/*
	 * Log in
	 */
	public function LogInUser($user, $password)
	{
		$query = mysql_query("SELECT * FROM user WHERE user_name='$user' AND user_password='$password'") or die(mysql_error());
		if(mysql_num_rows($query) == 0)
		{
			//Doesnt exist.
			echo "Fel lösenord för ".$user;
		}
		else
		{
			// Success
			$_SESSION['username'] = $user;
			$_SESSION['password'] = $password;
			header('Location: index.php');
		}
		
	}
	
	public function LoggaUt()
	{
			$_SESSION['username'] = "";
			$_SESSION['password'] = "";
		header('Location: index.php?p=loggain');
	}

}

?>