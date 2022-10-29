Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaAcompananteEstilo`//
Create Procedure todosexo.pa_InsertaAcompananteEstilo(
	 In i_idAcompanante Int
	,In i_idEstilo Int
)
Begin
	Insert Into estiloAcompanante(
		 idAcompanante
		,idEstilo
	)Values(
		 i_idAcompanante
		,i_idEstilo
	);
End //

Delimiter ;
