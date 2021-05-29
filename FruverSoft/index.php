<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/style.css">
    <title>FruverSoft</title>
  </head>
  <body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./index.php" style="padding-left: 10%;"> <img src="./Img/logo_pequeno.png" alt="" width="130" height="60"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="padding-left: 47%">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link"  href="#" style="color: #00b347;"><b>Home</b> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="color: #00b347;"><b>Features</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" style="color: #00b347;"><b>Pricing</b></a>
                </li>
               <!--<li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Views/listarproductos.php">Productos</a>
                    <a class="dropdown-item" href="Views/listarclasificacion.php">Clasificación - Productos</a>
                    <a class="dropdown-item" href="Views/listarunidad.php">Medidas - Productos</a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Views/listarusuarios.php">Usuarios</a>
                    <a class="dropdown-item" href="Views/listarproveedores.php">Proveedores - Usuarios</a>
                    <a class="dropdown-item" href="Views/listarroles.php">Roles - Usuarios</a>
                    <a class="dropdown-item" href="Views/listarestados.php">Estados - Usuarios</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
    </header>

    
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container" >
          <h1 class="display-4">¡En FruverSoft </h1>
          <p class="lead">encuentra todo lo que necesitas!... Todos los productos de la casnasta familiar en un solo lugar</p>
        </div>
      </div>

      <?php #php de tablas productos
          require ("Models/datos_bd_2.php");

          $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
          mysqli_set_charset($conexion,'utf8');

          if (!$conexion) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
          $consulta = "SELECT tblproductos.proId, tblproductos.proNombre, proVencimiento, prodPrecio, uniDenominacion, claDenominacion, tblproveedores_proId as IdProv,
          tblproveedores.proNombre as NombreProv, proImg
          FROM tblproductos
          INNER JOIN tblunidadmedidas
          ON tblunidadmedidas_uniId = uniId
          INNER JOIN tblclasificaciones
          ON tblclasificaciones_claId = claId
          INNER JOIN tblproveedores
          ON tblproveedores_proId = tblproveedores.proId
          ORDER BY claDenominacion;";
      
          $resultado = mysqli_query ($conexion, $consulta);
          
      ?>

    <section class="tabla_productos">
      <h1 class="stilepro">Productos</h1>
      <p>&nbsp;</p>
     

      <div class="row row-cols-1 row-cols-md-5" style="margin-left: 2%" >
          <?php
              while ($fila = mysqli_fetch_row ($resultado)){
              
                echo '<div class="col mb-4"  style="display: flex" style="align-items: center" style="justify-content: center">';
                  echo '<div class="card">';
                    echo '<img src="data:image/jpg;base64,' .  base64_encode($fila[8])  .  '" height="200" width="200". />';
                    echo '<div class="card-body">';
                      echo '<h5 class="card-title">' . $fila[1] . '<br><p style="color: #00b347">Precio: ' . '$ ' .$fila[3] . '</p>' .  '</h5>'; 
                      echo '<p class="card-text">Fecha ven: ' . $fila[2] . '<br>Denominación: '  . $fila[4] . 
                           '<br>Clasificacón: '  . $fila[5] .'</p>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
                
                }

            mysqli_close($conexion);
          ?>
      </div>

    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>