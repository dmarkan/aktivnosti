<?php 

$korisnicko_ime = $_POST['korisnicko_ime'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_repeat = $_POST['new_password_repeat'];

$old_password = hash('sha512', $old_password);
$new_password = hash('sha512', $new_password);

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnik = Korisnik::login($korisnicko_ime, $old_password);

if ($korisnik !== null) {
    Korisnik::change_password($korisnicko_ime, $new_password);
    header('Location: ../index.php');
} else {
    header('Location: ../promena_lozinke.php?error=login');
}

require_once __DIR__ . '/../tabele/Korisnik.php';
$new_password = $_POST['new_password'];
$new_password_repeat = $_POST['new_password_repeat'];

if ($new_password !== $new_password_repeat) {
    header('Location: ../promena_lozinke.php?error2=lozinka');
  } else {
    header('Location: ../index.php');
     }
?>