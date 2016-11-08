function validarLogin()
{		

		var usuario=document.getElementById('usuario').value;
		var clave=document.getElementById('clave').value;
		var recordarme=document.getElementById('recordarme').checked;

		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"Ingresar",
				recordarme:recordarme,
				usuario:usuario,
				clave:clave},
				success: function (response) {
        		//Muestra tipo de Usuario
        		//alert(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			SetCookie();
		}
/*		,
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		}*/
		);
}


function desloguear()
{	
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
		accion:"Desloguear"},		
			success: function (response) {
        		$(location).attr('href', 'http://vera-eliana.esy.es/index.php');
			}
})
}

function mostrarLogin()
{	

	var elem = document.getElementById('usuario');
	elem.value = '';
	var elem2 = document.getElementById('clave');
	elem2.value = '';
		var elem = document.getElementById('login');
	if (elem.style.visibility == 'visible') {
	//elem.style.visibility = 'hidden';
}else{
	elem.style.visibility = 'visible';
	}
}

function testAdmin()
{	
	var elem = document.getElementById('usuario');
	elem.value = 'evera';
	var elem2 = document.getElementById('clave');
	elem2.value = '123';
		var elem = document.getElementById('login');
	if (elem.style.visibility == 'visible') {
	//elem.style.visibility = 'hidden';
}else{
	elem.style.visibility = 'visible';
	}
}

function testComun()
{	
	var elem = document.getElementById('usuario');
	elem.value = 'fdasilva';
	var elem2 = document.getElementById('clave');
	elem2.value = '123';
		var elem = document.getElementById('login');
	if (elem.style.visibility == 'visible') {
	//elem.style.visibility = 'hidden';
}else{
	elem.style.visibility = 'visible';
	}
}

function SetCookie()
{
	var usuario=document.getElementById('usuario').value;
	var clave=document.getElementById('clave').value;
	var recordarme=document.getElementById('recordarme').checked;

	$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"setCookie",
				recordarme:recordarme,
				usuario:usuario,
				clave:clave},
				success: function (response) {
        		$(location).attr('href', 'http://vera-eliana.esy.es/pagina_estacionados.php');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	.then(function si(exito)
	{	
		/*alert("ajax");
		$("#eli").html(exito);*/
	},
	function no(error)
	{
		//alert("ERROR!");
	});
}

function estacionar()
{		
		var patente=document.getElementById('patente').value;
		var playero=document.getElementById('playero').value;

		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"Estacionar",
				patente:patente,
				playero:playero},
				success: function (response) {
        		//alert(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			grillaEstacionados();
		},
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		});
}

function grillaEstacionados()
{		
		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"GrillaEstacionados"},
				success: function (data) {
				 //alert(data);	
				 $('#grillaEstacionados').empty();
        		 $('#grillaEstacionados').append(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
		});
		
}

function sacar()
{		
		var patente=document.getElementById('patente').value;

		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"Sacar",
				patente:patente},
				success: function (data) {
				//alert(data);
        		$('#divPrecio').empty();
        		$('#divPrecio').append(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			grillaEstacionados();
		},
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		});
}

function grillaImportes()
{		
		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"GrillaImportes"},
				success: function (data) {
				 //alert(data);	
				 $('#grillaImportes').empty();
        		 $('#grillaImportes').append(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
		});
}

/*function paginaImportes()
{
	$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"PaginaImportes"},
				success: function (response) {
        		$(location).attr('href', 'http://localhost:8080/TPProgramacion3/pagina_importes.php');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	.then(function si(exito)
	{	
		/*alert("ajax");
		$("#eli").html(exito);
	},
	function no(error)
	{
		//alert("ERROR!");
	});
}*/

function grillaUsuarios()
{		
		//alert('gri');
		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"GrillaUsuarios"},
				success: function (data) {
				 //alert(data);	
				 $('#grillaUsuarios').empty();
        		 $('#grillaUsuarios').append(data);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
		});
}


function guardarUsuario()
{		

		var nombre=document.getElementById('nombre').value;
		var apellido=document.getElementById('apellido').value;
		var tipo=document.getElementById('tipo').value;
		var usuario=document.getElementById('usuario').value;
		var clave=document.getElementById('clave').value;

		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"GuardarUsuario",
				nombre:nombre,
				apellido:apellido,
				tipo:tipo,
				usuario:usuario,
				clave:clave},
				success: function (response) {
        		//alert(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			grillaUsuarios();
		},
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		});
}


function BorrarUsuario(usuario)
{		
		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"BorrarUsuario",
				usuario:usuario},
				success: function (response) {
        		//alert(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			grillaUsuarios();
		},
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		});
}

function ModificarUsuario()
{		

		var usuario=document.getElementById('usuario').value;

		$.ajax({
			url:"nexo.php",
			type:"POST",
			data:{
				accion:"ModificarUsuario",
				usuario:usuario},
				success: function (response) {
        		alert(response);
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
		})
	   .then(function(datosCorrectos){
			grillaUsuarios();
		},
		function(datos){
		//alert("segundo");
		console.log("segundo",datos);
		});
}