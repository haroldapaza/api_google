<?php
header('content-type: application/json; charset=utf-8');//HEADER PARA JSON
include_once 'php/puntosDAO.php';


$ac = isset($_POST["tipo"])?$_POST["tipo"]:"x"; //PARAMETRO PARA DETERMINAR LA ACCION
 
switch ($ac) {
    case "registrar":
        $p = new puntosDao();
        $exito = $p->registrarp($_POST["apellidoP"], $_POST["apellidoM"], $_POST["nombre"],$_POST["correo"],$_POST["sexo"],$_POST["usuario"], $_POST["password"]);
        if($exito)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = "Grabado persona correctamente";
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "error al grabar!";
        }

    case "grabar":
        $ruta="img";
        $archivo=$_FILES['archivo']['tmp_name'];
        $nombreArchivo=$_FILES['archivo']['name'];
        move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
        $ruta=$ruta."/".$nombreArchivo;
        $texto=$_POST['texto'];
        //echo $texto."<br><img src='$ruta'>";

        $p = new puntosDao();
        $exito = $p->grabar($_POST["nombre"],$_POST["categoria"],$ruta."login.png",$_POST["descripcion"],$_POST["ubicacion"], $_POST["cx"], $_POST["cy"]);
        if($exito)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = "Grabado Correctamente";
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "error al grabar!";
        }
    break;
 
    case "listar":
        $p = new puntosDao();
        $resultados = $p->listar_todo();
        
        if(sizeof($resultados)>0)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = $resultados;
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "No hay registros";
        }
    break;
    
    case "grabar":
        $p = new puntosDao();
        $exito = $p->login($_POST["usuario"],$_POST["password"]);
        if($exito)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = "Grabado Correctamente";
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "error al grabar!";
        }
    break;

    case "login":
        
        $p = new puntosDao();
        $exito = $p->grabar($_POST["login"],$_POST["password"]);
         if(sizeof($resultados)>0)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = $resultados;
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "No hay registros";
        }
    break;

    default:
        $r["estado"] = "error";
        $r["mensaje"] = "datos no válidos";
    break;
}
echo json_encode($r);//IMPRIMIR JSON
?>