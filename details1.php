<div onClick="closeMovie();">
<?php
include 'navbar.php';
$fid = strip_tags($_GET['f']);
$select_fid = mysqli_query($con,"SELECT * FROM film WHERE fid='".mysqli_real_escape_string($con,$fid)."' ");
$fid1 = mysqli_fetch_array($select_fid);

if (isset($fid1)){
?>

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<?php
		$select = mysqli_query($con,"SELECT * FROM film WHERE fid='".mysqli_real_escape_string($con,$fid)."' ");
		$film = mysqli_fetch_array($select);
		?>
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?=$film['basliq']?></h1>
					<input type="hidden" value="<?=$fid?>" id="fid">
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<?=$film['sekil']?>
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i><?=$film['imdb']?></span>

										<ul class="card__list">
											<li>HD</li>
											
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span> 
										<?php
										$select_janr = mysqli_query($con,"SELECT janr.ad,janr.id FROM janr,janr_film WHERE janr.id=janr_film.jid AND janr_film.fid='".$film['fid']."' ");
										while($janr=mysqli_fetch_array($select_janr)){
										?>
										<a href="#"><?=$janr['ad']?></a>
										
										<?php
										}
										?>
										</li>
										<li><span>Release year:</span> <?=$film['tarix']?></li>
										
										<li><span>Language:</span> <a href="#"><?=$film['dil']?></a> </li>
									</ul>

									<div class="card__description card__description--details">
										<?=$film['haqqinda']?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6" >
					    <iframe width="650" height="346" src="https://www.youtube.com/embed/<?=$film['video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
							</li>

						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<ul class="comments__list">
											
										<div id="commentler"></div>	
											
										
									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>
						
						<script>
						
						    $(document).ready(function() {
                              var hidden = document.querySelector('#fid');
						      var fid = hidden.value;
                              $.ajax({ 
                                method: 'POST',
    					        url: 'comment_ajax.php',            
                                data: {tek_fid:fid},
                                success: function(response){                    
                                    $("#commentler").html(response); 
                         
                                }
                              });
						   });
						
						    $(document).on('click','.dcomment',function(){
						       var textarea = document.querySelector('#text');
						       var comment = textarea.value;
						       var hidden = document.querySelector('#fid');
						       var fid = hidden.value;
						       
						       $.ajax({
    					          method: 'POST',
    					          url: 'comment_ajax.php',
    					          data: {comment:comment,fid:fid},
    					          success: function(response){
    					              $('#commentler').html(response);
    					          }
    					       });
						    });
						</script>

						
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">You may also like...</h2>
						</div>
						<!-- end section title -->
                        
                        <?php
                        $select_janr = mysqli_query($con,"SELECT janr.ad,janr.id FROM janr,janr_film WHERE janr.id=janr_film.jid AND janr_film.fid='".mysqli_real_escape_string($con,$fid)."' ");
						$janr=mysqli_fetch_array($select_janr);
                        
                        $select = mysqli_query($con,"SELECT film.imdb,film.basliq,film.fid,film.sekil FROM film,janr_film WHERE janr_film.fid=film.fid AND janr_film.jid='".$janr['id']."' ");
                        $dovr=0;
                        while($dovr<6){
                        $film=mysqli_fetch_array($select);
                        $dovr++;
                        ?>
                        
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<?=$film['sekil']?>
									<a href="https://filmbax.tk/details1.php?f=<?=$film['fid']?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="https://filmbax.tk/details1.php?f=<?=$film['fid']?>"><?=$film['basliq']?></a></h3>
									<span class="card__category">
										<?php
										$select_janr = mysqli_query($con,"SELECT janr.ad FROM janr,janr_film WHERE janr.id=janr_film.jid AND janr_film.fid='".$film['fid']."' ");
										while($janr=mysqli_fetch_array($select_janr)){
										?>
										<a href="#"><?=$janr['ad']?></a>
										<?php
										}
										?>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i><?=$film['imdb']?></span>
								</div>
							</div>
						</div>
						<!-- end card -->
                        <?php
                        }
                        ?>
                        
						
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->

<?php
}
else{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
include 'footer.php'
?>
</div>