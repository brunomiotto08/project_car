<?php


class Veiculo{
    private $id;
    private $marca;
    private $modelo;
    private $ano;
    private $potencia_cv;
    private $torque_nm;
    private $zero_hundred;
    private $engine_code;
    private $engine_size;
    private $nationality;

    public function __construct($id, $marca, $modelo, $ano, $potencia_cv, $torque_nm, $zero_hundred, $engine_code, $engine_size, $nationality){
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->potencia_cv = $potencia_cv;
        $this->torque_nm = $torque_nm;
        $this->zero_hundred = $zero_hundred;
        $this->engine_code = $engine_code;
        $this->engine_size = $engine_size;
        $this->nationality = $nationality;
    }

    public function getId(){
        return $this->id;
    }   

 
    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getAno(){
        return $this->ano;
    }   

    public function getPotenciaCv(){
        return $this->potencia_cv;
    }

    public function getTorqueNm(){
        return $this->torque_nm;
    }

    public function getZeroHundred(){
        return $this->zero_hundred;
    }

    public function getEngineCode(){
        return $this->engine_code;
    }   

    public function getEngineSize(){
        return $this->engine_size;
    }

    public function getNationality(){
        return $this->nationality;
    }   



    public function setId($id){
        $this->id = $id;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function setPotenciaCv($potencia_cv){
        $this->potencia_cv = $potencia_cv;
    }

    public function setTorqueNm($torque_nm){
        $this->torque_nm = $torque_nm;
    }       

    public function setZeroHundred($zero_hundred){
        $this->zero_hundred = $zero_hundred;
    }

    public function setEngineCode($engine_code){
        $this->engine_code = $engine_code;
    }

    public function setEngineSize($engine_size){
        $this->engine_size = $engine_size;
    }

    public function setNationality($nationality){
        $this->nationality = $nationality;
    }

}



?>