<?php

namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;

class ModelEstatistica extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function numeroCriancasTotal()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE DATEDIFF(CURDATE(), nascimento) <= 11*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroCriancas()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE sexo = 'Masculino' AND DATEDIFF(CURDATE(), nascimento) <= 11*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroAdolescentesTotal()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE DATEDIFF(CURDATE(), nascimento) BETWEEN 12*365 AND 17*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    
    public function numeroAdolescentes()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE sexo = 'Masculino' AND DATEDIFF(CURDATE(), nascimento) BETWEEN 12*365 AND 17*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroJovensTotal()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE DATEDIFF(CURDATE(), nascimento) BETWEEN 18*365 AND 45*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroJovens()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE sexo = 'Masculino' AND DATEDIFF(CURDATE(), nascimento) BETWEEN 18*365 AND 45*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroAdultosTotal()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE DATEDIFF(CURDATE(), nascimento) BETWEEN 46*365 AND 5000*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function numeroAdultos()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT COUNT(idMembro) FROM membro 
        WHERE sexo = 'Masculino' AND DATEDIFF(CURDATE(), nascimento) BETWEEN 46*365 AND 5000*365";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
    public function activosTotal()
    {
        $query = "SELECT COUNT(idMembro) as Activo FROM membro 
        WHERE estado = 'Activo'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
    public function activos()
    {
        $query = "SELECT COUNT(idMembro) as Activo FROM membro 
        WHERE estado = 'Activo' AND sexo = 'Masculino'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
    public function falecidos()
    {
        $query = "SELECT COUNT(idMembro) as Falecido FROM membro 
        WHERE estado = 'Falecido'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
    public function viajem()
    {
        $query = "SELECT COUNT(idMembro) as Viajem FROM membro 
        WHERE estado = 'Viajem'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }

    public function desistentes()
    {
        $query = "SELECT COUNT(idMembro) as Desistente FROM membro 
        WHERE estado = 'Desistente'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
    public function totalGeral()
    {
        $query = "SELECT COUNT(idMembro) as Total FROM membro";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
    public function total()
    {
        $query = "SELECT COUNT(idMembro) as Total FROM membro WHERE sexo = 'Masculino'";
        $this->query($query);

            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            } 
    }
}