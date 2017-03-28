<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Line Maker | Demo 1 | Codrops</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link rel="stylesheet" type="text/css" href="css/pater.css" />
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
		<svg class="hidden">
			<defs>
				<symbol id="icon-arrow" viewBox="0 0 24 24">
					<title>arrow</title>
					<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
				</symbol>
				<symbol id="icon-drop" viewBox="0 0 24 24">
					<title>drop</title>
					<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
				</symbol>
			</defs>
		</svg>
		<main>
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="index.php" title="Previous Demo"><svg class="icon icon--arrow"><use xlink:href="#icon-arrow"></use></svg></a>
					<a class="codrops-icon codrops-icon--drop" href="ayuda.php" title="Back to the article"><svg class="icon icon--drop"><use xlink:href="#icon-drop"></use></svg></a>
				</div>
				<h1 class="codrops-header__title">Configuración</h1>
				<p class="codrops-header__tagline">Configuraremos algunas cosas antes de inciar el juego. </p>
			</header>
			
	<?php if(!isset($_GET['jugadores'])){ ?>
	<p class="codrops-header__tagline" style="margin-left:22%;">Selecciona la cantidad de jugadores. </p>
		<center>
			<a href="configuracion.php?jugadores=2"><img class="numeros" src="img/2.png"></a>
			<a href="configuracion.php?jugadores=3"><img class="numeros" src="img/3.png"></a>
			<a href="configuracion.php?jugadores=4"><img class="numeros" src="img/4.png"></a>
			<a href="configuracion.php?jugadores=5"><img class="numeros" src="img/5.png"></a>
			<a href="configuracion.php?jugadores=6"><img class="numeros" src="img/6.png"></a>
		</center>
	<?php } else{ ?>
	<form action="juego.php?jugadores=<?php echo $_GET['jugadores']; ?>" method="GET">
	<p class="codrops-header__tagline" style="margin-left:22%;">Digita los nombres de los jugadores. </p>
	<section class="content content--grid">
	<?php for($x=0;$x<$_GET['jugadores'];$x++){
			echo "<p><input type='text' name='J$x'class='form-control'  placeholder='Jugador #$x' required autofocus></p>";
	}?>
	<input type='text' name='jugadores' value="<?php echo $_GET['jugadores']; ?>" hidden>
	<center>
		<button type="submit" class="btn btn-success"><h1>Enviar</h1></button>
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
