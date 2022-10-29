Create Or Replace View vw_ObtenerFormasPago AS
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
;
