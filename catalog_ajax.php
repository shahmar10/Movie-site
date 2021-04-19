
<?php
include 'sql_con.php';
if(isset($_POST['jid'])){
    $jid = mysqli_real_escape_string($con,$_POST['jid']);
}
else{
    $jid = 12;
}


$limit = 0;
$limit2 = 18;
$select_f = mysqli_query($con,"SELECT film.id,film.imdb,film.basliq,film.fid,film.sekil FROM film,janr_film WHERE janr_film.jid='".$jid."' AND janr_film.fid=film.fid ORDER BY film.id DESC LIMIT 0,18 ");

while($film = mysqli_fetch_array($select_f)){


?>

<!-- card -->

<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
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
				$select_j = mysqli_query($con,"SELECT janr.ad FROM janr,janr_film WHERE janr_film.fid='".$film['fid']."' AND janr.id=janr_film.jid ");
				while($janr=mysqli_fetch_array($select_j)){
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
<div class="janrimiz" id="<?=$jid?>"></div>
<div class="sira" id="<?=$film['id']?>"></div>  
<!-- end card -->
<?php
}
?>

