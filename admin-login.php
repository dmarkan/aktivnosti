<?php 
session_start();
if (isset($_SESSION['korisnik_admin_id'])) {
    header('Location: administrator.php');
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
    <title>Admin Login</title>
</head>
<body>
    <form action="logika/prijavi_se.php" method="post">
    <div class="mb-3 rounded border border-4 border-primary">
    <input type="text" name="korisnicko_ime" placeholder="Korisničko ime"><br>
    <input type="password" name="password" placeholder="Lozinka"><br>
    <input type="hidden" name="admin_login" value="true">
    <input type="submit" class="btn btn-primary" value="Prijavi se">
    <?php if(isset($_GET['error'])) { ?>
    <p id="error">Pogrešni podaci za prijavu.</p>
    <?php } ?> 
    </form>
</body>
</html>