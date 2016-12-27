<?php
session_start();
include('inc/config.php');
include('inc/engine.php');
$GEngine = new CEngine();
$GEngine->Connect();

//Inloggad ?



?>
<html>
	<head>
    	<title>Otrogen.Se För dig som vill vara otrogen</title>
   		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
   		<style>
      		body 
      		{
        		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      		}
    	</style>	
   	</head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		<div class="row">
            <ul class="nav">
			<li class="col-sm-2"><a href="#">Otrogen.Se</a></li>
              <li class="active col-sm-2"><a href="index.php?p=MinProfil&user=<?php echo $_SESSION['username']; ?>">Min Profil</a></li>
              <li class="col-sm-2"><a href="index.php?p=Sok">Sök</a></li>
              <li class="col-sm-2"><a href="index.php?p=LoggaUt">Logout</a></li>
            </ul>
			</div>
        </div>
      </div>
    </div>
    
    <div class="container">

      <?php 
      
      	if(isset($_GET['p']))
      	{
      		if(strcmp($_GET['p'], 'registrera') == 0 ||
				strcmp($_GET['p'], 'loggain') == 0)
      		{
      			require_once('modules/registrera_logga_in.php');
      		}
			if(strcmp($_GET['p'], 'LoggaUt') == 0)
			{
				$GEngine->LoggaUt();
				
			}
			if(strcmp($_GET['p'], 'MinProfil') == 0)
			{
				if($_SESSION['username'])
				{
				require_once('modules/profil.php');
				}else
				{
					header('Location: index.php?p=loggain');
				}
				
			}
				if(strcmp($_GET['p'], 'Sok') == 0)
			{
				
				
			}
      		
			
      	}
      	else { 
			if (!($_SESSION['username'] && $_SESSION['password'])) {
				header('Location: index.php?p=registrera');
			}
		}
      
      ?>

    </div>
	<div class="navbar navbar-defualt navbar-fixed-bottom">
	<div class="container">
	<p class="navbar-text pulll-left">Otrogen.Se För dig som vill vara otrogen
	<a href="#" target="_blank">Site</a>
	</p>
	</div>
	</div>
    	<script src="http://code.jquery.com/jquery.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php 
	$GEngine->Disconnect();
?>