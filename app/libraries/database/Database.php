<?php

namespace App\Libraries\Database;

abstract class Database {

    public function conexao()
    {

        try {
            $conn = new \PDO('mysql:host='.HOST.'; dbname='.DATABASE.';',''.USER.'',''.PASSWORD);
            return $conn;
        } catch (\PDOException $th) {
            print 'ERRO '.$th->getMessage();
        }
       
    }
}