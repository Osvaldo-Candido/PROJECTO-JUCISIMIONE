<?php

namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;

class ModelActividade extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function buscarActividades()
    {
            $query = "SELECT * FROM actividades ORDER BY idActividade DESC";
            $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarActividade(int $id)
    {
            $query = "SELECT * FROM actividades  WHERE idActividade	 = :id";
            $this->query($query);
            $this->bind(':id',$id);
            if($this->select())
            {
                $dados = $this->select();
                return $dados;
            }
    }
    public function pesquisarActividade($id)
    {
            $query = "SELECT * FROM actividades  WHERE nome	LIKE :dados";
            $this->query($query);
            $this->bind(':dados','%'.$id.'%');
            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarActividadeDashboard()
    {
            $query = "SELECT * FROM actividades ORDER BY idActividade ASC LIMIT 2";
            $this->query($query);
            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }

    public function addActividade($nome,$responsavel,$objectivo,$data,$lugar,$duracao, $observacao,$departamento,$estado)
    {
            $query = "INSERT INTO actividades (idActividade,nome,responsavel,objectivo,data,lugar,duracao,observacao,departamento,estado,dataCriacao) VALUES 
            (NULL,:nome,:responsavel,:objectivo,:data,:lugar,
            :duracao,:observacao,:departamento,:estado,NOW())";
            $this->query($query);
            $this->bind(':nome',$nome);
            $this->bind(':responsavel',$responsavel);
            $this->bind(':objectivo',$objectivo);
            $this->bind(':data',$data);
            $this->bind(':lugar',$lugar);
            $this->bind(':duracao',$duracao);
            $this->bind(':observacao',$observacao);
            $this->bind(':departamento',$departamento);
            $this->bind(':estado',$estado);

            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function editarActividade($id,$nome, $responsavel,$objectivo,$data,$lugar,$duracao, $observacao,$departamento,$estado)
    {
            $query = "UPDATE actividades SET nome = :nome,responsavel = :responsavel,objectivo = :objectivo,data = :data,lugar = :lugar,duracao = :duracao,observacao = :observacao,
            departamento = :departamento, estado = :estado, dataEdicao = NOW() WHERE idActividade = :id";

            $this->query($query);
            $this->bind(':id',$id);
            $this->bind(':nome',$nome);
            $this->bind(':responsavel',$responsavel);
            $this->bind(':objectivo',$objectivo);
            $this->bind(':data',$data);
            $this->bind(':lugar',$lugar);
            $this->bind(':duracao',$duracao);
            $this->bind(':observacao',$observacao);
            $this->bind(':departamento',$departamento);
            $this->bind(':estado',$estado);

            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function estadoActividades($actividade)
    {
        
        $query = "SELECT Count(idActividade) as total FROM actividades WHERE estado = :actividade";
        $this->query($query);
        $this->bind(':actividade',$actividade);

        if($this->selectColum())
        {
            $dados = $this->selectColum();
            return $dados;
        }
    }
}