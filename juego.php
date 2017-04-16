<?php
	if ($_GET['jugadores']-1 == $_GET['jugador']){
		$url_juego = "juego.php?jugadores=".$_GET['jugadores']."&jugador=0";
	}else{
		$url_juego = "juego.php?jugadores=".$_GET['jugadores']."&jugador=".($_GET['jugador']+1)."";
	}	
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
		<!--<script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>-->
		<script src="js/juego.js"></script>
	<script>
			$.post('Logica/nombre.php',{nombre: <?php echo $_GET['jugador']; ?> },function( data ) {
				$("#nombre_jugador").text(data);
				$.post('Logica/cartas_mano.php',{id:  <?php echo $_GET['jugador']; ?> },function(data2){
					var x = data2.split("-");
					console.log(x);
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
								console.log("CARTAS:" + data2);
								var x = data2.split("-");
								for (i=0;i<x.length-1;i++){
									var S = x[i].split(":");
									$("#caldero3").append('<img src="img/cartas/'+S[1]+S[0]+'.png" id="'+S[1]+S[0]+'"  class="dock_cartas">');	
								}
								$("#caldero1").order1();
								$("#caldero2").order2();
								$("#caldero3").order3();
								console.log("TERMINE DE CARGAR");
							});
						});
					});
				});
			});
	</script>
	</head>
	<body class="demo-2" style="overflow-x: hidden; overflow-y: hidden;" >
	<input type='text' id='jugadores' value="<?php echo $_GET['jugadores']; ?>" hidden>
	<input type='text' id='jugador' value="<?php echo $_GET['jugador']; ?>" hidden>
		<main>
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">Atras</a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php">Ayuda</a>
			</div>
			<!--OPCIONES-->
			<a class="anterior" id="anterior" href="anterior.php" ><center>Anterior</center></a>
			<a class="siguiente" id="siguiente" href="anterior.php" ><center>Siguiente</center></a>
			<a class="jugar" id="jugar" href="<?php echo $url_juego; ?>"><center>Jugar</center></a>
			<center>
				<!--NOMBRE DEL JUGADOR-->
				<h1 class="codrops-header__title" id="nombre_jugador"></h1>
			</center>
			<div class="puntos">
				<!--PUNTOS-->
				<h1>Ronda</h1><br>
				<h1><center>0</center></h1><hr>
				<h1>Turno</h1><br>
				<h1><center>0</center></h1><hr>
				<h1>Puntos</h1><br>
				<h1><center>0</center></h1>
			</div>
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
		<script src="js/lineas_juego.js"></script>
	</body>
</html>