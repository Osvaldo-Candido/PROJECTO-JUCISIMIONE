<?php 

namespace App\Libraries\Persist;
use App\Libraries\Database\Database;

class Persist extends Database {

    private $query;

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
                    case is_null($valor):
                        $tipo = \PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = \PDO::PARAM_STR;
            }
        }

        $this->query->bindParam($parametro,$valor,$tipo);
    }

    public function executa()
    {
      return  $this->query->execute();
    }

    public function select()
    {
        $this->executa();
        return $this->query->fetch(\PDO::FETCH_OBJ);
    }
    public function selectPdf()
    {
        $this->executa();
        return $this->query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function selectColum()
    {
        $this->executa();
        return $this->query->fetchColumn();
    }
    public function selectAll()
    {
        $this->executa();
        return $this->query->fetchAll(\PDO::FETCH_OBJ);
    }
}