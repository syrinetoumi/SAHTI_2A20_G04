<?php
<<<<<<< HEAD
class config
{
private static $pdo = null;
public static function getConnexion()
{
if (!isset(self::$pdo)) {
try {
self::$pdo = new PDO(
'mysql:host=localhost;dbname=atelier_base_de_donnee','root','',
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]
);
//echo "connected successfully";
} catch (Exception $e) {
die('Erreur: ' . $e->getMessage());
}
}
return self::$pdo;
}
}
=======
    class config
    {
        private static $pdo = null;
        public static function getConnexion()
        {
            if (!isset(self::$pdo)) {
            try {
            self::$pdo = new PDO(
            'mysql:host=localhost;dbname=Atelier-CRUD',
            'root',
            '',
            [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
            //echo "connected successfully";
            } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
            }
            return self::$pdo;
        }
    }
?>
>>>>>>> da742c91a50187e18bab9220e6ac14b6321cdbe5
