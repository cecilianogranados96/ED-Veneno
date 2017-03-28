<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Veneno Game</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,300" rel="stylesheet">
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		
		
		
		<script type='text/javascript'>//<![CDATA[
			$(window).load(function(){
				$(document).ready(function () {
					$('div.sort li').disableSelection();
					
					$('#pending ul').sortable({
						revert: 'invalid',
						connectWith: "#inbound ul, #outbound ul",
						items: "li.inbound"
					});
					
					$('#outbound ul').sortable({
						revert: 'invalid',
						connectWith: "#inbound ul, #pending ul",
						items: "li.inbound"
					});
					
					$('#inbound ul').sortable({
						revert: 'invalid',
						connectWith: "#pending ul, #outbound ul",
						items: "li.inbound"
					});
					
				});
				
				
			});//]]> 
			
		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<script>
			$(document).ready(function () {
				$('.caldero').disableSelection();
				
				$('#caldero1').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas div",
					items: "img.inbound"
				});
				
				$('#caldero2').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas div",
					items: "img.inbound"
				});

				$('#caldero3').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas div",
					items: "img.inbound"
				});
				
				$('#dock_cartas div').sortable({
					revert: 'invalid',
					connectWith: "#caldero1, #caldero2,#caldero3",
					items: "img.inbound"
				});
				
			});
		</script>
		
	</head>
	<body class="demo-2">
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
			<div class="codrops-links">
				<a class="codrops-icon codrops-icon--prev" href="configuracion.php"><svg class="icon icon--arrow"><use xlink:href="#icon-arrow"></use></svg></a>
				<a class="codrops-icon codrops-icon--drop" href="ayuda.php"><svg class="icon icon--drop"><use xlink:href="#icon-drop"></use></svg></a>
			</div>
			<center>
				<h1 class="codrops-header__title">JUGADOR NOMBRE</h1>
			</center>
			

			<div class="calero1 caldero" id="caldero1">	  
				<img src="img/cartas/8C.png" id="drag1" class="dock_cartas">
			</div>
			
			<div class="calero2 caldero" id="caldero2" ondrop="drop(event)" ondragover="allowDrop(event)">
				<!--CALDERO 2-->
			</div>
			<div class="calero3 caldero" id="caldero3" ondrop="drop(event)" ondragover="allowDrop(event)">
				<!--CALDERO 3-->
			</div>			
			
			<center>
				<h1 class="codrops-header__title" href="">Siguiente</h1>
			</center>
			
			<div class="dock caldero" id="dock_cartas">
				<center>
					<div>
						<img src="img/cartas/2C.png" id="C1" class="dock_cartas inbound">
						<img src="img/cartas/2P.png" id="C1" class="dock_cartas inbound">
						<img src="img/cartas/2D.png" id="C1" class="dock_cartas inbound">
						<img src="img/cartas/2T.png" id="C1" class="dock_cartas inbound">
						<img src="img/cartas/3P.png" id="C1" class="dock_cartas inbound">
					</div>
				<center>
				</div>

		
				
				
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
								