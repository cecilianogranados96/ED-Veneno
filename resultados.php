<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Veneno Game</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/decolines.css" />
		<link href="https://fonts.googleapis.com/css?family=Ultra" rel="stylesheet">
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--><script>document.documentElement.className = 'js';</script>
	</head>
	<body class="demo-6">
		<main>
<center>
	<table class="table">
		<tr>
		   <th colspan="3">
			  <h1 class="codrops-header__title">
				 <center>Resultados</center>
			  </h1>
		   </th>
		</tr>
		<tr>
			<td>
			  <h4  class="codrops-header__title" style="font-size: 2vw;"><center>
			  JUGADORES
		   </td>
		   <td><h4  class="codrops-header__title" style="font-size: 2vw;"><center>
			  Ronda 1 
		   </td>
		   <td><h4  class="codrops-header__title" style="font-size: 2vw;"><center>
			  Ronda 2
		   </td>
		   <td><h4  class="codrops-header__title" style="font-size: 2vw;"> <center>
			  Totales 
		   </td>
		</tr>
		
		<!------------->
		<tr>
		   <td>
			  <h4  class="codrops-header__title" style="font-size: 2vw;">
			  JUAN
		   </td>
		   <td>
			  Ronda 1 <br>
			  Total veneno por ronda
		   </td>
		   <td>
			  Ronda 2
			  <br>
			  Total veneno por ronda
		   </td>
		   <td>
			  Total 
		   </td>
		</tr>
		
		
		   <td>
			  <h4  class="codrops-header__title" style="font-size: 2vw;">
			  ANA
		   </td>
		   <td>
			  Ronda 1 <br>
			  Total veneno por ronda
		   </td>
		   <td>
			  Ronda 2
			  <br>
			  Total veneno por ronda
		   </td>
		   <td>
			  Total 
		   </td>
		</tr>

</table>
	<h1 class="codrops-header__title" style="font-size: 2vw;" onclick="location.href='index.php'"><center>Nuevo Juego</center></a></h1>
	</main>
		<script src="js/anime.min.js"></script>
		<script src="js/main.js"></script>
		<script>
		(function() {
			var lineMaker = new LineMaker({
					parent: { element: document.body, position: 'append' },
					position: 'fixed',
					lines: [
						{top: 0, left: '0', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 0, direction: 'TopBottom' }},
						{top: 0, left: '20vw', width: '20vw', height: '100vh', color: '#fff', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 150, direction: 'BottomTop' }},
						{top: 0, left: '40vw', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 300, direction: 'TopBottom' }},
						{top: 0, left: '60vw', width: '20vw', height: '100vh', color: '#fff', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 450, direction: 'BottomTop' }},
						{top: 0, left: '80vw', width: '20vw', height: '100vh', color: '#F85659', hidden: false, animation: { duration: 1000, easing: 'easeInOutCirc', delay: 600, direction: 'TopBottom' }}
					]
			});
			
			setTimeout(function() {
				lineMaker.animateLinesOut();
			}, 500);
		})();
		</script>
	</body>
</html>
