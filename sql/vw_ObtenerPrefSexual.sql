Create Or Replace View vw_ObtenerPrefSexual As
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
;
