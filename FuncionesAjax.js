function validarLogin()
{		
	alert("ajax");
		var usuario=document.getElementById('usuario').value;
		var varClave=document.getElementById('clave').value;
		var recordarme=document.getElementById('recordarme').value; //.is(':checked');
	
		alert("ajax");

		$.ajax({
			url:"nexo.php",
			type:"post",
			data:{
				accion:"Ingresar",
				recordarme:recordarme,
				usuario:usuario,
				clave:clave}
		})
	.then(function(datosCorrectos){
		alert("primero");
	},
	function(datos){
		//alert("segundo");
		console.log("segundo",datos);
	});

	/*var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			accion:"Ingresar",
			recordarme:recordarme,
			//usuario:varUsuario,
			clave:varClave
		}
	});

	funcionAjax.done(function(retorno){
		alert(retorno);
			/*if(retorno!="No-esta"){	
				MostarBotones();
				MostarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#usuario").val("usuario: "+retorno);
			}else
			{
				$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}*/
	/*});
	funcionAjax.fail(function(retorno){
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	*/
}


function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			MostarBotones();
			MostarLogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});	
}

/*function SetCookie()
{
	

	var user = document.getElementById('usuario').value;
	console.log(user);
	$.ajax({
		url :"nexo.php",
		type : "post",
		data: { queHacer:"setCookie",
				usuario : user}
		})
	.then(function si(exito)
	{	
		alert("ajax");
		$("#eli").html(exito);
	},
	function no(error)
	{
		alert("ERROR!");
	});
}*/