<?php
session_start();
include 'sql_con.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://kit.fontawesome.com/c37a2e96a6.js" crossorigin="anonymous"></script>
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
	<title>Film bax</title>

</head>
<body class="body" onClick="closeMovie();">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="index.php" class="header__logo">
								<img src="img/filmbax33.png" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									
									<a href="index.php" class="header__nav-link">Home</a>
									
								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="header__nav-item">
									<a href="catalog.php" class="header__nav-link">Catalog</a>
									
								</li>
								<!-- end dropdown -->

								<li class="header__nav-item">
									<a href="faq.php" class="header__nav-link">Help</a>
								</li>

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										
										
										<?php if(!isset($_SESSION['uid'])){ ?><li><a href="qeydiyyat.php">Sign Up</a></li> <?php } ?>
										<li><a href="https://quluzada.tk">About</a></li>
										<?php if(isset($_SESSION['uid'])){ ?><li><a href="exit.php">Sign out</a></li> <?php } ?>
										
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->
                            
                            
							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button" onClick="closeMovie();">
									<i class="icon ion-ios-search"></i>
								</button>
								
								<?php if(!isset($_SESSION['uid'])){ ?>
								<a href="giris.php" class="header__sign-in">
									<i class="icon ion-ios-log-in"></i>
									<span>sign in</span>
								</a>
								<?php } 
								if(isset($_SESSION['uid'])){ 
								
								if(isset($_SESSION['google'])) {$select_ad = mysqli_query($con,"SELECT given_name as ad FROM login_google WHERE id='".$_SESSION['uid']."' ");}
								else {$select_ad = mysqli_query($con,"SELECT ad FROM login WHERE id='".$_SESSION['uid']."' ");}
								
								$info = mysqli_fetch_array($select_ad);
								?>
								<a class="header__sign-in">
									
									
									<span><i class="far fa-user"></i><?=$info['ad']?></span>
								</a>
								
								<?php } ?>
							</div>
							<!-- end header auth -->
							

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		


		<!-- header search -->
		<form action="#" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" autocomplete="off" class="axtar_input" id="axtar_kino" placeholder="Search for a movie, TV Series that you are looking for" onClick="selectMovie();" > 
                             
                            
                            
                            <script>
                                const axtarInput = document.querySelector(".axtar_input");

                                //istifadeci duymeye basanda
                                axtarInput.addEventListener('keyup',function(){
                                   const input = axtarInput.value;
                                   //console.log(input);
                                   
                                   $.ajax({
                        			method: 'POST',
                        			url: 'axtar_ajax.php',
                        			data: {ad:input},
                        			success: function(response){
                        				$('#cavab_axtar').html(response);
                        
                        			}
                        		});
                                });
                                
                                
                                
                                
                                function closeMovie() {
                                $("#teklifler").hide();
                                }
                                function selectMovie() {
                                $("#teklifler").show();
                                }
                                
                              
                                                            
                            </script>
                            
                            
							
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<!-- end header search -->
	</header>
<div id="cavab_axtar"></div>
