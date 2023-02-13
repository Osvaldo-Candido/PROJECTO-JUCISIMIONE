<?php

namespace App\Libraries\Database;

class Database {

    public function conexao()
    {
        $opcoes = [
        
        ];

        try {
            $conn = new \PDO('mysql:host='.HOST.'; dbname='.DATABASE.';'.USER.'',''.PASSWORD);
            return $conn;
        } catch (\PDO $th) {
            print 'ERRO '.$th->getMessage();
        }
       
    }
}