<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Mantenedor Acompañantes</title>
		
		<?PHP
			//include_once("configuracion.php");
			//include_once("clases/todosexo.php");
			
			//$objTodoSexo = new TodoSexo();
			
			//$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			//$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			
			$res = ($_POST["txtRes"] == 1 ? $_POST["txtRes"] : 0);
			//echo $res." <---";
			if($res == 1){
				if(($_POST["txtUsuario"] == "pfonseca" && $_POST["txtPass"] == "viomet") || ($_POST["txtUsuario"] == "rulloa" && $_POST["txtPass"] == "cheche")){
					$_SESSION['logeado'] = true;
					
					if($_POST["txtUsuario"] == "pfonseca"){
						$_SESSION['idUsuario'] = 2;
					}else if($_POST["txtUsuario"] == "rulloa"){
						$_SESSION['idUsuario'] = 1;
					}
					
					echo "
						<script type='text/javascript'>
							document.cookie = 'usuario=" . $_POST["txtUsuario"] . "';
							window.location.href = 'listaAcompanantes.php';
						</script>
					";
				}else{
					session_destroy();
					echo "Usuario y/o Password Incorrecta";
				}
			}
			//mail("rulloa@devetel.cl,chechex69@hotmail.com","asuntillo","Este es el cuerpo del mensaje") ;
		?>
	</head>
	<body>
		<form name="frmAdmin" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
			<br /><br /><br /><br />
			
			<table border="1" align="center">
				<tr>
					<td colspan="2" style="text-align:center;">Ingreso</td>
				</tr>
				
				<tr>
					<td>Nombre de Usuario:</td>
					<td>
						<input type="text" id="txtUsuario" name="txtUsuario" value="<?=$_POST["txtUsuario"];?>" tabindex="1" />
					</td>
				</tr>
				
				<tr>
					<td>Contraseña:</td>
					<td>
						<input type="password" id="txtPass" name="txtPass" tabindex="2" />
						<input type="hidden" id="txtRes" name="txtRes" value="1" />
					</td>
				</tr>
				
				<tr>
					<td style="text-align:center;" colspan="2">
						<button type="submit" id="btnIngresar" tabindex="3">Ingresar</button>
					</td>
				</tr>
			</table>
		</form>
		
		<script type="text/javascript">
			var coo = document.cookie;
			var user = "";
			
			if(coo.length > 0){
				user = unescape(coo.substring("usuario=".length, coo.indexOf(";","usuario=".length)));
				
				if(user != "PHPSESSI"){
					document.getElementById("txtUsuario").value = user;
				}else{
					document.getElementById("txtUsuario").value = "";
				}
			}
		
			document.getElementById("txtUsuario").focus();
		</script>
	</body>
</html>