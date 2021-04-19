<?php
session_start();
include 'sql_con.php';
$fid = mysqli_real_escape_string($con,$_POST['fid']);
$comment = strip_tags($_POST['comment']);
$comment = mysqli_real_escape_string($con,$comment);
if(isset($_SESSION['google'])){
    $u_type = "google";
}else{
    $u_type = "normal";
}
$tarix = date("Y-m-d h:i:s");

//elavet
if(isset($fid) && isset($comment) && !empty($comment)){
    $elave = mysqli_query($con,"INSERT INTO comment(uid,fid,comment,tarix,u_type) VALUES('".$_SESSION['uid']."','".$fid."','".$comment."','".$tarix."','".$u_type."') ");
}

//print
if (isset($_POST['tek_fid'])){
    $fid = mysqli_real_escape_string($con,$_POST['tek_fid']);
    $sifirla = "";
}
$select_comment = mysqli_query($con,"SELECT * FROM comment WHERE fid='".$fid."' ");
while($comment=mysqli_fetch_array($select_comment)){
    if($comment['u_type']=="google") {
        $select_user = mysqli_query($con,"SELECT * FROM login_google WHERE id='".$comment['uid']."' ");
        $user = mysqli_fetch_array($select_user);
    }else{
        $select_user = mysqli_query($con,"SELECT * FROM login WHERE id='".$comment['uid']."' ");
        $user = mysqli_fetch_array($select_user);
    }
?>
    <li class="comments__item">
        <div class="comments__autor">
            <?php
            if ($comment['u_type']=="google"){
                $sekil = $user['sekil'];
            }else{
                $sekil = "img/no-image.jpg";
            }
            ?>
        	<img class="comments__avatar" src="<?=$sekil?>" alt="">
        	<span class="comments__name"><?=$user['ad']?> </span>
        	<span class="comments__time"><?=$comment['tarix']?></span>
        </div>
        <p class="comments__text"><?=$comment['comment']?></p>
        <div class="comments__actions">
        	<!--
        	<div class="comments__rate">
        		<button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>
        
        		<button type="button">7<i class="icon ion-md-thumbs-down"></i></button>
        	</div> -->
        
        </div>
    </li>
<?php
} #while

//comment
if(isset($_SESSION['uid'])){
?>
<form action="#" class="form">
	<textarea id="text" name="text" class="form__textarea" value="<?=$sifirla?>" placeholder="Add comment" required></textarea>
	<button type="button" class="form__btn dcomment">Send</button>
</form>
<?php
}
else{
    echo "<span class=\"comments__name\">If you want write comment sign in!</span>";
}
?>