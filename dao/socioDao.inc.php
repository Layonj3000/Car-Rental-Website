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
            $sql = $this -> con -> prepare("insert into socios (cpf, nome, rg, endereco, telefone, email) 
                                                        values (:cpf, :nome, :rg, :endereco, :telefone, :email)");
            
            $sql -> bindValue(":cpf", $socio -> getCpf());
            $sql -> bindValue(":nome", $socio -> getNome());
            $sql -> bindValue(":rg", $socio -> getRg());
            $sql -> bindValue(":endereco", $socio -> getEndereco());
            $sql -> bindValue(":telefone", $socio -> getTelefone());
            $sql -> bindValue(":email", $socio -> getEmail());

            $sql -> execute();
        }

        public function atualizarSocio(Socio $socio){
            $sql = $this -> con -> prepare("update socios set nome = :nome
                                                              rg = :rg
                                                              endereco = :endereco
                                                              telefone = :telefone
                                                              email = :email");
            $sql -> bindValue(":cpf", $socio -> getCpf());
            $sql -> bindValue(":nome", $socio -> getNome());
            $sql -> bindValue(":rg", $socio -> getRg());
            $sql -> bindValue(":endereco", $socio -> getEndereco());
            $sql -> bindValue(":telefone", $socio -> getTelefone());
            $sql -> bindValue(":email", $socio -> getEmail());

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
                
                $socio -> setSocioComCpf($rs -> cpf, $rs -> nome, $rs -> rg, $rs -> endereco, $rs -> telefone, $rs -> email);

                $socios[] = $socio;
            }

            return $socios;
        }
    }
?>