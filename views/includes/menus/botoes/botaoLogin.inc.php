<?php
    if(!isset($_SESSION['usuario'])){
?>
        <li class="btn-login"><a href="../../views/area-publica/formLogin.php"><button>Login</button></a></li>
<?php
    } else {
?>
        <li class="btn-sair"><a href="../../controlers/controlerUsuario.php?opcao=2"><button>Sair</button></a></li>
<?php
    }
?>