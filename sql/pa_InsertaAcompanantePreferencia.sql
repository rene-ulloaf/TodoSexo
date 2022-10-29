Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaAcompanantePreferencia`//
Create Procedure todosexo.pa_InsertaAcompanantePreferencia(
	 In i_idAcompanante Int
	,In i_idPreferencia Int
)
Begin
	Insert Into preferenciaAcompanante(
		 idAcompanante
		,idPreferencia
	)Values(
		 i_idAcompanante
		,i_idPreferencia
	);
End //

Delimiter ;
