<?php

class VideoPlayer{

      private $video;                                 //player class

      public function __construct($video){
             
               $this->video=$video;

      }

      public function playVideo($autoplay){      
                   
           if($autoplay){

             $autoplay= "autoplay";

           }
           else{
               $autoplay="";
           }

           $filePath=$this->video->getFilepath();        //this player will get the path of the video and stored in a variable

           return "<video class='player' controls $autoplay> 
                       <source src='$filePath' type='video/mp4'>
                      </video> 
                      <div class='col2'>
        
          <h1>Aditional Content </h1>
        
         </div>";

      }




}




?>