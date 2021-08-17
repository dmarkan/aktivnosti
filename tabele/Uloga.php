<?php 
require_once __DIR__ . '/Tabela.php';
class Uloga extends Tabela {
    public $id;
    public $natpis;
    public $prioritet;

    public static function getByName($naziv) {
        $db = Database::getInstance();

        $query = 'SELECT * '.
                'FROM uloge '.
                'WHERE naziv = :n';
                $params = [
                    ':n' => $naziv
                ];

                $uloge = $db->select('Uloga', $query, $params);

                foreach($uloge as $uloga) {
                    return $uloga;
                }
                return null;
            }
}

?>