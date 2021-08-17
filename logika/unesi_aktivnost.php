<?php 
    session_start();
    
if (!isset($_SESSION['korisnik_id'])) {
    header('Location: index.php');
    die();
}

if (empty($_POST['naslov']) || empty($_POST['sadrzaj'])) {
    header('Location: ../prijavljen.php');
    die();
}

require_once __DIR__ . '/../tabele/Aktivnost.php';
$id = Aktivnost::unesi_aktivnost($_POST['naslov'],
$_POST['sadrzaj'], $_SESSION['korisnik_id']);

if ($id > 0) {
    header('Location: ../prijavljen.php');
    die();
} else {
    header('Location: ../prijavljen.php?error=aktivnost');
    die();
}
?>