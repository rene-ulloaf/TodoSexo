<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="es-ES">
	<head>
		<meta name="title" content="escort, chicas hot, vedettes, sexo, voyeur, trios, fantasias sexuales, pornografia." />
		<meta name="description" content="Mujeres Escort." />
		<meta name="keywords" content="damas de compaa, escort, despedidas de soltero, fiestas, fantasias sexuales, sexo." />
		<meta name="distribution" content="global" />
		<meta name="google-site-verification" content="W3YVQIgAbmMX5htS8Y5GBW-9klcYZbMVzWlhTvyPDDs" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title></title>
		<?php
			include_once("configuracion.php");
			include_once("clases/todosexo.php");
			include_once("clases/util.php");
			
			$contCelda = 0;
			$js = false;
			$java = false;
			$cookie = false;
			$activex = false;
			$ajax = false;
			
			$objTodoSexo = new TodoSexo();
			$objUtil = new Util();
			$link = $objTodoSexo->Conectar($GLOBALS["Server"],$GLOBALS["User"],$GLOBALS["Pass"]);
			$objTodoSexo->SelccionarBD($GLOBALS["BD"],$link);
			
			$planes = $objTodoSexo->ObtenerTodo("Select idPlan,nombre From planes Where vigente = 1 Order By idPlan;");
		?>
	</head>
	<body>
		<form id="frmInicio" method="get">
			<table style="width:100%;">
				<tr>
					<td style="heigth:15px;text-align:center;" colspan="3">
						<script type="text/javascript">
							google_ad_client = "pub-1290784346734766";
							/* 728x15, creado 27/05/10 */
							google_ad_slot = "8523766272";
							google_ad_width = 728;
							google_ad_height = 15;
						</script>
						<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
					</td>
				</tr>
				
				<tr>
					<td style="vertical-align:top;width:125px;text-align:center;">
						<script type="text/javascript"><!--
							google_ad_client = "pub-1290784346734766";
							/* 120x600, creado 27/05/10 */
							google_ad_slot = "1525257692";
							google_ad_width = 120;
							google_ad_height = 600;
							//-->
						</script>
						<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
					</td>
					
					<td style="vertical-align:top;text-align:center;">
						<?php
							while($row1 = $objTodoSexo->DevuelveObjeto($planes)){
							$query = "
										Select
											 a.idAcompanante
											,a.nombre
											,a.apodo
											,a.slogan
											,Case When a.sexo = 1 Then p.gentilicioFem Else p.gentilicioMasc End As Nacionalidad
											,pr.precio
											,a.fecNacimiento
											,f.ruta As thumbnail
											,a.idPlan
											,pl.nombre As Plan
										From acompanantes a
										Join fotos f On a.idAcompanante = f.idAcompanante
										Join paises p On a.nacionalidad = p.idPais
										Join precio pr On a.idAcompanante = pr.idAcompanante
										Join planes pl On a.idPlan = pl.idPlan
										Where f.tipo = 1
										And a.idPlan = " .$row1->idPlan. "
										And f.vigente = 1
										Order By a.idPlan;
									";
									$resultado = $objTodoSexo->ObtenerTodo($query);
							//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_ObtenerAcompanantes Where idPlan = " .$row1->idPlan. " Order By idPlan;");
						?>
						<table style="width:100%;text-align:left;border:1px solid black;">							
							<tr>
								<td style="background-color:black;color:white;" colspan="10">
									<?=$row1->nombre;?>
								</td>
							</tr>
							
							<?php
								while($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($contCelda == 0){
										echo("<tr>");
									}
									
									$celda = "
										<td>
											<table style='text-align:center;border:1px solid #00CCFF;'>
												<tr>
													<td style='background-color:#00CCFF;'>" . $row->apodo . ",&nbsp;" . $objUtil->edad($row->fecNacimiento) . "," . $row->Plan . "</td>
												</tr>
												
												<tr>
													<td>
														<a href='detalleAcompanante.php?acompanante=" . $row->idAcompanante . "'><img src='" . $row->thumbnail . "' border='0' alt='$" .  number_format($row->precio,0,",",".") . "," . $row->Nacionalidad . "' title='$" .  number_format($row->precio,0,",",".") . "," . $row->Nacionalidad . "' /></ a>
													</td>
												</tr>
												
												<tr>
													<td style='background-color:#00CCFF;'>" . $row->slogan . "</td>
												</tr>
											</table>
										</td>";
									echo($celda);
									
									$contCelda ++;
									
									if($contCelda == 6){
										echo("</tr>");
									}
								}
								
								for($i=$contCelda+1;$i<=6;$i++){
									echo "
										<td style='text-align:center;border:1px solid #00CCFF;'>
											<img src='fotos/disponible.jpg' />
										</td>
									";
								}
								
								echo "</tr>";
							?>
						</table>
						<?php }?>
					</td>
					
					<td style="vertical-align:top;width:125px;text-align:center;"></td>
				</tr>	
			</table>
		</form>
		
		<script type="text/javascript">
			<?php
				$js = true;
			?>
			if(navigator.javaEnabled()){
				<?php
					$java = true;
				?>
			}
			
			if(navigator.cookieEnabled){
				<?php
					$cookie = true;
				?>
			}
			
			if (window.ActiveXObject){ // IE 
				<?php
					$activex = true;
				?>
			}
			
			if (typeof XMLHttpRequest == "undefined" && typeof ActiveXObject == "undefined" && window.createRequest == "undefined"){
				<?php
					$ajax = true;
				?>
			}
		</script>
		<noscript>
			<?php
				if(!js){
					$js = false;
				}
			?>
		</noscript> 
		
		<?php
			try{
				if(!$_SESSION['registroGrabado']){
					/*if(file_exists('clases/browser-class/browser_class_inc.php')){
					    echo 'exists';
					} else {
					   echo 'no';
					}*/
					
					include_once('clases/browser-class/browser_class_inc.php');
					
					$b = new browser();
					//print_r(">>>> ".$b->whatBrowser());
					//$b->getBrowserOS()
					$a = $b->whatBrowser();
					/*
					$_SERVER[HTTP_USER_AGENT]
					echo php_uname()."<br>";
					echo PHP_OS;
					echo "<pre>";
						print_r($_SERVER);
					echo "</pre>";
					*/
					
					$query = "
						Insert Into visitas(
							 fecha
							,SistemaOperativo
							,Explorador
							,Version
							,Beta
							,Javascript
							,JavaApplets
							,Cookies
							,ActivexControls
							,Ajax
							,IP
							,MacAddress
							,Pais
						)Values(
							 CURDATE()
							,'" . $a[platform] . "'
							,'" . $a[browsertype] . "'
							,'" . $a[version] . "'
							,0
							," . ($js == false ? 0 : 1) . "
							," . ($java == false ? 0 : 1) . "
							," . ($cookie == false ? 0 : 1) . "
							," . ($activex == false ? 0 : 1) . "
							," . ($ajax == false ? 0 : 1) . "
							,'" . getenv('REMOTE_ADDR') . "'
							,'" . $objUtil->returnMacAddress() . "'
							,'" . $objUtil->ObtenerPais(getenv('REMOTE_ADDR')) . "'
						);
					";
					/*$query = "
						call pa_RegistraVisita(
							 '" . $a[platform] . "'
							,'" . $a[browsertype] . "'
							,'" . $a[version] . "'
							,0
							," . ($js == false ? 0 : 1) . "
							," . ($java == false ? 0 : 1) . "
							," . ($cookie == false ? 0 : 1) . "
							," . ($activex == false ? 0 : 1) . "
							," . ($ajax == false ? 0 : 1) . "
							,'" . getenv('REMOTE_ADDR') . "'
							,'" . $objUtil->returnMacAddress() . "'
							,'" . $objUtil->ObtenerPais(getenv('REMOTE_ADDR')) . "'
						);
					";*/
					//die($query);
					$objTodoSexo->ObtenerTodo($query) Or $error = true;
					
					if($error){
						throw new Exception(mysql_errno() . '-' . mysql_error());
					}
					
					$_SESSION['registroGrabado'] = true;
				}
			}catch(Exception $e){
				$objUtil->GuardarError($e->getMessage(),$e->getCode(),$e->getFile(),$e->getLine());
			}
			
			$link = $objTodoSexo->DesConectar();
		?>
	</body>
</html>