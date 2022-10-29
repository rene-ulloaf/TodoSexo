<?session_start();?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Mantenedor Acompañantes</title>
		
		<style type="text/css">@import url(complementos/jscalendar-1.0/calendar-win2k-1.css);</style>
		<script type="text/javascript" src="complementos/jscalendar-1.0/calendar.js"></script>
		<script type="text/javascript" src="complementos/jscalendar-1.0/lang/calendar-en.js"></script>
		<script type="text/javascript" src="complementos/jscalendar-1.0/calendar-setup.js"></script>
		
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
			//$objTodoSexo->setAttribute(objTodoSexo::ATTR_ERRMODE, objTodoSexo::ERRMODE_EXCEPTION); //esta es la famosa linea
			
			$idAcompanante = ($_GET["idAcompanante"] == "" ? 0 : $_GET["idAcompanante"]);
			$perVacio = false;
			$preVacio = false;
			$numFilasPrecio = false;
			$cantDef = 0;
			
			$msg = "";
			$error = false;
			
			if($_GET["reg"] != 1){
				$i = 0;
				
				$query = "
					Select
				    	 a.idAcompanante
				        ,a.nombre
				        ,a.apodo
				        ,a.slogan
				        ,a.telefono
				        ,a.eMail
				        ,a.nacionalidad
				        ,a.fecNacimiento
				        ,a.estatura
				        ,a.medidas
				        ,a.idContextura
				        ,a.idTextura
				        ,a.idColorOjos
				        ,a.idColorPelo
				        ,a.idDepilacion
				        ,a.Sexo
				        ,a.ubicacion
				        ,a.idPlan
				        ,(Select descripcion from acompananteDescripcion where idAcompanante = a.idAcompanante) As descripcion
				        ,a.vigente
				        ,ea.idEstilo
				        ,psa.idPreferencia
				        ,fpa.idFormaPago
				        ,(Select count(idprecio) From precio where idAcompanante = a.idAcompanante And vigente = true) As cantFilas
				        ,p.periodo
				        ,p.idPrecio
				        ,p.defecto
				    From acompanantes a
				    Join estiloAcompanante ea On a.idAcompanante = ea.idAcompanante
				    Join preferenciaAcompanante psa On a.idAcompanante = psa.idAcompanante
				    Join formaPagoAcompanante fpa On a.idAcompanante = fpa.idAcompanante
				    Join precio p On a.idAcompanante = p.idAcompanante And p.vigente = true
				    Where idAcompanante = " . $idAcompanante
				;
				$resultado = $objTodoSexo->ObtenerTodo($query);
				//$resultado = $objTodoSexo->ObtenerTodo("Select * From vw_datosAcompanante where idAcompanante = " . $idAcompanante . ";");
				
				while($row = $objTodoSexo->DevuelveObjeto($resultado)){
					$aEmail = explode("@",$row->eMail);
					$aMedidas = explode("-",$row->medidas);
					$aRut = explode("-",$row->rut);
					
					$plan = $row->idPlan;
					$rut = $aRut[0];
					$rutDV = $aRut[1];
					$nombre = $row->nombre;
					$apodo = $row->apodo;
					$email = $aEmail[0];
					$email2 = $aEmail[1];
					$telefono = $row->telefono;
					$fecNacimiento = $row->fecNacimiento;
					$pais = $row->nacionalidad;
					$estatura = $row->estatura;
					$medidas1 = $aMedidas[0];
					$medidas2 = $aMedidas[1];
					$medidas3 = $aMedidas[2];
					$contextura = $row->idContextura;
					$sexo = $row->Sexo;
					$textura = $row->idTextura;
					$colorOjos = $row->idColorOjos;
					$colorPelo = $row->idColorPelo;
					$depilacion = $row->idDepilacion;
					$slogan = $row->slogan;
					$ubicacion = $row->ubicacion;
					$descripcion = $row->descripcion;
					$vigente = $row->vigente;
					
					$estilos[$i] = $row->idEstilo;
					$preferenciaSexual[$i] = $row->idPreferencia;
					$formaPago[$i] = $row->idFormaPago;
					
					$CantFilasPrecio = $row->cantFilas;
					$periodo[$i] = $row->periodo;
					$precio[$i] = $row->idPrecio;
					$defecto[$i] = $row->defecto == 1 ? "on" : "";
					
					if($defecto[$i] == "on"){
						$cantDef ++;
					}
					
					$i++;
				}
			}elseif($_GET["reg"] == 1){
				$plan = $_POST["cboPlanes"];
				$rut = $_POST["txtRut"];
				$rutDV = $_POST["txtRutDV"];
				$nombre = $_POST["txtNombre"];
				$apodo = $_POST["txtApodo"];
				$email = $_POST["txtEmail"];
				$email2 = $_POST["txtEmail2"];
				$telefono = $_POST["txtTelefono"];
				$fecNacimiento = $_POST["txtFecNacimiento"];
				$pais = $_POST["cboPais"];
				$estatura = str_replace(",","",str_replace(".","",$_POST["txtEstatura"]));
				$medidas1 = $_POST["txtMedidas1"];
				$medidas2 = $_POST["txtMedidas2"];
				$medidas3 = $_POST["txtMedidas3"];
				$contextura = $_POST["cboContextura"];
				$sexo = $_POST["cboSexo"];
				$textura = $_POST["cboTextura"];
				$colorOjos = $_POST["cboColorOjos"];
				$colorPelo = $_POST["cboColorPelo"];
				$depilacion = $_POST["cboDepilacion"];
				$slogan = $_POST["txtSlogan"];
				$ubicacion = $_POST["txtUbicacion"];
				$descripcion = $_POST["txtDescripcion"];
				$vigente = ($_POST["chkVigente"] == "on" ? true : false);
				
				$estilos = $_POST["EstilosSexuales"];
				$preferenciaSexual = $_POST["preferenciaSexual"];
				$formaPago = $_POST["formaPago"];
				
				$CantFilasPrecio = $_POST["hdnCantFilas"];
				
				for($i=0;$i<$CantFilasPrecio;$i++){
					$periodo[$i] = $_POST["txtPeriodo" . $i];
					$precio[$i] = $_POST["txtPrecio" . $i];
					$defecto[$i] = $_POST["chkDefecto" . $i];
					
					if($periodo[$i] == ""){
						$perVacio = true;
						break;
					}
					
					if($precio[$i] == ""){
						$preVacio = true;
						break;
					}
					
					if(!is_numeric($precio[$i])){
						$numFilasPrecio = true;
						break;
					}
					
					if($defecto[$i]){
						$cantDef ++;
					}
				}
				
				function datosOK(){
					global $objUtil,$objTodoSexo,$msg,$error,$plan,$rut,$rutDV,$nombre,$apodo,$email,$email2,$telefono,$fecNacimiento,$pais,$estatura,$medidas1,$medidas2,$medidas3,$contextura,$sexo,$textura,$colorOjos,$colorPelo,$depilacion,$slogan,$ubicacion,$descripcion,$estilos,$preferenciaSexual,$formaPago,$CantFilasPrecio,$perVacio,$preVacio,$cantDef,$numFilasPrecio;
					$respuesta = false;
					
					if($plan == 0){
						$msg .= "El Plan es Obligatorio.<br />";
						$respuesta = true;
					}
					
					if(trim($rut) == ""){
						$msg .= "El Rut es Obligatorio.<br />";
						$respuesta = true;
					}
					
					if(!is_numeric($rut)){
						$msg .= "El Rut debe tener solo n&uacute;meros.<br />";
						$respuesta = true;
					}else{
						if(!$objUtil->validaRut($rut) == strtoupper($rutDV)){
							$msg .= "El Rut no es v&aacute;lido.<br />";
							$respuesta = true;
 						}else{
							if($idAcompanante == 0){
								$resultadoRut = $objTodoSexo->ObtenerTodo("Select count(idAcompanante) As contRut From acompanantes Where rut = '" . $rut . "-" . $rutDV . "';");
					
								while($rowRut = $objTodoSexo->DevuelveObjeto($resultadoRut)){
									if($rowRut->contRut > 0){
										$msg .= "El Rut ya existe.<br />";
										$respuesta = true;
									}
								}
							}
						}
					}
					
					if(trim($nombre) == ""){
						$msg .= "El Nombre es Obligatorio.<br />";
						$respuesta = true;
					}
					
					if(strlen(trim($nombre)) > 100){
						$msg .= "El Nombre debe tener a lo m&aacute;s 100 caracteres.<br />";
						$respuesta = true;
					}
					
					if(strlen(trim($apodo)) > 50){
						$msg .= "El Apodo debe tener a lo m&aacute;s 50 caracteres.<br />";
						$respuesta = true;
					}
					
					if(trim($email) == "" || trim($email2) == ""){
						$msg .= "El Email es Obligatorio.<br />";
						$respuesta = true;
					}else{
						if(!$objUtil->ValidaEmail($email . "@" . $email2)){
							$msg .= "El Email es inv&aacute;lido.<br />";
							$respuesta = true;
						}else{
							if($idAcompanante == 0){
								$resultadoMail = $objTodoSexo->ObtenerTodo("Select count(idAcompanante) As contMail From acompanantes Where eMail = '" . $email . "@" . $email2 . "';");
								
								while($rowMail = $objTodoSexo->DevuelveObjeto($resultadoMail)){
									if($rowMail->contMail > 0){
										$msg .= "El Email ya existe.<br />";
										$respuesta = true;
									}
								}
							}
						}
					}
					
					if(trim($telefono) == ""){
						$msg .= "El T&eacute;lefono es obligatorio.<br />";
						$respuesta = true;
					}
					
					if(strlen(trim($telefono)) > 15){
						$msg .= "El Tel&eacute;fono debe tener a lo m&aacute;s 15 caracteres.<br />";
						$respuesta = true;
					}
					
					if(!is_numeric($telefono)){
						$msg .= "El Tel&eacute;fono debe tener solo n&uacute;meros.<br />";
						$respuesta = true;
					}
					
					if(trim($fecNacimiento) == ""){
						$msg .= "La Fecha Nacimiento es obligatoria.<br />";
						$respuesta = true;
					}
					
					// if(!checkdate($fecNacimiento)){
					//checkdate(nMes nDia nAño)
						// $msg .= "El T&eacute;lefono debe tener solo n&uacute;meros.<br />";
						// $respuesta = true;
					// }
					
					if($pais == 0){
						$msg .= "Debe Elegir la nacionalidad.<br />";
						$respuesta = true;
					}
					
					if($estatura == ""){
						$msg .= "La estatura es obligatoria.<br />";
						$respuesta = true;
					}
					
					if(!is_numeric($estatura)){
						$msg .= "la estatura debe tener solamente n&uacute;meros.<br />";
						$respuesta = true;
					}
					
					if($medidas1.$medidas2.$medidas3 == ""){
						$msg .= "Las medidas son obligatorias.<br />";
						$respuesta = true;
					}
					
					
					if(!is_numeric($medidas1.$medidas2.$medidas3)){
						$msg .= "Las medidas deben tener solamente n&uacute;meros.<br />";
						$respuesta = true;
					}
					
					if($contextura == 0){
						$msg .= "Debe Elegir la contextura.<br />";
						$respuesta = true;
					}
					
					if($sexo == 0){
						$msg .= "Debe Elegir el Sexo.<br />";
						$respuesta = true;
					}
					
					if($textura == 0){
						$msg .= "Debe Elegir la textura.<br />";
						$respuesta = true;
					}
					
					if($colorOjos == 0){
						$msg .= "Debe Elegir el color de ojos.<br />";
						$respuesta = true;
					}
					
					if($colorPelo == 0){
						$msg .= "Debe Elegir el color de pelo.<br />";
						$respuesta = true;
					}
					
					if($depilacion == 0){
						$msg .= "Debe Elegir la depilaci&oacute;n.<br />";
						$respuesta = true;
					}
					
					if(trim($slogan) == ""){
						$msg .= "El slogan es obligatorio.<br />";
						$respuesta = true;
					}
					
					if(strlen($slogan) > 100){
						$msg .= "El slogan debe tener a lo m&aacute; 100 caracteres.<br />";
						$respuesta = true;
					}
					
					if(trim($ubicacion) == ""){
						$msg .= "La ubicaci&oacute;n es obligatoria.<br />";
						$respuesta = true;
					}
					
					if(strlen($ubicacion) > 500){
						$msg .= "La ubicaci&oacute;n debe tener a lo m&aacute; 500 caracteres.<br />";
						$respuesta = true;
					}
					
					if(trim($descripcion) == ""){
						$msg .= "La descripci&oacute;n es obligatoria.<br />";
						$respuesta = true;
					}
					
					if(count($estilos) == 0){
						$msg .= "Debe elegir alg&uacute;n Estilo Sexual.<br />";
						$respuesta = true;
					}
					
					if(count($preferenciaSexual) == 0){
						$msg .= "Debe elegir alguna Preferencia Sexual.<br />";
						$respuesta = true;
					}
					
					if(count($formaPago) == 0){
						$msg .= "Debe elegir alguna forma de pago.<br />";
						$respuesta = true;
					}
					
					if($perVacio){
						$msg .= "Existen periodos vacios.<br />";
						$respuesta = true;
					}
					
					if($preVacio){
						$msg .= "Existen precios vacios.<br />";
						$respuesta = true;
					}
					
					if($numFilasPrecio){
						$msg .= "Existen precios que no son n&uacute;mericos.<br />";
						$respuesta = true;
					}
					
					if($cantDef == 0){
						$msg .= "Debe tener alg&uacute;n precio por defecto.<br />";
						$respuesta = true;
					}
					
					if($cantDef > 1){
						$msg .= "Hay m&aacute;s de un precio por defecto.<br />";
						$respuesta = true;
					}
					
					return $respuesta;
				}
				
				$error = datosOK();
				if(!$error){
					try{
						$objTodoSexo->ObtenerTodo("Begin Transaction;");
						
						$fecNac = explode("-",$fecNacimiento);
						/*$query = "
							call pa_InsertaAcompanante(
								 " . $idAcompanante . "
								," . $plan . "
								,'" . $nombre . "'
								,'" . $apodo . "'
								,'" . $email . "@" . $email2 . "'
								," . $telefono . "
								,'" . date("Y/m/d",mktime(0,0,0,$fecNac[1],$fecNac[0],$fecNac[2])) . "'
								," . $pais . "
								," . $estatura . "
								,'" . $medidas1 . "-" . $medidas2 . "-" . $medidas3 . "'
								," . $contextura . "
								," . $sexo . "
								," . $textura . "
								," . $colorOjos . "
								," . $colorPelo . "
								," . $depilacion . "
								,'" . $slogan . "'
								,'" . $ubicacion . "'
								," . $vigente. "
								," . $_SESSION["idUsuario"] . "
								,@id
							);
						";*/
						
						if($idAcompanante == 0){
							$query = "
								Insert Into acompanantes(
									 idAcompanante
									,nombre
									,apodo
									,slogan
									,telefono
									,eMail
									,nacionalidad
									,fecNacimiento
									,estatura
									,medidas
									,idContextura
									,idTextura
									,idColorOjos
									,idColorPelo
									,idDepilacion
									,Sexo
									,ubicacion
									,idPlan
									,vigente
									,fechaCreacion
									,idUsuario
								)VALUES(
									 " . $idAcompanante . "
									,'" . $nombre . "'
									,'" . $apodo . "'
									,'" . $slogan . "'
									," . $telefono . "
									,'" . $email . "@" . $email2 . "'
									," . $pais . "
									,'" . date("Y/m/d",mktime(0,0,0,$fecNac[1],$fecNac[0],$fecNac[2])) . "'
									," . $estatura . "
									,'" . $medidas1 . "-" . $medidas2 . "-" . $medidas3 . "'
									," . $contextura . "
									," . $textura . "
									," . $colorOjos . "
									," . $colorPelo . "
									," . $depilacion . "
									," . $sexo . "
									,'" . $ubicacion . "'
									," . $plan . "
									," . $vigente. "
									,CURDATE()
									," . $_SESSION["idUsuario"] . "
								);
							";
						}else{
							$query = "
								Update acompanantes
								Set nombre = '" . $nombre . "'
									,apodo = '" . $apodo . "'
									,slogan = '" . $slogan . "'
									,telefono = " . $telefono . "
									,eMail = '" . $email . "@" . $email2 . "'
									,medidas = '" . $medidas1 . "-" . $medidas2 . "-" . $medidas3 . "'
									,idDepilacion = " . $depilacion . "
									,Sexo = " . $sexo . "
									,ubicacion = '" . $ubicacion . "'
									,idPlan = " . $plan . "
									,vigente = " . $vigente. "
								Where idAcompanante = " . $idAcompanante . ";
							";
						}
						
						//die($query);
						$objTodoSexo->ObtenerTodo($query) Or $error = true;
						
						if($error){
							throw new Exception(mysql_errno() . '-' . mysql_error());
						}
						
						if($idAcompanante == 0) {
							$sql2="select last_insert_id()";
							//$sql2="select @id;";
							$res2=mysql_query($sql2,$link);
							$row=mysql_fetch_array($res2);
							$idAcompanante = ($row[0] == "" ? 0 : $row[0]);
						}
						
						if($idAcompanante != 0){
							$cont = strlen($descripcion);
							
							for($i=0;$i<ceil($cont / 1000);$i++){
								$query = "
									Insert Into acompananteDescripcion(
										 idAcompanante
										,descripcion
									)Values(
										 " . $idAcompanante . "
										,'" . substr($descripcion,$i*1000,($i*1000 < $cont ? 1000 : ($cont - (($i-1)*1000)))) . "'
									);
								";
								/*$query =
									"call pa_InsertaAcompananteDescripcion(
										 " . $idAcompanante . "
										,'" . substr($descripcion,$i*1000,($i*1000 < $cont ? 1000 : ($cont - (($i-1)*1000)))) . "'
									);"
								;*/
								$objTodoSexo->ObtenerTodo($query) Or $error = true;
								
								if($error){
									throw new Exception(mysql_errno() . '-' . mysql_error());
								}
							}
							
							$cont = count($estilos);
							for($i=0;$i<$cont;$i++){
								$query = "
									Insert Into estiloAcompanante(
										 idAcompanante
										,idEstilo
									)Values(
										 " . $idAcompanante . "
										," . $estilos[$i] . "
									);
								";
								/*$query = "
									call pa_InsertaAcompananteEstilo(
										" . $idAcompanante . "
										," . $estilos[$i] . "
									);
								";*/
								$objTodoSexo->ObtenerTodo($query) Or $error = true;
								
								if($error){
									throw new Exception(mysql_errno() . '-' . mysql_error());
								}
							}
							
							$cont = count($preferenciaSexual);
							for($i=0;$i<$cont;$i++){
								$query = "
									Insert Into preferenciaAcompanante(
											 idAcompanante
											,idPreferencia
										)Values(
											 " . $idAcompanante . "
											," . $preferenciaSexual[$i] . "
										);
								";
								/*$query = "
									call pa_InsertaAcompanantePreferencia(
										 " . $idAcompanante . "
										," . $preferenciaSexual[$i] . "
									);
								";*/
								$objTodoSexo->ObtenerTodo($query) Or $error = true;
								
								if($error){
									throw new Exception(mysql_errno() . '-' . mysql_error());
								}
							}
							
							$cont = count($formaPago);
							for($i=0;$i<$cont;$i++){
								$query = "
									Insert Into formaPagoAcompanante(
											 idAcompanante
											,idFormaPago
										)Values(
											 " . $idAcompanante . "
											," . $formaPago[$i] . "
										);
								";
								/*$query = "
									call pa_InsertaAcompananteFormaPago(
										 " . $idAcompanante . "
										," . $formaPago[$i] . "
									);
								";*/
								$objTodoSexo->ObtenerTodo($query) Or $error = true;
								
								if($error){
									throw new Exception(mysql_errno() . '-' . mysql_error());
								}
							}
						
							for($i=0;$i<$CantFilasPrecio;$i++){
								$query = "
									Insert Into precio(
											 precio
											,periodo
											,defecto
											,vigente
											,idAcompanante
										)Values(
											 " . $precio[$i] . "
											,'" . $periodo[$i] . "'
											," . ($defecto[$i] == 'on' ? true : false) . "
											," . true . "
											," . $idAcompanante . "
										);
								";
								/*$query = "
									call pa_InsertaPrecio(
										 " . $idAcompanante . "
										,'" . $periodo[$i] . "'
										," . $precio[$i] . "
										," . ($defecto[$i] == 'on' ? true : false) . "
										," . true . "
									);
								";*/
								//die($query);
								$objTodoSexo->ObtenerTodo($query) Or $error = true;
								
								if($error){
									throw new Exception(mysql_errno() . '-' . mysql_error());
								}
							}
						}
						
						$msg = "Acompa&ntilde;ante Registrada.";
					}catch(Exception $e){
						//die("exc" . $e->getMessage() . "-codigo" . $e->getCode() . "-archivo" . $e->getFile() . "-linea" . $e->getLine() . "-trace" . $e->getTrace() . "-tracestring" . $e->getTraceAsString());
						$objUtil->GuardarError($e->getMessage(),$e->getCode(),$e->getFile(),$e->getLine());
						$msg = "Ocurrió un Error Inesperado.";
					}
				}
			}
		?>
	</head>
	<body>
		<form name="frmCreaAcomanante" method="post" action="<?=$_SERVER['PHP_SELF'] . '?idAcompanante=' . $idAcompanante . '&amp;reg=1';?>">
			<div style="display:<?=($_GET["reg"] ? '' : 'none');?>;color:<?=($error ? 'red' : 'green');?>;text-align:center;"><?=$msg;?></div>
			<br />
			
			<table>
				<tr>
					<td>Plan:</td>
					<td>
						<?php
							$resultado = $objTodoSexo->ObtenerTodo("Select idPlan,nombre From planes Where vigente = 1;");
							
							$select = "<select name='cboPlanes' id='cboPlanes' style='width:200px;' tabindex='1'>";
							$select .= "<option value='0'>Seleccionar</option>";
							
							while($row = $objTodoSexo->DevuelveObjeto($resultado)){
								if($row->idPlan == $plan){
									$sel = 'selected';
								}else{
									$sel = '';
								}
								
								$select .= "<option value='" . $row->idPlan . "'" . $sel . ">" . $row->nombre . "</option>";
							}
							
							echo $select .= "</select>";
						?>
					</td>
				</tr>
			</table>
			
			<fieldset>
				<legend>Datos Personales</legend>
				<table style="width:100%;">
					<tr>
						<td style="width:10%;">Rut:</td>
						<td colspan="5">
							<input type="text" name="txtRut" id="txtRut" style="width:200px;" value="<?=$rut;?>" maxlength="100" tabindex="2" />-
							<input type="text" name="txtRutDV" id="txtRutDV" style="width:30px;" value="<?=$rutDV;?>" maxlength="100" tabindex="3" />
						</td>
					</tr>
					
					<tr>
						<td style="width:10%;">Nombre:</td>
						<td colspan="5">
							<input type="text" name="txtNombre" id="txtNombre" style="width:100%;" value="<?=$nombre;?>" maxlength="100" tabindex="4" />
						</td>
					</tr>
					
					<tr>
						<td>Apodo:</td>
						<td colspan="5">
							<input type="text" name="txtApodo" id="txtApodo" style="width:100%;" value="<?=$apodo;?>" maxlength="100" tabindex="5" />
						</td>
					</tr>
					
					<tr>
						<td>E-Mail:</td>
						<td colspan="5">
							<input type="text" name="txtEmail" id="txtEmail" style="width:200px;" maxlength="35" value="<?=$email;?>" tabindex="6" />@<input type="text" name="txtEmail2" id="txtEmail2" style="width:150px;" value="<?=$email2;?>" maxlength="15" tabindex="7" />
						</td>
					</tr>
					
					<tr>
						<td>T&eacute;lefono:</td>
						<td>
							<input type="text" name="txtTelefono" id="txtTelefono" style="width:200px;" value="<?=$telefono;?>" maxlength="15" tabindex="8" />
						</td>
						<td style="width:10%;">Fec. Nacimiento:</td>
						<td>
							<input type="text" name="txtFecNacimiento" id="txtFecNacimiento" style="width:120px;" value="<?=$fecNacimiento;?>" readonly="readonly" />
							<button type="button" id="trigger" tabindex="9" title="Seleccione Fecha">
								<img src="img/calendario.gif" />
							</button>
							<script type="text/javascript">
								Calendar.setup({
									inputField : "txtFecNacimiento",
									ifFormat    : "%d-%m-%Y",
									button      : "trigger"
								});
							</script>
						</td>
						<td style="width:10%;">Nacionalidad:</td>
						<td>
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idpais,nombre From paises Order By nombre;");
								
								$select = "<select name='cboPais' id='cboPais' style='width:200px;' tabindex='10'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idpais == $pais){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idpais . "'" . $sel . ">" . $row->nombre . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Datos F&iacute;sicos</legend>
				<table style="100%">
					<tr>
						<td>Estatura:</td>
						<td style="width:25%;">
							<input type="text" name="txtEstatura" id="txtEstatura" style="width:120px;" value="<?=$estatura;?>" maxlength="5" tabindex="11" />
						</td>
						<td>Medidas:</td>
						<td style="width:25%;">
							<input type="text" name="txtMedidas1" id="txtMedidas1" style="width:60px;" value="<?=$medidas1;?>" maxlength="3" tabindex="12" />-<input type="text" name="txtMedidas2" id="txtMedidas2" style="width:60px;" value="<?=$medidas2;?>" maxlength="3" tabindex="13" />-<input type="text" name="txtMedidas3" id="txtMedidas3" style="width:60px;" value="<?=$medidas3;?>" maxlength="3" tabindex="14" />
						</td>
						<td>Contextura:</td>
						<td style="width:25%;">
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idContextura,nombre From contextura Where vigente = 1;");
								
								$select = "<select name='cboContextura' id='cboContextura' style='width:200px;' tabindex='15'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idContextura == $contextura){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idContextura . "'" . $sel . ">" . $row->nombre . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
						<td>Sexo:</td>
						<td style="width:25%;">
							<?php
								$select = "<select name='cboSexo' id='cboSexo' style='width:200px;' tabindex='16'>";
								
								$resultado = $objTodoSexo->ObtenerTodo("Select idSexo,descripcion From sexoAcompanante Where vigente = 1;");
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idSexo == $sexo){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idSexo . "'" . $sel . ">" . $row->descripcion . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
					</tr>
					
					<tr>
						<td>Textura:</td>
						<td>
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idTextura,descripcion From textura Where vigente = 1;");
								
								$select = "<select name='cboTextura' id='cboTextura' style='width:200px;' tabindex='17'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idTextura == $textura){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idTextura . "'" . $sel . ">" . $row->descripcion . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
						<td>Color Ojos:</td>
						<td>
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idColorOjos,descripcion From colorOjos Where vigente = 1;");
								
								$select = "<select name='cboColorOjos' id='cboColorOjos' style='width:200px;' tabindex='18'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idColorOjos == $colorOjos){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idColorOjos . "'" . $sel . ">" . $row->descripcion . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
						<td>Color Pelo:</td>
						<td>
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idColorPelo,descripcion From colorPelo Where vigente = 1;");
								
								$select = "<select name='cboColorPelo' id='cboColorPelo' style='width:200px;' tabindex='19'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idColorPelo == $colorPelo){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idColorPelo . "'" . $sel . ">" . $row->descripcion . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
						<td>Depilaci&oacute;n:</td>
						<td>
							<?php
								$resultado = $objTodoSexo->ObtenerTodo("Select idDepilacion,descripcion From depilacion Where vigente = 1;");
								
								$select = "<select name='cboDepilacion' id='cboDepilacion' style='width:200px;' tabindex='20'>";
								$select .= "<option value='0'>Seleccionar</option>";
								
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									if($row->idDepilacion == $depilacion){
										$sel = 'selected';
									}else{
										$sel = '';
									}
									
									$select .= "<option value='" . $row->idDepilacion . "'" . $sel . ">" . $row->descripcion . "</option>";
								}
								
								echo $select .= "</select>";
							?>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Estilos Sexuales</legend>
				<table style="100%">
					<tr>
						<td>
							<?php
								$cont = 0;
								$tabIndex = 21;
								
								$resultado = $objTodoSexo->ObtenerTodo("Select idEstilo,descripcion From estilos Where vigente = 1;");
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									$check = "<input type='checkbox' name='EstilosSexuales[]' value='" . $row->idEstilo . "'" . ($estilos[$cont] ? 'checked=\'checked\'' : '') . " tabindex='" . $tabIndex . "' />" . $row->descripcion . "&nbsp;";
									echo $check;
									
									$cont ++;
									$tabIndex ++;
								}
							?>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Preferencia Sexual</legend>
				<table style="width:100%">
					<tr>
						<td>
							<?php
								$cont = 0;
								
								$resultado = $objTodoSexo->ObtenerTodo("Select idPreferencia,descripcion From preferenciaSexual Where vigente = 1;");
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									$check = "<input type='checkbox' name='preferenciaSexual[]' value='" . $row->idPreferencia . "'" . ($preferenciaSexual[$cont] ? 'checked=\'checked\'' : '') . " tabindex='" . $tabIndex . "' />" . $row->descripcion . "&nbsp;";
									echo $check;
									
									$cont ++;
									$tabIndex ++;
								}
							?>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Forma Pago</legend>
				<table style="width:100%">
					<tr>
						<td>
							<?php
								$cont = 0;
								
								$resultado = $objTodoSexo->ObtenerTodo("Select idformaPago,descripcion From formaPago Where vigente = 1;");
								while ($row = $objTodoSexo->DevuelveObjeto($resultado)){
									$check = "<input type='checkbox' name='formaPago[]' value='" . $row->idformaPago . "'" . ($formaPago[$cont] ? 'checked=\'checked\'' : '') . " tabindex='" . $tabIndex . "' />" . $row->descripcion . "&nbsp;";
									echo $check;
									
									$cont ++;
									$tabIndex ++;
								}
							?>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<fieldset>
				<legend>Precio</legend>
				<table style="width:100%;">
					<tr>
						<td style="width:10%;">Periodo:</td>
						<td style="width:20%;">
							<input type="text" name="txtPeriodo" id="txtPeriodo" maxlength="10" style="width:95%;" tabindex="<?=$tabIndex++;?>" />
						</td>
						<td style="width:5%;">Precio:</td>
						<td style="width:15%;">
							<input type="text" name="txtPrecio" id="txtPrecio" maxlength="10" style="width:95%;" tabindex="<?=$tabIndex++;?>" />
						</td>
						<td style="width:5%;">Por Defecto:</td>
						<td style="width:50px;">
							<input type="checkbox" name="chkDefecto" id="chkDefecto" tabindex="<?=$tabIndex++;?>" />
						</td>
						<td>
							<button type="button" name="btnAgregar" id="btnAgregar" style="width:50px;" tabindex="<?=$tabIndex++;?>" title="Agregar" onclick="agregarPrecio(document.getElementById('txtPeriodo'),document.getElementById('txtPrecio'),document.getElementById('chkDefecto'));"><img src="img/agregar.gif" /></button>
						</td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td id="tdContPrecio" colspan="6">
							<?php
								if($CantFilasPrecio > 0){
									$tblPrecio = "<table id='tblPrecio' style='border:1px solid black;text-align:center;'>";
									$tblPrecio .= "<tr>";
									//$tblPrecio .= "<td>&nbsp;</td>";
									$tblPrecio .= "<td>Periodo</td>";
									$tblPrecio .= "<td>Precio</td>";
									$tblPrecio .= "<td>Defecto</td>";
									$tblPrecio .= "<td>&nbsp;</td>";
									$tblPrecio .= "<td>&nbsp;</td>";
									$tblPrecio .= "<tr/>";
									
									for($i=0;$i<$CantFilasPrecio;$i++){
										$tblPrecio .= "<tr id='tr" . $i . "'>";
										//$tblPrecio .= "<td>" . $idAcompanante . "</td>";
										$tblPrecio .=
											"<td>
												<input type='text' name='txtPeriodo" . $i . "' id='txtPeriodo" . $i . "' value='" . $periodo[$i] . "' readonly='readonly' />
											</td>";
										$tblPrecio .=
											"<td>
												<input type='text' name='txtPrecio" . $i . "' id='txtPrecio" . $i . "' value='" . $precio[$i] . "' readonly='readonly' />
											</td>";
										$tblPrecio .=
											"<td>
												<input type='checkbox' name='chkDefecto" . $i . "' id='chkDefecto" . $i . "'" . ($defecto[$i] == "on" ? 'checked=\'checked\'' : '') . " />
											</td>";
										$tblPrecio .=
											"<td>
												<img id='imgEditar" . $i . "' src='img/editar.gif' alt='Editar' title='Editar' />
											</td>";
										$tblPrecio .=
											"<td>
												<img id='imgEliminar" . $i . "' src='img/eliminar.gif' alt='Eliminar' title='Eliminar' />
											</td>";
										$tblPrecio .= "<tr/>";
									}
									
									$tblPrecio .= "</table>";
									echo $tblPrecio . "<input type='hidden' id='hdnCantFilas' name='hdnCantFilas' value='". $CantFilasPrecio . "' />";
								}
							?>
						</td>
					</tr>
				</table>
			</fieldset>
					
			<fieldset>
				<legend>Otros Datos</legend>
				<table style="width:100%;">
					<tr>
						<td style="width:10%;">Slogan:</td>
						<td>
							<input type="text" name="txtSlogan" id="txtSlogan" style="width:100%;" value="<?=$slogan;?>" maxlength="100" tabindex="<?=$tabIndex++;?>" />
						</td>
					</tr>
					<tr>
						<td>Ubicaci&oacute;n:</td>
						<td>
							<input type="text" name="txtUbicacion" id="txtUbicacion" style="width:100%;" value="<?=$ubicacion;?>" maxlength="500" tabindex="<?=$tabIndex++;?>" />
						</td>
					</tr>
					
					<tr>
						<td>Descripci&oacute;n:</td>
						<td>
							<textarea name="txtDescripcion" id="txtDescripcion" rows="4" style="width:100%;" tabindex="<?=$tabIndex++;?>"><?=$descripcion;?></textarea>
						</td>
					</tr>
				</table>
			</fieldset>
			
			<table style="width:100%;">
				<tr>
					<td style="width:5%;">Vigente:</td>
					<td>
						<input type="checkbox" name="chkVigente" id="chkVigente" <?=$idAcompanante == 0 ? "checked='checked'" : ($vigente ? "checked='checked'" : "");?> tabindex="<?=$tabIndex++;?>" />
					</td>
				</tr>
			</table>
			
			<table style="width:100%;text-align:center;">
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<button type="submit" id="btnGuardar" tabindex="<?=$tabIndex++;?>">Guardar</button>
					</td>
				</tr>
				
				<tr>
					<td style="text-align:right;visibility:<?=($idAcompanante == 0 ? 'hidden' : '');?>;"><a href="subirFotos.php?idAcompanante=<?=$idAcompanante;?>">Subir Imagenes</a></td>
					<td style="text-align:left;"><a href="listaAcompanantes.php">Volver al Listado</a></td>
				</tr>
			</table>
		</form>
		
		<script type="text/javascript">
			var tablaCreada = <?=$CantFilasPrecio == "" ? "false" : "true";?>;
			var porDefecto = <?=($cantDef == 0 ? "false" : "true");?>;
			var cantFilas = <?=$CantFilasPrecio == "" ? 0 : $CantFilasPrecio;?>;
			
			window.onload = document.getElementById("cboPlanes").focus();
			
			function agregarPrecio(periodo,precio,defecto){
				var ctrlCantFilas = document.getElementById("hdnCantFilas");
				
				if(DatosOk()){
					if(tablaCreada == false){
						CrearTabla("tblPrecio","text-align:center;border:1px solid black;","","tdContPrecio");
						CrearFila("trIni","tblPrecio");
						//CreaColumna(Label("",""),"trIni");
						CreaColumna(Label("","Periodo"),"trIni");
						CreaColumna(Label("","Precio"),"trIni");
						CreaColumna(Label("","Por Defecto"),"trIni");
						CreaColumna(Label("","Editar"),"trIni");
						CreaColumna(Label("","Eliminar"),"trIni");
						tablaCreada = true;
					}
					
					CrearFila("tr" + cantFilas,"tblPrecio");
					
					//CreaColumna(Label("","<?=$idAcompanante;?>"),"tr" + cantFilas);
					CreaColumna(TextBox("txtPeriodo" + cantFilas,"txtPeriodo" + cantFilas,periodo.value,0,0,true,false),"tr" + cantFilas);
					CreaColumna(TextBox("txtPrecio" + cantFilas,"txtPrecio" + cantFilas,precio.value,0,0,true,false),"tr" + cantFilas);
					CreaColumna(CheckBox("chkDefecto" + cantFilas,"chkDefecto" + cantFilas,defecto.checked,0,false),"tr" + cantFilas);
					CreaColumna(Imagen("imgEditar" + cantFilas,"img/editar.gif","Editar"),"tr" + cantFilas);
					CreaColumna(Imagen("imgEliminar" + cantFilas,"img/eliminar.gif","Eliminar"),"tr" + cantFilas);
					
					cantFilas ++;
					
					if(ctrlCantFilas == null){
						var cantFil = document.createElement("input");
						
						cantFil.setAttribute("type","hidden");
						cantFil.setAttribute("id","hdnCantFilas");
						cantFil.setAttribute("name","hdnCantFilas");
						cantFil.setAttribute("value",cantFilas);
						document.getElementById("tdContPrecio").appendChild(cantFil);
					}else{
						ctrlCantFilas.value = cantFilas;
					}
					
					if(defecto.checked){
						porDefecto = true;
					}
					
					periodo.value = "";
					precio.value = "";
					defecto.checked = false;
				}
			}
			
			function CrearTabla(id,estilo,clase,contenedor){
				var tbl = document.createElement("table");
				
				tbl.setAttribute("id",id);
				tbl.setAttribute("style",estilo);
				tbl.setAttribute("class",clase);
				
				document.getElementById(contenedor).appendChild(tbl);
			}
			
			function CrearFila(id,contenedor){
				var tr = document.createElement("tr");
				
				tr.setAttribute("id",id);
				document.getElementById(contenedor).appendChild(tr);
			}
			
			function CreaColumna(control,contenedor){
				var td = document.createElement("td");
				
				td.appendChild(control);
				document.getElementById(contenedor).appendChild(td);
			}
			
			function DatosOk(){
				var per = document.getElementById("txtPeriodo");
				var pre = document.getElementById("txtPrecio");
				var def = document.getElementById("chkDefecto");
				
				if(cantFilas > 10){
					alert("Cantidad de Precios Exedidos.");
					return false;
				}
				
				if(per.value == ""){
					alert("El periodo es obligatorio.");
					per.style.borderColor = "red";
					per.focus();
					
					return false;
				}else{
					per.style.borderColor = "black";
				}
				
				if(pre.value == ""){
					alert("El precio es obligatorio.");
					pre.style.borderColor = "red";
					pre.focus();
					
					return false;
				}else{
					pre.style.borderColor = "black";
				}
				
				if(isNaN(parseInt(pre.value))){
					alert("El precio debe ser numerico.");
					pre.style.borderColor = "red";
					pre.focus();
					
					return false;
				}else{
					pre.style.borderColor = "black";
				}
				
				if(porDefecto && def.checked){
					alert("ya existe un valor por defecto.");
					def.style.borderColor = "red";
					def.focus();
					
					return false;
				}else{
					def.style.borderColor = "black";
				}
				
				return true;
			}
			
			function TextBox(nombre,id,valor,indice,maxLenght,habilitado,soloLectura){
				var txt = document.createElement("input");
				
				txt.setAttribute("type","textbox");
				txt.setAttribute("name",nombre);
				txt.setAttribute("id",id);
				txt.setAttribute("value",valor);
				if(indice > 0){txt.setAttribute("tabIndex",indice);}
				if(maxLenght > 0){txt.setAttribute("maxLenght",maxLenght);}
				txt.setAttribute("enable",habilitado);
				txt.setAttribute("readonly",soloLectura);
				
				return txt;
			}
			
			function CheckBox(nombre,id,checkeado,indice,habilitado){
				var chk = document.createElement("input");
				
				chk.setAttribute("type","checkbox");
				chk.setAttribute("name",nombre);
				chk.setAttribute("id",id);
				if(checkeado){chk.setAttribute("checked",checkeado);}
				if(indice > 0){chk.setAttribute("tabIndex",indice);}
				//chk.setAttribute("disabled",habilitado);
				
				return chk;
			}
			
			function Label(id,valor){
				var lbl = document.createElement("label");
				
				lbl.setAttribute("id",id);
				lbl.innerHTML = valor;
				
				return lbl;
			}
			
			function Imagen(id,ruta,ttt){
				var img = document.createElement("img");
				
				img.setAttribute("id",id);
				img.setAttribute("src",ruta);
				img.setAttribute("alt",ttt);
				img.setAttribute("title",ttt);
				
				return img;
			}
		</script>
		
		<?$link = $objTodoSexo->DesConectar();?>
	</body>
</html>