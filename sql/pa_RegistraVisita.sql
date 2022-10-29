Delimiter //

--DROP PROCEDURE IF EXISTS `todosexo`.`pa_RegistraVisita`//
Create Procedure todosexo.pa_RegistraVisita(
	 In v_sistOperativo Varchar(20)
	,In v_explorador Varchar(30)
    ,In v_version Varchar(20)
    ,In b_beta BIT
    ,In b_js BIT
    ,In b_java BIT
    ,In b_cookies BIT
    ,In b_activex BIT
    ,In b_ajax BIT
    ,In v_ip Varchar(20)
    ,In v_mac Varchar(20)
    ,In v_pais Varchar(10)
)
Begin
	Insert Into visitas(
		 fecha
		,SistemaOperativo
        ,Explorador
        ,Version
        ,Beta
        ,Javascript
  		,JavaApplets
  		,Cookies
  		,ActivexControls
  		,Ajax
	  	,IP
	  	,MacAddress
  		,Pais
	)Values(
    	 CURDATE()
		,v_sistOperativo
		,v_explorador
    	,v_version
    	,b_beta
	    ,b_js
	    ,b_java
	    ,b_cookies
    	,b_activex
	    ,b_ajax
	    ,v_ip
    	,v_mac
	    ,v_pais
	);
End //

Delimiter ;
