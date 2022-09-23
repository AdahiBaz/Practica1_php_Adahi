<?php

if(isset($_POST['id'])){$id = $_POST['id']; }

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
    <link rel="stylesheet" href="Practica1.2.css">
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
                    <a class="nav-link" href="Practica1_borrar.html">Borra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Practica1_buscar_cambiar.html">Actualizar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Buscar</a>
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

        $consulta2 = "SELECT * 
        FROM `productos`
        WHERE id = '$id'";

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

<form action="/Archivos/Practica_1/Practica1.1.php" method="get">
    <div class="container">

    <h1 id ="tituloAC">Actualizar datos de <p name="idAc"><?php echo $id ?></p></h1>

        <div class="row mb-3">
        <div class="col-4"><label id="letra">Confirma Id Producto:</label></div>
        <div class="col-4"><label id="letra">Nombre:</label></div>
        <div class="col-4"><label id="letra">Cantidad:</label></div>
        </div>
        <div class="row mb-3">
        <div class="col"><input type="number" required="required" placeholder="Confirma Id Producto" name="id"/></div>
        <div class="col"><input type="text" placeholder="Nombre del producto" name="nombre"/></div>
        <div class="col"><input type="number" placeholder="Cantida" name="cantidad"/></div>
        </div>
        <div class="row mb-3">
        <div class="col"><label id="letra">Precio:</label></div>
        <div class="col"><label id="letra">Descripcion:</label></div>
        <div class="col"><label id="letra">Categoria:</label></div>
        </div>
        <div class="row mb-3">
        <div class="col"><input type="number" placeholder="Precio" name="precio"/></div>
        <div class="col"><input type="text" placeholder="Descripcion" name="descripcion"/></div>
            <div class="col">
                <div class="select">
                    <select name="categoria">
                    <option disabled hidden selected>Escoge</option>
                    <option>Ordenador</option>
                    <option>Mobil</option>
                    <option>Juegos</option>
                    </select>
                </div>
            </div>
        <p>
            <div class="row mb-3">
            <div><button type="sumbit" class="btn-primary btn-block btn-large lli" name="actualizar">Actualizar</button></div>
            </div>
        </p>
        
    </div>
</form>

</body>
</html>
