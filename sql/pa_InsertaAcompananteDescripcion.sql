Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaAcompananteDescripcion`//
Create Procedure todosexo.pa_InsertaAcompananteDescripcion(
	 In i_idAcompanante Int
	,In v_descripcion Varchar(1000)
)
Begin
	/*If i_idAcompanante = 0 Then
	
	Else
	
	End If;*/
	
	Insert Into acompananteDescripcion(
		 idAcompanante
		,descripcion
	)Values(
		 i_idAcompanante
		,v_descripcion
	);
End //

Delimiter ;
