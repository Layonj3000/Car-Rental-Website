<?php
    require_once "../model/socio.inc.php";
    require_once "conexao.inc.php";

    class SocioDao{
        private $con;

        function __construct()
        {
            $c = new Conexao();
            $this->con = $c->getConexao();
        }

        public function incluirSocio(Socio $socio){
            $sql = $this -> con -> prepare("insert into socios (cpf, nome, rg, logradouro, cidade, estado, cep, telefone, email, id_usuario) 
                                                        values (:cpf, :nome, :rg, :logradouro, :cidade, :estado, :cep, :telefone, :email, :id_usuario)");
            
            $sql -> bindValue(":cpf", $socio -> getCpf());
            $sql -> bindValue(":nome", $socio -> getNome());
            $sql -> bindValue(":rg", $socio -> getRg());
            $sql -> bindValue(":logradouro", $socio -> getLogradouro());
            $sql -> bindValue(":cidade", $socio -> getCidade());
            $sql -> bindValue(":estado", $socio -> getEstado());
            $sql -> bindValue(":cep", $socio -> getCep());
            $sql -> bindValue(":telefone", $socio -> getTelefone());
            $sql -> bindValue(":email", $socio -> getEmail());
            $sql -> bindValue(":id_usuario", $socio -> getIdUsuario());

            $sql -> execute();
        }

        public function atualizarSocio(Socio $socio){
            $sql = $this -> con -> prepare("update socios set nome = :nome,
                                                              rg = :rg,
                                                              logradouro = :logradouro,
                                                              cidade = :cidade,
                                                              estado = :estado,
                                                              cep = :cep,
                                                              telefone = :telefone,
                                                              email = :email,
                                                              id_usuario = :id_usuario
                                            where cpf = :cpf");
            $sql -> bindValue(":cpf", $socio -> getCpf());
            $sql -> bindValue(":nome", $socio -> getNome());
            $sql -> bindValue(":rg", $socio -> getRg());
            $sql -> bindValue(":logradouro", $socio -> getLogradouro());
            $sql -> bindValue(":cidade", $socio -> getCidade());
            $sql -> bindValue(":estado", $socio -> getEstado());
            $sql -> bindValue(":cep", $socio -> getCep());
            $sql -> bindValue(":telefone", $socio -> getTelefone());
            $sql -> bindValue(":email", $socio -> getEmail());
            $sql -> bindValue(":id_usuario", $socio -> getIdUsuario());

            $sql -> execute();                                                  
        }

        public function excluirSocio($cpf){
            $sql = $this -> con ->prepare("delete from socios where cpf = :cpf");
            
            $sql -> bindValue(":cpf", $cpf);

            $sql -> execute();
        }

        public function getSocios(){
            $sql = $this -> con -> query("select * from socios");

            $socios = array();

            while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                $socio = new Socio();
                
                $socio -> setSocioComCpf($rs -> cpf, $rs -> nome, $rs -> rg, $rs -> logradouro, $rs -> cidade, $rs -> estado, $rs -> cep, $rs -> telefone, $rs -> email, $rs -> id_usuario);

                $socios[] = $socio;
            }

            return $socios;
        }

        public function getSocioByIdUsuario($id_usuario){
            $sql = $this -> con -> prepare("select * from socios where id_usuario = :id_usuario");

            $sql -> bindValue(":id_usuario", $id_usuario);

            $sql -> execute();
            
            $socio = new Socio();

            if($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                
                $socio -> setSocioComCpf($rs -> cpf, $rs -> nome, $rs -> rg, $rs -> logradouro, $rs -> cidade, $rs -> estado, $rs -> cep, $rs -> telefone, $rs -> email, $rs -> id_usuario);

            }

            return $socio;            
        }

    }
?>