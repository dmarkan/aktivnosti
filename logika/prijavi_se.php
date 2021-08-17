<?php 
if (!isset($_POST['korisnicko_ime'])) {
    header('Location: ../index.php');
    die();
}

$korisnicko_ime = $_POST['korisnicko_ime'];
$password = $_POST['password'];

$password = hash('sha512', $password);

require_once __DIR__ . '/../tabele/Korisnik.php';
require_once __DIR__ . '/../tabele/Uloga.php';

$korisnik = Korisnik::login($korisnicko_ime, $password);
$uloga = Uloga::getByName('administrator');

if ($korisnik !== null) {
    if($korisnik->uloga_id === $uloga->id && isset($_POST['admin_login'])) {
        session_start();
        $_SESSION['korisnik_admin_id'] = $korisnik->id;
        header('Location: ../administrator.php');
    } else {
    session_start();
    $_SESSION['korisnik_id'] = $korisnik->id;
    header('Location: ../prijavljen.php');
    } //ako se uspesno ulogovao
} else {
    header('Location: ../index.php?error=login');
}

if(!empty($_POST["remember"])) {
	setcookie ("korisnicko_ime",$_POST["korisnicko_ime"],time()+ 60 * 60 * 24 * 365);
	setcookie ("password",$_POST["password"],time()+ 60 * 60 * 24 * 365);
	echo "Korisničko ime i lozinka su zapamćeni";
} else {
	setcookie("korisnicko_ime","");
	setcookie("password","");
	echo "Korisničko ime i lozinka nisu zapamćeni";
}
?>