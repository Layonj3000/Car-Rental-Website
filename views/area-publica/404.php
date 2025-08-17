<?php
    http_response_code(404);
    $base = str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])) . '/';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base; ?>../../estilos/estilo-404.css">
    <title>Página não encontrada - Erro 404</title>
</head>
<body>
    <div class="container">
        <h1>Ops! Página não encontrada</h1>
        <p>Parece que o pneu furou e a página que você estava procurando não existe. Mas não se preocupe, temos outros veículos esperando por você!</p>
        <div class="links">
            <a href="<?php echo $base; ?>../../views/area-publica/index.php">Ir para a Página Inicial</a>
            <a href="<?php echo $base; ?>../../views/area-publica/showRoom.php">Ver Nossa Frota</a>
            <a href="<?php echo $base; ?>../../views/area-publica/fale-conosco.php">Fale Conosco</a>
        </div>
    </div>
    <div class="credit">
        <a href="http://www.freepik.com" target="_blank" rel="noopener noreferrer">Designed by Freepik</a>
    </div>
</body>
</html>