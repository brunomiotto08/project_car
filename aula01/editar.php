<!doctype html>
<?php
include_once("Veiculo.php");

$id = @$_GET["id"];

$oVeiculo = null;

foreach($veiculos as $cada) {
    if($cada->getId()==$id){
       $oVeiculo = $cada; 
    }
}
if($oVeiculo===null) {
    $oVeiculo = new Veiculo(null, null, null, null);
}

?>

<html>
<head>
  <title>Veículos</title> 
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Veículo id = <?=$oVeiculo->getId()?> (editar.php)</h1>

    <form action="altera.php" >
    <label for="nome">Nome:</label>
    <input type="text" id="id_name" name="nome" value=<?=$oVeiculo->getNome()?>>
    <br>
    <label for="marca">Marca:</label>
    <input type="text" id="id_marca" name="marca" value=<?=$oVeiculo->getMarca()?>>
    <br>
    <label for="placa">Placa:</label>
    <input type="text" id="id_placa" name="placa" value=<?=$oVeiculo->getPlaca()?>>
    <br>
    <input type="submit" id="submit_editar" value="Salvar">
    <br>
    </form>
    
    
    <ul>
    	<li>
    		<a href="index.php">Voltar...</a>
    	</li>
    </ul>
</body>
</html>
