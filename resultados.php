<?php
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Mostrar resultados de los jugadores
#
# Parametros:
# ===========
#
# - Variable session de jugadores
# - Variable session de ronda
#
# Desarrollo:
# 
# - Jose Andres Ceciliano Granados
#
#
#########################################################################################
	session_start();
?>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
	</head>
	<body class="demo-6">
		<main>
			<center>
			<a class="atras2" id="atras2" href="configuracion.php" >
			<center>Nuevo Juego</center>
			</a>
			<!--RONDAS-->
			<?php
			for ($e=0;$e<$_SESSION["ronda"];$e++){
				echo '<h1 class="codrops-header__title"><center>RONDA : '.($e+1).'</center></h1>';
				for($x=0;$x<$_SESSION["jugadores"];$x++){
					$_GET['nombre'] = $x;
					include("Logica/datos_ronda.php");
					$result = explode("~", $result);
					$venenos = explode("-", $result[2]);
					$comidas = explode("-", $result[2]);
					echo '<center>
								<div class="dock2 caldero" id="dock_cartas">
								<h1 id="nombre_jugador" style="color:#000000;">Jugador : '.$result[0].'</h1>
								<h1 id="venenos" style="color:#000000;">Venenos : '.$result[1].'</h1>';
					for($i=0;$i<count($venenos)-1;$i++){
						$venenos_d = explode(":", $venenos[$i]);
						echo "<img src='img/cartas/".$venenos_d[1]."".$venenos_d[0].".png' class='dock_cartas inbound'>" ;
					}
					echo '<h1 id="venenos" style="color:#000000;">Comidas : '.$result[1].'</h1>';
					for($i=0;$i<count($venenos)-1;$i++){
						$comidas_d = explode(":", $comidas[$i]);
						echo "<img src='img/cartas/".$comidas_d[1]."".$comidas_d[0].".png' class='dock_cartas inbound'>" ;
					}
					echo '		</div>
						  <center>';
				}
			}
			?>
			<br><hr><br>
		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script>
		(function() {
			var lineMaker = new LineMaker({
					parent: { element: document.body, position: 'append' },
					position: 'fixed',
					lines: [
						{top: 0, left: '0', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 0, direction: 'TopBottom' }},
						{top: 0, left: '20vw', width: '20vw', height: '100vh', color: '#fff', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 150, direction: 'BottomTop' }},
						{top: 0, left: '40vw', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 300, direction: 'TopBottom' }},
						{top: 0, left: '60vw', width: '20vw', height: '100vh', color: '#fff', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 450, direction: 'BottomTop' }},
						{top: 0, left: '80vw', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 600, direction: 'TopBottom' }}
					]
			});
			setTimeout(function() {
				lineMaker.animateLinesOut();
			}, 500);
		})();
		</script>
	</body>
</html>
