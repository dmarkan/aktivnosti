<?php 
require_once __DIR__ . '/Tabela.php';
class Korisnik extends Tabela {
    public $id;
    public $korisnicko_ime;
    public $email;
    public $password;
    public $ime_prezime;
    public $telefon;
    public $slika; 

    public static function register($korisnicko_ime, $email, $password, $ime_prezime, $telefon, $slika) 
     {
        $db = Database::getInstance();

        $query = 'INSERT INTO korisnici '. '(korisnicko_ime, email, password, ime_prezime, telefon, slika) '. 'VALUES (:k, :e, :p, :i, :t, :s)';
        $params = [
            ':k' => $korisnicko_ime,
            ':e' => $email,
            ':p' => $password,
            ':i' => $ime_prezime,
            ':t' => $telefon,
            ':s' => $slika

        ];
        $db->insert('Korisnik', $query, $params);

        return self::getById($id, 'korisnici', 'Korisnik');
    }

    public static function login($korisnicko_ime, $password) {
        $db = Database::getInstance();

        $query = 'SELECT * FROM korisnici '. 'WHERE korisnicko_ime = :k AND password = :p';
        $params = [
            ':k' => $korisnicko_ime,
            ':p' => $password
        ];

        $korisnici = $db->select('Korisnik', $query, $params);

        foreach ($korisnici as $korisnik) {
            return $korisnik;
        }
        return null;
    }

    public static function change_password($korisnicko_ime, $new_password) {
        $db = Database::getInstance();

        $query = 'UPDATE korisnici '.
        'SET password = :p '.
        'WHERE korisnicko_ime = :k';
        $params = [
            ':p' => $new_password,
            ':k' => $korisnicko_ime
        ];

        $db->update('Korisnik', $query, $params);
    }

    public static function korisnik_za_id($id) {
        $database = Database::getInstance();

        $korisnici = $database->select('Korisnik', 
        'SELECT * FROM korisnici WHERE id = :id',
        [
            ':id' => $id
        ]);

        foreach ($korisnici as $korisnik) {
            return $korisnik;
        }
        return null;
        
    }

    public static function svi_korisnici() {
        $db = Database::getInstance();

        $korisnici = $db->select('Korisnik', 
        'SELECT korisnicko_ime FROM korisnici');

        return $korisnici;
    }
    }


?>