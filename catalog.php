<?php
include 'navbar.php';
?>
<div onClick="closeMovie();">
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Catalog</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="https://filmbax.tk">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Catalog </li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">
						<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">GENRE:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Adventure">
									<span></span>
								</div>
								
								
								
								
								<script>
                            		$(document).ready(function(){
                            		
                            		$.ajax({
                            
                            			type:'GET',
                            			url:'catalog_ajax.php',
                            			dataType:'html',
                            			success: function(response){
                            				$('#cavab').html(response);
                            			}
                            
                            		});
                            		  //3 saniyeden bir muraciet
                            	});
								</script>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									<?php
									$select_janr = mysqli_query($con,"SELECT * FROM janr");
									while($janr=mysqli_fetch_array($select_janr)){
									?>
									<li class="<?=$janr['ad']?>" id="<?=$janr['id']?>"><?=$janr['ad']?></li>
									
									<script>
									
									    $(document).on('click','.<?=$janr['ad']?>',function(){
									       var jid = $(this).attr("id");
									       
									       $.ajax({
									          method: 'POST',
									          url: 'catalog_ajax.php',
									          data: {jid:jid},
									          success: function(response){
									              $('#cavab').html(response);
									          }
									       });
									    });
									    
									   
									    
									</script>
									
									<?php
									}
									?>
									
								</ul>
							</div>
							<!-- end filter item -->


							<!-- filter item -->
							<!--
							<div class="filter__item" id="filter__rate">
								<span class="filter__item-label">IMBd:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__imbd-start" class="reytinq"></div>
										<div id="filter__imbd-end" class="reytinq"></div>
										
										<script>
										    /*
										    $(document).on('click','.noUi-handle-lower',function(){
										    alert('sa');
										         var start_rate = $('.noUi-handle-lower').attr('aria-valuetext');
    										     var end_rate = $('.noUi-handle-upper').attr('aria-valuetext');
										       
										       $.ajax({
										            url : 'catalog_ajax.php',
                                                    method : 'POST',
                                                    data : {imdb1:start_rate , imdb2:end_rate},
                                                    success : function(response){
                                                        $("#cavab").html(response);
                                                    }
										       });
										    });
										    */
										</script>
										
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-rate">
									<div id="filter__imbd"></div>
								</div>
							</div>
							-->
							<!-- end filter item -->

							<!-- filter item -->
							<!--
							<div class="filter__item" id="filter__year">
								<span class="filter__item-label">RELEASE YEAR:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__years-start"></div>
										<div id="filter__years-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
									<div id="filter__years"></div>
								</div>
							</div>
							<!-- end filter item -->
						</div>
						-->
						<!-- filter btn -->
						<!--<button class="filter__btn" type="button">apply filter</button> -->
						<!-- end filter btn -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->

	<div class="catalog">
		<div class="container">
			<div class="row">
				<div class="row" id="cavab">
				    
				</div>

				<div class="col-12">
					<a class="section__btn catalog_more"><button type="button" style="color:white;">Show More</button></a>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->
	
<script>
//show more
    $(document).on('click','.catalog_more',function(){
       var sira =  $('.sira:last').attr('id');
       var janr = $('.janrimiz').attr('id');
       $.ajax({
          method: 'POST',
          url: 'catalog_more.php',
          data: {sira:sira , jid:janr},
          success: function(response){
              
              $('#cavab').append(response);
          }
       });
    });
</script>
				    
				    

<?php
include 'footer.php';
?>
</div>