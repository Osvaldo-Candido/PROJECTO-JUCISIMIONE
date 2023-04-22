<?php

namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;

class ModelEscala extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function buscarEscalas()
    {
            $query = "SELECT * FROM escala ";
            $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function pesquisarEscala($dataInicial, $dataFinal)
    {
 
            $query =" SELECT *
            FROM escala
            WHERE data BETWEEN :data_inicial AND :data_final";
            $this->query($query);

            $this->bind(':data_inicial',$dataInicial);
            $this->bind(':data_final',$dataFinal);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarEscala(int $id)
    {
            $query = "SELECT * FROM escala  WHERE idEscala = :id";
            $this->query($query);
            $this->bind(':id',$id);
            if($this->select())
            {
                $dados = $this->select();
                return $dados;
            }
    }

    public function addEscala($data,$ministro,$liturgista,$suplenteMinistro,
    $suplenteLiturgista,$tipoACtividade, $textoBiblico,$departamento,$observacao)
    {
            $query = "INSERT INTO escala (idEscala,data,ministro,liturgista,suplenteMinistro,suplenteLiturgista,tipoACtividade,
            textoBiblico,departamento,observacao,dataCriacao) VALUES 
            (NULL,:data,:ministro,:liturgista,:suplenteMinistro,:suplenteLiturgista,
            :tipoACtividade,:textoBiblico,:departamento,:observacao,NOW())";
            $this->query($query);
            $this->bind(':data',$data);
            $this->bind(':ministro',$ministro);
            $this->bind(':liturgista',$liturgista);
            $this->bind(':suplenteMinistro',$suplenteMinistro);
            $this->bind(':suplenteLiturgista',$suplenteLiturgista);
            $this->bind(':tipoACtividade',$tipoACtividade);
            $this->bind(':textoBiblico',$textoBiblico);
            $this->bind(':observacao',$observacao);
            $this->bind(':departamento',$departamento);

            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function editarEscala($id, $data,$ministro,$liturgista,$suplenteMinistro,
    $suplenteLiturgista,$tipoACtividade, $textoBiblico,$departamento,$observacao)
    {
            $query = "UPDATE escala SET  data = :data,ministro = :ministro,liturgista = :liturgista,suplenteMinistro = :suplenteMinistro,
            suplenteLiturgista = :suplenteLiturgista,tipoACtividade = :tipoACtividade,
            textoBiblico = :textoBiblico,departamento = :departamento,observacao = :observacao,dataEdicao = NOW() WHERE idEscala = :id";
            $this->query($query);
            $this->bind(':id',$id);
            $this->bind(':data',$data);
            $this->bind(':ministro',$ministro);
            $this->bind(':liturgista',$liturgista);
            $this->bind(':suplenteMinistro',$suplenteMinistro);
            $this->bind(':suplenteLiturgista',$suplenteLiturgista);
            $this->bind(':tipoACtividade',$tipoACtividade);
            $this->bind(':textoBiblico',$textoBiblico);
            $this->bind(':observacao',$observacao);
            $this->bind(':departamento',$departamento);
            if($this->executa()){
                $this->resultado = true;
            }
    }
}