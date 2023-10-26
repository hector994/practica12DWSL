<?php
$db = new pdo(
    'mysql:host=localhost;dbname=db_ajax','root',''
);

$table = $_POST['table'];
$operaciones = $_POST['operacion'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $table == 'employees' && $operaciones == 'get') {
    echo json_encode(obtenerData($table,$db));
}
function obtenerData($table,$con){
    $query = "SELECT * From $table";
    $prepare = $con->prepare($query);
    $prepare->execute();
    $data = $prepare->fetchAll(PDO::FETCH_OBJ);

    return $data;
}
?>