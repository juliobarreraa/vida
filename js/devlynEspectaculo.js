function doLogin()
{
	var nemp=parseInt($.trim($("#NumeroEmpleado").val()));
	if (isNaN(nemp) || nemp<0 || nemp>9999999)
	{
		alert("Numero de empleado no válido, por favor verifica");
		return;
	}
	$.ajax({
		url:logUrl,
		type:'post',
		dataType:'json',
		data:'id='+nemp,
		success:function(data){
			if (data.success=='1')
			{
				document.location.href='/respuestas/respuesta';
			}
			else
			{
				alert('Número de empleado no válido');
				return;
			}
		}
	});
}

function submitResponse()
{
	$("#frmRespuesta").submit();
}

function vota(id)
{
	$.ajax({
		url:'/respuestas/votaFoto/',
		type:'post',
		dataType:'json',
		data:'id='+id,
		success:function(data){
			if (data.success=='1')
			{
				alert("Se ha registrado tu voto. ¡Gracias!");
			}
			else
			{
				alert(data.errors);
				return;
			}
		}
	});
}

function saveTelonPosition(id)
{
	$.ajax({
		url:'/respuestas/saveTelon/'+parseInt(id),
		type:'post',
		dataType:'json',
		data:"x="+parseInt($("#FotoEnTelon").css("left"))+"&y="+parseInt($("#FotoEnTelon").css("top")),
		success:function(data){
			if (data.success=='1')
			{
				alert("Se ha enmarcado tu foto. ¡Gracias!");
				document.location.href="/";
			}
			else
			{
				alert(data.errors);
				return;
			}
		}
	});
}