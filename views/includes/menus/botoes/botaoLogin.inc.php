<?php
    if(!isset($_SESSION['usuario'])){
?>
        <li class="btn-login"><a href="../../views/area-publica/formLogin.php"><button>Login</button></a></li>
<?php
    } else {
?>
        <li class="btn-sair">
            <button type="button" class="btn-sair-custom" id="abrirModal">Sair</button>
        </li>
<?php
    }
?>