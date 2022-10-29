<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Listado Acompañantes</title>
		
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
			$query = "
				Select
					 a.idAcompanante
			        ,a.nombre
			        ,a.telefono
			        ,a.eMail
			        ,Case When a.sexo = 1 Then p.gentilicioMasc Else p.gentilicioFem End As Nacionalidad
			        ,pl.nombre As plan
			        ,(Select count(idFoto) From fotos where idAcompanante = a.idAcompanante And tipo = 1 And vigente = true) As imgThumbnail
			        ,(Select count(idFoto) From fotos where idAcompanante = a.idAcompanante And tipo = 2 And vigente = true) As img
			        ,ptf.cantidadFotos
			        ,a.vigente
			        ,DATE_FORMAT(a.fechaCreacion,'%d/%m/%Y') As fechaCreacion
			        ,a.idUsuario
			    From acompanantes a
			    Join paises p On a.nacionalidad = p.idPais
			    Join planes pl On a.idPlan = pl.idPlan
			    Join planTipoFoto ptf On a.idPlan = ptf.idPlan And ptf.idTipoFoto = 2
			    And a.vigente = 1
			";
			$resultado = $objTodoSexo->ObtenerTodo($query);
			//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_ListaAcompanantes where vigente = 1;");
		?>
	</head>
	
	<body>
		<form id="frmListado" method="post" action="#">
			<div style="text-align:center;">Listado Acompa&ntilde;antes</div>
			<br />
			
			<table style="width:100%;text-align:center;">
				<tr>
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
					<td style="visibility:hidden;">Nombre</td>
					<td style="visibility:hidden;">Plan</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td style="visibility:hidden;">
						<input type="text" name="txtNombre" />
					</td>
					<td style="visibility:hidden;">
						<input type="text" name="cboPlan" />
					</td>
					<td>
						<a href="creaAcompanantes.php?idAcompanante=0">Nuevo Acompañante</a>
					</td>
					<td>
						<a href="listaAcompanantesMail.php">Listado Mail</a>
					</td>
					<td>
						<a href="index.html">Ir al Inicio</a>
					</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<br />
			
			<table style="width:100%;text-align:center;">
				<tr>
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
					<td style="vertical-align:top;width:80%;text-align:center;">
						<table style="width:100%;border:1px solid black;">
							<tr>
								<td style="border:1px solid black;text-align:center;">Nombre</td>
								<td style="border:1px solid black;text-align:center;">Tel&eacute;fono</td>
								<td style="border:1px solid black;text-align:center;">E-Mail</td>
								<td style="border:1px solid black;text-align:center;">Nacionalidad</td>
								<td style="border:1px solid black;text-align:center;">Plan</td>
								<td style="border:1px solid black;text-align:center;">Imagen Presentaci&oacute;n</td>
								<td style="border:1px solid black;text-align:center;">Cantidad Fotos</td>
								<td style="border:1px solid black;text-align:center;">Fecha Creaci&oacute;n</td>
							</tr>
							
							<?php
								while($row = $objTodoSexo->DevuelveObjeto($resultado)){
									$fila = "
											<tr>
												<td style='border:1px solid black;text-align:left;'><a href='creaAcompanantes.php?idAcompanante=" . $row->idAcompanante . "'>" . $row->nombre . "</a></td>
												<td style='border:1px solid black;text-align:center;'>" . $row->telefono . " </td>
												<td style='border:1px solid black;text-align:left;'>" . $row->eMail . " </td>
												<td style='border:1px solid black;text-align:left;'>" . $row->Nacionalidad . " </td>
												<td style='border:1px solid black;text-align:left;'>" . $row->plan . " </td>
												<td style='border:1px solid black;text-align:center;'>" . ($row->imgThumbnail == 0 ? '<a href="subirFotos.php?idAcompanante=' . $row->idAcompanante . '&tipo=1"><img src="img/no.png" style="cursor:pointer;" alt="subir Imagen" title="subir Imagen" border="0" /></a>' : '<img src="img/si.png" style="cursor:default;" alt="imagen Cargada" title="imagen Cargada" border="0" />' ) . " </td>
												<td style='border:1px solid black;text-align:center;'>" . ($row->img < $row->cantidadFotos ? '<a href="subirFotos.php?idAcompanante=' . $row->idAcompanante . '&tipo=2" alt="subir Imagen" title="subir Imagen">' . $row->img . '</a>' : $row->img) . " </td>
												<td style='border:1px solid black;text-align:center;'>" . $row->fechaCreacion . " </td>
											</tr>
										";
										
									echo($fila);
								}
							?>
						</table>
					</td>
					
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
				</tr>	
			</table>
		</form>
		
		<?$link = $objTodoSexo->DesConectar();?>
	</body>
</html>