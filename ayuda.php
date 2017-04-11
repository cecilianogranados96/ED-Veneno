<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
	</head>
	<body class="demo-4">
		<main>
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="index.php">Atras</a>
				</div>
			</header>
			<h1 class="codrops-header__title"><center><span>Manual de Usuario</span></h1>
			<section class="content content--related">
				<p><a  class="media-item" >EJEMPLO</a>
				EJEMPLO</p>
			</section>
			<!-- Related demos -->

		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script>
		(function() {
			var lineMaker = new LineMaker({
				lines: [
					{top: 0, left: '50vw', width: 1, height: '100%', color: '#ccc', hidden: true, animation: { duration: 1500, easing: 'easeInOutSine', delay: 0, direction: 'TopBottom' }},
					{top: 0, left: '75vw', width: 1, height: '100%', color: '#ccc', hidden: true, animation: { duration: 1500, easing: 'easeInOutSine', delay: 0, direction: 'TopBottom' }},
					{top: '20em', left: 0, width: '100%', height: 1, color: '#ccc', hidden: true, animation: { duration: 1500, easing: 'easeInOutExpo', delay: 200, direction: 'LeftRight' }}
				]
			});
			
			setTimeout(function() {
				lineMaker.animateLinesIn();
			}, 0);
		})();
		</script>
	</body>
</html>
