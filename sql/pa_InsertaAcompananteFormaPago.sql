Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaAcompananteFormaPago`//
Create Procedure todosexo.pa_InsertaAcompananteFormaPago(
	 In i_idAcompanante Int
	,In i_idFormaPago Int
)
Begin
	Insert Into formaPagoAcompanante(
		 idAcompanante
		,idFormaPago
	)Values(
		 i_idAcompanante
		,i_idFormaPago
	);
End //

Delimiter ;
