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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
		<style>
		.c1{
			z-index: 1;
			position: static;
		}
		.c2{
			z-index: 2;
			position: relative;
			margin-top: -135%;
		}
		.c3{
			z-index: 0;
			position: relative;
		}
		</style>
		<script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>
		<script>
			$(document).ready(function () {
				$('#caldero1').disableSelection();
				$('#caldero1').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#jugar').unbind('click');
						$('#dock_cartas').sortable("disable");
						$("#caldero1").sortable( "option", "revert", false );
					}	
				});
				
				$('#caldero2').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#dock_cartas').sortable("disable");
						$('#jugar').unbind('click');
						$("#caldero1").sortable( "option", "revert", false );
					}
				});
				
				$('#caldero3').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#dock_cartas').sortable("disable");
						$('#jugar').unbind('click');
						$("#caldero1").sortable( "option", "revert", false );
					}
				});
				
				$('#dock_cartas').sortable({
					revert: 'invalid',
					connectWith: "#caldero1, #caldero2,#caldero3",
					items: "img.inbound"
				});
				$('#jugar').bind('click', function(e){
						e.preventDefault();
						alert('mueve una carta');
				})

				//Ordea en caso de que ya se encuentren
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
	
						$('#caldero2 img:nth-child(1)').addClass('c1');
						$('#caldero2 img:nth-child(2)').addClass('c2');
						$('#caldero2 img:nth-child(3)').addClass('c2');
						$('#caldero2 img:nth-child(4)').addClass('c2');
						$('#caldero2 img:nth-child(5)').addClass('c2');
						$('#caldero2 img:nth-child(6)').addClass('c2');
						$('#caldero2 img:nth-child(7)').addClass('c2');
						$('#caldero2 img:nth-child(8)').addClass('c2');
						
						$('#caldero3 img:nth-child(1)').addClass('c1');
						$('#caldero3 img:nth-child(2)').addClass('c2');
						$('#caldero3 img:nth-child(3)').addClass('c2');
						$('#caldero3 img:nth-child(4)').addClass('c2');
						$('#caldero3 img:nth-child(5)').addClass('c2');
						$('#caldero3 img:nth-child(6)').addClass('c2');
						$('#caldero3 img:nth-child(7)').addClass('c2');
						$('#caldero3 img:nth-child(8)').addClass('c2');
				
			});
		</script>
	</head>
	<body class="demo-2" style="overflow-x: hidden; overflow-y: hidden;" >
		<main>
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">atras</a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php">ayuda</a>
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
				<img src="img/cartas/2C.png" id="drag1" class="dock_cartas">
				<img src="img/cartas/2P.png" id="drag1" class="dock_cartas">

			</div>
			
			<div class="calero2 caldero" id="caldero2">
				<!--CALDERO 2-->
			</div>
			<div class="calero3 caldero" id="caldero3">
				<!--CALDERO 3-->
			</div>			

			
			
			
			<center>
			<div class="dock caldero" id="dock_cartas">
						<img src="img/cartas/2C.png" id="D1" class="dock_cartas inbound">
						<img src="img/cartas/2P.png" id="D1" class="dock_cartas inbound">
						<img src="img/cartas/2D.png" id="D1" class="dock_cartas inbound">
						<img src="img/cartas/2T.png" id="D1" class="dock_cartas inbound">
						<img src="img/cartas/3P.png" id="D1" class="dock_cartas inbound">
		</div>
				<center>
					
					
					
					
				</main>
				<script src="js/anime.min.js"></script>
				<script src="js/main.js"></script>
				<script>
					(function() {
						var lineMaker = new LineMaker({
							position: 'fixed',
							lines: [
							{top: 0, left: '10vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 0, direction: 'TopBottom' }},
							{top: 0, left: '20vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 20, direction: 'TopBottom' }},
							{top: 0, left: '30vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 40, direction: 'TopBottom' }},
							{top: 0, left: '40vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 60, direction: 'TopBottom' }},
							{top: 0, left: '50vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 80, direction: 'TopBottom' }},
							{top: 0, left: '60vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 100, direction: 'TopBottom' }},
							{top: 0, left: '70vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 120, direction: 'TopBottom' }},
							{top: 0, left: '80vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 140, direction: 'TopBottom' }},
							{top: 0, left: '90vw', width: 1, height: '100%', color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 160, direction: 'TopBottom' }},
							{top: '10vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 20, direction: 'LeftRight' }},
							{top: '20vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 40, direction: 'LeftRight' }},
							{top: '30vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 60, direction: 'LeftRight' }},
							{top: '40vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 80, direction: 'LeftRight' }},
							{top: '50vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 100, direction: 'LeftRight' }},
							{top: '60vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 120, direction: 'LeftRight' }},
							{top: '70vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 140, direction: 'LeftRight' }},
							{top: '80vh', left: 0, width: '100%', height: 1, color: '#7599E4', hidden: true, animation: { duration: 1000, easing: 'easeInOutSine', delay: 160, direction: 'LeftRight' }},
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
		