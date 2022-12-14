Create Or Replace View vw_datosAcompanante As
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
;