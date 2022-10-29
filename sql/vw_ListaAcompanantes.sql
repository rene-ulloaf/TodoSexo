Create Or Replace View vw_ListaAcompanantes As
    Select
		 a.idAcompanante
        ,a.nombre
        ,a.telefono
        ,a.eMail
        ,Case When a.sexo = 1 Then p.gentilicioMasc Else p.gentilicioFem End As Nacionalidad
        ,pl.nombre As plan
        ,(Select count(idFoto) From fotos where idAcompanante = a.idAcompanante And tipo = 1 And vigente = true) As imgThumbnail
        ,(Select count(idFoto) From fotos where idAcompanante = a.idAcompanante And tipo = 2 And vigente = true) As img
        ,ptf.cantidadFotos
        ,a.vigente
        ,DATE_FORMAT(a.fechaCreacion,'%d/%m/%Y') As fechaCreacion
        ,a.idUsuario
    From acompanantes a
    Join paises p On a.nacionalidad = p.idPais
    Join planes pl On a.idPlan = pl.idPlan
    Join planTipoFoto ptf On a.idPlan = ptf.idPlan And ptf.idTipoFoto = 2
;