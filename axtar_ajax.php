<?php
include 'sql_con.php';
$ad = mysqli_real_escape_string($con,$_POST['ad']);

$select_f = mysqli_query($con,"SELECT * FROM film WHERE basliq LIKE '%".$ad."%' ");

?>
<ul id="teklifler" style="position:absolute; z-index:999; left:250px; top:140px; width:65%; height:350px; overflow:scroll;  overflow-x:hidden;">
<?php
if(isset($select_f)){
$dovr=0;
while($dovr<10){
    $dovr++;
    $film = mysqli_fetch_array($select_f);
    if($film['basliq']!=""){
    ?>
    
     <li  style="list-style:none; position:relative; z-index:99;   border: 1px solid #d4d4d4; left:145px; top:-18px; padding:30px;background-color: #ffffff; ">
         <a href="https://filmbax.tk/details1.php?f=<?=$film['fid']?>"> <?=$film['basliq']?></a></li>
<?php
}
}
}
?>
</ul>