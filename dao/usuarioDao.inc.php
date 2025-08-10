<?php
    require_once "../model/usuario.inc.php";
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

        public function inserirUsuario(Usuario $usuario){
            $sql = $this -> con -> prepare("insert into usuarios(user, senha) values (:user, :senha)");
            
            $sql -> bindValue(":user", $usuario -> getUser());
            $sql -> bindValue(":senha", $usuario -> getSenha());

            $sql -> execute();
        }

        public function atualizarUsuario(Usuario $usuario){
            $sql = $this -> con -> prepare("update usuarios set senha = :senha where user = :user");

            $sql -> bindValue(":user", $usuario -> getUser());
            $sql -> bindValue(":senha", $usuario -> getSenha());

            $sql -> execute();
        }

        public function excluirUsuario($user){
            $sql = $this -> con -> prepare("delete from usuarios where user = :user");
            
            $sql -> bindValue(":user", $user);

            $sql -> execute();
        }
    }

?>