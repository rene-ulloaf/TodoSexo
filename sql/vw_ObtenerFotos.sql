Create Or Replace View vw_ObtenerFotos As
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
	Order By tf.idTipoFoto
;