Create Or Replace View vw_DetalleAcompanante As
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
	Where a.vigente = 1
;
