<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Usuarios</title>
  </head>
  <body>
    
  <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php" style="padding-left: 10%;"> <img src="../Img/logo_backend.png" alt="" width="130" height="60"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 47%">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link"  href="#"><b>Home</b> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><b>Features</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><b>Pricing</b></a>
                </li>
               <!--<li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="listarproductos.php">Productos</a>
                    <a class="dropdown-item" href="listarclasificacion.php">Clasificación - Productos</a>
                    <a class="dropdown-item" href="listarunidad.php">Medidas - Productos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="listarusuarios.php">Usuarios</a>
                    <a class="dropdown-item" href="listarproveedores.php">Proveedores - Usuarios</a>
                    <a class="dropdown-item" href="listarroles.php">Roles - Usuarios</a>
                    <a class="dropdown-item" href="listarestados.php">Estados - Usuarios</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
       
    </header>

       &nbsp;
     
      
      <?php #php de tablas productos
          require ("../Models/datos_bd_2.php");

          $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);

          if (!$conexion) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
          $consulta = "SELECT usuId, usuContrasena, usuTipoId, usuNombres, usuApellidos, usuDireccion,
          usuCorreo, usuTelefono, tblestados_estId, tblroles_rolId
          FROM tblusuarios 
          ORDER BY usuId;";
      
          $resultado = mysqli_query ($conexion, $consulta);
          
      ?>

    <section class="tabla_productos">
      <h1 class="stilepro" style="background-color:#343a40">Usuarios</h1>
      &nbsp;
      <a href="usuarios.php">
      <button type="sutmit" class="btn btn-success"  style="margin-bottom: 1%; margin-left: 85%">
        Opciones
      </button>
      </a>
       
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">CONTRASEÑA</th>
              <th scope="col">TIPO ID</th>
              <th scope="col">NOMBRES</th>
              <th scope="col">APELLIDOS</th>
              <th scope="col">DIRECCIÓN</th>
              <th scope="col">CORREO</th>
              <th scope="col">TELÉFONO</th>
              <th scope="col">ID ESTADO</th>
              <th scope="col">ID ROL</th>
            </tr>
          </thead>
          <Tbody>
          <?php
              while ($fila = mysqli_fetch_row ($resultado)){
                echo "<tr scope='row'><td>";
                echo $fila[0] . " ";
                echo "</td><td>";
                echo $fila[1] . " ";
                echo "</td><td>";
                echo $fila[2] . " ";
                echo "</td><td>";
                echo $fila[3] . " ";
                echo "</td><td>";
                echo $fila[4] . " ";
                echo "</td><td>";
                echo $fila[5] . " ";
                echo "</td><td>";
                echo $fila[6] . " ";  
                echo "</td><td>";
                echo $fila[7] . " "; 
                echo "</td><td>";
                echo $fila[8] . " "; 
                echo "</td><td>";
                echo $fila[9] . " ";     
                echo "</td>";
              }
            mysqli_close($conexion);
          ?>
          </tr>
        </Tbody>
      </table>
    </section>
   
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>