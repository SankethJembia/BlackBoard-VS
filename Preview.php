<?php

class Preview{        //preview class

    private $connect,$user;
  
    public function __construct($connect,$user){   //connection init  userloogin
         $this->connect=$connect;
         $this->user=$user;
    }



    public function createCatEntityPreview($entity){   //provide the details of every entity
         
        $id=$entity->getId();
        $name =$entity->getName();
        $thumbnail=$entity->getThumbnail();         //here we get the thumnails of the entities
                                                    //adding styles,modified to watch page
        return "         
                           <a href='Watchpage.php?id=$id'>
                                 <div class='previewclass thumbnailb'>
                                   
                                      <img src='$thumbnail' title='$name' > 
                                      <h5> $name </h5>
                                  </div>
                                
                            </a>";
    
    
      }





    public function createEntityPreview($entity){   //provide the details of every entity
         
        $id=$entity->getId();
        $name =$entity->getName();
        $thumbnail=$entity->getThumbnail();         //here we get the thumnails of the entities
                                                    //adding styles,modified to watch page
        return "         
                           <a href='Watchpage.php?id=$id'>
                                 <div class='previewclass'>
                                      <img src='$thumbnail' title='$name' > 
                                  </div>
                            </a>";
    
    
      }
}


?>