<?php

session_start();

$title = 'Data Barang';
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
$user = $_POST['user'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '{$user}'AND password = md5('{$password}') ";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_affected_rows($conn) != 0)
{
$_SESSION['isLogin'] = true;
$_SESSION['user'] = mysqli_fetch_array($result);

header('location: tambah_barang.php');
} else 
$errorMsg = "<p style=\"color:red;\">Gagal Login,silahkan ulangi lagi.</p>";
}

include_once "header.php";

if (isset($errorMsg)) echo $errorMsg;
?>
<nav>
    <ul>    
        
          <button class="coco"><a href="index.php" title="Dashboard"><i class="fa fa-mail-reply-all"> Back</i></a></button></li>

    </ul>
</nav>


<center>
	<h2 style=""><b>Login</b></h2>
<form method="post">
<div class="tuy">
<label>Username</label>
<input type="text" name="user" />
</div>
<br>
<div class="tuy">
<label>Password</label>
<input type="password" name="password" />
</div>
<div class="tuy">
<input type="submit" name="submit" value="Login" />
</div>
</form>
</center>

<style>
	.tuy{
		font-size: 20px;
	}
	.tuy input[type="text"]{
width: 300px;
border-radius: 15px;
margin-right: 5px;
	}
	.tuy input[type="password"]{
		width: 300px;
border-radius: 15px;
	}
	.tuy input[type="submit"]{
		width: 100px;
		margin: 20px;
		margin-left: 300px;
		background-color: #89253e;
		border-radius: 190px;
		color: white;
		border: 0;
	}
	.tuy input[type="submit"]:hover{
		background-color:  #d81b60
	}
</style>
<?php
include_once 'footer.php';
?>