<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Subir Fotos</title>
		
		<?PHP
			if(!$_SESSION['logeado']){
				echo "
					<script type='text/javascript'>
						window.location.href = 'index.html';
					</script>
				";
			}
			
			include_once("configuracion.php");
			include_once("clases/todosexo.php");
			include_once("clases/util.php");
			
			$objTodoSexo = new TodoSexo();
			$objUtil = new Util();
			
			$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			
			$idAcompanante = $_GET["idAcompanante"];
			$tipo = $_GET["tipo"];
			$subir = ($_GET["subir"] == 1 ? true : false);
			
			if($tipo != 0){
				$tipoFoto = $tipo;
			}else{
				$tipoFoto = $_POST["cboTipoFoto"];
			}
			$nombreArchivo = $_FILES["archivo"]["name"];
			$tipoArchivo = explode("image/",$_FILES["archivo"]["type"]);
			$tamanoArchivo = $_FILES["archivo"]["size"];
			$archivo_temp = $_FILES["archivo"]["tmp_name"];
			
			$archivo_foto = "fotos/acompanante_" . $idAcompanante;
			$nombreFoto = "";
			$altoImg = 0;
			$anchoImg = 0;
			$maxFotos = 0;
			$cantidadFotos = 0;
			
			$msg = "";
			function DatosOK(){
				global $tipoFoto,$tipoArchivo,$nombreArchivo,$objTodoSexo,$idAcompanante,$tamanoArchivo,$maxFotos,$cantidadFotos,$msg;
				$respuesta = false;
				
				if($tipoFoto == 0){
					$msg .= "tipo de Foto es Obligatorio.<br />";
					$respuesta = true;
				}
				
				if($nombreArchivo == ""){
					$msg .= "Debe Elegir alg&uacute;n Archivo.<br />";
					$respuesta = true;
				}
				
				if(strtolower($tipoArchivo[1]) != "jpeg"){
					$msg .= "El tipo de Archivo ." . $tipoArchivo[1] . " no es Permitido.<br />";
					$respuesta = true;
				}
				
				if($tipoFoto == 1){
					if($cantidadFotos > 0){
						$msg .= "Ya existe una foto de presentaci&ocute;n.<br />";
						$respuesta = true;
					}
				}
				
				if($tipoFoto != 1){
					if($maxFotos <= $cantidadFotos){
						$msg .= "Ha excedido la cantidad de Fotos.<br />";
						$respuesta = true;
					}
				}
				
				if($tamanoArchivo > 1512000){
					$msg .= "El tama&ntilde;o del archivo no es Permitido.<br />";
					$respuesta = true;
				}
				
				return $respuesta;
			}
			
			if($subir){
				try{
					$query = "
						SELECT
					    	 a.idAcompanante
					    	,tf.idTipoFoto
							,ptf.altoImg
					        ,ptf.anchoImg
					        ,ptf.cantidadFotos As maxFotos
					        ,(Select count(idFoto) From fotos Where idAcompanante = a.idAcompanante And tipo = tf.idTipoFoto And vigente = true) As cantFotos
					        ,(Select count(idFoto) From fotos Where idAcompanante = a.idAcompanante And tipo = tf.idTipoFoto) As cantFotosSubidas
					        ,tf.descripcion
					    From planes p
					    Join acompanantes a On p.idPlan = a.idPlan
					    Join planTipoFoto ptf On p.idPlan = ptf.idPlan
					    Join tipo_foto tf On ptf.idTipoFoto = tf.idTipoFoto
					    Where a.vigente = true
					    And a.idAcompanante = " . $idAcompanante . "
					    And tf.idTipoFoto = " . $tipoFoto
					;
					$resultado = $objTodoSexo->ObtenerTodo($query) Or $error = true;
					//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_ObtenerDatosTipoFoto Where idAcompanante = " . $idAcompanante . " And idTipoFoto = " . $tipoFoto . ";") Or $error = true;
					
					if($error){
						throw new Exception(mysql_errno() . '-' . mysql_error());
					}
					
					while($row = $objTodoSexo->DevuelveObjeto($resultado)){
						$altoImg = $row->altoImg;
						$anchoImg = $row->anchoImg;
						$maxFotos = $row->maxFotos;
						$cantidadFotos = $row->cantFotos;
						$nombreFoto = $row->descripcion . "_" . $row->cantFotosSubidas;
					}
					
					$error = DatosOK();
					
					if(!$error){
						if(!is_dir($archivo_foto)){
							mkdir($archivo_foto, 0777); 
						}
						
						if(move_uploaded_file($archivo_temp,$archivo_foto . "/" . $nombreFoto . "." . strtolower($tipoArchivo[1]))){
							if($tipoFoto == 2){
								$ti = getimagesize($archivo_foto . "/" . $nombreFoto . "." . strtolower($tipoArchivo[1]));
								
								if($ti[0] >= $anchoImg && $ti[1] >= $altoImg){
									if(copy($archivo_foto . "/" . $nombreFoto . "." . strtolower($tipoArchivo[1]),$archivo_foto . "/" . $nombreFoto . "_3." . strtolower($tipoArchivo[1]))){
										SelloAgua($archivo_foto . "/" . $nombreFoto . "_3." . strtolower($tipoArchivo[1]),$archivo_foto . "/" . $nombreFoto . "_3." . strtolower($tipoArchivo[1]),true);
										
										$query = "
											Insert Into fotos(
												 idAcompanante
												,ruta
												,tipo
												,vigente
											)Values(
												 " . $idAcompanante . "
												,'" . $archivo_foto . "/" . $nombreFoto . "_3.jpeg" . "'
												,3
												," . true . "
											);
										";
										/*$query = "
											call pa_InsertaFoto(
												" . $idAcompanante . "
												,'" . $archivo_foto . "/" . $nombreFoto . "_3.jpeg" . "'
												,3
												," . true . "
											);
										";*/
										
										$objTodoSexo->ObtenerTodo($query) Or $error = true;
										
										if($error){
											throw new Exception(mysql_errno() . '-' . mysql_error());
										}
									}
								}
							}
							
							$fuente = ImageCreateFromJPEG($archivo_foto . "/" . $nombreFoto . ".jpeg");
							
							$imgAncho = imagesx($fuente);
							$imgAlto =imagesy($fuente);
							$imagen = imagecreatetruecolor($anchoImg,$altoImg);
							
							imagecopyresampled($imagen,$fuente,0,0,0,0,$anchoImg,$altoImg,$imgAncho,$imgAlto);
							ImageJPEG($imagen,$archivo_foto . "/" . $nombreFoto . ".jpeg",75);
							
							if($tipoFoto == 2){
								SelloAgua($archivo_foto . "/" . $nombreFoto . ".jpeg",$archivo_foto . "/" . $nombreFoto . ".jpeg",false);
							}
							
							$query = "
								Insert Into fotos(
									 idAcompanante
									,ruta
									,tipo
									,vigente
								)Values(
									 " . $idAcompanante . "
									,'" . $archivo_foto . "/" . $nombreFoto .".jpeg" . "'
									," . $tipoFoto . "
									," . true . "
								);
							";
							/*$query = "
								call pa_InsertaFoto(
									 " . $idAcompanante . "
									,'" . $archivo_foto . "/" . $nombreFoto . ".jpeg" . "'
									," . $tipoFoto . "
									," . true . "
								);
							";*/
							//die($query);
							$objTodoSexo->ObtenerTodo($query) Or $error = true;
							
							if($error){
								throw new Exception(mysql_errno() . '-' . mysql_error());
							}
							
							$msg = "foto Subida.";
						}
					}
				}catch(Exception $e){
					$objUtil->GuardarError($e->getMessage(),$e->getCode(),$e->getFile(),$e->getLine());
					$error = true;
					$msg = "Ocurrió un Error Inesperado.";
				}
			}
			
			function SelloAgua($imagen,$fuente,$imgGrande){
				$imagen = ImageCreateFromJPEG($imagen);
				if($imgGrande){
					$watermark = ImageCreateFromJPEG('fotos/LOGO_grande.jpg');
				}else{
					$watermark = ImageCreateFromGIF('fotos/LOGO.gif');
				}
				
				$imagewidth = imagesx($imagen);
				$imageheight = imagesy($imagen);
				$watermarkwidth =  imagesx($watermark);
				$watermarkheight =  imagesy($watermark);
				
				$startwidth = (($imagewidth - $watermarkwidth)/1);
				$startheight = (($imageheight - $watermarkheight)/1);
				
				imagecopy($imagen, $watermark,  $startwidth, $startheight, 0, 0, $watermarkwidth, $watermarkheight);
				ImageJPEG($imagen,$fuente,75);
				
				imagedestroy($imagen);
				imagedestroy($watermark);
				
				return true;
			}
		?>
	</head>
	<body>
		<form name="frmSubeFotos" action="<?=$_SERVER['PHP_SELF'];?>?idAcompanante=<?=$idAcompanante;?>&subir=1" method="post" enctype="multipart/form-data">
			<div style="display:<?=($subir ? '' : 'none');?>;color:<?=($error ? 'red' : 'green');?>;text-align:center;"><?=$msg;?></div>
			<br />
			
			<table>
				<tr>
					<td>Tipo Foto</td>
					<td>Foto</td>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>
						<?php
							$resultado = $objTodoSexo->ObtenerTodo("Select idTipoFoto,descripcion From tipo_foto Where idTipoFoto <> 3 And vigente = 1;");
							
							$select = "<select name='cboTipoFoto' id='cboTipoFoto' style='width:200px;' tabindex='1'>";
							$select .= "<option value='0'>Seleccionar</option>";
							
							while($row = $objTodoSexo->DevuelveObjeto($resultado)){
								if($row->idTipoFoto == $tipoFoto){
									$sel = 'selected';
								}else{
									$sel = '';
								}
								
								$select .= "<option value='" . $row->idTipoFoto . "'" . $sel . ">" . $row->descripcion . "</option>";
							}
							
							echo $select .= "</select>";
						?>
					</td>
					<td>
						<input type="file" name="archivo" value="<?=$nombreArchivo;?>" id="archivo">
					</td>
					<td>
						<input type="submit" name="btnSubir" id="btnSubir" value="Subir">
					</td>
					<td>
						<a href="listaAcompanantes.php">Volver al Listado</a>
					</td>
				</tr>
			</table>
		</form> 
		
		<?$link = $objTodoSexo->DesConectar();?>
	</body>
</html>