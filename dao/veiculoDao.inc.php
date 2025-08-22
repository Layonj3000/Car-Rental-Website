<?php
    require_once "conexao.inc.php";
    require_once "../model/veiculo.inc.php";
    require_once "categoriaDao.inc.php";

    class VeiculoDao{
        private $con;

        function __construct(){
            $c = new Conexao();
            $this->con = $c -> getConexao();
        }

        public function incluirVeiculo(Veiculo $veiculo){
            $sql = $this -> con -> prepare("insert into veiculos(placa, nome, anoFabricacao, fabricante, opcionais, motorizacao, valorBase, fotoReferencia, id_categoria)
                                                   values(:placa, :nome, :anoFabricacao, :fabricante, :opcionais, :motorizacao, :valorBase, :fotoReferencia, :id_categoria)");

            $sql -> bindValue(":placa", $veiculo -> getPlaca());
            $sql -> bindValue(":nome", $veiculo -> getNome());
            $sql -> bindValue(":anoFabricacao", $veiculo -> getAnoFabricacao());
            $sql -> bindValue(":fabricante", $veiculo -> getFabricante());
            $sql -> bindValue(":opcionais", $veiculo -> getOpcionais());
            $sql -> bindValue(":motorizacao", $veiculo -> getMotorizacao());
            $sql -> bindValue(":valorBase", $veiculo -> getValorBase());
            $sql -> bindValue(":fotoReferencia", $veiculo -> getFotoReferencia());
            $sql -> bindValue(":id_categoria", $veiculo -> getIdCategoria());

            $sql -> execute();
        }

        public function excluirVeiculo($placa){
            $sql = $this ->con -> prepare("delete from veiculos where placa = :placa");

            $sql -> bindValue(":placa", $placa);

            $sql -> execute();
        }

        public function atualizarVeiculo(Veiculo $veiculo){
            $sql = $this -> con -> prepare("update veiculos set nome = :nome, 
                                                                anoFabricacao = :anoFabricacao,
                                                                fabricante = :fabricante,
                                                                opcionais = :opcionais,
                                                                motorizacao = :motorizacao,
                                                                valorBase = :valorBase,
                                                                fotoReferencia = :fotoReferencia,
                                                                id_categoria = :id_categoria
                                            where placa = :placa");

            $sql -> bindValue(":nome", $veiculo -> getNome());
            $sql -> bindValue(":anoFabricacao", $veiculo -> getAnoFabricacao());
            $sql -> bindValue(":fabricante", $veiculo -> getFabricante());
            $sql -> bindValue(":opcionais", $veiculo -> getOpcionais());
            $sql -> bindValue(":motorizacao", $veiculo -> getMotorizacao());
            $sql -> bindValue("valorBase", $veiculo -> getValorBase());
            $sql -> bindValue("fotoReferencia", $veiculo -> getFotoReferencia());
            $sql -> bindValue("id_categoria", $veiculo -> getIdCategoria());
            $sql -> bindValue(":placa", $veiculo -> getPlaca());

            $sql -> execute();
        }

        // public function getVeiculos(){
        //     $sql = $this -> con -> prepare("select * from veiculos");

        //     $veiculos = array();

        //     while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
        //         $veiculo = new Veiculo();
        //         $veiculo -> setPlaca($rs -> placa);
        //         $veiculo -> setNome($rs -> nome);
        //         $veiculo -> setAnoFabricacao($rs -> anoFabricacao);
        //         $veiculo -> setFabricante($rs -> fabricante);
        //         $veiculo -> setOpcionais($rs -> opcionais);
        //         $veiculo -> setMotorizacao($rs -> motorizacao);
        //         $veiculo -> setValorBase($rs -> valorBase);
        //         $veiculo -> setIdCategoria($rs -> id_categoria);

        //         $veiculos[] = $veiculo;
        //     }

        //     return $veiculos;
        // }

        public function getVeiculos($placa, $nome, $motorizacao, $fabricante){
            $sql = $this -> con -> prepare("select *
                                                    from veiculos v
                                                        left join exemplares e on v.placa = e.placa_veiculo
                                                    where (:placa = '' or placa = :placa)
                                                      and (:nome = '' or nome LIKE CONCAT('%', :nome, '%'))
                                                      and (:motorizacao = '' or motorizacao LIKE CONCAT('%', :motorizacao, '%'))
                                                      and (:fabricante = '' or fabricante LIKE CONCAT('%', :fabricante, '%'))");

            $sql -> bindValue(":nome", $nome);
            $sql -> bindValue(":placa", $placa);
            $sql -> bindValue(":motorizacao", $motorizacao);
            $sql -> bindValue(":fabricante", $fabricante);

            $sql ->execute();

            $veiculos = array();

            while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                $categoriaDao = new CategoriaDao();
                $valorCategoria = $categoriaDao->getValorCategoria($rs -> id_categoria);

                $veiculo = new Veiculo();
                $veiculo -> setPlaca($rs -> placa);
                $veiculo -> setNome($rs -> nome);
                $veiculo -> setAnoFabricacao($rs -> anoFabricacao);
                $veiculo -> setFabricante($rs -> fabricante);
                $veiculo -> setOpcionais($rs -> opcionais);
                $veiculo -> setMotorizacao($rs -> motorizacao);
                $veiculo -> setValorBase($rs -> valorBase);
                $veiculo -> setValor($rs -> valorBase + $valorCategoria);
                $veiculo -> setIdCategoria($rs -> id_categoria);
                $veiculo -> setFotoReferencia($rs -> fotoReferencia);
                $veiculo -> setDisponivel(!$rs -> locado);

                $veiculos[] = $veiculo;
            }

            return $veiculos;
        }

        public function getVeiculoByPlaca($placa){
            $sql = $this->con->prepare("SELECT * FROM veiculos WHERE placa = :placa");
            $sql->bindValue(":placa", $placa);
            $sql->execute();

            $rs = $sql->fetch(PDO::FETCH_OBJ);

            if ($rs === false) {
                return null;
            }

            $categoriaDao = new CategoriaDao();
            $valorCategoria = $categoriaDao->getValorCategoria($rs -> id_categoria);

            $veiculo = new Veiculo();
            $veiculo->setPlaca($rs->placa);
            $veiculo->setNome($rs->nome);
            $veiculo->setAnoFabricacao($rs->anoFabricacao);
            $veiculo->setFabricante($rs->fabricante);
            $veiculo->setOpcionais($rs->opcionais);
            $veiculo->setMotorizacao($rs->motorizacao);
            $veiculo->setValorBase($rs->valorBase);
            $veiculo->setValor($rs->valorBase + $valorCategoria);
            $veiculo->setIdCategoria($rs->id_categoria);
            $veiculo->setFotoReferencia($rs -> fotoReferencia);

            return $veiculo;
        }

        public function getDisponibilidadeVeiculo($placa){
            $sql = $this->con->prepare("SELECT e.locado as locado FROM veiculos v LEFT JOIN exemplares e on e.placa_veiculo = v.placa WHERE placa = :placa");
            $sql->bindValue(":placa", $placa);
            $sql->execute();

            $rs = $sql->fetch(PDO::FETCH_OBJ);

            if ($rs === false) {
                return null;
            }
            return !$rs -> locado;
        }

        /*public function getVeiculosByNome($nome){
            $sql = $this -> con -> prepare("select * from veiculos where nome = :nome");
            $sql -> bindValue(":placa", $nome);

            $sql -> execute();

            $veiculos = array();

            while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                $veiculo = new Veiculo();
                $veiculo -> setPlaca($rs -> placa);
                $veiculo -> setNome($rs -> nome);
                $veiculo -> setAnoFabricacao($rs -> anoFabricacao);
                $veiculo -> setFabricante($rs -> fabricante);
                $veiculo -> setOpcionais($rs -> opcionais);
                $veiculo -> setMotorizacao($rs -> motorizacao);
                $veiculo -> setValorBase($rs -> valorBase);
                $veiculo -> setIdCategoria($rs -> id_categoria);

                $veiculos[] = $veiculo;
            }

            return $veiculos;
        }

        public function getVeiculosByFabricante($fabricante){
            $sql = $this -> con -> prepare("select * from veiculos where fabricante = :fabricante");
            $sql -> bindValue(":placa", $fabricante);

            $sql -> execute();

            $veiculos = array();

            while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                $veiculo = new Veiculo();
                $veiculo -> setPlaca($rs -> placa);
                $veiculo -> setNome($rs -> nome);
                $veiculo -> setAnoFabricacao($rs -> anoFabricacao);
                $veiculo -> setFabricante($rs -> fabricante);
                $veiculo -> setOpcionais($rs -> opcionais);
                $veiculo -> setMotorizacao($rs -> motorizacao);
                $veiculo -> setValorBase($rs -> valorBase);
                $veiculo -> setIdCategoria($rs -> id_categoria);

                $veiculos[] = $veiculo;
            }

            return $veiculos;
        }

        public function getVeiculosByMotorizacao($motorizacao){
            $sql = $this -> con -> prepare("select * from veiculos where motorizacao = :motorizacao");
            $sql -> bindValue(":placa", $motorizacao);

            $sql -> execute();

            $veiculos = array();

            while($rs = $sql -> fetch(PDO::FETCH_OBJ)){
                $veiculo = new Veiculo();
                $veiculo -> setPlaca($rs -> placa);
                $veiculo -> setNome($rs -> nome);
                $veiculo -> setAnoFabricacao($rs -> anoFabricacao);
                $veiculo -> setFabricante($rs -> fabricante);
                $veiculo -> setOpcionais($rs -> opcionais);
                $veiculo -> setMotorizacao($rs -> motorizacao);
                $veiculo -> setValorBase($rs -> valorBase);
                $veiculo -> setIdCategoria($rs -> id_categoria);

                $veiculos[] = $veiculo;
            }

            return $veiculos;
        }*/
    }
?>