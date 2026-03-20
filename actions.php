<?php
session_start();
include_once 'dao/PostgresDaoFactory.php';
include_once 'model/Veiculo.php';

$factory = new PostgresDaoFactory();
$veiculoDao = $factory->getVeiculoDao();

// Processar ações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? null;
    
    try {
        if ($acao === 'adicionar') {
            $veiculo = new Veiculo(
                null,
                $_POST['marca'] ?? '',
                $_POST['modelo'] ?? '',
                $_POST['ano'] ?? '',
                $_POST['potencia_cv'] ?? '',
                $_POST['torque_nm'] ?? '',
                $_POST['zero_hundred'] ?? '',
                $_POST['engine_code'] ?? '',
                $_POST['engine_size'] ?? '',
                $_POST['nationality'] ?? ''
            );
            
            if ($veiculoDao->insereVeiculo($veiculo)) {
                $_SESSION['mensagem'] = 'Veículo adicionado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'sucesso';
            }
        } 
        elseif ($acao === 'editar') {
            $veiculo = new Veiculo(
                $_POST['id'] ?? null,
                $_POST['marca'] ?? '',
                $_POST['modelo'] ?? '',
                $_POST['ano'] ?? '',
                $_POST['potencia_cv'] ?? '',
                $_POST['torque_nm'] ?? '',
                $_POST['zero_hundred'] ?? '',
                $_POST['engine_code'] ?? '',
                $_POST['engine_size'] ?? '',
                $_POST['nationality'] ?? ''
            );
            
            if ($veiculoDao->atualizaVeiculo($veiculo)) {
                $_SESSION['mensagem'] = 'Veículo atualizado com sucesso!';
                $_SESSION['tipo_mensagem'] = 'sucesso';
            }
        }
        
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        $_SESSION['mensagem'] = 'Erro: ' . $e->getMessage();
        $_SESSION['tipo_mensagem'] = 'erro';
        header('Location: index.php');
        exit;
    }
}

// Processar deletar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deletar'])) {
    try {
        $id = $_GET['deletar'];
        $veiculo = $veiculoDao->buscaVeiculoId($id);
        
        if ($veiculo) {
            $veiculoDao->removeVeiculo($veiculo);
            $_SESSION['mensagem'] = 'Veículo deletado com sucesso!';
            $_SESSION['tipo_mensagem'] = 'sucesso';
        }
        
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        $_SESSION['mensagem'] = 'Erro ao deletar: ' . $e->getMessage();
        $_SESSION['tipo_mensagem'] = 'erro';
        header('Location: index.php');
        exit;
    }
}
?>
