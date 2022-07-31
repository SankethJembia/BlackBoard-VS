<?php
require_once("Lheader.php");            //landing page navigation header

echo "<h2>$user</h2>  <div class='cnt'>
 
<h1> Welcome  to  BlackBoard  </h1>
  
</div>";

//echo $userobj->getFirstname();  
$imgbb="Resourses/ORFEYB0.jpg";
echo " <body> 
<div class='imge'>  
<img src=$imgbb>
 </div> 


 </body>";

require_once("Lfooter.php");       //landing page footer
?>
<html>
<head>
<style>
h2{
    z-index:1;
    position: fixed;
    color:#c1c0c0;
    background: #2d292a;

} 
.imge img{
    height:100%;
    width:100%;
position:inherit;
z-index:0;
}
.cnt{

    position: fixed;
    height: 100%;
    width: 100%;
    color: aliceblue;
    font-style:italic;
    text-align: center;
   
}

</style>


</head>
</html>



       



