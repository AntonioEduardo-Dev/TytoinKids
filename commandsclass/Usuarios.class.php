<?php
    require_once "Connection.class.php";

    class Usuarios  extends Connection{
        public function cadastrar($email, $nome, $senha, $cpf){
            try {
                $connection = $this->conectar();

                $sql = "INSERT INTO usuarios VALUES (NULL, :email, :nome, :senha, :cpf, :status, :tipo_usuario, :primeiro_acesso)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":email", $email);
                $cadastrar->bindValue(":nome", $nome);
                $cadastrar->bindValue(":senha", $senha);
                $cadastrar->bindValue(":cpf", $cpf);
                $cadastrar->bindValue(":status", 1);
                $cadastrar->bindValue(":tipo_usuario", "user");
                $cadastrar->bindValue(":primeiro_acesso", 1);

                return (($cadastrar->execute()) ? $connection->lastInsertId() : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        
        public function cadastrarContato($id_usuario_fk, $fone, $whatsapp, $insta){
            try {
                $connection = $this->conectar();

                $sql = "INSERT INTO usuario_contato VALUES (NULL, :id_usuario_fk, :fone, :whatsapp, :insta)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":fone", $fone);
                $cadastrar->bindValue(":whatsapp", $whatsapp);
                $cadastrar->bindValue(":insta", $insta);
                
                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        public function cadastrarEndereco($id_usuario_fk, $id_cidade_fk, $cep, $endereco, $bairro, $complemento, $numero){
            try {
                $connection = $this->conectar();

                $sql = "INSERT INTO usuario_endereco VALUES (NULL, :id_usuario_fk, :id_cidade_fk, :cep, :endereco, :bairro, :complemento, :numero)";

                $cadastrar = $connection->prepare($sql);
                $cadastrar->bindValue(":id_usuario_fk", $id_usuario_fk);
                $cadastrar->bindValue(":id_cidade_fk", NULL);
                $cadastrar->bindValue(":cep", $cep);
                $cadastrar->bindValue(":endereco", $endereco);
                $cadastrar->bindValue(":bairro", $bairro);
                $cadastrar->bindValue(":complemento", $complemento);
                $cadastrar->bindValue(":numero", $numero);

                return (($cadastrar->execute()) ? true : false);

            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
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
                        0   =>  'id_usuario',
                        1   =>  'email',
                        2   =>  'nome',
                        3   =>  'cpf',
                        4   =>  'id_usuario',
                    ); 
                
                    $sql = "SELECT * FROM usuarios";
                
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                
                    $totalData      = $statement->rowCount();
                    $totalFilter    = $totalData;
                
                    //Pesquisar
                    $sql ="SELECT * FROM usuarios WHERE 1";
                    if(!empty($_POST['search']['value'])){
                        $sql.=" AND (id_usuario Like '".$_POST['search']['value']."%' ";
                        $sql.=" OR email Like '".$_POST['search']['value']."%' ";
                        $sql.=" OR nome Like '".$_POST['search']['value']."%' )";
                        $sql.=" OR cpf Like '".$_POST['search']['value']."%' )";
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
                
                    $data=array();
                
                    foreach($dados as $row){
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
                
                    $json_data=array(
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

        public function listarDadosId($id_usuario){
            try {
                $connection = $this->conectar();

                $sql = "SELECT usuarios.id_usuario, usuarios.email, usuarios.nome, usuarios.cpf, usuarios.tipo_usuario, usuario_contato.id_usuario_contato, usuario_contato.fone, usuario_contato.whatsapp, usuario_contato.insta, usuario_endereco.id_usuario_endereco, usuario_endereco.id_cidade_fk, usuario_endereco.cep, usuario_endereco.endereco, usuario_endereco.bairro, usuario_endereco.complemento, usuario_endereco.numero, 
                        (SELECT COUNT(encomendas.id_encomenda) FROM encomendas 
                        WHERE encomendas.id_usuario_fk = :id_usuario) AS quantidade_encomendas 
                        FROM usuarios 
                        INNER JOIN usuario_contato ON usuarios.id_usuario = usuario_contato.id_usuario_fk 
                        INNER JOIN usuario_endereco ON usuarios.id_usuario = usuario_endereco.id_usuario_fk
                        WHERE usuarios.id_usuario = :id_usuario";
                
                $consulta = $connection->prepare($sql);
                $consulta->bindValue(":id_usuario", $id_usuario);

                return ( ($consulta->execute() && $consulta->rowCount() > 0) 
                        ? $consulta->fetchAll($connection::FETCH_ASSOC) : false );

            } catch (PDOException $e) {
                echo "Erro ao listar: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    }
?>