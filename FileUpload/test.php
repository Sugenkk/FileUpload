<?php
$target_dir = "upload/";

//use on linux
//$target_dir = "/var/www/html/FileUpload/uploads/";

$File = strtolower($_FILES['file']['name']);
$File2 = $_FILES['file']['tmp_name'];

//extention

$extension=array("exe","elf");
$ext=explode(".", $File);
$ext2=$ext[1];
$ext3=$ext[2];
//blackliststring

$number= 1 ;

$filename=$target_dir.basename($File);
 

if(isset($File)){
    if (file_exists($filename)) {
      $number = 10 ;
      $safenumber = 12;
      echo $number;
          exit();
    } 
    else
    {   
       
        if(in_array($ext2,$extension) || in_array($ext3,$extension) ){
            $number=3;
            echo $number;
            
        }
        else{
            
            $upload =  move_uploaded_file($File2, $target_dir.$File);
            echo $number;
            exit;

        }
            
        }
}
?>

