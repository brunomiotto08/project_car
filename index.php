<?php
session_start();
include_once 'dao/PostgresDaoFactory.php';
include_once 'model/Veiculo.php';

$veiculos = [];
$erro = null;
$mensagem = $_SESSION['mensagem'] ?? null;
$tipo_mensagem = $_SESSION['tipo_mensagem'] ?? null;
unset($_SESSION['mensagem']);
unset($_SESSION['tipo_mensagem']);

try {
    $factory = new PostgresDaoFactory();
    $veiculoDao = $factory->getVeiculoDao();
    $veiculos = $veiculoDao->listaVeiculos();
} catch (Exception $e) {
    $erro = $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos - Sistema de Carros</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Veículos</h1>
        
        <?php if ($mensagem): ?>
            <div class="status <?php echo $tipo_mensagem === 'sucesso' ? 'sucesso' : 'erro'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($erro): ?>
            <div class="status erro">
                Erro: <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>
        
        <div class="botao-adicionar">
            <a href="editar.php" class="btn btn-novo">Adicionar Novo Veículo</a>
        </div>
        
        <?php if (empty($veiculos) && !$erro): ?>
            <div class="status">
                Nenhum veículo cadastrado
            </div>
        <?php elseif (!empty($veiculos)): ?>
            <div class="status sucesso">
                <?php echo count($veiculos); ?> veículo(s) encontrado(s)
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Potência (CV)</th>
                        <th>Torque (NM)</th>
                        <th>0-100 (s)</th>
                        <th>Engine Code</th>
                        <th>Engine Size</th>
                        <th>Nacionalidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($veiculos as $veiculo): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($veiculo->getId()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getMarca()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getModelo()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getAno()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getPotenciaCv()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getTorqueNm()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getZeroHundred()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getEngineCode()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getEngineSize()); ?></td>
                            <td><?php echo htmlspecialchars($veiculo->getNationality()); ?></td>
                            <td class="acoes">
                                <a href="editar.php?id=<?php echo $veiculo->getId(); ?>" class="btn btn-pequeno btn-editar">Editar</a>
                                <a href="actions.php?deletar=<?php echo $veiculo->getId(); ?>" class="btn btn-pequeno btn-deletar" onclick="return confirm('Tem certeza que deseja deletar este veículo?');">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>