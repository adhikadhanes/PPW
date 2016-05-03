<!DOCTYPE HTML> Latifatul
<!DOCTYPE HTML> ayu saida
<!DOCTYPE HTML> kane
<!DOCTYPE HTML> dika
sai
asdasda
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $nomor_teleponErr = $judulErr = $kontenErr ="";
$name = $email = $nomor_telepon = $judul = $konten = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     
   if (empty($_POST["nomor_telepon"])) {
     $nomor_teleponErr = "Phone number is required";
   } else if (!is_numeric($_POST["nomor_telepon"])) {
	 $nomor_teleponErr = "invalid number";
   } else {
     $nomor_telepon = test_input($_POST["nomor_telepon"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL) 
	 }

   if (empty($_POST["konten"])) {
     $kontenErr = "Content is required";
   } else {
     $konten = test_input($_POST["konten"]);
   }

   if (empty($_POST["judul"])) {
     $judulErr = "Title is required";
   } else {
     $judul = test_input($_POST["judul"]);
   }
   
   if($nameErr == "" and $emailErr == "" and $nomor_teleponErr == "" and $judulErr == "" and $kontenErr == "") {
   
   session_start();
   $_SESSION["name"] = $name ;
   $_SESSION["email"] = $email ;   
   $_SESSION["nomor_telepon"] = $nomor_telepon;
   $_SESSION["konten"] = $konten;
   $_SESSION["judul"] = $judul;
   
   header("location:writer.php");
   }
   
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   
}




?>

<!-- <h2>PHP Form Validation Example</h2>
-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <h1>Digital Book Input System</h1> 				
					<h2>Informasi Pengarang</h2>
					
				<table>
					<tr>
						<td><label for="nama">Nama</label></td>
						<td><input type="text" name="name" placeholder="nama" >
							<span class="error">* <?php echo $nameErr;?></span>
						</td>
					</tr>
					<tr>
						<td><label for="telephone">Telephone</label></td>
						<td><input type="text" name="nomor_telepon" placeholder="telephone" >
							<span class="error">* <?php echo $nomor_teleponErr;?></span>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email</label></td>
						<td><input type="email" name="email" placeholder="yourname@email.com" >
							<span class="error">* <?php echo $emailErr?></span>
						</td>
					</tr>
					
				</table>
				<h2>Tulisan</h2>
				<table>
					<tr>
						<td><label for="judul">Judul</label></td>
						<td><input type="text" name="judul" placeholder="Judul" >
							<span class="error">* <?php echo $judulErr;?></span>
						</td>
					</tr>
					
					<tr>
						<td><label for="konten">Konten</label></td>
						<td><input type="text" name="konten" placeholder="Konten" >
							<span class="error">* <?php echo $kontenErr;?></span>
						</td>
					</tr>
							<tr>
						<td colspan="2"><input type="submit" value="Create"></td>
					</tr>
					
				</table>
  
  
</form>

<div>
<p>dhika<p>
</div>

dhika

</body>
</html>