<?php 
    include_once "../includes/cabecalho.inc.php";
?>

<h1 class="titulo-login">Login de Usuário</h1>

<div class="div-login">
    <h2>Entre com suas informações de Login</h2>
    <form action="../../controlers/controlerUsuarioSocio.php" method="get">
        <input type="text" placeholder="Usuário" name="pUser" required><br><br>
        <input type="password" placeholder="Senha" name="pSenha" required><br><br>
        <input type="submit" value="EFETUAR LOGIN"><br><br>
        <input type="hidden" value="1" name="opcao">
        <?php
            if(isset($_GET['aviso']) && $_GET['aviso'] == 'acesso_negado') {
                echo "<b><font color='red'>Acesso Negado. Esta página é restrita a administradores.</font></b>";
            }
            if(isset($_GET['aviso']) && $_GET['aviso'] == 'logado') {
                echo "<b><font color='red'>Você precisa estar logado para acessar essa página.</font></b>";
            }
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
    <a href="../area-publica/formCadastroUsuario.php">Não possui uma conta? Cadastre-se aqui</a>
</div>

<?php require_once "../includes/rodape.inc.php"; ?>
