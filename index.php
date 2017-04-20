<?php 
##########################################################################################
# 
# OBJETIVO:
# =========
#
# Mensaje inicial de juego, animacion incial.
#
# Parametros:
# ===========
#
#
# Desarrollo:
# 
# - Jose Andres Ceciliano Granados
#
#
#########################################################################################
?>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Freckle+Face' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/animacion/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/animacion/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/animacion/css/husky.css" />
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<script>
		$.post("Logica/s.php",{mensaje: "Inicial"},function(data){});
		/*
		$.post("Logica/down.php", {mensaje: "Inicial" },function( data ) {
			$.post("Logica/start.php", {mensaje: "Inicial" },function( data ) {
				console.log(data);
						$.post("Logica/s.php",{mensaje: "Inicial"},function(data){});
		
			});
		});
		*/
		</script>
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="demo-husky" id="content">
		<div class="snow"></div>
		<div class="container">
			<header class="codrops-header">
				<a href="Manual/index.html" target="_black"><span>Ayuda</span></a>
				<h1>
					<a href="configuracion.php">Veneno Game</a>
				</h1>
				<br>
				<h1>
					<a href="configuracion.php">Iniciar</a>
				</h1>
			</header>
			<div class="content content--husky">
				<div class="mountain"></div>
				<div class="mountain"></div>
				<div class="husky">
					<div class="husky-mane">
						<div class="husky-coat"></div>
					</div>
					<div class="husky-body">
						<div class="husky-head">
							<div class="husky-ear"></div>
							<div class="husky-ear"></div>
							<div class="husky-face">
								<div class="husky-eye"></div>
								<div class="husky-eye"></div>
								<div class="husky-nose"></div>
								<div class="husky-mouth">
									<div class="husky-lips"></div>
									<div class="husky-tongue"></div>
								</div>
							</div>
						</div>
						<div class="husky-torso"></div>
					</div>
					<div class="husky-legs">
						<div class="husky-front-legs">
							<div class="husky-leg"></div>
							<div class="husky-leg"></div>
						</div>
						<div class="husky-hind-leg">
						</div>
					</div>
					<div class="husky-tail">
						<div class="husky-tail">
							<div class="husky-tail">
								<div class="husky-tail">
									<div class="husky-tail">
										<div class="husky-tail">
											<div class="husky-tail"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none">
					<defs>
						<filter id="squiggly-0">
							<feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="0" />
							<feDisplacementMap id="displacement" in="SourceGraphic" in2="noise" scale="2" />
						</filter>
						<filter id="squiggly-1">
							<feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="1" />
							<feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
						</filter>
						<filter id="squiggly-2">
							<feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="2" />
							<feDisplacementMap in="SourceGraphic" in2="noise" scale="2" />
						</filter>
						<filter id="squiggly-3">
							<feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="3" />
							<feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
						</filter>
						<filter id="squiggly-4">
							<feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="4" />
							<feDisplacementMap in="SourceGraphic" in2="noise" scale="1" />
						</filter>
					</defs>
				</svg>
			</div>
		</div>
	</body>
</html>