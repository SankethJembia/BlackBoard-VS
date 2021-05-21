
<?php
require_once("Lheader.php"); 

$cat=new Category($connect,$user);
echo $cat->showCat();

require_once("Lfooter.php"); 
?>