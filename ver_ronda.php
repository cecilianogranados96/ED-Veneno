<?php
	session_start();
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
	</head>
	<body class="demo-2">
	<!--DATOS QUE USA JQUERRY PARA MANEJO-->
	
		<main>
			<!--MANEJO-->
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">Atrás</a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php">Ayuda</a>
			</div>
			
			<a class="atras" id="atras" href="juego.php?jugadores=<?php echo $_GET['jugadores']; ?>&jugador=<?php echo $_GET['jugador']; ?>" >
			<center>Regresar al juego</center>
			</a>
			
			
			<h1 class="codrops-header__title"><center>RONDAS</center></h1>
			<!--BUSQUEDA-->


<?php
	for($x=0;$x<$_SESSION["jugadores"];$x++){
	$_GET['nombre'] = $x;
	include("Logica/datos_ronda.php");
	$result = explode("~", $result);
	$venenos = explode("-", $result[2]);
	//print_r($venenos);
	$cartas = "";
	for($i=0;$i<count($venenos)-1;$i++){
		$venenos_d = explode(":", $venenos[$i]);
		$cartas = $cartas + "<img src='img/cartas/".$venenos_d[1]."".$venenos_d[0].".png' class='dock_cartas inbound'>" ;
	}
	echo '<center>
				<div class="dock2 caldero" id="dock_cartas">
				<h1 id="nombre_jugador" style="color:#000000;">Jugador : '.$result[0].'</h1>
				<h1 id="venenos" style="color:#000000;">Venenos : '.$result[1].'</h1>';
	for($i=0;$i<count($venenos)-1;$i++){
		$venenos_d = explode(":", $venenos[$i]);
		echo "<img src='img/cartas/".$venenos_d[1]."".$venenos_d[0].".png' class='dock_cartas inbound'>" ;
	}
	echo '
				
				</div>
			<center>';
	}
?>
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