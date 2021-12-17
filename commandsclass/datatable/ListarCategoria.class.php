<?php
require_once "../commandsclass/Connection.class.php";

class ListarCategoria extends Connection{
    public function listar(){
        try {
            $conn = $this->conectar();

            if($conn){
                //Colunas da tabela
                $col = array(
                    0   =>  'id_categoria',
                    1   =>  'nome_categoria',
                    2   =>  'id_categoria',
                ); 
            
                $sql = "SELECT * FROM categorias";
            
                $statement = $conn->prepare($sql);
                $statement->execute();
            
                $totalData      = $statement->rowCount();
                $totalFilter    = $totalData;
            
                //Pesquisar
                $sql ="SELECT * FROM categorias WHERE 1";
                if(!empty($_POST['search']['value'])){
                    $sql.=" AND (id_categoria Like '".$_POST['search']['value']."%' ";
                    $sql.=" OR nome_categoria Like '".$_POST['search']['value']."%' )";
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
            
                foreach($dados as $indice => $dado){
                    $subdata    = array();
                    $subdata[]  = $dado[0];
                    $subdata[]  = $dado[1];
                    $subdata[]  = '<h4 class="product-remove">
                                        <button class="modal_system_open btn btn-lg" name="btn_nm_edit-|-'.$dado[0].' ">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="modal_system_open btn btn-lg" name="btn_nm_remove-|-'.$dado[0].' ">
                                            <i class="far fa-window-close"></i>
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
}
?>
