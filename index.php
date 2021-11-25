<?php
/* 
TAKEN FORM: https://github.com/oscaruhp/empleados
AUTHOR: Oscar Uh

MODIFIED AND ADAPTED BY: Angelower Santana-Velásquez

*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/* Conecta con la base de datos en el servidor local 
usando las credenciales de usuario y contraseña */
$servidor = "localhost"; 
$usuario = "root"; 
$passwd = ""; 
$nombreBaseDatos = "sgth";
$conexionBD = new mysqli($servidor, $usuario, $passwd, $nombreBaseDatos);


/* Consulta UN registro de activo de la tabla activosbio o activosis o activoinf
   o activos según sea el valor de la variable 't': 1 , 2, 3, 0 respectivamente
   Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["consultar"] 
   */
if (isset($_GET["consultar"])){
    if($_GET["t"]==0){
        //echo json_encode(["success"=>$_GET["consultar"]]);
        $sqlActivo = mysqli_query($conexionBD,"SELECT * FROM activos WHERE id=".$_GET["consultar"]);
        if(mysqli_num_rows($sqlActivo) > 0){
            $activo = mysqli_fetch_all($sqlActivo,MYSQLI_ASSOC);
            echo json_encode($activo);
            exit();
        } else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==1){
        $sqlActivo = mysqli_query($conexionBD,"SELECT * FROM activobio WHERE id=".$_GET["consultar"]);
        if(mysqli_num_rows($sqlActivo) > 0){
            $activo = mysqli_fetch_all($sqlActivo,MYSQLI_ASSOC);
            echo json_encode($activo);
            exit();
        } else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==2){
        $sqlActivo = mysqli_query($conexionBD,"SELECT * FROM activosis WHERE id=".$_GET["consultar"]);
        if(mysqli_num_rows($sqlActivo) > 0){
            $activo = mysqli_fetch_all($sqlActivo,MYSQLI_ASSOC);
            echo json_encode($activo);
            exit();
        } else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==3){
        $sqlActivo = mysqli_query($conexionBD,"SELECT * FROM activoinf WHERE id=".$_GET["consultar"]);
        if(mysqli_num_rows($sqlActivo) > 0){
            $activo = mysqli_fetch_all($sqlActivo,MYSQLI_ASSOC);
            echo json_encode($activo);
            exit();
        } else{  echo json_encode(["success"=>0]); }
    }  
}

/* Borra un registro de activo de la tabla activosbio o activosis o activoinf
   o activos según sea el valor de la variable 't': 1 , 2, 3, 0 respectivamente
   Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["borrar"] 
   */
if (isset($_GET["borrar"])){
        if($_GET["t"]==1){
        $sqlActivo = mysqli_query($conexionBD,"DELETE FROM activobio WHERE id=".$_GET["borrar"]);
        if($sqlActivo){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==2){
        $sqlActivo = mysqli_query($conexionBD,"DELETE FROM activosis WHERE id=".$_GET["borrar"]);
        if($sqlActivo){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==3){
        $sqlActivo = mysqli_query($conexionBD,"DELETE FROM activoinf WHERE id=".$_GET["borrar"]);
        if($sqlActivo){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    } elseif($_GET["t"]==0){
        $sqlActivo = mysqli_query($conexionBD,"DELETE FROM activos WHERE id=".$_GET["borrar"]);
        if($sqlActivo){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
    }
}
/* Inserta un registro de activo de la tabla activosbio o activosis o activoinf
   o activos según sea el valor de la variable 'area': 1 , 2, 3, 0 respectivamente
   La información es recibida en método POST */
if(isset($_GET["insertar"])){
        if($_GET["insertar"]==1){
        $data = json_decode(file_get_contents("php://input"));
        $nombre=$data->nombre;
        $marca=$data->marca;
        $modelo=$data->modelo;
        $serial=$data->serial;
        $doc_resp=$data->doc_resp;
        $nom_resp=$data->nom_resp;
            if(($nombre!="")&&($marca!="")&&($modelo!="")&&($serial!="")&&($doc_resp!="")&&($nom_resp!="")){        
                $sqlActivosb = mysqli_query($conexionBD,"INSERT INTO activobio(nombre,marca,modelo,serial,doc_resp,nom_resp) VALUES('$nombre','$marca','$modelo','$serial','$doc_resp','$nom_resp') ");
                echo json_encode(["success"=>1]);
            }
        //exit();
    }elseif($_GET["insertar"]==2){
        $data = json_decode(file_get_contents("php://input"));
        $nombre=$data->nombre;
        $marca=$data->marca;
        $modelo=$data->modelo;
        $serial=$data->serial;
        $doc_resp=$data->doc_resp;
        $nom_resp=$data->nom_resp;
            if(($nombre!="")&&($marca!="")&&($modelo!="")&&($serial!="")&&($doc_resp!="")&&($nom_resp!="")){        
                $sqlActivosb = mysqli_query($conexionBD,"INSERT INTO activosis(nombre,marca,modelo,serial,doc_resp,nom_resp) VALUES('$nombre','$marca','$modelo','$serial','$doc_resp','$nom_resp') ");
                echo json_encode(["success"=>1]);
            }
        //exit();
    }if($_GET["insertar"]==3){
        $data = json_decode(file_get_contents("php://input"));
        $nombre=$data->nombre;
        $marca=$data->marca;
        $modelo=$data->modelo;
        $serial=$data->serial;
        $doc_resp=$data->doc_resp;
        $nom_resp=$data->nom_resp;
            if(($nombre!="")&&($marca!="")&&($modelo!="")&&($serial!="")&&($doc_resp!="")&&($nom_resp!="")){        
                $sqlActivosb = mysqli_query($conexionBD,"INSERT INTO activoinf(nombre,marca,modelo,serial,doc_resp,nom_resp) VALUES('$nombre','$marca','$modelo','$serial','$doc_resp','$nom_resp') ");
                echo json_encode(["success"=>1]);
            }
        //exit();
    } elseif($_GET["insertar"]==0){
        $data = json_decode(file_get_contents("php://input"));
        $nombre=$data->nombre;
        $marca=$data->marca;
        $modelo=$data->modelo;
        $serial=$data->serial;
        $doc_resp=$data->doc_resp;
        $nom_resp=$data->nom_resp;
        $area = $data->area;
            if(($nombre!="")&&($marca!="")&&($modelo!="")&&($serial!="")&&($doc_resp!="")&&($nom_resp!="")){        
                $sqlActivosb = mysqli_query($conexionBD,"INSERT INTO activos(nombre,marca,modelo,serial,doc_resp,nom_resp,area) VALUES('$nombre','$marca','$modelo','$serial','$doc_resp','$nom_resp','$area') ");
                echo json_encode(["success"=>1]);
            }
        //exit();
    }
    exit();
}


/* Actualiza todos los campos de la tabla activosbio o activosis o activoinf
   o activos según sea el valor de la variable 't': 1 , 2, 3, 0 respectivamente
   Teniendo como criterio de búsqueda la variable 'id' que viene en el $_GET["actualizar"]
   Adicionalmente, toma el calos del documento de identidad para hacer la búsqueda
   del Responsable en la tabla 'responsables' y poder mostrar la información de
   este asociado al activo*/
if(isset($_GET["actualizar"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $marca=$data->marca;
    $modelo=$data->modelo;
    $serial=$data->serial;
    $doc_resp=$data->doc_resp;
    $sqlResp=mysqli_query($conexionBD,"SELECT nombre , apellido FROM responsables  WHERE documento='$doc_resp'");
    $nom_resp_ = mysqli_fetch_all($sqlResp,MYSQLI_ASSOC);
    $nom_resp = $nom_resp_[0]["nombre"]. ' ' .$nom_resp_[0]["apellido"];
    
    if ($_GET["t"]==0) {
        $area=$data->area;
        $sqlActivos = mysqli_query($conexionBD,"UPDATE activos SET nombre='$nombre',marca='$marca',modelo='$modelo',serial='$serial',doc_resp='$doc_resp',nom_resp='$nom_resp' , area='$area' WHERE id='$id'");
        echo json_encode(["success"=>1 ]);
        exit();
    }  elseif ($_GET["t"]==1) {
        $sqlActivos = mysqli_query($conexionBD,"UPDATE activobio SET nombre='$nombre',marca='$marca',modelo='$modelo',serial='$serial',doc_resp='$doc_resp',nom_resp='$nom_resp' WHERE id='$id'");
        echo json_encode(["success"=>1 ]);
        exit();
    } 
    elseif ($_GET["t"]==2)  {
        $sqlActivos = mysqli_query($conexionBD,"UPDATE activosis SET nombre='$nombre',marca='$marca',modelo='$modelo',serial='$serial',doc_resp='$doc_resp',nom_resp='$nom_resp' WHERE id='$id'");
        echo json_encode(["success"=>1 ]);
        exit();
    } 
    elseif ($_GET["t"]==3)  {
        $sqlActivos = mysqli_query($conexionBD,"UPDATE activoinf SET nombre='$nombre',marca='$marca',modelo='$modelo',serial='$serial',doc_resp='$doc_resp',nom_resp='$nom_resp' WHERE id='$id'");
        echo json_encode(["success"=>1 ]);
        exit();
    } 
    
}

/* Consulta TODOS los registros de la tabla activosbio o activosis o activoinf
   o activos según sea el valor de la variable 'area': 1 , 2, 3, 0 respectivamente*/
if(isset($_GET["area"])){
    if($_GET["area"]==1){
        $sqlActivosb = mysqli_query($conexionBD,"SELECT * FROM activobio ");
        if(mysqli_num_rows($sqlActivosb) > 0){
            $activosb = mysqli_fetch_all($sqlActivosb,MYSQLI_ASSOC);
            echo json_encode($activosb);
        }
        else{ echo json_encode([["success"=>0]]); }
    } elseif($_GET["area"]==2){
        $sqlActivoss = mysqli_query($conexionBD,"SELECT * FROM activosis ");
        if(mysqli_num_rows($sqlActivoss) > 0){
            $activoss = mysqli_fetch_all($sqlActivoss,MYSQLI_ASSOC);
            echo json_encode($activoss);
        }
        else{ echo json_encode([["success"=>0]]); }
    } elseif($_GET["area"]==3){
        $sqlActivosi = mysqli_query($conexionBD,"SELECT * FROM activoinf ");
        if(mysqli_num_rows($sqlActivosi) > 0){
            $activosi = mysqli_fetch_all($sqlActivosi,MYSQLI_ASSOC);
            echo json_encode($activosi);
        }
        else{ echo json_encode([["success"=>0]]); }
    } else{
        $sqlActivos = mysqli_query($conexionBD,"SELECT * FROM activos");
        if(mysqli_num_rows($sqlActivos) > 0){
            $activos = mysqli_fetch_all($sqlActivos,MYSQLI_ASSOC);
            echo json_encode($activos);
        }
        else{ echo json_encode([["success"=>0]]); }
    }

}



/////////// SECCIÓN PARA INSERTAR Y LEER RESPONSABLES.
//Insertar reponsable
if(isset($_GET["insertar_resp"])){
    $data = json_decode(file_get_contents("php://input"));
    $documento=$data->documento;
    $nombre=$data->nombre;
    $apellido=$data->apellido;
    $correo=$data->correo;
    
        if(($nombre!="")&&($documento!="")&&($apellido!="")&&($correo!="")){        
            $sqlActivosb = mysqli_query($conexionBD,"INSERT INTO responsables(documento, nombre,apellido,correo) VALUES('$documento','$nombre','$apellido','$correo') ");
            echo json_encode(["success"=>1]);
        }
    exit();
}

// Leer Responsables
if(isset($_GET["responsables"])){
        $sqlResponsable_ = mysqli_query($conexionBD,"SELECT * FROM responsables ");
        if(mysqli_num_rows($sqlResponsable_) > 0){
            $responsable_ = mysqli_fetch_all($sqlResponsable_,MYSQLI_ASSOC);
            echo json_encode($responsable_);
        }
        else{ echo json_encode([["success"=>0]]); }
    }

/* $sqlActivos_ = mysqli_query($conexionBD,"SELECT * FROM activos ");
if(mysqli_num_rows($sqlActivos_) > 0){
    $activos_ = mysqli_fetch_all($sqlActivos_,MYSQLI_ASSOC);
    echo json_encode($activos_);
}
else{ echo json_encode([["success"=>0]]); } */

?>