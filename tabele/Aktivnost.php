<?php 
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . '/Tabela.php';
require_once __DIR__ . '/Korisnik.php';

class Aktivnost extends Tabela {
    public $id;
    public $naslov;
    public $sadrzaj;
    public $created_at;
    public $korisnik_id;

    public function korisnik() {
        return Korisnik::korisnik_za_id($this->korisnik_id);
    }

    public function getKorisnik() {
        return Korisnik::getById($this->korisnik_id, 'korisnici', 'Korisnik');
    }

    public static function unesi_aktivnost ($naslov, $sadrzaj, $korisnik_id) {
        $db = Database::getInstance();

        $db->insert('Aktivnost',
        'INSERT INTO aktivnosti (naslov, sadrzaj, korisnik_id)
        VALUES (:naslov, :sadrzaj, :korisnik_id)',
        [
            ':naslov' => $naslov,
            ':sadrzaj' => $sadrzaj,
            ':korisnik_id' => $korisnik_id
        ]
        );

        $id = $db->lastInsertId();
        return $id;
    }

    public static function sve_aktivnosti() {
        $db = Database::getInstance();

        $aktivnosti = $db->select('Aktivnost', 
        'SELECT * FROM aktivnosti');

        return $aktivnosti;
    }

    public static function obrisi_aktivnost($id) {
        $db = Database::getInstance();

        $db->delete('DELETE FROM aktivnosti WHERE id = :id',
        [
            ':id' => $id
        ]);
    }
}

?>