Create Or Replace View vw_ObtenerDatosTipoFoto As
	SELECT
    	 a.idAcompanante
    	,tf.idTipoFoto
		,ptf.altoImg
        ,ptf.anchoImg
        ,ptf.cantidadFotos As maxFotos
        ,(Select count(idFoto) From fotos Where idAcompanante = a.idAcompanante And tipo = tf.idTipoFoto And vigente = true) As cantFotos
        ,(Select count(idFoto) From fotos Where idAcompanante = a.idAcompanante And tipo = tf.idTipoFoto) As cantFotosSubidas
        ,tf.descripcion
    From planes p
    Join acompanantes a On p.idPlan = a.idPlan
    Join planTipoFoto ptf On p.idPlan = ptf.idPlan
    Join tipo_foto tf On ptf.idTipoFoto = tf.idTipoFoto
    Where a.vigente = true
;