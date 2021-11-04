<?php
require_once ("../../commandsclass/Connection.class.php");

$objConn = new Connection();
$conn = $objConn->conectar();

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

    foreach($dados as $row){
        $subdata    = array();
        $subdata[]  = $row[0];
        $subdata[]  = $row[1];
        $subdata[]  = '<h4 class="product-remove">
                            <a class="modal_system_open" name="btn_nm_remove-|-'.$row[0].' ">
                                <i class="far fa-window-close"></i>
                            </a>
                        </h4>';
        $data[]     = $subdata;
    }

    $json_data=array(
        "draw"              =>  intval($_POST['draw']),
        "recordsTotal"      =>  intval($totalData),
        "recordsFiltered"   =>  intval($totalFilter),
        "data"              =>  $data
    );

    echo json_encode($json_data);
}
?>
