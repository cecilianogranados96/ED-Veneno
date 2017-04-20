//##########################################################################################
//# 
//# OBJETIVO:
//# =========
//#
//# Script inicial de juego en jquerry.
//#
//# Parametros:
//# ===========
//# -------------
//#
//# Desarrollo:
//# 
//# - Jose Andres Ceciliano Granados
//#
//#
//#########################################################################################

$(document).ready(function () {
		$('#caldero1').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero1').order1();
				//$("#caldero1 h1").remove();
				$(".bg_load").fadeIn("slow");
				$(".wrapper").fadeIn("slow");
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero1").sortable( "option", "revert", false );
				if ($('#caldero1 img ').val_carta1($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 1,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function( data ) {
						$(".bg_load").fadeOut("slow");
						$(".wrapper").fadeOut("slow");
						$('#jugar').parpadear();
						$('#caldero1 img').puntos1();
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
					});
				}
			}
		});

		$('#caldero2').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero2').order2();
				$(".bg_load").fadeIn("slow");
				$(".wrapper").fadeIn("slow");
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero2").sortable( "option", "revert", false );
				if ($('#caldero2 img ').val_carta2($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 2,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function(data) {
						$(".bg_load").fadeOut("slow");
						$(".wrapper").fadeOut("slow");
						$('#jugar').parpadear();
						$('#caldero2 img').puntos2();
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
					});
				}

			}
		});
				
		$('#caldero3').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero3').order3();
				$(".bg_load").fadeIn("slow");
				$(".wrapper").fadeIn("slow");
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero3").sortable( "option", "revert", false );
				if ($('#caldero3 img ').val_carta3($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 3,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function( data ) {
						$(".bg_load").fadeOut("slow");
						$(".wrapper").fadeOut("slow");
						$('#jugar').parpadear();
						$('#caldero3 img').puntos3();
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
					});
				}
			}
		});
		$('#dock_cartas').sortable({
			revert: 'invalid',
			connectWith: "#caldero1, #caldero2,#caldero3",
			items: "img.inbound"		
		});
		
		
		//FUNCIONES DEL JUEGO
		$('#jugar').bind('click', function(e){
				e.preventDefault();
				alert('Mueve una carta');
		})
		
		
		$.fn.tipo_caldero = function () {
				cal = [];
				cal[0] = "";
				tam = 0;
				$(this).each(function(index) {
						splits =  $(this).attr("id").split(/(\d+)/);
						if(splits[splits.length-1] != "C"){
							cal[tam] = splits[splits.length-1];
						}
						tam++;
				});
				if (cal[0] == undefined){
					return "";
				}
				if (cal[0].length == 2){
					return cal[0][1];
				}else{
					if (cal[0] == "C"){
						return "";
					}else{
						return cal[0];
					}
				}
		}
		
		
		$.fn.puntos1 = function(){
				tam = 0; 
				$(this).each(function(index){
						splits =  $(this).attr("id").split(/(\d+)/);
						tam = tam + splits[1];
				});
				if (tam >= 13){
					$("#caldero1").css("background", "red");
				}else{
					console.log("no problema");
				}
		}
		$.fn.puntos2 = function(){
				tam = 0; 
				$(this).each(function(index) {
						splits =  $(this).attr("id").split(/(\d+)/);
						tam = tam + splits[1];
				});
				if (tam >= 13){
					$("#caldero2").css("background", "red");
				}else{
					console.log("no problema");
				}
		}
		$.fn.puntos3 = function(){
				tam = 0; 
				$(this).each(function(index) {
						splits =  $(this).attr("id").split(/(\d+)/);
						tam = tam + splits[1];
				});
				if (tam >= 13){
					$("#caldero3").css("background", "red");
				}else{
					console.log("no problema");
				}
		}
		
		//////////VALIACIONES DE CARTAS DE CALDEROS///////////////
		$.fn.val_carta1 = function (carta) {
			splits = carta.split(/(\d+)/);
			carta2 = splits[splits.length-1]; 
			console.log("TIPO CARTA: "+carta2[carta2.length-1]);
			if(carta2[carta2.length-1] != 'C'){
				console.log("CALDERO ACTUAL "+$(this).tipo_caldero());
				if($(this).tipo_caldero() == ""){
					console.log("-------*************************-");
					if($("#caldero2 img").tipo_caldero() != carta2[carta2.length-1] || $("#caldero3 img").tipo_caldero() != carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				console.log("CALDERO ACTUAL2 "+ $(this).tipo_caldero());
				if($(this).tipo_caldero() != "" || $(this).tipo_caldero() != "C" ){
					if ($(this).tipo_caldero() == "C"){
						return false;
					}else{
						return true
					}
				}
				else{
					console.log("ME VINE PARA ACA");
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
				return false; 
			}
		};
		
		
		$.fn.val_carta2 = function (carta) {
			splits = carta.split(/(\d+)/);
			carta2 = splits[splits.length-1]; 
			if(carta2[carta2.length-1] != 'C'){
				console.log("TIPO CAL"+ $("#caldero2 img").tipo_caldero());
				if($(this).tipo_caldero() == ""){
					if($("#caldero1 img").tipo_caldero() != carta2[carta2.length-1] || $("#caldero3 img").tipo_caldero() != carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				console.log("CALDERO ACTUAL2 "+ $(this).tipo_caldero());
				if($(this).tipo_caldero() != "" || $(this).tipo_caldero() != "C" ){
					if ($(this).tipo_caldero() == "C"){
						return false;
					}else{
						return true
					}
				}
				else{
					console.log("ME VINE PARA ACA");
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
				return false; 
			}
		};
		
		$.fn.val_carta3 = function (carta) {
			splits = carta.split(/(\d+)/);
			carta2 = splits[splits.length-1]; 
			if(carta2[carta2.length-1] != 'C'){
				console.log("TIPO CAL"+ $("#caldero3 img").tipo_caldero());
				if($(this).tipo_caldero() == ""){
					if($("#caldero1 img").tipo_caldero() != carta2[carta2.length-1] || $("#caldero2 img").tipo_caldero() != carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta2[carta2.length-1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				console.log("CALDERO ACTUAL2 "+ $(this).tipo_caldero());
				if($(this).tipo_caldero() != "" || $(this).tipo_caldero() != "C" ){
					if ($(this).tipo_caldero() == "C"){
						return false;
					}else{
						return true
					}
				}
				else{
					console.log("ME VINE PARA ACA");
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
				return false; 
			}
		};
		
		
		
		
		
		//Ordena cartas en desplegables
		$.fn.order1 = function () {
				$('#caldero1 img:nth-child(1)').addClass('c1');
				$('#caldero1 img:nth-child(2)').addClass('c2');
				$('#caldero1 img:nth-child(3)').addClass('c2');
				$('#caldero1 img:nth-child(4)').addClass('c2');
				$('#caldero1 img:nth-child(5)').addClass('c2');
				$('#caldero1 img:nth-child(6)').addClass('c2');
				$('#caldero1 img:nth-child(7)').addClass('c2');
				$('#caldero1 img:nth-child(8)').addClass('c2');
				$('#caldero1 img:nth-child(9)').addClass('c2');
				$('#caldero1 img:nth-child(10)').addClass('c2');
		};
		$.fn.order2 = function () {
				$('#caldero2 img:nth-child(1)').addClass('c1');
				$('#caldero2 img:nth-child(2)').addClass('c2');
				$('#caldero2 img:nth-child(3)').addClass('c2');
				$('#caldero2 img:nth-child(4)').addClass('c2');
				$('#caldero2 img:nth-child(5)').addClass('c2');
				$('#caldero2 img:nth-child(6)').addClass('c2');
				$('#caldero2 img:nth-child(7)').addClass('c2');
				$('#caldero2 img:nth-child(8)').addClass('c2');
				$('#caldero2 img:nth-child(9)').addClass('c2');
				$('#caldero2 img:nth-child(10)').addClass('c2');
		}
		$.fn.order3 = function () {
				$('#caldero3 img:nth-child(1)').addClass('c1');
				$('#caldero3 img:nth-child(2)').addClass('c2');
				$('#caldero3 img:nth-child(3)').addClass('c2');
				$('#caldero3 img:nth-child(4)').addClass('c2');
				$('#caldero3 img:nth-child(5)').addClass('c2');
				$('#caldero3 img:nth-child(6)').addClass('c2');
				$('#caldero3 img:nth-child(7)').addClass('c2');
				$('#caldero3 img:nth-child(8)').addClass('c2');
				$('#caldero3 img:nth-child(9)').addClass('c2');
				$('#caldero3 img:nth-child(10)').addClass('c2');
		};
		
		$.fn.parpadear = function()
		{
			this.each(function parpadear()
			{
				$(this).fadeIn(500).delay(250).fadeOut(500, parpadear);
			});
		}
		

});