<?php 
namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;

class ModelAlbum extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function buscarFotos()
    {
            $query = "SELECT * FROM galeria ORDER BY idFoto DESC";
            $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }

    public function procurarFotos($nome)
    {
            $query = "SELECT * FROM galeria WHERE foto LIKE :nome ORDER BY idFoto DESC";
            $this->query($query);
            $this->bind(':nome','%'.$nome.'%');
            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarFoto(int $id)
    {
            $query = "SELECT * FROM galeria WHERE idFoto = :id";
            $this->query($query);
            $this->bind(':id',$id);
            if($this->select())
            {
                $dados = $this->select();
                return $dados;
            }
    }

    public function buscarNumeroDeFotos()
    {

            $query = "SELECT COUNT(idFoto) as quantidade FROM foto ORDER BY idMembro ASC";
            $this->query($query);
            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }

    public function adFotos($new_image_name)
    {
            $query = "INSERT INTO galeria (idFoto,foto,dataCriacao,dataEdicao,admin) VALUES 
            (NULL,:foto,NOW(),null,null)";
            $this->query($query);
            $this->bind(':foto',$new_image_name);
    
            if($this->executa()){
                $this->resultado = true;
            }
    }
    public function eliminarFotos($id)
    {
            $query = "DELETE FROM galeria WHERE idFoto = :id";
            $this->query($query);
            $this->bind(':id',$id);
    
            if($this->executa()){
                $this->resultado = true;
            }
    }
}