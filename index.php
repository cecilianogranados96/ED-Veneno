<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Freckle+Face' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="animacion/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="animacion/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="animacion/css/husky.css" />
				<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>
fullscreen = function(e){
      if (e.webkitRequestFullScreen) {
        e.webkitRequestFullScreen();
      } else if(e.mozRequestFullScreen) {
        e.mozRequestFullScreen();
      }
}
document.getElementById('fill').onclick = function(){
    fullscreen(document.getElementById('content'));
}


		</script>
	</head>
	<body class="demo-husky" id="content">
		<div class="snow"></div>
		<div class="container">
			<header class="codrops-header">
				<div class="codrops-links">
					
					<a href="ayuda.php"><span>Ayuda</span></a>  <a onclick=" fullscreen(document.getElementById('content'))"><span>Full Screen</span></a> 
				</div>
				<h1><a href="configuracion.php">Veneno Game</a></h1>
				<br>
				<h1><a href="configuracion.php">Iniciar</a></h1>
				
				
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
			</div><!-- /content -->
		</div><!-- /container -->
	</body>
</html>
