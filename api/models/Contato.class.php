<?php
    require_once "Connection.class.php";
    
    class Contato extends Connection{
        private $email;
        private $nome;
        private $fone;
        private $mensagem;

        public function __construct($email, $nome, $fone, $mensagem){
            $this->setEmail($email);
            $this->nome = $nome;
            $this->fone = $fone;
            $this->mensagem = $mensagem;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getNome(){
            return $this->nome;
        }
        
        public function getFone(){
            return $this->fone;
        }

        public function getMensagem(){
            return $this->mensagem;
        }

        public function setEmail($e){
            $email = filter_var($e, FILTER_VALIDATE_EMAIL);
            $this->email = $email;
        }

        public function setNome($s){
            $this->nome = $s;
        }

        public function setFone($f){
            $this->fone = $f;
        }

        public function setMensagem($m){
            $this->mensagem = $m;
        }
        
        public function cadastrarDuvida(){
            try {
                $connection = $this->conectar();

                $email      = $this->email;
                $nome       = $this->nome;
                $fone       = $this->fone;
                $mensagem   = $this->mensagem;

                $sql = "INSERT INTO duvidas VALUES (NULL, :nome, :email, :fone, :mensagem)";

                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":email", $email);
                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":fone", $fone);
                $consulta->bindValue(":mensagem", $mensagem);
                
                return ($consulta->execute() && $consulta->rowCount() > 0) ? true : false;

            } catch (PDOException $e) {
                echo "Erro de cadastro de dúvida: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function listar(){
            try {
                $conn = $this->conectar();

                if($conn){
                    //Colunas da tabela
                    $col = array(
                        0   =>  'id_duvida',
                        1   =>  'nome',
                        2   =>  'email',
                        3   =>  'whatsapp',
                        0   =>  'id_duvida'
                    ); 
                
                    $sql = "SELECT * FROM duvidas";
                
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                
                    $totalData      = $statement->rowCount();
                    $totalFilter    = $totalData;
                
                    //Pesquisar
                    $sql ="SELECT * FROM duvidas WHERE 1";
                    if(!empty($_POST['search']['value'])){
                        $sql.=" AND (id_duvida Like '".$_POST['search']['value']."%' ";
                        $sql.=" OR nome Like '".$_POST['search']['value']."%' ";
                        $sql.=" OR email Like '".$_POST['search']['value']."%' )";
                        $sql.=" OR whatsapp Like '".$_POST['search']['value']."%' )";
                    }
                
                    $statement  = $conn->prepare($sql);
                    $query      = $statement->execute();
                
                    $totalData  = $statement->rowCount();
                    $totalFilter= $totalData;
                
                    //Ordenar
                    $sql.=" ORDER BY ".$col[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']."  LIMIT ".
                    $_POST['start']."  ,".$_POST['length']."  ";
                
                    $statement  = $conn->prepare($sql);
                    $statement->execute();
                
                    $dados      = $statement->fetchAll();
                
                    // Armazenamendo do query array em data
                
                    $data = array();
                
                    foreach($dados as $indice => $row){
                        $subdata    = array();
                        $subdata[]  = $row[0];
                        $subdata[]  = $row[1];
                        $subdata[]  = $row[2];
                        $subdata[]  = $row[4];
                        $subdata[]  = '<h4 class="product-remove">
                                            <button class="modal_system_open btn btn-lg" name="btn_nm_edit-|-'.$row[0].' ">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </h4>';
                        $data[]     = $subdata;
                    }
                
                    $json_data = array(
                        "draw"              =>  intval($_POST['draw']),
                        "recordsTotal"      =>  intval($totalData),
                        "recordsFiltered"   =>  intval($totalFilter),
                        "data"              =>  $data
                    );
                
                    return ($json_data);
                }
            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function listarDadosId($id_duvida){
            try {
                $connection = $this->conectar();

                $sql = "SELECT * FROM duvidas WHERE duvidas.id_duvida = :id_duvida";
                
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_duvida", $id_duvida);

                return (($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : false );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }