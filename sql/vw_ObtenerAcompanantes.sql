Create Or Replace View vw_ObtenerAcompanantes As
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
;