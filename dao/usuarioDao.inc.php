<?php
    require_once "conexao.inc.php";

    class UsuarioDao 
    {
        private $con;

        function __construct()
        {
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        function autenticar($user, $senha)
        {
            $sql = $this->con->prepare('SELECT * FROM usuarios WHERE user=:user AND senha=:senha');
            $sql->bindValue(":user",strtolower($user));
            $sql->bindValue(":senha",$senha);
            $sql->execute();
            
            if($sql->rowcount() == 1)
            {
                return $sql->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                return NULL;
            }
        }
    }

?>