<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="es-ES">
	<head>
		<meta name="title" content="Escort, sexo, voyeur, trios, sexo duro, masajes eroticos, vedette" />
		<meta name="description" content="las mejores mujeres escort o damas de compa�ia para despedidas de solteros, fiestas o fantasias." />
		<meta name="keywords" content="damas de compa��a, escort, despedidas de soltero, fiestas, fantasias, sexo, masajes eroticos." />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title></title>
		<link rel="stylesheet" TYPE="text/css" HREF="estilos/estilo.css">
		<?PHP
			$idAcompanante = $_GET["acompanante"];
			if(is_null($idAcompanante)){
				die("Debe Elegir alguna acompa&ntilde;ante.");
			}
			
			include_once("configuracion.php");
			include_once("clases/todosexo.php");
			include_once("clases/util.php");
			
			$objTodoSexo = new TodoSexo();
			$objUtil = new Util();
			
			$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			$query = "
				Select
					 a.idAcompanante
					,a.nombre
					,a.apodo
					,a.slogan
					,Case When a.sexo = 1 Then p.gentilicioFem Else p.gentilicioMasc End As Nacionalidad
					,a.fecNacimiento	
					,a.estatura
					,t.descripcion As textura
					,co.descripcion As color_ojos
					,cp.descripcion As color_pelo
					,a.medidas
					,d.descripcion As depilacion
					,a.telefono
					,a.email
					,pr.precio
					,pr.periodo
					,ad.descripcion
					,a.ubicacion
				From acompanantes a
				Join textura t On a.idTextura = t.idTextura
				Join colorOjos co On a.idColorOjos = co.idColorOjos
				Join colorPelo cp On a.idColorPelo = cp.idColorPelo
				Join depilacion d On a.idDepilacion = d.idDepilacion
				Join acompananteDescripcion ad On a.idAcompanante = ad.idAcompanante
				Join paises p On a.nacionalidad = p.idPais
				Join precio pr ON a.idAcompanante = pr.idAcompanante And pr.defecto = 1
				Where a.idAcompanante = " . $idAcompanante
			;
			$resultado = $objTodoSexo->ObtenerTodo($query);
			//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_DetalleAcompanante Where idAcompanante = " . $idAcompanante . ";");
			$acompanante = $objTodoSexo->DevuelveObjeto($resultado);
			
			$query = "
				Select
					 fp.idFormaPago
					,fp.descripcion
					,a.idAcompanante
				From formaPago fp
				Join formaPagoAcompanante fpa
				On fp.idFormaPago = fpa.idFormaPago
				Join acompanantes a
				On fpa.idAcompanante = a.idAcompanante
				Where fp.vigente = 1
				And a.idAcompanante = " . $idAcompanante
			;
			$resultado = $objTodoSexo->ObtenerTodo($query);
			//$resultado = $objTodoSexo->ObtenerTodo("Select descripcion From vw_ObtenerFormasPago Where idAcompanante = " . $idAcompanante . ";");
			while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
				$formasPago .= $row->descripcion . ",";
			}
			$formasPago = substr($formasPago,0,strlen($formasPago)-1);
			
			$query = "
				Select
					 ps.idPreferencia
					,ps.Descripcion
					,a.idAcompanante
				From preferenciaSexual ps
				Join preferenciaAcompanante pa
				On ps.idPreferencia = pa.idPreferencia
				Join acompanantes a
				On a.idAcompanante = pa.idAcompanante
				Where ps.vigente = 1
				And a.idAcompanante = " . $idAcompanante
			;
			$resultado = $objTodoSexo->ObtenerTodo($query);
			//$resultado = $objTodoSexo->ObtenerTodo("Select Descripcion From vw_ObtenerPrefSexual Where idAcompanante = " . $idAcompanante . ";");
			while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
				$prefSexual .= $row->Descripcion . ",";
			}
			$prefSexual = substr($prefSexual,0,strlen($prefSexual)-1);
			
			$query ="
				Select
					 e.idEstilo
					,e.Descripcion
					,a.idAcompanante
				From estilos e
				Join estiloAcompanante ea
				On e.idEstilo = ea.idEstilo
				Join acompanantes a
				On a.idAcompanante = ea.idAcompanante
				Where e.vigente = 1
				And a.idAcompanante = " . $idAcompanante
			;
			$resultado = $objTodoSexo->ObtenerTodo($query);
			//$resultado = $objTodoSexo->ObtenerTodo("Select Descripcion From vw_ObtenerEstilos Where idAcompanante = " . $idAcompanante . ";");
			while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
				$estilos .= $row->Descripcion . ",";
			}
			$estilos = substr($estilos,0,strlen($estilos)-1);
		?>
	</head>
	<body style="background-image:url('img/fondo.jpg');">
		<form>
			<table style="width:100%;">
				<tr>
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
					<td style="vertical-align:top;width:15%;text-align:left;">
						<table style="border:1px solid black;width:100%;">
							<tr>
								<td class="texto_titulo"><?=$acompanante->apodo;?></td>
							</tr>
							
							<tr>
								<td class="texto_subtitulo"><?=$acompanante->slogan;?></td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td><?=$acompanante->descripcion;?></td>
							</tr>
							
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td class="texto_subtitulo">$ <?=number_format($acompanante->precio,0,",",".") . "&nbsp;" . $acompanante->periodo;?></td>
							</tr>
							
							<tr>
								<td>Tel&eacute;fono:<?=$acompanante->telefono;?></td>
							</tr>
							
							<tr>
								<td><?=$acompanante->ubicacion;?></td>
							</tr>
							
							<tr>
								<td>Formas de Pago</td>
							</tr>
							
							<tr>
								<td><?=$formasPago;?></td>
							</tr>
						</table>
					</td>
					<td style="vertical-align:top;width:40%;text-align:center;">
						<table style="border:1px solid black;width:100%;">
							<tr>
								<td colspan="3" style="text-align:left;background-color:#00CCFF;">Galer&iacute;a de Fotos</td>
							</tr>
							
							<tr>
								<td colspan="3" style="text-align:center;">
									<?php
										$cont = 0;
										$galeria = "";
										$primRuta = "";
										
										$query = "
											Select
												 f.idFoto
												,f.ruta
												,f.tipo
												,a.idAcompanante
												,tf.idTipoFoto
											From fotos f
											Join acompanantes a On f.idAcompanante = a.idAcompanante
											Join tipo_foto tf On f.tipo = tf.idTipoFoto
											Where f.vigente = 1
											And tf.idTipoFoto = 2
											And a.idAcompanante = " . $idAcompanante . "
											And tf.idTipoFoto <> 1
											Order By tf.idTipoFoto
										";
										
										$resultado = $objTodoSexo->ObtenerTodo($query);
										//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_ObtenerFotos Where idAcompanante = " . $idAcompanante . " And idTipoFoto <> 1;");
										while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
											$cont++;
											$galeria .= "<label id=\"nav_" . $cont . "\" class=\"habilitar_cambio_foto\" onclick=\"cambioFoto('" . $row->ruta . "','nav_" . $cont . "')\">" . $cont . "</label>&nbsp;";
											
											if($cont == 1){
												$primRuta = $row->ruta;
											}
										}
										echo $galeria;
									?>
								</td>
							</tr>
							
							<tr>
								<td colspan="3" style="text-align:center;border:1px solid #00CCFF;">
									<img id="fotos" src="" />
								</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align:top;width:15%;text-align:right;">
						<table style="border:1px solid black;width:100%;">
							<tr>
								<td colspan="3" style="text-align:left;background-color:#00CCFF;">
									Datos Acompa&ntilde;ante
								</td>
							</tr>
							
							<tr>
								<td>
									<table style="border:1px solid #00CCFF; width:100%;">
										<tr>
											<td class="titulo_celda" style="width:40%;">Nacionalidad:</td>
											<td class="texto_celda"><?=$acompanante->Nacionalidad;?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Edad:</td>
											<td class="texto_celda"><?=$objUtil->edad($acompanante->fecNacimiento);?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Estatura:</td>
											<td class="texto_celda"><?=number_format($acompanante->estatura,0,",",".");?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Medidas:</td>
											<td class="texto_celda"><?=$acompanante->medidas;?></td>
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<table style="border:1px solid #00CCFF;width:100%;">
										<tr>
											<td class="titulo_celda" style="width:40%;">Textura:</td>
											<td class="texto_celda"><?=$acompanante->textura;?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Color Ojos:</td>
											<td class="texto_celda"><?=$acompanante->color_ojos;?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Color Pelo:</td>
											<td class="texto_celda"><?=$acompanante->color_pelo;?></td>
										</tr>
										
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<table style="border:1px solid #00CCFF;width:100%;">
										<tr>
											<td class="titulo_celda" style="width:40%;">Depilaci&oacute;n:</td>
											<td class="texto_celda"><?=$acompanante->depilacion;?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Pref. Sexual:</td>
											<td class="texto_celda"><?=$prefSexual;?></td>
										</tr>
										
										<tr>
											<td class="titulo_celda">Estilo:</td>
											<td class="texto_celda"><?=$estilos;?></td>
										</tr>
										
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td style="height:190px;width:2100px;">
									<script type="text/javascript">
										<!--
										google_ad_client = "pub-1290784346734766";
										/* 200x90, creado 27/05/10 */
										google_ad_slot = "1893609277";
										google_ad_width = 200;
										google_ad_height = 90;
										//-->
									</script>
									<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
								</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align:top;width:10%;text-align:center;"></td>
				</tr>
			</table>
		</form>
		
		<?$link = $objTodoSexo->DesConectar();?>
		
		<script type="text/javascript">
			var idNavAnt = "";
			
			function cambioFoto(ruta,idNav){
				if(idNav != idNavAnt){
					var navegacion = document.getElementById(idNav);
					
					navegacion.className = "deshabilitar_cambio_foto";
					
					if(idNavAnt != ""){
						var navegacionAnt = document.getElementById(idNavAnt);
						
						navegacionAnt.className = "habilitar_cambio_foto";
					}
					
					document.getElementById("fotos").src = ruta;
					idNavAnt = idNav;
				}
			}
			
			cambioFoto("<?=$primRuta;?>","nav_1");
		</script>
	</body>
</html>