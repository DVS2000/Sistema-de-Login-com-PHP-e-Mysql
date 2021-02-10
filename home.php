<?php


include('db_connect.php');

session_start ();

    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuario WHERE ID = '$id'";
    $resultado = mysqli_query($connect,$sql);
    $dados = mysqli_fecth_array($resultado);

?>
<html>
<head>

</head>
<body>
    
        <h1>Olá  <?php echo $_SESSION['id']?> </h1>
        <a href="logout.php">Sair</a>


</body>

