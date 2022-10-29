Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaFoto`//
Create Procedure todosexo.pa_InsertaFoto(
	 In i_idAcompanante Int
	,In v_ruta Varchar(500)
	,In i_tipo Int
	,In b_Vigente TinyInt(1)
)
Begin
	Insert Into fotos(
		 idAcompanante
		,ruta
		,tipo
		,vigente
	)Values(
		 i_idAcompanante
		,v_ruta
		,i_tipo
		,b_Vigente
	);
End //

Delimiter ;
