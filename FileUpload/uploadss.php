<?php

//use on linux
//$target_dir = "/var/www/html/FileUpload/uploadss/";
$milliseconds =  microtime(true);
$target_dir = "uploadss/";
$File = strtolower($_FILES['file']['name']);
$File2 = $_FILES['file']['tmp_name'];
$mimetype = mime_content_type($_FILES['file']['tmp_name']);
//mimetype
$type= array("application/x-elf","application/x-executable","application/x-pie-executable");

//extention
$extension=array("exe","bin","elf");
$ext=explode(".", $File);
$ext2=$ext[1];
//blackliststring
$word = array("Eval", "base64_decode", "shell_exec", "exec", "passthru", 
              "proc_open", "popen", "system", "curl_exec", "Parse_ini_file","/bin/sh","/bin/bash","str_replace");

$size = 1024 * 20000;    
$FileSize=$_FILES['file']['size'];
  
$number= 1 ;
$safenumber= 2;
$filename=$target_dir.basename($File);
    
if(isset($File)){
  
  if (file_exists($filename)) {
    
    echo "Nama File Sudah Ada\n";
    $time_end = microtime(true);
    $total_time = $time_end - $milliseconds;
    echo $total_time;
    exit();
  } 
  else { 
    if(in_array($ext2,$extension) || in_array($mimetype,$type) || count($ext) !=2 || $FileSize>=$size){
      echo "File Tidak Sesuai Persyaratan\n";
      $time_end = microtime(true);
      $total_time = $time_end - $milliseconds;
      echo $total_time;
      exit();
    }
    else{
      for ($a = 0; $a <= 12; $a++) {
        $string = file_get_contents($File2);
          if(strpos($string, $word[$a]) !== false){
            $number++;
          } 
          else{
            $number;
          }
      }
      if ($number >= $safenumber){
        echo "File Tidak Sesuai Persyaratan\n";
        $time_end = microtime(true);
        $total_time = $time_end - $milliseconds;
        echo "waktu : " .$total_time. "detik";
        exit();
  
       }
      else{
        
          $upload =  move_uploaded_file($File2, $target_dir.$File);
          echo "File Berhasil diunggah\n";
          $time_end = microtime(true);
          $total_time = $time_end - $milliseconds;
          echo "waktu : " .$total_time. " detik";
          exit();
      }
    }
  }
}
?>

