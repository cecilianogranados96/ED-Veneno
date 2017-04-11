<?php
	if(isset($_GET['turno'])){
		$turno = $_GET['turno']; 
	}else{
		$turno = 0; 
	}
	if(isset($_GET['jugador'])){
		$jugador = $_GET['jugador']; 
		$nombre_jugador = $_GET['J'.$_GET['jugador'].''];
	}else{
		$jugador = 0;
		$nombre_jugador = $_GET['J0'];
	}
	$mantener_jugadores = "";
	for($x=0;$x<$_GET['jugadores'];$x++){
			$mantener_jugadores = $mantener_jugadores."J$x=".$_GET["J$x"]."&";
	}
	$url_juego = "juego.php?".$mantener_jugadores."&turno=".($turno+1)."&jugador=".($jugador+1)."&jugadores=".($_GET['jugadores']);
?>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,300" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/cartas.css" />
		<script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>
		<script src="js/juego.js"></script>
		
		<script>
		$(document).ready(function () {
			$("#caldero1").each(function( index ) {
			  console.log( $(this) );
			});
		});
		
		</script>
	</head>
	<body class="demo-2" style="overflow-x: hidden; overflow-y: hidden;" >
		<main>
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">Atras</a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php">Ayuda</a>
			</div>
			<a class="anterior" id="anterior" href="anterior.php" ><center>Anterior</center></a>
			<a class="siguiente" id="siguiente" href="anterior.php" ><center>Siguiente</center></a>
			<a class="jugar" id="jugar" href="<?php echo $url_juego; ?>"><center>Jugar</center></a>
			<center>
				<h1 class="codrops-header__title"><?php echo $nombre_jugador;?></h1>
			</center>
			<div class="puntos">
				<h1>Ronda</h1><br>
				<h1><center><?php echo $turno;?></center></h1><hr>
				<h1>Turno</h1><br>
				<h1><center><?php echo $turno;?></center></h1><hr>
				<h1>Puntos</h1><br>
				<h1><center>0</center></h1>
					<!--PUNTOS 2-->
			</div>
			<div class="calero1 caldero" id="caldero1">	  
				<img src="img/cartas/2C.png" id="2C" class="dock_cartas">
				<img src="img/cartas/KP.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/2T.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/KT.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/2C.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/KP.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/2T.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/KP.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/2T.png" id="drag1" class="dock_cartas">
			</div>
			<div class="calero2 caldero" id="caldero2">
				<!--CALDERO 2-->
			</div>
			<div class="calero3 caldero" id="caldero3">
				<!--CALDERO 3-->
			</div>			
			<center>
				<div class="dock caldero" id="dock_cartas">
					<img src="img/cartas/5C.png" id="D1" class="dock_cartas inbound">
					<img src="img/cartas/2P.png" id="D1" class="dock_cartas inbound">
					<img src="img/cartas/6p.png" id="D1" class="dock_cartas inbound">
					<img src="img/cartas/8p.png" id="D1" class="dock_cartas inbound">
					<img src="img/cartas/3P.png" id="D1" class="dock_cartas inbound">
				</div>
			<center>
		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/main.js"></script>
		<script src="js/lineas_juego.js"></script>
	</body>
</html>