<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Opciones de Usuarios</title>
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
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="clasificacion.php">Clasificación - Productos</a>
                    <a class="dropdown-item" href="unidad.php">Medidas - Productos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="usuarios.php">Usuarios</a>
                    <a class="dropdown-item" href="proveedores.php">Proveedores - Usuarios</a>
                    <a class="dropdown-item" href="roles.php">Roles - Usuarios</a>
                    <a class="dropdown-item" href="estados.php">Estados - Usuarios</a>
                  </div>
                 </li>
              </ul>
            </div>
          </nav>
       
    </header>

    
    
    <!-- <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Index En Construccion</h1>
          <p class="lead">CONSTRUCCION</p>
        </div>
      </div>
      --> 


        <!--formulario de registro de roles -->
        &nbsp;
        <h1 class="stilepro">Usuarios</h1>
        <center><div class="formulario">
                &nbsp;
           <div class="col-md-4">
              <form method="POST" action="usuarios.php" >

                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" name="usuId" class="form-control" id="usuId" placeholder="Ingrese su Id">
                </div>

                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="text" name="usuContrasena" class="form-control" id="usuContrasena" placeholder="Ingrese su Contraseña">
                </div>

                <div class="form-group">
                    <label for="tipoId">tipo ID </label>
                    <input type="text" name="usuTipoId" class="form-control" id="usuTipoId" placeholder="Ingrese su tipo de Documento">
                </div>

                <div class="form-group">
                    <label for="nombres">Nombres </label>
                    <input type="text" name="usuNombres" class="form-control" id="usuNombres" placeholder="Ingrese sus Nombres">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="usuApellidos" class="form-control" id="usuApellidos" placeholder="Ingrese sus Apellidos">
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="usuDireccion" class="form-control" id="usuDireccion" placeholder="Ingrese su Direccion">
                </div>

                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" name="usuCorreo" class="form-control" id="usuCorreo" placeholder="Ingrese su Correo">
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="usuTelefono" class="form-control" id="usuTelefono" placeholder="Ingrese su Telefono">
                </div>

                <div class="form-group">
                    <label for="estado">Estado </label>
                    <input type="text" name="tblestados_estId" class="form-control" id="tblestados_estId" placeholder="Ingrese su Estado">
                </div>
                <div class="form-group">
                    <label for="rol">Rol </label>
                    <input type="text" name="tblroles_rolId" class="form-control" id="tblroles_rolId" placeholder="Ingrese su Rol">
                </div>
                <center>
                    <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                    <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
                    <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
                    <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
                </center>

              </form>

             </div>
             &nbsp;
        </div></center>
           &nbsp;

           <?php
               // apertura del bufer
               require ("../Models/datos_bd_2.php");

               $conexion = mysqli_connect ($host, $usuario, $pass, $nombre);
            
              
              // registro en la base de datos
              if(isset($_POST['btn_registrar']))
              { 

                
                  $id    =$_POST['usuId'];
                  $contraseña =$_POST['usuContrasena'];
                  $tipoId    =$_POST['usuTipoId'];
                  $nombres    =$_POST['usuNombres'];
                  $apellidos    =$_POST['usuApellidos'];
                  $direccion =$_POST['usuDireccion'];
                  $correo    =$_POST['usuCorreo'];
                  $telefono    =$_POST['usuTelefono'];  
                  $estado    =$_POST['tblestados_estId'];
                  $rol    =$_POST['tblroles_rolId'];    

                  if($id=="")
                  {
                    echo "<script>
                    alert('todos los campos del formulario son obligarotios');
                    </script>'";
                  } else
                  {

                    $existe=0;// variable para determinar si existe el ID en la base de datos
                    $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_usuario WHERE usuId = '$id'"  );
                    // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                    while($consulta = mysqli_fetch_array($resultados))
                    {
                    $existe++;// verificacion de existencia del ID
                    }
          
                    if($existe!=0)
                    {
                      echo "<script>
                      alert('el id ya existe en la base de datos');
                      </script>'";
                    }else 
                    {
                      // registro de datos en la bd
                      mysqli_query($conexion, "INSERT INTO $basededatos.$tabla_usuario (usuId,
                      usuContrasena,
                      usuTipoId,
                      usuNombres,
                      usuApellidos,
                      usuDireccion,
                      usuCorreo,
                      usuTelefono,
                      tblestados_estId,
                      tblroles_rolId)
                      values 
                    ('$id','$contraseña','$tipoId','$nombres','$apellidos','$direccion','$correo','$telefono','$estado','$rol')");
                      echo "<script>
                      alert('El usuario a sido registrado');
                      </script>'";           
                    }
                  }      
              } // cierre de registro
                  // consulta a la base de datos
                  if(isset($_POST['btn_consultar']))
                  {
                    $existe=0;
                    $id=$_POST['usuId'];
            
                    if($id == "")
                    {
                      echo "<script>
                      alert('debe ingresar un documento para consultar en  la base de datos');
                      </script>'";
                    }else
                    {
                      $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_usuario WHERE usuId = '$id'"  );
                      // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                      while($consulta = mysqli_fetch_array($resultados))
                      {
                      echo $consulta['usuId']."<br>";
                      echo $consulta['usuContrasena']."<br>";
                      echo $consulta['usuTipoId']."<br>";
                      echo $consulta['usuNombres']."<br>";
                      echo $consulta['usuApellidos']."<br>";
                      echo $consulta['usuDireccion']."<br>";
                      echo $consulta['usuCorreo']."<br>";
                      echo $consulta['usuTelefono']."<br>";
                      echo $consulta['tblestados_estId']."<br>";
                      echo $consulta['tblroles_rolId']."<br>";

                      $existe++;
                      }  
                      if($existe ==0){echo "<script> alert('El documento no existe en la base de datos');</script>'";}                    
                    }
            
                  }// cierre de la consulta a la bd
                  
              // actualizar datos 
              if(isset($_POST['btn_actualizar']))
              {
                    $id    =$_POST['usuId'];
                    $contraseña =$_POST['usuContrasena'];
                    $tipoId    =$_POST['usuTipoId'];
                    $nombres    =$_POST['usuNombres'];
                    $apellidos    =$_POST['usuApellidos'];
                    $direccion =$_POST['usuDireccion'];
                    $correo    =$_POST['usuCorreo'];
                    $telefono    =$_POST['usuTelefono'];  
                    $estado    =$_POST['tblestados_estId'];
                    $rol    =$_POST['tblroles_rolId'];   

                    // validacion de ingreso del documento para actualizar
                    if($id=="" )
                    {
                      echo "<script>
                      alert('Todos los campos son obligatorios para actualizar la  base de datos');
                      </script>'";

                    }
                      else 
                    {
                      $existe=0;// variable para determinar si existe el documento en la base de datos
                      $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_usuario WHERE usuId = '$id'"  );
                      // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                      while($consulta = mysqli_fetch_array($resultados))
                      {
                        $existe++;
                      }
            
                      if($existe==0)
                      {
                        echo "<script>
                        alert('El documento no existe en la base de datos, no es posible actualizar');
                        </script>'";
                      }
                      else
                      {
                        //Actualizacion de la base de datos
                        $_UPDATE_SQL="UPDATE $tabla_usuario Set 
                            usuId='$id',
                            usuContrasena='$contraseña',
                            usuTipoId='$tipoId',
                            usuNombres='$nombres',
                            usuApellidos='$apellidos',
                            usuDireccion='$direccion',
                            usuCorreo='$correo',
                            usuTelefono='$telefono',
                            tblestados_estId='$estado',
                            tblroles_rolId='$rol'
                      
                        WHERE usuId='$id'"; 
                      
                        mysqli_query($conexion,$_UPDATE_SQL); 

                        echo "<script>
                        alert('El registro de la base de datos fue actualizado');
                        </script>'";
                      }
                    }
                }// cierre de la actualizacion de datos

                // eliminacion de datos de la bd
                if(isset($_POST['btn_eliminar']))
                {
                  $existe=0;
                  $id=$_POST['usuId'];
          
                  if($id == "")
                  {
                    echo "<script>
                    alert('debe ingresar un documento para elimindar de la base de datos');
                    </script>'";
                  }else
                  {
                    $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_usuario WHERE usuId = '$id'"  );
                    // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                    while($consulta = mysqli_fetch_array($resultados))
                    {
                    $existe++;
                    }
                    if($existe ==0)
                    { 
                      echo "<script>
                      alert('El documento no existe  en la base de datos');
                      </script>'";
                    }   
                    else 
                    {
                      $_DELETE_SQL =  "DELETE FROM $tabla_usuario WHERE usuId = '$id'";
                      mysqli_query($conexion,$_DELETE_SQL); 
                      echo "<script>
                      alert('el usuario fue eliminado de la base de datos');
                      </script>'";
                    }       
                  }
          
                } // cierre del bloque de eliminacion de la bd

              // cierre del buffer
              include("cerrar-conexion.php");
            ?>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>