<?php
    require "db_connect.php";
    $sno = $_GET['sno'];
    $sql = "SELECT * FROM `data` WHERE sno='$sno'";
    $result = mysqli_query($conn, $sql);
    
    
    if($result){
        $data = mysqli_fetch_array($result);
        if($sno == $data['sno']){
            $image = $data['image'];
            $image_Path = "image/".basename($image);
           $sql = "DELETE FROM `data` WHERE sno='$sno'";
            // echo  '<script> comfirm("really! want to delete?") ;</script>';
            if ('<script> comfirm("really! want to delete?") ;</script>'){

            
           if(basename($image_Path)== $image){
            unlink($image_Path);
            $result = mysqli_query($conn, $sql);
           
             
           }
            header("location:index.php");}
        }
        else{
           
            
        }
    }
    
 
?>
   <!-- if(basename($image_Path)== $filename){
        }
        else{
          echo  '<script> alert("file is alredy deleted.") ;</script>';
          header("location: index.php");
        } -->