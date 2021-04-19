<?php 
session_start();
include 'navbar.php';
$tarix = date("Y-m-d");
?>
<div onClick="closeMovie();">
	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>LATEST</b> TRAILERS</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>
                <div class="col-12">
				<div class="owl-carousel home__carousel">
				    
                <?php
                $select_film = mysqli_query($con,"SELECT * FROM film WHERE tarix<'".$tarix."' ORDER BY tarix DESC");
                $dovr=0;
                while($dovr<20){
                $film=mysqli_fetch_array($select_film);
                $dovr++;
                ?>

						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<?=$film['sekil']?>
									<a href="details1.php?f=<?=$film['fid']?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="details1.php?f=<?=$film['fid']?>"><?=$film['basliq']?></a></h3>
									<span class="card__category">
									    <?php
									    
									    
									    $select_janr = mysqli_query($con,"SELECT janr.ad FROM janr,janr_film WHERE janr.id=janr_film.jid AND janr_film.fid='".$film['fid']."' ");
									    while($janr=mysqli_fetch_array($select_janr)){
									    
									    ?>
										<a><?=$janr['ad']?></a>
										<?php
									    }#while
										?>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i><?=$film['imdb']?></span>
								</div>
							</div>
							<!-- end card -->
						</div>
						
                <?php
                }#dongu
                ?>
						
						
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Popular</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Animation</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV Movies</a>
							</li>
                            
                            <li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">English</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Russian</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Korean</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tab-7" aria-selected="false">French</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="false">German</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Popular</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Animation</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV Movies</a></li>
									
									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">English</a></li>
									
									<li class="nav-item"><a class="nav-link" id="5-tab" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Russian</a></li>
									
									<li class="nav-item"><a class="nav-link" id="6-tab" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Korean</a></li>
									
									<li class="nav-item"><a class="nav-link" id="7-tab" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tab-7" aria-selected="false">French</a></li>
									
									<li class="nav-item"><a class="nav-link" id="8-tab" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="false">German</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content" id="myTabContent">
			    
			    <?php
			    for($tab=1;$tab<9;$tab++){
			     if($tab==1)
			         {$active = "show active";}
			     
			     else
			         {$active = "";}
			     
			    ?>
			
				<div class="tab-pane fade <?=$active?>" id="tab-<?=$tab?>" role="tabpanel" aria-labelledby="<?=$tab?>-tab">
					<div class="row">
						
					<?php
					if($tab==1){
					$select_film= mysqli_query($con,"SELECT * FROM film ORDER BY imdb DESC ");
					}
					elseif($tab==2){
					    $select_film= mysqli_query($con,"SELECT film.basliq,film.fid,film.sekil,film.imdb,film.haqqinda  FROM film,janr_film WHERE film.fid=janr_film.fid AND janr_film.jid='16' ");
					}
					elseif($tab==3){
					    $select_film= mysqli_query($con,"SELECT film.basliq,film.fid,film.sekil,film.imdb,film.haqqinda  FROM film,janr_film WHERE film.fid=janr_film.fid AND janr_film.jid='10770' ");
					}
					elseif($tab==4){
					    $select_film= mysqli_query($con,"SELECT * FROM film WHERE dil='en' ");
					}
					elseif($tab==5){
					    $select_film= mysqli_query($con,"SELECT * FROM film WHERE dil='ru' ");
					}
					elseif($tab==6){
					    $select_film= mysqli_query($con,"SELECT * FROM film WHERE dil='ko' ");
					}
					elseif($tab==7){
					    $select_film= mysqli_query($con,"SELECT * FROM film WHERE dil='fr' ");
					}
					elseif($tab==8){
					    $select_film= mysqli_query($con,"SELECT * FROM film WHERE dil='de' ");
					}
					
					$dovr1=0;
					while($dovr1<8){
					$film=mysqli_fetch_array($select_film);
					$dovr1++;
					?>	
						<!-- card -->
						<div class="col-6 col-sm-12 col-lg-6">
							<div class="card card--list">
								<div class="row">
									<div class="col-12 col-sm-4">
										<div class="card__cover">
											<?=$film['sekil']?>
											<a href="details1.php?f=<?=$film['fid']?>" class="card__play">
												<i class="icon ion-ios-play"></i>
											</a>
										</div>
									</div>

									<div class="col-12 col-sm-8">
										<div class="card__content">
											<h3 class="card__title"><a href="details1.php?f=<?=$film['fid']?>"><?=$film['basliq']?></a></h3>
											<span class="card__category">
												<?php
												$select_janr = mysqli_query($con,"SELECT janr.ad FROM janr,janr_film WHERE janr_film.fid='".$film['fid']."' AND janr_film.jid=janr.id ");
												while($janr=mysqli_fetch_array($select_janr)){
												
												?>
												<a href="#"><?=$janr['ad']?></a>
												<?php
												}
												?>
											</span>

											<div class="card__wrap">
												<span class="card__rate"><i class="icon ion-ios-star"></i><?=$film['imdb']?></span>

												<ul class="card__list">
													<li>HD</li>
													
												</ul>
											</div>

											<div class="card__description">
												<p><?=$film['haqqinda']?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end card -->
                    <?php
					}
                    ?>
						
						
					</div>
				</div>

            <?php
            }# for tab
            ?>    
				
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">Expected premiere</h2>
				</div>
				<!-- end section title -->
				
				
				
				<script>
				/*
				    $(window).scroll(function(){
				        if( $(window).scrollTop()+$(window).height()>=$(document).height() ){
				            var lastDate = $('.postid:last').attr("id");
				            loadMore(lastDate);
				            
				        }
				    });
				*/      
				
			    $(document).on('click','.ExpectP',function(){
			            var lastDate = $('.postid:last').attr("id");
			            loadMore(lastDate);
			        
			    });
			    
		        function loadMore(lastDate){
		            $.ajax({
		                url : 'expect_movie.php?last_date='+lastDate,
                        type : 'GET',
                        beforeSend: function(){
                            $('.ajax-load').show();
                        }
                        
		            }).done(function(data){
		                $('.ajax-load').hide();
		                $('#post-data').append(data);
		            }).fail(function(jqXHR, ajaxOptions, thrownError){
		                $('.ajax-load').hide();
		                alert('SERVER NOT responding..');
		            });
		        }
				        
				        
			
				    
				    
				</script>
                
                <?php
                $tarix = date("Y-m-d");
                $select_film = mysqli_query($con,"SELECT * FROM film WHERE tarix>'".$tarix."' ORDER BY tarix DESC LIMIT 6");
                
				while($film=mysqli_fetch_array($select_film)){

                ?>
                
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2 postid" id="<?=$film['tarix']?>">
					<div class="card">
						<div class="card__cover">
							<?=$film['sekil']?>
							<a href="details1.php?f=<?=$film['fid']?>" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="details1.php?f=<?=$film['fid']?>"><?=$film['basliq']?></a></h3>
							<span class="card__category">
								<?php
								$select_janr=mysqli_query($con,"SELECT janr.ad FROM janr,janr_film WHERE janr_film.fid='".$film['fid']."' AND janr.id=janr_film.jid ");
								while($janr=mysqli_fetch_array($select_janr)){
								?>
								<a href="#"><?=$janr['ad']?></a>
								<?php
								}
								?>
								
							</span>
							
						</div>
					</div>
				</div>
				<!-- end card -->
                <?php
				}
                ?>
				<div class="row" id='post-data'></div>
				
				

				<!-- section btn -->
				
				<div class="col-12">
					<a class="section__btn ExpectP"><button type="button" style="color:white;">Show More</button></a>
				</div>
				
				<!-- end section btn -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->



<?php
include 'footer.php';
?>
</div>