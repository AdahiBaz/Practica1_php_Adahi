<?php

define( "servidor", "localhost");
define( "usuario", "root");
define( "password", "");
define( "bd", "daw2");

$con = mysqli_connect(servidor,usuario,password,bd);

if (isset($_POST['borrar'])){
    
    borrar();

}
if(isset($_POST['introducir'])){

    introducir();

} 
if (isset($_GET['actualizar'])){

    actualizar();

} 

function introducir(){

    $con = mysqli_connect(servidor,usuario,password,bd);

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

    if(!$con){

        die("No se a realizado la conexion".mysqli_connect_error()."<br>");

    } else {

        mysqli_set_charset($con,"utf8");
        echo "<br> Se ha realizado correctamente la conexion a la base de datos";

        $sql = "INSERT INTO `productos`(`id`,`Nombre`,`Descripcion`,`Categoria`,`Precio`,`Cantidad`)
                VALUES (NULL, '$nombre', '$descripcion', '$categoria', $precio, '$cantidad')";

        $consulta = mysqli_query($con,$sql);

        if (!$consulta){

            die("No se ha podido realizar el insert");

        } else {

            echo "El insert se ha realizado correctamente";

        }

    }
    header('Location: Practica1_introducir.html');
    exit;

}

function actualizar(){

    $con = mysqli_connect(servidor,usuario,password,bd);
    
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $descripcion = $_GET['descripcion'];
    $categoria = $_GET['categoria'];
    $precio = $_GET['precio'];
    $cantidad = $_GET['cantidad'];

    if(!$con){

        die("No se a realizado la conexion".mysqli_connect_error()."<br>");

    } else {

        mysqli_set_charset($con,"utf8");
        echo "<br> Se ha realizado correctamente la conexion a la base de datos";

        if (empty($_GET['nombre'])) {  } else { $sqlA ="UPDATE productos SET Nombre = '$nombre' WHERE Id = $id";}
        if (empty($_GET['descripcion'])) {  } else { $sqlB ="UPDATE productos SET Descripcion = '$descripcion' WHERE Id = $id";}
        if (empty($_GET['precio'])) {  } else { $sqlC ="UPDATE productos SET Precio = '$precio' WHERE Id = $id"; }
        if (empty($_GET['categoria'])) {  } else { $sqlD ="UPDATE productos SET Categoria = '$categoria' WHERE Id = $id";} 
        if (empty($_GET['cantidad'])) {  } else { $sqlE ="UPDATE productos SET Cantidad = '$cantidad' WHERE Id = $id"; }


        if($con->query($sqlA) === true){echo "Records was updated successfully."; } else {echo "ERROR: Could not able to execute $sqlA. " . $con->error;}
        if($con->query($sqlB) === true){echo "Records was updated successfully."; } else {echo "ERROR: Could not able to execute $sqlB. " . $con->error;}
        if($con->query($sqlC) === true){echo "Records was updated successfully."; } else {echo "ERROR: Could not able to execute $sqlC. " . $con->error;}
        if($con->query($sqlD) === true){echo "Records was updated successfully."; } else {echo "ERROR: Could not able to execute $sqlD. " . $con->error;}
        if($con->query($sqlE) === true){echo "Records was updated successfully."; } else {echo "ERROR: Could not able to execute $sqlE. " . $con->error;}
    }
    header('Location: Practica1_buscar_cambiar.html');
    exit;
    
}

function borrar(){
    
    $con = mysqli_connect(servidor,usuario,password,bd);
    
    $id = $_POST['id'];
   
    if(!$con){

        die("No se a realizado la conexion".mysqli_connect_error()."<br>");

    } else {

        mysqli_set_charset($con,"utf8");
        echo "<br> Se ha realizado correctamente la conexion a la base de datos";

        $sql2="DELETE FROM `productos` WHERE `Id` = '$id'";
        $consulta = mysqli_query($con,$sql2);

        }

    header('Location: Practica1_borrar.html ');
    exit;
    
}
?>