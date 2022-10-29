Create Or Replace View vw_ObtenerEstilos As
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
;