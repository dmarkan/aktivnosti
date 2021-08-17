<?php 
session_start();
if (isset($_SESSION['korisnik_id'])) {
    header('Location: prijavljen.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="logika/prijavi_se.php" method="post">
    <div class="mb-3 rounded border border-4 border-primary">
    <p>
    Korisničko ime: <input name="korisnicko_ime" type="text" value="<?php if(isset($_COOKIE["korisnicko_ime"])) { echo $_COOKIE["korisnicko_ime"]; } ?>" class="input-field">
	</p><br>
    <p>Lozinka: <input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="input-field">
	</p><br>
    <div class="form-check">
    <p><input type="checkbox" name="remember" />Zapamti me
	</p>
    </div>
    <input type="submit" class="btn btn-primary" value="Prijavi se">
    <?php if(isset($_GET['error'])) { ?>
    <p id="error">Pogrešni podaci za prijavu.</p>
    <?php } ?> 
    </form>
    <a href="promena_lozinke.php">Promeni lozinku</a>
    <a href="registracija.php">Registruj se</a>
</body>
</html>