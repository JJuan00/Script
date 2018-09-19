<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/main.scss">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">

		function ob_coo() {
			//var allCookie = document.cookie;
			/*console.log("Todas las cookies\n" + allCookie + "\n");
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			console.log(ca);*/
			//console.log(allCookie);
			/*$.getJSON('http://www.geoplugin.net/json.gp?jsoncallback=?', function(data) {
			  console.log(JSON.stringify(data, null, 2));
			});*/
        // solicitud por ajax para obtener el json con la ip
       /* $.post("http://jsonip.appspot.com/",function(data){
            $("#ip").html("Tu ip es: "+data.ip);
        },"json");*/
       /* if ("geolocation" in navigator){ //check geolocation available 
		    //try to get user current location using getCurrentPosition() method
		    navigator.geolocation.getCurrentPosition(function(position){ 
		            console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
		        });
		}else{
		    console.log("Browser doesn't support geolocation!");
		}
			
		}

		function get_ip(obj){
            document.getElementById('ipId').innerHTML = obj.ip;
        }*/
        var content = document.getElementById("geolocation-test");

	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(objPosition)
		{
			var lon = objPosition.coords.longitude;
			var lat = objPosition.coords.latitude;
			<?php
			$longitude = "<script> document.write(lon) </script>";
			//$latitude = "<script> document.write(lat) </script>";
			?>
			alert("<p><strong>Latitud:</strong> " + lat + "</p><p><strong>Longitud:</strong> " + lon + "</p>");
			
		}, function(objPositionError)
		{
			switch (objPositionError.code)
			{
				case objPositionError.PERMISSION_DENIED:
					content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
				break;
				case objPositionError.POSITION_UNAVAILABLE:
					content.innerHTML = "No se ha podido acceder a la información de su posición.";
				break;
				case objPositionError.TIMEOUT:
					content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
				break;
				default:
					content.innerHTML = "Error desconocido.";
			}
		}, {
			maximumAge: 75000,
			timeout: 15000
		});
	}
	else
	{
		alert("Su navegador no soporta la API de geolocalización.");
	}
}

	function ob_p() {
		<?php 
		echo "alert('hola');"?>

	}


	</script>

	<script type="text/javascript" src="https://api.ipify.org/?format=jsonp&callback=get_ip"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
</head>
<body onload="generar();">
	<?php
    /*$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
HTTP_CLIENT_IP
	echo $hostname;  NOMBRE PC*/

	/*$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
	echo $hostname;*/
?>
	<div>
		<section>
			<h3>¿C&oacute;mo sacar Cookies de un navegador?</h3>
			<p>En este caso seria con Javascript</p>
			<button onclick="ob_coo();ob_p();">Haciendo click aqui se obtiene la cookie</button>
			<p>Para mirar donde estoy ubicado <strong>window.location.pathname;</strong></p>
			<p>Para sacar las cookie variable = document.cookie, mas detalle <br><strong>var decodedCookie = decodeURIComponent(document.cookie);<br>
			var ca = decodedCookie.split(';');<br>
			console.log(ca);</strong></p>
			<button onclick="get_ip()">IP</button>
			Mi IP es: <strong id="ipId"></strong>
			<p>Protocolo <strong>window.location.protocol;</strong></p>
			<button id="my_location">Find Me</button>
			<br>
			<button onclick="generar();">Generar en el html</button>
			<div class="info" id="info"></div>
		</section>
	</div>
	<div>
		<section>
			<h3> A subtitle here</h3>
			<p>Lorem ipsum dooro iste jaknka kjuw kwispas njksdo nsddsiid ososijj por quiewmcs la beea no sabe como el versaomo a c lagrma facil java, pythnonj efuimero</p>
		</section>
	</div>
	<div>
		<section>
			<h3> A subtitle here</h3>
			<p>Lorem ipsum dooro iste jaknka kjuw kwispas njksdo nsddsiid ososijj por quiewmcs la beea no sabe como el versaomo a c lagrma facil java, pythnonj efuimero</p>
		</section>
	</div>

</body>
<script type="text/javascript">
	function generar() {
		var content = document.getElementById("geolocation-test");

		if (navigator.geolocation){
			navigator.geolocation.getCurrentPosition(function(objPosition)
			{
				var lon = objPosition.coords.longitude;
				var lat = objPosition.coords.latitude;
				document.getElementById("info").innerHTML = "Longitud: " + lon + " Latitud: " + lat;
			}, function(objPositionError)
			{
				switch (objPositionError.code)
				{
					case objPositionError.PERMISSION_DENIED:
						content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
					break;
					case objPositionError.POSITION_UNAVAILABLE:
						content.innerHTML = "No se ha podido acceder a la información de su posición.";
					break;
					case objPositionError.TIMEOUT:
						content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
					break;
					default:
						content.innerHTML = "Error desconocido.";
				}
			}, {
				maximumAge: 75000,
				timeout: 15000
			});
		}else{
			alert("Su navegador no soporta la API de geolocalización.");
		}
	}
</script>
</html>