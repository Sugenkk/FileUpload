<?php


$target_dir = "/var/www/html/FileUpload/uploads/";

$File = strtolower($_FILES['file']['name']);
$File2 = $_FILES['file']['tmp_name'];

//extention

$ext=explode(".", $File);
$ext2=$ext[1];
//blackliststring



$filename=$target_dir.basename($File);
 

if(isset($File)){
    if (file_exists($filename)) {
      echo "File exist";
          exit();
    } 
    else
    {
        if($ext2 == "jpg" || $ext2 == "png" || $ext2 == "jpeg"){
             $upload =  move_uploaded_file($File2, $target_dir.$File);
             echo "Upload successfully";
             exit();
            }
        else{
              echo "File Not Uploaded";
		exit();
             }

        }
}
?>

