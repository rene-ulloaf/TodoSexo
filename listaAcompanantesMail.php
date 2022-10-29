<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Listado Acompañantes Mail</title>
		
		<?php
			if(!$_SESSION['logeado']){
				echo "
					<script type='text/javascript'>
						window.location.href = 'index.html';
					</script>
				";
			}
			
			include_once("configuracion.php");
			include_once("clases/todosexo.php");
			
			$objTodoSexo = new TodoSexo();
			
			$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			$resultado = $objTodoSexo->ObtenerTodo("Select * From acompananteMail Order By id;");
		?>
	</head>
	
	<body>
		<form id="frmListadoMail" method="post" action="#">
			<div style="text-align:center;">Listado Acompañantes Mail</div>
			<br />
			
			<table style="width:100%;text-align:right;">
				<tr>
					<td>
						<a href="acompananteMail.php">Nuevo</a>
					</td>
					<td>
						<a href="listaAcompanantes.php">Volver</a>
					</td>
				</tr>
			</table>
			<br />
			
			<table style="width:100%;border:1px solid black;text-align:center;">
				<tr>
					<td style="border:1px solid black;text-align:center;">Nombre</td>
					<td style="border:1px solid black;text-align:center;">E-Mail</td>
					<td style="border:1px solid black;text-align:center;">Usuario</td>
					<td style="border:1px solid black;text-align:center;">Fecha Creaci&oacute;n</td>
				</tr>
				
				<?php
					while($row = $objTodoSexo->DevuelveObjeto($resultado)){
						$fila = "
								<tr>
									<td style='border:1px solid black;text-align:left;'>" . $row->nombre . "</td>
									<td style='border:1px solid black;text-align:left;'>" . $row->eMail . " </td>
									<td style='border:1px solid black;text-align:left;'>" . $row->usuario . " </td>
									<td style='border:1px solid black;text-align:center;'>" . $row->fechaCreacion . " </td>
								</tr>
							";
							
						echo($fila);
					}
				?>
			</table>
		</form>
		
		<?$link = $objTodoSexo->DesConectar();?>
	</body>
</html>