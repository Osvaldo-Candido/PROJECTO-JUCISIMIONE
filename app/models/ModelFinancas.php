<?php

namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;

class ModelFinancas extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function buscarReceitas()
    {
            $query = "SELECT * FROM receitas ";
            $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function pesquisarFinancas($dataInicial, $dataFinal)
    {
 
            $query =" SELECT *
            FROM receitas
            WHERE dataCriacao BETWEEN :data_inicial AND :data_final";
            $this->query($query);

            $this->bind(':data_inicial',$dataInicial);
            $this->bind(':data_final',$dataFinal);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarReceita(int $id)
    {
            $query = "SELECT * FROM receitas  WHERE idReceita = :id";
            $this->query($query);
            $this->bind(':id',$id);
            if($this->select())
            {
                $dados = $this->select();
                return $dados;
            }
    }

    public function addReceitas($tipoReceita,int $entrada,int $saida,$total,$departamento,$observacao)
    {
            $query = "INSERT INTO receitas  (idReceita,tipoReceita,entrada,saida,total,departamento,observacao,dataCriacao) 
            VALUES (NULL,:tipoReceita,:entrada,:saida,:total,:departamento,:observacao,NOW())";
            $this->query($query);
            $this->bind(':tipoReceita',$tipoReceita);
            $this->bind(':entrada',$entrada);
            $this->bind(':saida',$saida);
            $this->bind(':total',$total);
            $this->bind(':departamento',$departamento);
            $this->bind(':observacao',$observacao);

            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function editarReceitas($id,$tipoReceita,int $entrada,int $saida,$total,$departamento,$observacao)
    {
            $query = "UPDATE receitas SET tipoReceita = :tipoReceita, entrada = :entrada, saida = :saida, total = :total,
            departamento = :departamento, observacao = :observacao, dataEdicao = NOW() WHERE idReceita = :id";
            $this->query($query);
            $this->bind(':id',$id);
            $this->bind(':tipoReceita',$tipoReceita);
            $this->bind(':entrada',$entrada);
            $this->bind(':saida',$saida);
            $this->bind(':total',$total);
            $this->bind(':departamento',$departamento);
            $this->bind(':observacao',$observacao);

            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function calcularReceitas($tipo)
    {
            $query = "SELECT SUM($tipo) as total FROM receitas";
            $this->query($query);
            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }
}