<?php
 session_start();
   $name = $_SESSION["name"];
   $email = $_SESSION["email"];   
   $nomor_telepon = $_SESSION["nomor_telepon"];
   $judul = $_SESSION["judul"];
   $konten = $_SESSION["konten"] ;
   
   $isiarr = array("name" => $name,"nomor_telepon" => $nomor_telepon,"email" => $email,"judul" => $judul,"konten" => $konten);
   
   if(!file_exists("dataInJson.json")) {
	   file_put_contents("dataInJson.json", json_encode($isiarr));
	   header("location:index.php");
	   
   } else {
	   $data = json_decode(file_get_contents("dataInJson.json"),true);
	   if (is_array($data[0]))
	   {
		   array_push($data, $isiarr);
		   file_put_contents("dataInJson.json", json_encode($data));
		   header("location:index.php");
	    } else {
		    $newObj = array($data, $isiarr);
		    
		    file_put_contents("dataInJson.json", json_encode($newObj));
		    header("location:index.php");
	    }
	   
	   
   }
   
?>
TONI