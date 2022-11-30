<?php
$target_dir = "upload/";
$File = $_FILES['file']['name'];
$File2 = $_FILES['file']['tmp_name'];


  
    if(isset($_POST["submit"])) {
        $upload =  move_uploaded_file($File2, $target_dir.$File);
    }
  


?>

