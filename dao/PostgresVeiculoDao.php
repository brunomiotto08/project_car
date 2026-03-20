<?php

    include_once(__DIR__ . '/PostgresDao.php');
    include_once(__DIR__ . '/VeiculoDao.php');
    include_once(__DIR__ . '/../model/Veiculo.php');

    class PostgresVeiculoDao extends PostgresDao implements VeiculoDao{

        private $table_name = 'cars';

        public function insereVeiculo($veiculo){

            $query = "INSERT INTO " . $this->table_name .
            "(marca, modelo, ano, potencia_cv, torque_nm, zero_hundred, engine_code, engine_size, nationality) VALUES ".
            "(:marca, :modelo, :ano, :potencia_cv, :torque_nm, :zero_hundred, :engine_code, :engine_size, :nationality)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':marca', $veiculo->getMarca());
            $stmt->bindParam(':modelo', $veiculo->getModelo()); 
            $stmt->bindParam(':ano', $veiculo->getAno());
            $stmt->bindParam(':potencia_cv', $veiculo->getPotenciaCv());
            $stmt->bindParam(':torque_nm', $veiculo->getTorqueNm());
            $stmt->bindParam(':zero_hundred', $veiculo->getZeroHundred());
            $stmt->bindParam(':engine_code', $veiculo->getEngineCode());
            $stmt->bindParam(':engine_size', $veiculo->getEngineSize());
            $stmt->bindParam(':nationality', $veiculo->getNationality());

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function removeVeiculo($veiculo){
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $veiculo->getId());

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    

        public function atualizaVeiculo($veiculo){
            $query = "UPDATE " . $this->table_name . " SET marca = :marca, modelo = :modelo, ano = :ano," .
            "potencia_cv = :potencia_cv, torque_nm = :torque_nm, zero_hundred = :zero_hundred," .
            " engine_code = :engine_code, engine_size = :engine_size, nationality = :nationality WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $veiculo->getId());
            $stmt->bindParam(':marca', $veiculo->getMarca());
            $stmt->bindParam(':modelo', $veiculo->getModelo());
            $stmt->bindParam(':ano', $veiculo->getAno());
            $stmt->bindParam(':potencia_cv', $veiculo->getPotenciaCv());
            $stmt->bindParam(':torque_nm', $veiculo->getTorqueNm());
            $stmt->bindParam(':zero_hundred', $veiculo->getZeroHundred());
            $stmt->bindParam(':engine_code', $veiculo->getEngineCode());
            $stmt->bindParam(':engine_size', $veiculo->getEngineSize());
            $stmt->bindParam(':nationality', $veiculo->getNationality());

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }   
        }

        public function buscaVeiculoId($id){
            $veiculo = null;

            $query = "SELECT
                        id, marca, modelo, ano, potencia_cv, torque_nm, zero_hundred, engine_code, engine_size, nationality
                FROM " . $this->table_name . " 
                WHERE
                    id = ?
                LIMIT 
                    1 OFFSET 0";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $veiculo = new Veiculo($row['id'], $row['marca'], $row['modelo'], $row['ano'], $row['potencia_cv'], 
                $row['torque_nm'], $row['zero_hundred'], $row['engine_code'], $row['engine_size'], $row['nationality']);
            }

            return $veiculo;


           

        }

        public function listaVeiculos(){
            $query = "SELECT id, marca, modelo, ano, potencia_cv, torque_nm, zero_hundred, engine_code, engine_size, nationality FROM " . $this->table_name;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            $veiculos = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $veiculo = new Veiculo($row['id'], $row['marca'], $row['modelo'], $row['ano'], $row['potencia_cv'], 
                $row['torque_nm'], $row['zero_hundred'], $row['engine_code'], $row['engine_size'], $row['nationality']);
                $veiculos[] = $veiculo;
            }

            return $veiculos;
        }
    }





?>