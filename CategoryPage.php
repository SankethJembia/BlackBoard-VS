
<?php require_once("Lheader.php");?>
<?php


if(!isset($_GET["id"])){    //will set the id of a clicked video
    
    echo "<br >Empty  Source";
    exit();

}

$cat=new Category($connect,$user);
echo $cat-> showCategory($_GET["id"]);





require_once("Lfooter.php"); 




?>