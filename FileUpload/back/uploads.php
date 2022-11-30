<?php
$target_dir = "upload/";
$File = $_FILES['berkas']['name'];
$File2 = $_FILES['berkas']['tmp_name'];
$mimetype = mime_content_type($_FILES['berkas']['tmp_name']);
$type= array("application/x-elf","application/octet-stream", "application/x-dosexec");

$extension=array("exe","elf");
$ext=explode(".", $File);
$ext2=$ext[1];
$word = array("Eval", "base64_decode", "shell_exec", "exec", "passthru", "proc_open", "popen", "system", "curl_exec", "Parse_ini_file");
$number= 0 ;
$safenumber= 1;

  
    if(isset($_POST["submit"])) {
        $upload =  move_uploaded_file($File2, $target_dir.$File);

        if(in_array($ext2,$extension) || in_array($mimetype,$type)){
          echo " we cant upload this file";
          unlink($target_dir.$File);
          
          exit();
        }
        else{
          for ($a = 0; $a <= 9; $a++) {
            $string = file_get_contents($target_dir.$File);
    
            if(strpos($string, $word[$a]) !== false){
              $number++;
                
            } else{
                $number;
            
            }
          }


        }
        
    }
  

if ($number >= $safenumber){
      header('Location: ./upload3.php');
      echo " we cant upload this file, The File Indicated as a backdoor ";
      unlink($target_dir.$File);
      echo $string;

}
else{
  header('Location: ./upload3.php');
  echo "File Safe";
        echo $string;
       
}


?>

