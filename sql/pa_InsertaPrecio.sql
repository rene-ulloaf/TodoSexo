Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaPrecio`//
Create Procedure todosexo.pa_InsertaPrecio(
	 In i_idAcompanante Int
	,In v_Periodo Varchar(200)
	,In v_Precio Varchar(10)
	,In b_Defecto TinyInt(1)
	,In b_Vigente TinyInt(1)
)
Begin
	Insert Into precio(
		 precio
		,periodo
		,defecto
		,vigente
		,idAcompanante
	)Values(
		 v_Precio
		,v_Periodo
		,b_Defecto
		,b_Vigente
		,i_idAcompanante
	);
End //

Delimiter ;
