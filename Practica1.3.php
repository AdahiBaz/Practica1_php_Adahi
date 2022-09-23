<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "daw2";

$con = mysqli_connect($servidor,$usuario,$password,$bd);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduce los Productos</title>
    <link rel="stylesheet" href="Practica1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AdahiBy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="Practica1_introducir.html">Introducir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Practica1_borrar.html">Borra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Practica1_buscar_cambiar.html">Actualizar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Practica1_buscar.html">Buscar</a>
              </li>
            </ul>
        </div>
    </div>
</nav>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Categoria</th>
      <th>Precio</th>
      <th>Cantidad</th>
    </tr>
  </thead>
  <tbody>
    <?php

        $categoria = '';     
        $nombre = '';        
        $precio = '';

        $categoria = $_POST['categoria'];     
        $nombre = $_POST['nombre'];     
        $precio = $_POST['precio'];

        if(empty($nombre)){

            if(empty($precio)){

                $consulta2 = "SELECT * 
                FROM `productos`
                WHERE categoria = '$categoria'";

            } else {

                $consulta2 = "SELECT * 
                FROM `productos`
                WHERE categoria = '$categoria' AND precio = '$precio'       ";

            }
            
        } else if(empty($precio)){

            if(empty($nombre)){


                $consulta2 = "SELECT * 
                FROM `productos`
                WHERE categoria = '$categoria'";

            } else {


                $consulta2 = "SELECT * 
                FROM `productos`
                WHERE categoria = '$categoria' AND nombre = '$nombre'";

            }

        } else {

            $consulta2 = "SELECT * 
            FROM `productos`
            WHERE categoria = '$categoria' AND nombre = '$nombre' and precio = '$precio'";

        }
        
        

        $consulta = mysqli_query($con,$consulta2);
        while($fila = $consulta -> fetch_assoc()){

            echo "<tr>";
            echo "<td>".$fila["Id"]."</td>";
            echo "<td>".$fila["Nombre"]."</td>";
            echo "<td>".$fila["Descripcion"]."</td>";
            echo "<td>".$fila["Categoria"]."</td>";
            echo "<td>".$fila["Precio"]."</td>";
            echo "<td>".$fila["Cantidad"]."</td>";
            echo "</tr>";

        }
    ?>
    </tbody>
</table>

</body>
</html>
