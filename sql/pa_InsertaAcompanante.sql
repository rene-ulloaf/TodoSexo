Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_InsertaAcompanante`//
Create Procedure todosexo.pa_InsertaAcompanante(
	 In i_idAcompanante Int
	,In i_idPlan Int
	,In v_nombre Varchar(100)
	,In v_apodo Varchar(50)
	,In v_eMail Varchar(50)
	,In v_telefono Varchar(15)
	,In d_fecNacimiento Date
	,In i_idPais Int
	,In s_estatura SmallInt
	,In v_medidas Varchar(11)
	,In s_idContextura SmallInt
	,In s_idSexo SmallInt
	,In s_idTextura SmallInt
	,In s_idColorOjos SmallInt
	,In s_idColorPelo SmallInt
	,In s_idDepilacion SmallInt
	,In v_slogan Varchar(50)
	,In v_ubicacion Varchar(500)
	,In b_vigente TINYINT(1)
	,In i_idUsuario Int
	,Out s_Id Int
)
Begin
	If i_idAcompanante = 0 Then
		/*Set i_idAcompanante = (Select IFNULL(max(idAcompanante),0) + 1 From Acompanantes);*/
		
		Insert Into acompanantes(
			 idAcompanante
			,nombre
			,apodo
			,slogan
			,telefono
			,eMail
			,nacionalidad
			,fecNacimiento
			,estatura
			,medidas
			,idContextura
			,idTextura
			,idColorOjos
			,idColorPelo
			,idDepilacion
			,Sexo
			,ubicacion
			,idPlan
			,vigente
			,fechaCreacion
			,idUsuario
		)VALUES(
			 i_idAcompanante
			,v_nombre
			,v_apodo
			,v_slogan
			,v_telefono
			,v_eMail
			,i_idPais
			,d_fecNacimiento
			,s_estatura
			,v_medidas
			,s_idContextura
			,s_idTextura
			,s_idColorOjos
			,s_idColorPelo
			,s_idDepilacion
			,s_idSexo
			,v_ubicacion
			,i_idPlan
			,b_vigente
			,CURDATE()
			,i_idUsuario
		);
		
		Set s_Id = last_insert_id(); 
	Else
		Update acompanantes
		Set nombre = v_nombre
			,apodo = v_apodo
			,slogan = v_slogan
			,telefono = v_telefono
			,eMail = v_eMail
			,medidas = v_medidas
			,idDepilacion = s_idDepilacion
			,Sexo = s_idSexo
			,ubicacion = v_ubicacion
			,idPlan = i_idPlan
			,vigente = b_vigente
		Where idAcompanante = i_idAcompanante;
		
		Set s_Id = i_idAcompanante;
	End If;
End //

Delimiter ;
