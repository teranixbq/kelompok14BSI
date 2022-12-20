<?php
error_reporting(0);
session_start();

include 'admin\acc\_config.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstra
p.min.css" integrity="sha384-
Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

body {
    background: url(admin/assets/bela.jpg) no-repeat;
	background-size: cover;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}
form {
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}
h2 {
	text-align: center;
	margin-bottom: 40px;
}
input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}
button {
	float: right;
	padding: 10px 15px;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

</style>

<body>
<form action="" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>
        <button class="btn btn-danger btn-md" type="submit" value="Login" name="proseslog">Masuk</button>
    </form>
</body>
<?php

if(isset($_POST['proseslog'])){

    $sql = mysqli_query($con, "select * from user where username = '$_POST[username]' AND password = '$_POST[password]'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0){
        $_SESSION['username'] = $POST ['username'];
		$_SESSION['password'] = $POST ['password'];
        echo "<meta http-equiv=refresh content=0;URL='admin'>";
    }

    else { 
        header("Location: login.php?error=Username atau Password salah!");
        echo "<meta http-equiv=refresh content=1;URL:'login.php'>";
    }
}
?>