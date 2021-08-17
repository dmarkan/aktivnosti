<?php 

// if (!isset($_SESSION['korisnik_id'])) {
//     header('Location: index.php');
//     die();
// }

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnicko_ime = $_POST['korisnicko_ime'];
$email = $_POST['email'];
$password = $_POST['password'];
$ponovo_password = $_POST['ponovo_password'];
$ime_prezime = $_POST['ime_prezime'];
$telefon = $_POST['telefon'];
$slika = $_FILES['slika'];

if (empty($_FILES['slika'])) {
    $slika = null;
} else {

// var_dump($_FILES['slika']);
require_once __DIR__ .'/../includes/Upload.php';
$upload = Upload::factory('/../slike');
$upload->file($_FILES['slika']);
$upload->set_allowed_mime_types(['jpg/jpeg', 'image/png', 'image/gif']);
$upload->set_max_file_size(2);
$upload->set_filename($_FILES['slika']['name']);
$upload->save();
$slika = 'slike/'.$_FILES['slika']['name'];

}
// require_once __DIR__ . '/../tabele/Korisnik.php';

// Korisnik::snimi($email, $password, $ime_prezime, $telefon, $slika);

$password = hash('sha512', $password);

require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnik_id = Korisnik::register($korisnicko_ime, $email, $password, $ime_prezime, $telefon, $slika);

if ($korisnik_id !== false) {
    header('Location: ../index.php');
} else {
    header('Location: ../registracija.php?error=podaci');
}

if (preg_match('/^[a-zA-Z0-9]+$/', $korisnicko_ime)) {
    header('Location: ../index.php');
} else {
    header('Location: ../registracija.php?error2=slova');
}

require_once __DIR__ . '/../tabele/Korisnik.php';
$password = $_POST['password'];
$ponovo_password = $_POST['ponovo_password'];

if ($password != $ponovo_password) {
    header('Location: ../registracija.php?error3=lozinka');
 }

?>