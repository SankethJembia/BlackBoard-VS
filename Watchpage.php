 <?php require_once("Lheader.php");   ?>  </div>
 <?php
          //landing page navigation header
  require_once("VideoPlayer.php");
  require_once("VideoInfo.php");

if(!isset($_GET["id"])){    //will set the id of a clicked video
    
    echo "<br >Empty  Source";
    exit();

}
  
 $video = new VideoDetails($connect,$_GET["id"]); //created a video instance   
                                                  //using the instance in the below html to get the source of the video
?>     
    
      <div class="watchBox">
        <?php 
        
        $videoplayer = new VideoPlayer($video);        //creating the video player 
        echo $videoplayer->playVideo(true);        
        ?>
        

      </div>
      <?php
      $videoinfo = new VideoInfo($connect,$video); //showing the Information of the video
        echo $videoinfo->showInfo();
        ?>
        <div class="suggestions"> 

          <?php
          
          $suggestionVideos = new SuggestionC($connect);

            echo $suggestionVideos->generateVideos(null);
          
          ?>

         </div>
      
   


<?php require_once("Lfooter.php");   ?>