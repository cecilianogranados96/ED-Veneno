<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link rel="stylesheet" type="text/css" href="css/pater.css" />
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Roboto+Mono" rel="stylesheet">
		<style>
			.numeros{ 
				width: 100px;
				margin-left:8%;
				margin-top:5%;
			}
		</style>
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
	</head>
	<body class="demo-1">
		<main>
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="index.php">Atrás</a>
					<a class="codrops-icon codrops-icon--drop" href="ayuda.php">Ayuda</a>
				</div>
				<h1 class="codrops-header__title">Configuración</h1>
				<p class="codrops-header__tagline">Configuraremos algunas cosas antes de inciar el juego. </p>
			</header>
			<?php if(!isset($_GET['jugadores'])){ ?>
			<script>
			$.post( "Logica/s.php", {mensaje: "0" },function( data ) {
				console.log(data); 
			});	
			</script>
				<p class="codrops-header__tagline" style="margin-left:22%;">Selecciona la cantidad de jugadores. </p>
				<center>
					<a href="configuracion.php?jugadores=2&jugador=0"><img class="numeros" src="img/jugadores/2.png"></a>
					<a href="configuracion.php?jugadores=3&jugador=0"><img class="numeros" src="img/jugadores/3.png"></a>
					<a href="configuracion.php?jugadores=4&jugador=0"><img class="numeros" src="img/jugadores/4.png"></a>
					<a href="configuracion.php?jugadores=5&jugador=0"><img class="numeros" src="img/jugadores/5.png"></a>
					<a href="configuracion.php?jugadores=6&jugador=0"><img class="numeros" src="img/jugadores/6.png"></a>
				</center>
				<?php }else{ 
				
				if ($_GET['jugador'] == 0){
					echo "<script>
							$.post('Logica/s.php', {mensaje: ".$_GET['jugadores']." },function( data ) {
								console.log(data);
							});	
						</script>";
				}

				if(isset($_GET['nom'])){
					
					//echo $_GET['nom'];
					echo "<script>
							$.post('Logica/s.php', {mensaje: 1 },function( data ) {
								console.log(data);
								$.post('Logica/s.php', {mensaje: '".$_GET['nom']."' },function( data ) {
									console.log(data);
								});
							});
					</script>";
					if(($_GET['jugadores']) == $_GET['jugador']){
						echo "<script>window.location='juego.php?jugadores=".$_GET['jugadores']."&jugador=0'</script>";
					}
				}
				
				if(($_GET['jugadores']-1) == $_GET['jugador']){
					//$url = "juego.php";
					$text = "JUEGO";
				}else{
					//$url = "configuracion.php?jugadores=".$_GET['jugadores']."&jugador=".($_GET['jugador']+1)."";
					$text = "Siguiente";
				}
				
				$url = "configuracion.php?jugadores=".$_GET['jugadores']."&jugador=".($_GET['jugador']+1)."";
				
				?>
				<form action="<?php echo $url; ?>" method="GET">
					<p class="codrops-header__tagline" style="margin-left:22%;">Digita los nombres de los jugadores. </p>
					<section class="content content--grid">
						<center>
							<input type='text' name='nom' class='form-control'  placeholder='Digite el nombre del Jugador #<?php echo $_GET['jugador']; ?>' style="height: 49px;width: 28%;" required autofocus>
						</center>
						<input type='text' name='jugadores' value="<?php echo $_GET['jugadores']; ?>" hidden>
						<input type='text' name='turno' value="0" hidden>
						<input type='text' name='jugador' value="<?php echo $_GET['jugador']+1; ?>" hidden>
						<center>
							<button type="submit" class="btn btn-success"><h1><?php echo $text; ?></h1></button>
						</center>
					</form>
				</section>
			<?php } ?>
		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script>
			(function() {
				var lineMaker = new LineMaker({		
					position: 'fixed',
					lines: [
					{top: 0, left: '10%', width: 1, height: '100vh', color: '#c7c6c6', hidden: true, animation: { duration: 2000, easing: 'easeInOutExpo', delay: 0, direction: 'TopBottom' }},
					{top: 0, left: '30%', width: 1, height: '100vh', color: '#c7c6c6', hidden: true, animation: { duration: 2000, easing: 'easeInOutExpo', delay: 0, direction: 'TopBottom' }},
					{top: 0, left: '50%', width: 1, height: '100vh', color: '#c7c6c6', hidden: true, animation: { duration: 2000, easing: 'easeInOutExpo', delay: 0, direction: 'TopBottom' }},
					{top: 0, left: '70%', width: 1, height: '100vh', color: '#c7c6c6', hidden: true, animation: { duration: 2000, easing: 'easeInOutExpo', delay: 0, direction: 'TopBottom' }},
					{top: 0, left: '90%', width: 1, height: '100vh', color: '#c7c6c6', hidden: true, animation: { duration: 2000, easing: 'easeInOutExpo', delay: 0, direction: 'TopBottom' }},
					]
				});
				
				setTimeout(function() {
					disableButtons();
					lineMaker.animateLinesIn(enableButtons);
				}, 500);
				
				
				var ctrls = [].slice.call(document.querySelectorAll('.actions > button'));
				ctrls.forEach(function(ctrl) {
					ctrl.setAttribute('enable', true);
				});
				
				function enableButtons() {
					ctrls.forEach(function(ctrl) {
						ctrl.removeAttribute('enable');
					});
				}
				function disableButtons() {
					ctrls.forEach(function(ctrl) {
						ctrl.setAttribute('enable', true);
					});
				}				
			})();
		</script>
	</body>
</html>
