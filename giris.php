<?php
session_start();

if(isset($_SESSION['uid']))
  {
    echo'<meta http-equiv="refresh" content="0; URL=index.php">';
  }


include 'sql_con.php';
$tarix = date("Y-m-d h:i:s");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FILMBAX</title>

</head>
<body class="body">

<?php
//google uke giris

include 'google_giris.php';


//normal giris


if(isset($_POST['dgiris']))
  {
    $g_mail = strip_tags($_POST['lmail']);
    $g_mail = mysqli_real_escape_string($con,$g_mail);
    $g_parol = strip_tags($_POST['lpassword']);
    $g_parol = mysqli_real_escape_string($con,$g_parol);

    $select_log = mysqli_query($con,"SELECT * FROM login WHERE mail='".$g_mail."' AND parol='".$g_parol."' ");
    $sech=mysqli_fetch_array($select_log);

    if(isset($sech))
      {
        $_SESSION['uid']=$sech['id'];
        

        echo'<meta http-equiv="refresh" content="0; URL=index.php">';
      }
    else
      {$sehv = "<div style=\"color:red\">Incorrect mail or password!</div>";}

  }

?>

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="#" method="POST" class="sign__form">
							<a href="index.php" class="sign__logo">
								<img src="img/filmbax33.png" alt="">
							</a>

							<div class="sign__group">
								<input type="text" name="lmail" value="<?=$_SESSION['reg_mail']?>" class="sign__input" placeholder="Email">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" name="lpassword" placeholder="Password">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Remember Me</label>
							</div>
							<?=$sehv?>
							<button class="sign__btn" type="submit" name="dgiris">Sign in</button>
							
                            <a class="sign__btn" href="<?=$link?>" ><img src="img/google.png" style="width:50px; height:50px;"><div style="color:white"> GOOGLE</div></a>
                            
                            
                            
							<span class="sign__text">Don't have an account? <a href="qeydiyyat.php">Sign up!</a></span>
                            <!--
							<span class="sign__text"><a href="#">Forgot password?</a></span>
							-->
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>