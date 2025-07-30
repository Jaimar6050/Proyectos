<?php
namespace App\Util;
use Nette\Database\Connection;
class DatabaseConn{
    public static function getConn() {
    $dsn = "pgsql:host=127.0.0.1;port=5432;dbname=db_8553809";
    $user = "postgres";
    $password = "73888026";

    $database = new Connection($dsn, $user, $password);
    return $database;
}

}