<?php 
    include_once "includes/cabecalho.inc.php";
?>

<h1 class="titulo-login">Login de Usuário</h1>

<div class="div-login">
    <h2>Entre com suas informações de Login</h2>
    <form action="../controlers/controlerUsuario.php" method="get">
        <input type="text" placeholder="Usuário" name="pUser"><br><br>
        <input type="password" placeholder="Senha" name="pSenha"><br><br>
        <input type="submit" value="EFETUAR LOGIN"><br><br>
        <input type="hidden" value="1" name="pOpcao">
        <?php
            if(isset($_REQUEST["erro"]))
            {
                $tipo = (int)$_REQUEST["erro"];
                if($tipo == 1)
                {
                    echo "<b><font color='red'>Login Incorreto</font></b>";
                }
            }
        ?>
    </form>
    <a href="#">Não possui uma conta? Cadastre-se aqui</a>
</div>

<?php require_once "includes/rodape.inc.php"; ?>
