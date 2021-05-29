<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Opciones Roles</title>
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

    
    
    <!-- <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Index En Construccion</h1>
          <p class="lead">CONSTRUCCION</p>
        </div>
      </div>
      --> 


        <!--formulario de registro de roles -->
        &nbsp;
        <h1 class="stilepro">Roles - Usuarios</h1>
        <center><div class="formulario">
                &nbsp;
          <div class="col-md-4">
              <form method="POST" action="roles.php" >

                  <div class="form-group">
                      <label for="id">ID</label>
                      <input type="text" name="rolId" class="form-control" id="rolId" placeholder="Ingrese el Id">
                  </div>

                  <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="rolNombre" class="form-control" id="rolNombre" placeholder="Ingrese el Nombre del Rol">
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
                  $rolId=$_POST['rolId'];
                  $rolNombre=$_POST['rolNombre'];

                  if($rolId=="")
                  {
                    echo "<script>
                    alert('todos los campos del formulario son obligarotios');
                    </script>'";
                  } else
                  {

                    $existe=0;// variable para determinar si existe el ID en la base de datos
                    $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_roles WHERE rolId = '$rolId'"  );
                    // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                    while($consulta = mysqli_fetch_array($resultados))
                    {
                    $existe++;// verificacion de existencia del ID
                    }
          
                    if($existe!=0)
                    {
                      echo "<script>
                      alert('el documento ya existe en la base de datos');
                      </script>'";
                      
                    }else 
                    {
                      // registro de datos en la bd
                      mysqli_query($conexion, "INSERT INTO $basededatos.$tabla_roles (rolId,
                      rolNombre)
                      values 
                    ('$rolId','$rolNombre')");
                      echo "<script>
                      alert('el rol  fue registrado');
                      </script>'";           
                    }
                  }      
              } // cierre de registro

                 // consulta a la base de datos
                 if(isset($_POST['btn_consultar']))
                 {
                   $existe=0;
                   $rolId=$_POST['rolId'];
           
                   if($rolId == "")
                   {
                     echo "<script>
                     alert('debe ingresar un documento para consultar en  la base de datos');
                     </script>'";
                   }else
                   {
                     $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_roles WHERE rolId = '$rolId'"  );
                     // la funcion mysqli_fetch_array funciona de la misma manera que el resulset en java
                     while($consulta = mysqli_fetch_array($resultados))
                     {
                     echo $consulta['rolId']."<br>";
                     echo $consulta['rolNombre']."<br>";


                     $existe++;
                     }  
                     if($existe ==0){echo "<script> alert('El documento no existe en la base de datos');</script>'";}                    
                   }
           
                 }// cierre de la consulta a la bd

             // actualizar datos 
             if(isset($_POST['btn_actualizar']))
             {
              $rolId=$_POST['rolId'];
              $rolNombre=$_POST['rolNombre'];

  

                   // validacion de ingreso del documento para actualizar
                   if($rolId=="" )
                   {
                     echo "<script>
                     alert('Todos los campos son obligatorios para actualizar la  base de datos');
                     </script>'";

                   }
                     else 
                   {
                     $existe=0;// variable para determinar si existe el documento en la base de datos
                     $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_roles WHERE rolId = '$rolId'"  );
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
                       $_UPDATE_SQL="UPDATE $basededatos.$tabla_roles Set 
                           rolId='$rolId',
                           rolNombre='$rolNombre'


                     
                       WHERE rolId='$rolId'"; 
                     
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
                 $rolId=$_POST['rolId'];
         
                 if($rolId == "")
                 {
                   echo "<script>
                   alert('debe ingresar un documento para elimindar de la base de datos');
                   </script>'";
                 }else
                 {
                   $resultados = mysqli_query($conexion,"SELECT * FROM $basededatos.$tabla_roles WHERE rolId = '$rolId'"  );
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
                     $_DELETE_SQL =  "DELETE FROM $tabla_roles WHERE rolId = '$rolId'";
                     mysqli_query($conexion,$_DELETE_SQL); 
                     echo "<script>
                     alert('El rol  fue  eliminado de la base de datos');
                     </script>'";
                   }       
                 }
         
               } // cierre del bloque de eliminacion de la bd




               mysqli_close($conexion);
        ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>