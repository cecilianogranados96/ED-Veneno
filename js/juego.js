$(document).ready(function () {				
		/*
		$.post( "Logica/controller.php", {p1: "a", p2: "B" },function( data ) {
			$("#caldero2").append(data);
			$("#caldero1").order1();
			$("#caldero2").order2();
			$("#caldero3").order3();
		});	
		*/
		//DRAG AND DROP

		
		$('#caldero1').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero1').order2();
				$('#jugar').removeClass('jugar').addClass('jugar_activo');
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero1").sortable( "option", "revert", false );
				if ($('#caldero1 img ').val_carta1($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 1,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function( data ) {});
				}
			}
		});
				
		$('#caldero2').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero2').order2();
				$('#jugar').removeClass('jugar').addClass('jugar_activo');
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero2").sortable( "option", "revert", false );
				if ($('#caldero2 img ').val_carta2($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 2,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function(data) {});
				}

			}
		});
				
		$('#caldero3').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero3').order2();
				$('#jugar').removeClass('jugar').addClass('jugar_activo');
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero3").sortable( "option", "revert", false );
				if ($('#caldero3 img ').val_carta3($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}else{
					$.post('Logica/jugar.php',{caldero: 3,jugador: $("#jugador").attr('value'),carta: $(ui.item).attr('type')},function( data ) {});
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
				tam = 0;
				$(this).each(function(index) {
						if($(this).attr("id")[1] != "C"){
							cal[tam] = $(this).attr("id")[1]
						}
						tam++;
				});
				return cal[0];
		}
		
		//////////VALIACIONES DE CARTAS DE CALDEROS///////////////
		$.fn.val_carta1 = function (carta) {
			if(carta[1] != 'C'){
				console.log("TIPO CAL"+ $("#caldero2 img").tipo_caldero());
				if($(this).tipo_caldero() == ""){
					if($("#caldero2 img").tipo_caldero() != carta[1] || $("#caldero3 img").tipo_caldero() != carta[1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta[1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				if($(this).tipo_caldero() != ""){
					return true;
				}
				else{
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
			}
		};
		
		
		$.fn.val_carta2 = function (carta) {
			if(carta[1] != 'C'){
				console.log("TIPO CAL"+ $("#caldero2 img").tipo_caldero());
				if($(this).tipo_caldero() == ""){
					if($("#caldero1 img").tipo_caldero() != carta[1] || $("#caldero3 img").tipo_caldero() != carta[1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta[1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				if($(this).tipo_caldero() != ""){
					return true;
				}
				else{
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
			}
		};
		
		$.fn.val_carta3 = function (carta) {
			if(carta[1] != 'C'){
				console.log("TIPO CAL"+ $("#caldero2 img").tipo_caldero());
				if($(this).tipo_caldero() == ""){
					if($("#caldero1 img").tipo_caldero() != carta[1] || $("#caldero2 img").tipo_caldero() != carta[1]){
						return true;
					}else{
						return false;
					}
				}
				else{
					if($(this).tipo_caldero() == carta[1]){
						return true;
					}else{
						return false;
					}
				}
			}
			else{
				if($(this).tipo_caldero() != ""){
					return true;
				}
				else{
					if($(this).tipo_caldero() == "" || $("#dock_cartas img").length == 1){
						return true;
					}else{
						return false;
					}
				}
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

});