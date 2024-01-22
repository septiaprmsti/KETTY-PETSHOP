<?php
session_start();

require_once 'login.php';

// PROSES MENGECEK LOGIN
$login = new Login();
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$user = $login->getUser($email, $password);

	if ($user) { // Check if the user is found
		$_SESSION['logged_in'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['id_user'] = $user[0]['id_user'];

		// Periksa peran pengguna
		$role = $user[0]['role']; // Assuming 'role' is a column in the 'user' table

		// Arahkan ke halaman yang sesuai berdasarkan peran
		if ($role === 'admin') {
			header("Location: admin/index.php");
			exit();
		} elseif ($role === 'anggota') {
			header("Location: anggota/index.php");
			exit();
		}
	} else {
		// Handle invalid login (e.g., show an error message)
		echo "Invalid login credentials. Please try again.";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<section id="home" class="hero">
		<main class="content">
			<h1>
				Selamat datang di petshop kami
			</h1>

			<p>Silahkan Login Terlebih Dahulu</p>

			<form class="form_login" method="post">

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required />

				<label for="password">Password:</label>
				<input type="text" id="password" name="password" required />


				<button class="btn" name="login" type="submit">Login</button>
			</form>
		</main>
	</section>
</body>

</html>