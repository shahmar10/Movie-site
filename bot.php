<pre>
<?php
//ini_set('max_execution_time', 300); //300 seconds = 5 minutes
include 'sql_con.php';

/*
//janrlar
$janrlar=file_get_contents('https://api.themoviedb.org/3/genre/movie/list?&api_key=408fafe54eeb3530116e6b5e02ca0600&language=en-US');
$janrlar=json_decode($janrlar);
//print_r($janrlar);


for($i=0; $i<count($janrlar->genres); $i++){
    $jid = $janrlar->genres[$i]->id;
    $ad_janr = $janrlar->genres[$i]->name;
    $select_janr = mysqli_query($con,"SELECT * FROM janr WHERE id='".$jid."' ");
    $janr=mysqli_fetch_array($select_janr);
    if(!isset($janr)){
        $elave_janr= mysqli_query($con,"INSERT INTO janr(id,ad) VALUES('".$jid."','".$ad_janr."') ");
    }
}
*/

$say=0;
for($page=1;$page<100;$page++){

    $data=file_get_contents('https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=408fafe54eeb3530116e6b5e02ca0600&language=en-US&page='.$page.' ');
    $data=json_decode($data);
    //print_r($data);
    //echo count($data->results);
    
    
    for($i=0; $i<count($data->results); $i++)
    {
         $basliq = $data->results[$i]->title;
         $haqqinda = $data->results[$i]->overview;
         
         $fid = $data->results[$i]->id;
         $ktarix = $data->results[$i]->release_date;
         $dil = $data->results[$i]->original_language;
         $imdb = $data->results[$i]->vote_average;
         //$sekil = $data->results[$i]->poster_path;
         $sekil='<img src="//image.tmdb.org/t/p/w600_and_h900_bestv2/'.$data->results[$i]->poster_path.'">';
    
         $vlink='https://api.themoviedb.org/3/movie/'.$data->results[$i]->id.'/videos?api_key=408fafe54eeb3530116e6b5e02ca0600';
         $vdata=file_get_contents($vlink);
         $vdata=json_decode($vdata);
         $youkey=$vdata->results[0]->key;
         //print_r($vdata);exit;
         $video='<iframe width="900" height="506" src="https://www.youtube.com/embed/'.$youkey.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>';
         
         
        
         
         $select_film = mysqli_query($con,"SELECT * FROM film WHERE video='".$youkey."' and fid='".$fid."' ");
         $film=mysqli_fetch_array($select_film);
         if(!isset($film) && !empty($sekil) && !empty($youkey) && !empty($fid)){
             
              for ($j=0; $j<count($data->results[$i]->genre_ids); $j++){
              $jid = $data->results[$i]->genre_ids[$j];
              $elave_janr_film = mysqli_query($con,"INSERT INTO janr_film(fid,jid) VALUES('".$fid."','".$jid."')" );
            
              }
             
             $elave = mysqli_query($con,"INSERT INTO film(sekil,basliq,haqqinda,video,imdb,tarix,dil,fid) VALUES('".mysqli_real_escape_string($con,$sekil)."','".mysqli_real_escape_string($con,$basliq)."','".mysqli_real_escape_string($con,$haqqinda)."','".mysqli_real_escape_string($con,$youkey)."','".mysqli_real_escape_string($con,$imdb)."','".mysqli_real_escape_string($con,$ktarix)."','".mysqli_real_escape_string($con,$dil)."','".mysqli_real_escape_string($con,$fid)."') ");
             
         }
         
    }
    $say++;
}
echo $say;
?>
</pre>