<?php
include 'sql_con.php';
$lastDate = mysqli_real_escape_string($con,$_GET['last_date']);
$tarix = date("Y-m-d");

$select_film = mysqli_query($con,"SELECT * FROM film WHERE tarix<'".$lastDate."' ORDER BY tarix DESC LIMIT 6");

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