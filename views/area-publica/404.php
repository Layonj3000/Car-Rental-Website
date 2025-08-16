<?php
// Define o cabeçalho HTTP para o erro 404
header("HTTP/1.0 404 Not Found");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/locadora-de-veiculos/estilos/estilo-404.css">
    <title>Página não encontrada - Erro 404</title>
</head>
<body>
    <div class="container">
        <h1>Ops! Página não encontrada</h1>
        <p>Parece que o pneu furou e a página que você estava procurando não existe. Mas não se preocupe, temos outros veículos esperando por você!</p>
        <div class="links">
            <a href="/locadora-de-veiculos/views/area-publica/index.php">Ir para a Página Inicial</a>
            <a href="/locadora-de-veiculos/views/veiculos/visualizacaoVeiculos.php">Ver Nossa Frota de Carros</a>
            <a href="/locadora-de-veiculos/views/area-publica/fale-conosco.php">Fale Conosco</a>
        </div>
    </div>
    <div class="credit">
        <a href="http://www.freepik.com" target="_blank" rel="noopener noreferrer">Designed by Freepik</a>
    </div>
</body>
</html>