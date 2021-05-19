  <?php
  require_once("Lheader.php");
  require_once("Results.php");      
    if(!isset($_GET["term"]) || $_GET["term"]=="" ) {  // check if the term attribute is not passed or it is null 
       echo "Enter a Topic / Category to Search";
       exit();
    }

  $searchTerm = $_GET["term"];          // storing the search term 

   $results = new Results($connect);        //Results class
   $videos = $results-> getResultVideos($searchTerm); //calling to results function to passing the search term in the query


   $videolist = new SuggestionC($connect);      //created a Suggestion Instance to generate videos from searched statements
  ?>

  <div> 
    
  <?php
  $lenthofSearchedResults=sizeof($videos);
    if($lenthofSearchedResults>0){      // it will show the size of the video records found on the database
     
     echo "<div> <h2> $lenthofSearchedResults  Result's Found   </h2> </div>"; //it will show the no of results
      echo $videolist->getResultItems($videos); //showing the results items


    }
    else {
      echo "<div> <h2> $lenthofSearchedResults Result's Found   </h2> </div>";
    }




  ?>
  
  
  
  
  
  
  
  <div>


<?php
require_once("Lfooter.php");
?>