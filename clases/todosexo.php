<?php
	class TodoSexo{
		var $existeConeccion;
		
		function TodoSexo(){
			//"ATTR_ERRMODE";
			//"ERRMODE_EXCEPTION";
		}
		
		function Conectar($server,$user,$pass){
			$link = mysql_connect($server,$user,$pass);
			
			$existeConeccion = true;
			
			Return $link;
		}
		
		function DesConectar(){
			mysql_close();
		}
		
		function SelccionarBD($db,$link){
			Return mysql_select_db($db,$link);
		}
		
		function ObtenerTodo($consulta){
			Return mysql_query($consulta);
		}
		
		function DevuelveObjeto($result){
			Return mysql_fetch_object($result);
		}
	}
?>