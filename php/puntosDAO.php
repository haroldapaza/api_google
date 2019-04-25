<?php
include_once 'conex.php';//INCLUIR CONEXION DE BASE DE DATOS
 
class puntosDao
{
    private $r;
    public function __construct()
    {
        $this->r = array();
    }
    public function grabar($nombre,$categoria,$imagen,$descripcion,$ubicacion,$cx,$cy)//METODO PARA GRABAR A LA BD
    {
        $con = conex::con();
        $nombre = mysql_real_escape_string($nombre);
        $categoria = mysql_real_escape_string($categoria);
        $imagen = mysql_real_escape_string($imagen);
        $descripcion = mysql_real_escape_string($descripcion);
        $ubicacion = mysql_real_escape_string($ubicacion);
        $cx = mysql_real_escape_string($cx);
        $cy = mysql_real_escape_string($cy);
        $q = "insert into restaurante (res_nombre,res_categoria,res_imagen,res_descripcion,res_ubicacion, res_cx, res_cy)".
             "values ('".addslashes($nombre)."','".addslashes($categoria)."','".addslashes($imagen)."','".addslashes($descripcion)."','".addslashes($ubicacion)."','".addslashes($cx)."','".addslashes($cy)."')";
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function listar_todo()
    {
        $q = "SELECT res_nombre,res_categoria,res_imagen,res_descripcion,res_cx,res_cy FROM restaurante";
        $con = conex::con();
        $rpta = mysql_query($q,$con);
        mysql_close($con);
        while($fila = mysql_fetch_assoc($rpta))
        {
            
            $this->r[] = $fila;
            
        } 
        return $this->r;
        
    }
    public function registrarp($apePaterno, $apeMaterno,$nombre,$correo,$sexo)//METODO PARA GRABAR A LA BD
    {
        $con = conex::con();
        $apPaterno = mysql_real_escape_string($apePaterno);
        $apMaterno = mysql_real_escape_string($apeMaterno);
        $nombre1 = mysql_real_escape_string($nombre);
        $correo1 = mysql_real_escape_string($correo);
        $sexo1 = mysql_real_escape_string($sexo);
        

        $q = "insert into p_natural (p_apePaterno,p_apeMaterno,p_nombre,p_correo,p_sexo)"." values ('".addslashes($apPaterno)."','".addslashes($apMaterno)."','".addslashes($nombre1)."','".addslashes($correo1)."','".addslashes($sexo1)."')";
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function login($usuario,$password)
    {
        $q = "SELECT p_usuario, password FROM p_natural WHERE p_usuario='".$usuario."'";
        $con = conex::con();
        $rpta = mysql_query($q,$con);
        mysql_close($con);
        while($fila = mysql_fetch_assoc($rpta))
        {
            
            $this->r[] = $fila;
            
        } 
        return $this->r;
        
    }

    public function registrarr($nombre, $categoria,$imagen,$correo,$sexo,$usuario, $passwor)//METODO PARA GRABAR A LA BD
    {
        $con = conex::con();
        $apPaterno = mysql_real_escape_string($apePaterno);
        $apMaterno = mysql_real_escape_string($apeMaterno);
        $nombre1 = mysql_real_escape_string($nombre);
        $correo1 = mysql_real_escape_string($correo);
        $sexo1 = mysql_real_escape_string($sexo);
        $usuario1 = mysql_real_escape_string($usuario);
        $password1 = mysql_real_escape_string($passwor);

        $q = "insert into p_natural (p_apePaterno,p_apeMaterno,p_nombre,p_correo,p_sexo,p_usuario,password)"." values ('".addslashes($apPaterno)."','".addslashes($apMaterno)."','".addslashes($nombre1)."','".addslashes($correo1)."','".addslashes($sexo1).addslashes($usuario1)."','".addslashes($password1)."')";
        $rpta = mysql_query($q, $con);
        mysql_close($con);
        if($rpta==1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function mostrarDatos ($re) {

    foreach ($re as $valor) {
        foreach ($valor as $lista) {
        echo $lista."----";
        }
        echo "<br>";
        }
    }


function mostrarDa ($resultados) {

foreach ($resultados as &$valor) {
    $valor = $valor;
}

}

}
?>
