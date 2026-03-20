<?php
session_start();
include_once 'dao/PostgresDaoFactory.php';
include_once 'model/Veiculo.php';

$factory = new PostgresDaoFactory();
$veiculoDao = $factory->getVeiculoDao();
$veiculo = null;
$id = $_GET['id'] ?? null;

if ($id) {
    $veiculo = $veiculoDao->buscaVeiculoId($id);
}

if (!$veiculo && $id) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $veiculo ? 'Editar' : 'Adicionar'; ?> Veículo</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $veiculo ? 'Editar Veículo' : 'Adicionar Novo Veículo'; ?></h1>
        
        <form method="POST" action="actions.php" class="form-veiculo">
            <input type="hidden" name="acao" value="<?php echo $veiculo ? 'editar' : 'adicionar'; ?>">
            <?php if ($veiculo): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($veiculo->getId()); ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getMarca()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getModelo()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getAno()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="potencia_cv">Potência (CV):</label>
                <input type="number" id="potencia_cv" name="potencia_cv" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getPotenciaCv()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="torque_nm">Torque (NM):</label>
                <input type="number" id="torque_nm" name="torque_nm" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getTorqueNm()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="zero_hundred">0-100 (s):</label>
                <input type="text" id="zero_hundred" name="zero_hundred" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getZeroHundred()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="engine_code">Engine Code:</label>
                <input type="text" id="engine_code" name="engine_code" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getEngineCode()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="engine_size">Engine Size:</label>
                <input type="text" id="engine_size" name="engine_size" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getEngineSize()) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="nationality">Nacionalidade:</label>
                <input type="text" id="nationality" name="nationality" required value="<?php echo $veiculo ? htmlspecialchars($veiculo->getNationality()) : ''; ?>">
            </div>
            
            <div class="botoes-form">
                <button type="submit" class="btn btn-salvar">Salvar</button>
                <a href="index.php" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
