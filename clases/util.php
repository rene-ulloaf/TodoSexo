<?PHP
	class Util{
		function Util(){
			date_default_timezone_set('UTC');
		}
		
		function validaRut($rut){
			$tur = strrev($rut);
			$mult = 2;
			
			for ($i = 0; $i <= strlen($tur); $i++){
				if ($mult > 7){
					$mult = 2;
				}
				
				$suma = $mult * substr($tur, $i, 1) + $suma;
				$mult = $mult + 1;
			}
			
			$valor = 11 - ($suma % 11);
			
			if ($valor == 11){
				$codigo_veri = "0";
			}elseif ($valor == 10){
				$codigo_veri = "k";
			}else{
				$codigo_veri = $valor;
			}
			
			return $codigo_veri;
		}
		
		// Calcula la edad (formato: año/mes/dia)
		function Edad($fecha_nacimiento){
			//Fecha actual
			$fecha_actual = date('Y/m/d');
			
			//cálculo de mi edad
			return ($fecha_actual - $fecha_nacimiento);
		}
		
		function ValidaEmail($email){
			$res = ereg(
				'^[a-z0-9]+([\.]?[a-z0-9_-]+)*@'.// usuario
				'[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,}$', // server.
				$email
			);
			
			return $res;
		}
		
		function GuardarError($error,$codigoError,$pagina,$linea){
			if(!is_dir("bitacora")){
				mkdir("bitacora", 0777); 
			}
			
			$ddf = fopen("bitacora/error.log","a"); 
			
			fwrite($ddf,"Error: " .$error. " - Código: " . $codigoError. " - Página: " . $pagina . " - Linea: " . $linea . " - fecha: " .date("d-m-Y H:i:s") . "\r\n"); 
			fclose($ddf); 
		}
		
		function returnMacAddress(){
			// This code is under the GNU Public Licence
			// Written by michael_stankiewicz {don't spam} at yahoo {no spam} dot com
			// Tested only on linux, please report bugs
			
			// WARNING: the commands 'which' and 'arp' should be executable
			// by the apache user; on most linux boxes the default configuration
			// should work fine
			
			// Get the arp executable path
			$location = `which arp`;
			// Execute the arp command and store the output in $arpTable
			$arpTable = `$location`;
			// Split the output so every line is an entry of the $arpSplitted array
			$arpSplitted = split("\n",$arpTable);
			// Get the remote ip address (the ip address of the client, the browser)
			$remoteIp = $GLOBALS['REMOTE_ADDR'];
			// Cicle the array to find the match with the remote ip address
			foreach($arpSplitted as $value) {
				// Split every arp line, this is done in case the format of the arp
				// command output is a bit different than expected
				$valueSplitted = split(" ",$value);
				foreach($valueSplitted as $spLine) {
					if(preg_match("/$remoteIp/",$spLine)){
						$ipFound = true;
					}
					// The ip address has been found, now rescan all the string
					// to get the mac address
					if($ipFound){
						// Rescan all the string, in case the mac address, in the string
						// returned by arp, comes before the ip address
						// (you know, Murphy's laws)
						reset($valueSplitted);
						foreach($valueSplitted as $spLine){
							if(preg_match("/[0-9a-f][0-9a-f][:-]".
							"[0-9a-f][0-9a-f][:-]".
							"[0-9a-f][0-9a-f][:-]".
							"[0-9a-f][0-9a-f][:-]".
							"[0-9a-f][0-9a-f][:-]".
							"[0-9a-f][0-9a-f]/i",$spLine)) {
								return $spLine;
							}
						}
					}
					$ipFound = false;
				}
			}
			
			Return false;
		}
		
		function ObtenerPais($IPADDRESS){
			/// CODIGO CREADO Y OFRECIDO POR TUTORES.ORG
			//$IPADDRESS = $_SERVER["REMOTE_ADDR"];
			//$archivo_xml = "http://api.hostip.info/get_xml.php?ip=192.168.1.241";
			$archivo_xml = "http://api.hostip.info/get_xml.php?ip=". $IPADDRESS;
			$procedencia_xml = file_get_contents ($archivo_xml);
			
			if(empty($procedencia_xml)){
				Return "SIN PAIS";
			}else{
				preg_match_all("|<Hostip>(.*)</Hostip>|sU", $procedencia_xml, $items);
				$lista_nodos = array();
				
				foreach ($items[1] as $key => $item){
					preg_match("|<gml:name>(.*)</gml:name>|s", $item, $mi_lugar);
					preg_match("|<countryName>(.*)</countryName>|s", $item, $mi_pais);
					preg_match("|<countryAbbrev>(.*)</countryAbbrev>|s", $item, $mi_sigla);
					
					$lista_nodos[$key]['mi_lugar'] = $mi_lugar[1];
					$lista_nodos[$key]['mi_pais'] = $mi_pais[1];
					$lista_nodos[$key]['mi_sigla'] = $mi_sigla[1];
				}
				/*for ($i = 0; $i < 1; $i++) 
				{
					echo "Pais = ". $lista_nodos[$i]['mi_pais']."<br>";
					echo "Lugar = ". $lista_nodos[$i]['mi_lugar']."<br>";
					echo "Sigla = ". $lista_nodos[$i]['mi_sigla']."<br>";
				}*/
				$procedencia_xml = "";
				
				Return $lista_nodos[0]['mi_sigla'];
			}
		}
	}
?>