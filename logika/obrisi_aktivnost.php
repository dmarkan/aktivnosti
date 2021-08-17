<?php 
    session_start();
    
if (!isset($_SESSION['korisnik_id'])) {
    header('Location: index.php');
    die();
}

if (empty($_POST['aktivnost_id'])) {
    header('Location: ../prijavljen.php');
    die();
}

require_once __DIR__ . '/../tabele/Aktivnost.php';
Aktivnost::obrisi_aktivnost($_POST['aktivnost_id']);
echo '{"uspeh":"true"}';
// header('Location: ../prijavljen.php');
?>