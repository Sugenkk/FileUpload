<?php
$target_dir = "/var/www/html/FileUpload/upload/";
$File = $_FILES['file']['name'];
$File2 = $_FILES['file']['tmp_name'];
$filename=$target_dir.basename($File);
$number = 1;
 

if(isset($File)){
  
    if (file_exists($filename)) {
      $number = 10 ;
      $safenumber = 12;
      echo $number;
          exit();
    } 

    else{
       
            $upload =  move_uploaded_file($File2, $target_dir.$File);
            echo $number;
            exit;
        }
    
    }

?>

