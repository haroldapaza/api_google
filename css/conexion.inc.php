<?php 
	class Conexion{
		private static $conexion;
		public static function abrirConexion(){
			if (!isset(self::$conexion)) {
				try {
					include_once 'config.inc.php';
					self::$conexion=new PDO("mysql:host=$nombre_servidor; dbname=$nombre_base_datos,$nombre_usuario,$password");
					self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					self::$conexion->exec("SET CHARATER SET utf8")
				} catch (PDOException $e) {
					print "error".$ex->getMessage().<br>;
					die();
				}

			}

		}

		public function cerrarConexion(){
			if(isset(self::$conexion)){
				self::conexion=null;
			}
		}
		public function obtenerConexion(){
			return self::$conexion;
		}
	}	
 ?>