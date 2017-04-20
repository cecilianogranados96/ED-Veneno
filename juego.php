<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Controladora de juego
#
# Parametros:
# ===========
#
# - Variable de jugadores actuales
# - Variable de jugador actual.
#
# Desarrollo por:
# ===========
# 
# - Jose Andres Ceciliano Granados
#
# Verificado por:
# ===========
# 
# - Silvia Calderón
#########################################################################################
	session_start();
	include("Logica/cant_jugadores.php");
	if ($cant_jugadores == 1){
		echo "<script>window.location='resultados.php'</script>";
	}
	if ($_GET['jugadores']-1 == $_GET['jugador']){
		$url_juego = "juego.php?jugadores=".$cant_jugadores."&jugador=0";
		$url_juego2 = "ver_ronda.php?jugadores=".$cant_jugadores."&jugador=0&cam=1";
	}else{
		$url_juego = "juego.php?jugadores=".$_GET['jugadores']."&jugador=".($_GET['jugador']+1);
		$url_juego2 = "ver_ronda.php?jugadores=".$_GET['jugadores']."&jugador=".($_GET['jugador']+1)."&cam=1";
	}	
	
	include("Logica/ver_ronda.php");
	//$_SESSION["ronda"] = 2; 
	if(!isset($_SESSION["ronda"])){
		$_SESSION["ronda"] = $ronda;
	}else{
		if ($_SESSION["ronda"] != $ronda){
			//header("Location: ver_ronda.php?jugadores=".$cant_jugadores."&jugador=0");
			break;
		}
	}
?>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/loading.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,300" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/cartas.css" />
		<!--<script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>-->
		<script src="js/juego.js"></script>
		<script>
			$.post('Logica/nombre.php',{nombre: <?php echo $_GET['jugador']; ?> },function( data ) {
				var x = data.split("-");
				$("#nombre_jugador").text(x[0]);
				$("#ronda").text(x[1]);
				$("#venenos").text(x[2]);
				$("#cartas_mazo").text("Pozo:" + x[3]);
				$.post('Logica/cartas_mano.php',{id:  <?php echo $_GET['jugador']; ?> },function(data2){
					var x = data2.split("-");
					for (i=0;i<x.length-1;i++){
						var S = x[i].split(":");
						$("#dock_cartas").append('<img src="img/cartas/'+S[1]+S[0]+'.png" id="'+S[1]+S[0]+'" type="'+i+'" class="dock_cartas inbound">');	
					}
					$.post('Logica/calderos.php',{id: 1 },function(data2){
						var x = data2.split("-");
						for (i=0;i<x.length-1;i++){
							var S = x[i].split(":");
							$("#caldero1").append('<img src="img/cartas/'+S[1]+S[0]+'.png" id="'+S[1]+S[0]+'"  class="dock_cartas">');	
						}
						$.post('Logica/calderos.php',{id: 2 },function(data2){
							var x = data2.split("-");
							for (i=0;i<x.length-1;i++){
								var S = x[i].split(":");
								$("#caldero2").append('<img src="img/cartas/'+S[1]+S[0]+'.png" id="'+S[1]+S[0]+'"  class="dock_cartas">');	
							}
							$.post('Logica/calderos.php',{id: 3 },function(data2){
								var x = data2.split("-");
								for (i=0;i<x.length-1;i++){
									var S = x[i].split(":");
									$("#caldero3").append('<img src="img/cartas/'+S[1]+S[0]+'.png" id="'+S[1]+S[0]+'"  class="dock_cartas">');	
								}
								$("#caldero1").order1();
								$("#caldero2").order2();
								$("#caldero3").order3();
								console.log("TERMINE DE CARGAR");
								$("#bg_load").remove();
								$("#wrapper").remove();
								$(".bg_load").fadeOut("slow");
								$(".wrapper").fadeOut("slow");
								
							});
						});
					});
				});
			});	
			
		function reset() {
			alert("Reset Realizado");
			
		};
		function anterior() {
			$.post('Logica/undo_redo.php',{mensaje: 12 },function(data2){
				alert("Undo Realizado");
				location.reload();
			});
		};
		function siguiente() {
			$.post('Logica/undo_redo.php',{mensaje: 11 },function(data2){
				alert("Redo Realizado");
				location.reload();
			});
		};

		function buscar(texto){
			$("#busqueda").css("display", "block");
			//texto.value
			$("#busqueda span").text("Jugador 1");
			texto.value = "";
			setTimeout(function() {
				$("#busqueda").fadeOut("slow");
			}, 1000);
		}

		
		
	</script>
	</head>
	<body class="demo-2" style="overflow-x: hidden; overflow-y: hidden;">
	<!--JQUERRY CARGA-->
	<div class="bg_load-"></div>
	<div class="wrapper">
		<div class="inner">
			<span>V</span>
			<span>e</span>
			<span>n</span>
			<span>e</span>
			<span>n</span>
			<span>o</span>
		</div>
	</div>
	<!--DATOS QUE USA JQUERRY PARA MANEJO-->
	<input type='text' id='jugadores' value="<?php echo $cant_jugadores; ?>" hidden>
	<input type='text' id='jugador' value="<?php echo $_GET['jugador']; ?>" hidden>
		<main>
			<!--MANEJO-->
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">Atrás</a>
				<a class="codrops-icon codrops-icon--drop" href="Manual/index.html" target="_black">Ayuda</a>
			</div>
			<div class="cartas_mazo" id="cartas_mazo"></div>
			<!--BUSQUEDA-->
			<div class="buscar" id="buscar">
				  <input type="text" class="form-control" name="carta" placeholder="Buscar Carta..." onchange="buscar(this);">
			</div>
			<div class="busqueda" id="busqueda"><center>La tiene:<br><span>Jugador #1</span></center></div>
			<!--OPCIONES-->
			<a class="reset" id="reset" onclick="reset();"><center>Reset</center></a>
			<a class="anterior" id="anterior" onclick="anterior();"><center>Undo</center></a>
			<a class="siguiente" id="siguiente" onclick="siguiente();" ><center>Redo</center></a>
			<a class="jugar" id="jugar" href="<?php echo $url_juego; ?>"><center>Jugar</center></a>
			<center>
				<!--NOMBRE DEL JUGADOR-->
				<h1 class="codrops-header__title" id="nombre_jugador"></h1>
			</center>
			<div class="puntos">
				<!--PUNTOS-->
				<h1><center>Ronda</center></h1><br>
				<h1><center id="ronda">Ronda</center></h1><hr>
				<h1><center>Turno</center></h1><br>
				<h1><center><?php echo $_GET['jugador']+1; ?></center></h1><hr>
				<h1><center>Venenos</center></h1><br>
				<h1><center id="venenos">Venenos</center></h1>
			</div>
			
			<?php 
			/*	
			if(!isset($_SESSION["ronda"])){
				$_SESSION["ronda"] = $ronda;
			}else{
				if ($_SESSION["ronda"] == $ronda){
			?>
				<a class="ver_jugador" id="ver_jugador" href="ver_ronda.php?jugadores=<?php echo $cant_jugadores; ?>&jugador=<?php echo $_GET['jugador']; ?>" ><center>Ver Ronda</center></a>
			<?php
				}else{
					echo "NOOO";
				}
			}
			*/
			?>
			
			<a class="ver_jugador" id="ver_jugador" href="ver_ronda.php?jugadores=<?php echo $cant_jugadores; ?>&jugador=<?php echo $_GET['jugador']; ?>" ><center>Ver Ronda</center></a>
		
			<div class="calero1 caldero" id="caldero1">	  	
				<!--CALDERO 1-->
			</div>
			<div class="calero2 caldero" id="caldero2">			
				<!--CALDERO 2-->
			</div>
			<div class="calero3 caldero" id="caldero3">
				<!--CALDERO 3-->
			</div>			
			<center>
				<div class="dock caldero" id="dock_cartas">
					<!--DOCK CARTAS-->	
				</div>
			<center>
		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/main.js"></script>
		<script>	
		(function() {
			var lineMaker = new LineMaker({
				position: 'fixed',
				lines: [
				{top: 0, left: '10vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 0, direction: 'TopBottom' }},
				{top: 0, left: '30vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 20, direction: 'TopBottom' }},
				{top: 0, left: '50vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 40, direction: 'TopBottom' }},
				{top: 0, left: '70vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 60, direction: 'TopBottom' }},
				{top: 0, left: '90vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 80, direction: 'TopBottom' }},
				{top: '10vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 20, direction: 'LeftRight' }},
				{top: '30vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 40, direction: 'LeftRight' }},
				{top: '50vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 60, direction: 'LeftRight' }},
				{top: '70vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 80, direction: 'LeftRight' }},
				{top: '90vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 180, direction: 'LeftRight' }}
				]
			});		
			setTimeout(function() {
				lineMaker.animateLinesIn();
				}, 500);
			})();
		</script>
	</body>
</html>