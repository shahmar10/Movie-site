<?php
session_start();

if(isset($_SESSION['uid']) && isset($_SESSION['lparol']))
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

<?php

include 'google_giris.php';

if(isset($_POST['qeydiyyat']) && $_POST['parol']==$_POST['parol2'] ){
    $ad = strip_tags($_POST['ad']);
    $ad = mysqli_real_escape_string($con,$ad);
    $mail = strip_tags($_POST['mail']);
    $mail = mysqli_real_escape_string($con,$mail);
    $parol = strip_tags($_POST['parol']);
    $parol = mysqli_real_escape_string($con,$parol);
    
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

    $select_tekrar = mysqli_query($con,"SELECT mail FROM login WHERE mail='".$mail."' ");
    $tekrar = mysqli_fetch_array($select_tekrar);
    $form_action = "";
    
    if(!isset($tekrar)){
        $qeydiyyat = mysqli_query($con,"INSERT INTO login(ad,mail,parol,tarix) VALUES('".$ad."','".$mail."','".$parol."','".$tarix."')");
        if($qeydiyyat==true){
            $form_action ='action="giris.php"';
            
            $user_id = mysqli_insert_id($con);
            
            $_SESSION['reg_mail'] = $mail;
            
            $kod = md5($mail).'-'.$user_id;
            
            $message='Hesabinizi aktiv etmek ucun <a href="https://filmbax.tk/activation.php?kod='.$kod.'">buraya klik edin</a>';
            $to = $mail;
            $subject = "WELCOME TO FILMBAX.TK"; //argument 2
            $m=$message."\n\n";
            $headers = "From: filmbax@filmbax.tk\r\n" . "X-Mailer: php";
            $headers.= 'MIME-Version: 1.0' . "\r\n";
            $headers.= 'Content-type: text/html; charset=utf-8 \r\n';
            
            //mail($to, $subject, $m, $headers);
            
            if (mail($to, $subject, $m, $headers))
            {echo"<p>Message sent!</p>";}
            else 
            {echo"<p>Message delivery failed...</p>";}
            
            
            
            
            
            
            
            echo'<meta http-equiv="refresh" content="0; URL=giris.php">';
        }
    }
    
    else{
        $cavab = '<div style="color:red">Another account is using this mail</div>';
    }
    }
    else{
        $cavab = '<div style="color:red">INVALID mail</div>';
    }
}
elseif($_POST['parol']!=$_POST['parol2']){
    $cavab = '<div style="color:red">Repetition password incorrect</div>';
}



?>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form  class="sign__form" method="post" >
							<a href="index.php" class="sign__logo">
								<img src="img/filmbax33.png" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" name="ad" value="<?=$_POST['ad']?>" placeholder="Name" required>
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" name="mail" value="<?=$_POST['mail']?>" placeholder="Email" required>
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" name="parol" placeholder="Password" required>
							</div>
							<div class="sign__group">
								<input type="password" class="sign__input" name="parol2" placeholder="Password again" required>
							</div>
                            
                            <!--
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
							</div>
							-->
							<div class="sign__group">
							<?=$cavab?>
							</div>
							<button class="sign__btn" name="qeydiyyat" type="submit" href"giris.php">Sign up</button>
							<a class="sign__btn" href="<?=$link?>" ><img src="img/google.png" style="width:50px; height:50px;"><div style="color:white"> GOOGLE</div></a>

							<span class="sign__text">Already have an account? <a href="giris.php">Sign in!</a></span>
						</form>
						<!-- registration form -->
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