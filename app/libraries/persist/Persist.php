<?php 

namespace App\Libraries\Persist;
use App\Libraries\Database\Database;

class Persist extends Database {

    private string $query;

    public function query(string $query)
    {
        $this->query = $this->conexao()->prepare($query);
    }

    public function bind($parametro, $valor, $tipo = null)
    {
        if(is_null($tipo))
        {
            switch (true) {
                case is_int($valor):
                     $tipo = \PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = \PDO::PARAM_BOOL;
                default:
                    $tipo = \PDO::PARAM_STR;
                    break;
            }
        }

        $this->query($parametro,$valor,$tipo);
    }

    public function execute()
    {
        $this->query->execute();
    }

    public function select()
    {
        $this->execute();
        return $this->query->fetch(\PDO::FETCH_ASSOC);
    }
    public function selectAll()
    {
        $this->execute();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
}