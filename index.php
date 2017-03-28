<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Line Maker | Demo 3 | Codrops</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Roboto+Condensed" rel="stylesheet">
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
	</head>
	<body class="demo-3">
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
				<symbol id="icon-logo" viewBox="0 0 24 24">	
					<path d="M22 11h-4.17l3.24-3.24-1.41-1.42L15 11h-2V9l4.66-4.66-1.42-1.41L13 6.17V2h-2v4.17L7.76 2.93 6.34 4.34 11 9v2H9L4.34 6.34 2.93 7.76 6.17 11H2v2h4.17l-3.24 3.24 1.41 1.42L9 13h2v2l-4.66 4.66 1.42 1.41L11 17.83V22h2v-4.17l3.24 3.24 1.42-1.41L13 15v-2h2l4.66 4.66 1.41-1.42L17.83 13H22z"/>
					<path d="M0 0h24v24H0z" fill="none"/>
				</symbol>
				<symbol id="icon-menu" viewBox="0 0 24 24">
					<path d="M0 0h24v24H0z" fill="none"/>
					<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
				</symbol>
			</defs>
		</svg>
		<main>
			<div class="dummy">
	
			</div>
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--drop" href="ayuda.php"><svg class="icon icon--drop"><use xlink:href="#icon-drop"></use></svg></a>
				</div>
				<h1 class="codrops-header__title">Veneno</h1>
					<a href="configuracion.php"><h1>Iniciar</h1></a>

			</header>
		</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script>
		(function() {
			var lineMaker = new LineMaker({
				position: 'fixed',
				lines: [
					{top: '15%', left: 0, width: '100%', height: 2, color: '#ddd', hidden: true},
					{top: '85%', left: 0, width: '100%', height: 2, color: '#ddd', hidden: true},
					{top: 0, left: '90%', width: 2, height: '100%', color: '#ddd', hidden: true},
					{top: 0, left: '10%', width: 2, height: '100%', color: '#ddd', hidden: true},
					{top: '15%', left: 0, width: '100%', height: 2, color: '#000', hidden: true, animation: { duration: 1000, easing: 'easeInOutExpo', delay: 0, direction: 'LeftRight' }},
					{top: '85%', left: 0, width: '100%', height: 2, color: '#000', hidden: true, animation: { duration: 1000, easing: 'easeInOutExpo', delay: 100, direction: 'RightLeft' }},
					{top: 0, left: '90%', width: 2, height: '100%', color: '#000', hidden: true, animation: { duration: 1000, easing: 'easeInOutExpo', delay: 200, direction: 'BottomTop' }},
					{top: 0, left: '10%', width: 2, height: '100%', color: '#000', hidden: true, animation: { duration: 1000, easing: 'easeInOutExpo', delay: 300, direction: 'TopBottom' }}
				]
			});
			setTimeout(function() {
				lineMaker.animateLineIn(4, {
					complete: function() { lineMaker.showLine(0); }
				});
				lineMaker.animateLineIn(5, {
					complete: function() { lineMaker.showLine(1); }
				});
				lineMaker.animateLineIn(6, {
					complete: function() { lineMaker.showLine(2); }
				});
				lineMaker.animateLineIn(7, {
					complete: function() { lineMaker.showLine(3); }
				});
			}, 100);
			setTimeout(function() {
				lineMaker.animateLineOut(4);
				lineMaker.animateLineOut(5);
				lineMaker.animateLineOut(6);
				lineMaker.animateLineOut(7);
			}, 2000);
			setTimeout(function() {
				lineMaker.createLine({top: '50vh', left: '21vw', width: '60vw', height: 16, color: '#E91E63', hidden: true, animation: { duration: 1000, easing: 'easeInOutExpo', delay: 300, direction: 'LeftRight' }});
				lineMaker.animateLineIn(8);
			}, 2000);
		})();
		</script>
	</body>
</html>
