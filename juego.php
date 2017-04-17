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
								$("#bg_load").remove();
								$("#wrapper").remove();
								    $(".bg_load").fadeOut("slow");
									$(".wrapper").fadeOut("slow");
								
							});
						});
					});
				});
			});
			


function buscar(texto){
	$("#busqueda").css("display", "block");
	$("#busqueda span").text(texto.value);
	texto.value = "";
	setTimeout(function() {
		$("#busqueda").fadeOut("slow");
	}, 1000);
	
}

	</script>
	</head>
	<body class="demo-2" style="overflow-x: hidden; overflow-y: hidden;">
	<!--JQUERRY CARGA-->
	<div class="bg_load"></div>
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
	<input type='text' id='jugadores' value="<?php echo $_GET['jugadores']; ?>" hidden>
	<input type='text' id='jugador' value="<?php echo $_GET['jugador']; ?>" hidden>
		<main>
			<!--MANEJO-->
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php">Atras</a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php">Ayuda</a>
			</div>
			<!--BUSQUEDA-->
			<div class="buscar" id="buscar">
				  <input type="text" class="form-control" name="carta" placeholder="Buscar Carta..." onchange="buscar(this);">
			</div>
			<div class="busqueda" id="busqueda"><center>La tiene:<br><span>Jugador #1</span></center></div>
			<!--OPCIONES-->
			<a class="reset" id="reset" href="#"><center>Reset</center></a>
			<a class="anterior" id="anterior" href="#" ><center>Undo</center></a>
			<a class="siguiente" id="siguiente" href="#" ><center>Redo</center></a>
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