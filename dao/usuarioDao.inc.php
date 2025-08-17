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
            $sql = $this -> con -> prepare("update usuarios 
                                    set user = :user, senha = :senha, tipo_usuario = :tipo_usuario
                                    where id = :id");

            $sql -> bindValue(":id", $usuario -> getId());
            $sql -> bindValue(":user", $usuario -> getUser());
            $sql -> bindValue(":senha", $usuario -> getSenha());
            $sql -> bindValue(":tipo_usuario", $usuario -> getTipoUsuario());

            $sql -> execute();
        }

        public function excluirUsuario($id){
            $sql = $this -> con -> prepare("delete from usuarios where id = :id");
            
            $sql -> bindValue(":id", $id);

            $sql -> execute();
        }

        public function ultimoUsuarioInserido(){
            $sql = $this -> con -> query("select MAX(id) as id from usuarios");

            $idMax = $sql -> fetch(PDO::FETCH_OBJ) -> id;

            return $idMax;
        }
    }

?>