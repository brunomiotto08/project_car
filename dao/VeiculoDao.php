<?php

interface VeiculoDao{

    public function insereVeiculo($veiculo);
    public function removeVeiculo($veiculo);
    public function atualizaVeiculo($veiculo);
    public function buscaVeiculoId($id);  
    public function listaVeiculos();
}


?>