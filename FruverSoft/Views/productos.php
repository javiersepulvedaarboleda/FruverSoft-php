<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Opciones Productos</title>
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

    
    
    <!--<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Index En Construccion</h1>
          <p class="lead">CONSTRUCCION</p>
        </div>
      </div>
  -->

        <!------------------------AQUI EMPIEZA EL CRUD DE PHP PRODUCTOS---------------------------------------------->
        <?php 
        #<!----------------------------------READ---------------------------------------------->

            if (isset($_POST["btn_consultar"])){
              $proId = $_POST["proId"];
            
              try {
                require ("../Models/datos_bd_2.php");
                $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
                mysqli_set_charset($conexion,'utf8');

                if (!$conexion) {
                  die("Connection failed: " . mysqli_connect_error());
                }
                

                    $sql_read = "SELECT proId, proNombre, proVencimiento, prodPrecio, tblclasificaciones_claId,
                    tblunidadmedidas_uniId, tblproveedores_proId
                    FROM tblproductos 
                    WHERE proId = ? ";

                    $preparada = mysqli_prepare ($conexion, $sql_read);
                    $miCursor = mysqli_stmt_bind_param ($preparada, 'i', $proId);
                    $miCursor = mysqli_stmt_execute ($preparada);
                    

                if ($miCursor==False){
                  echo "<script>alert('No se encuentra');</script>";
                } else {
                    echo "<script>alert('Encontrado');</script>";

                    $miCursor = mysqli_stmt_bind_result($preparada, $proId, $proNombre, $proVencimiento, $prodPrecio, $tblclasificaciones_claId,
                                                        $tblunidadmedidas_uniId, $tblproveedores_proId);
                    while(mysqli_stmt_fetch($preparada)){

                    }
                }
              
                  
              } catch (mysqli_sql_exception $e) {
                  echo "<script>alert('Error de Conexión');</script>";
              }  

              mysqli_close($conexion);
          }
        ?>
      

        <!--formulario de registro de productos -->
       &nbsp;
      <h1 class="stilepro">Productos</h1>
      <center><div class="formulario">
        &nbsp;
        <div class="col-md-4">
  	      <form method="POST" action="productos.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="id">Código</label>
                <input type="text" name="proId" class="form-control" id="proId" Required value="<?=$proId?>" placeholder="Ingrese Su Id">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="proNombre" class="form-control" id="proNombre" value="<?=$proNombre?>" placeholder="Ingrese El nombre Del Producto">
            </div>

            <div class="form-group">
                <label for="vencimiento">Vencimiento </label>
                <input type="date" name="proVencimiento" class="form-control" id="proVencimiento" value="<?=$proVencimiento?>" placeholder="Ingrese La Fecha De Vencimiento">
            </div>

            <div class="form-group">
                <label for="precio">Precio </label>
                <input type="text" name="prodPrecio" class="form-control" id="prodPrecio" value="<?=$prodPrecio?>" placeholder="Ingrese El Precio">
            </div>
            <div class="form-group">
                <label for="clasificacion">Id Clasificacion</label>
                <input type="text" name="tblclasificaciones_claId" class="form-control" id="tblclasificaciones_claId" value="<?=$tblclasificaciones_claId?>" placeholder="Ingrese La Clasificacion">
            </div>
            <div class="form-group">
                <label for="unidaddemedida">Id Unidad de Medida</label>
                <input type="text" name="tblunidadmedidas_uniId" class="form-control" id="tblunidadmedidas_uniId" value="<?=$tblunidadmedidas_uniId?>" placeholder="Ingrese La Unidad De Medida">
            </div>

            <div class="form-group">
                <label for="proveedor"> Id Proveedor</label>
                <input type="text" name="tblproveedores_proId" class="form-control" id="tblproveedores_proId" value="<?=$tblproveedores_proId?>" placeholder="Ingrese El Id del Proveedor">
            </div>

            <div class="form-group">
                <label for="proveedor"> Subir imagen de producto. Máximo 2 megabytes</label>
                <input type="file" name="proImg" class="form-control" id="proImg" accept="image/*">
            </div>
 
            <center>
                <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
                <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
            </center>

           </form>
           &nbsp;
       </div></center>
    </div>
    &nbsp;

    <!------------------------AQUI SIGUE EL CRUD DE PHP PRODUCTOS---------------------------------------------->
    <!-------------------------------------INSERT---------------------------------------------->

    <?php 

        if (isset($_POST["btn_registrar"])){
          $proId = $_POST["proId"];
          $proNombre = $_POST["proNombre"];
          $proVencimiento = $_POST["proVencimiento"];
          $prodPrecio = $_POST["prodPrecio"];
          $tblclasificaciones_claId = $_POST["tblclasificaciones_claId"];
          $tblunidadmedidas_uniId = $_POST["tblunidadmedidas_uniId"];
          $tblproveedores_proId = $_POST["tblproveedores_proId"];
          $proImg = addslashes(file_get_contents($_FILES['proImg']['tmp_name']));
                  

              try {
                require ("../Models/datos_bd_2.php");
                $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
                mysqli_set_charset($conexion,'utf8');

                if (!$conexion) {
                  die("Connection failed: " . mysqli_connect_error());
                }
                

                    $sql_insert = "INSERT INTO tblproductos (proId, proNombre, proVencimiento, prodPrecio, tblclasificaciones_claId,
                    tblunidadmedidas_uniId, tblproveedores_proId, proImg)
                    VALUES ('$proId', '$proNombre', '$proVencimiento', '$prodPrecio', '$tblclasificaciones_claId',
                            '$tblunidadmedidas_uniId', '$tblproveedores_proId', '$proImg')";
                    
                    $miCursor = $conexion->query($sql_insert);
                    

                if ($miCursor==False){
                  echo "<script>alert('Error de no se puede registrar');</script>";
                } else {
                    echo "<script>alert('Registrado');</script>";
                }
              
                  
              } catch (mysqli_sql_exception $e) {
                  echo "<script>alert('Error de Conexión');</script>";
              }
        }   

        mysqli_close($conexion);

    ?>
    
    <!-------------------------------------UPDATE---------------------------------------------->
    <?php 

          if (isset($_POST["btn_actualizar"])){
            $proId = $_POST["proId"];
            $proNombre = $_POST["proNombre"];
            $proVencimiento = $_POST["proVencimiento"];
            $prodPrecio = $_POST["prodPrecio"];
            $tblclasificaciones_claId = $_POST["tblclasificaciones_claId"];
            $tblunidadmedidas_uniId = $_POST["tblunidadmedidas_uniId"];
            $tblproveedores_proId = $_POST["tblproveedores_proId"];
            $proImg = addslashes(file_get_contents($_FILES['proImg']['tmp_name']));
                    

                try {
                  require ("../Models/datos_bd_2.php");
                  $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
                  mysqli_set_charset($conexion,'utf8');

                  if (!$conexion) {
                    die("Connection failed: " . mysqli_connect_error());
                  }
                  

                      $sql_update = "UPDATE tblproductos SET proNombre='$proNombre', proVencimiento='$proVencimiento', prodPrecio='$prodPrecio',
                           tblclasificaciones_claId='$tblclasificaciones_claId', tblunidadmedidas_uniId='$tblunidadmedidas_uniId',
                            tblproveedores_proId='$tblproveedores_proId', proImg='$proImg' 
                            WHERE proId='$proId'";
                      

                      $miCursor = $conexion->query($sql_update);
                      

                  if ($miCursor==False){
                    echo "<script>alert('Error de no se puede actualizar');</script>";
                  } else {
                      echo "<script>alert('Actualizado');</script>";
                  }
                
                    
                } catch (mysqli_sql_exception $e) {
                    echo "<script>alert('Error de Conexión');</script>";
                }
          }   

          mysqli_close($conexion);

    ?>   

    <?php   
            #<!----------------------------------DELETE---------------------------------------------->

            if (isset($_POST["btn_eliminar"])){
              $proId = $_POST["proId"];
            
              try {
                require ("../Models/datos_bd_2.php");
                $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
                mysqli_set_charset($conexion,'utf8');

                if (!$conexion) {
                  die("Connection failed: " . mysqli_connect_error());
                }
                

                    $sql_delete = "DELETE FROM tblproductos WHERE proId = ? ";

                    $preparada = mysqli_prepare ($conexion, $sql_delete);
                    $miCursor = mysqli_stmt_bind_param ($preparada, 'i', $proId);
                    $miCursor = mysqli_stmt_execute ($preparada);
                    

                if ($miCursor==False){
                  echo "<script>alert('No se ha podido eliminar');</script>";
                } else {
                    echo "<script>alert('Eliminado');</script>";
                }
              
                  
              } catch (mysqli_sql_exception $e) {
                  echo "<script>alert('Error de Conexión');</script>";
              }  

              mysqli_close($conexion);
          }
        ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>

