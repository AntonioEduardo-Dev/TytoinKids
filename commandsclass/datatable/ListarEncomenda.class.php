<?php
require_once "../commandsclass/Connection.class.php";

class ListarEncomenda extends Connection{
    public function listar(){
        try {
            $conn = $this->conectar();

            if($conn){
                //Colunas da tabela
                $col = array(
                    0   =>  'id_encomenda',
                    1   =>  'quantidade',
                    2   =>  'data_hora',
                    3   =>  'id_encomenda',
                ); 
            
                $sql = "SELECT * FROM encomendas";
            
                $statement = $conn->prepare($sql);
                $statement->execute();
            
                $totalData      = $statement->rowCount();
                $totalFilter    = $totalData;
            
                //Pesquisar
                $sql ="SELECT * FROM encomendas WHERE 1";
                if(!empty($_POST['search']['value'])){
                    $sql.=" AND (id_encomenda Like '".$_POST['search']['value']."%' ";
                    $sql.=" OR quantidade Like '".$_POST['search']['value']."%' ";
                    $sql.=" OR data_hora Like '".$_POST['search']['value']."%' )";
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
            
                foreach($dados as $indice => $row){
                    $subdata    = array();
                    $subdata[]  = $row[0];
                    $subdata[]  = $row[5];
                    $subdata[]  = $row[6];
                    $subdata[]  = '<h4 class="product-status">
                                        <a class="modal_system_open" name="btn_nm_edit-|-'.$row[0].' ">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="modal_system_open" name="btn_nm_accept-|-'.$row[0].' ">
                                            <i class="far fa-check-square"></i>
                                        </a>
                                        <a class="modal_system_open" name="btn_nm_decline-|-'.$row[0].' ">
                                            <i class="far fa-window-close"></i>
                                        </a>
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
}
?>
