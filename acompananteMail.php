<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Ingresar E-Mail</title>
		
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
			//include_once("clases/util.php");
			
			$objTodoSexo = new TodoSexo();
			//$objUtil = new Util();
			
			$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			
			$nombre = $_POST["txtNombre"];
			$mail = $_POST["txtMail"];
			$subir = ($_GET["subir"] == 1 ? true : false);
			
			if($subir){
				try{
					$query = "
						Insert Into acompananteMail(
							 nombre
							,eMail
							,usuario
							,fecha
						)Values(
							 '" . $nombre . "'
							,'" . $mail . "'
							," . $_SESSION['idUsuario'] . "
							,CURDATE()
						);
					";
					//die($query);
					$objTodoSexo->ObtenerTodo($query) Or $error = true;
					
					if(!$error){
						$msg = "Grabada Correctamente.";
					}else{
						throw new Exception(mysql_errno() . '-' . mysql_error());
					}
				}catch(Exception $e){
					//die("exc" . $e->getMessage() . "-codigo" . $e->getCode() . "-archivo" . $e->getFile() . "-linea" . $e->getLine() . "-trace" . $e->getTrace() . "-tracestring" . $e->getTraceAsString());
					$objUtil->GuardarError($e->getMessage(),$e->getCode(),$e->getFile(),$e->getLine());
					$msg = "Ocurrio un Error Inesperado.";
				}
			}
		?>
	</head>
	<body>
		<form name="frmSubeFotos" action="<?=$_SERVER['PHP_SELF'];?>?subir=1" method="post" enctype="multipart/form-data">
			<div style="display:<?=($subir ? '' : 'none');?>;color:<?=($error ? 'red' : 'green');?>;text-align:center;"><?=$msg;?></div>
			<br />
			
			<table>
				<tr>
					<td>Nombre</td>
					<td>E-Mail</td>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>
						<input type="text" name="txtNombre" value="<?=$nombre;?>" id="txtNombre">
					</td>
					<td>
						<input type="text" name="txtMail" value="<?=$mail;?>" id="txtMail">
					</td>
					<td>
						<input type="submit" name="btnSubir" id="btnSubir" value="Subir">
					</td>
					<td>
						<a href="listaAcompanantesMail.php">Volver al Listado</a>
					</td>
				</tr>
			</table>
		</form> 
		
		<?$link = $objTodoSexo->DesConectar();?>
	</body>
</html>