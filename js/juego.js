$(document).ready(function () {				
		$.post( "logica/calderos.php", function( data ) {
			$("#caldero2").append(data);
			$("#caldero1").order1();
			$("#caldero2").order2();
			$("#caldero3").order3();
		});				
		$.fn.val_carta = function (carta) {
				val_caldero = [];
				$(this).each(function(index) {
						if ($(this).attr("id")[1] != "C"){
							val_caldero[index] = $(this).attr("id")[1];
						}
				});
				if (val_caldero.length == 1 || val_caldero.length == 0){
					return true;
				}
				if (carta[1] == val_caldero[val_caldero.length-2] || carta[1] == "C"){
					return true;
				}else{
					return false;
				}
		};
		//Ordea en caso de que ya se encuentren
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
		$('#caldero1').disableSelection();
		$('#caldero1').sortable({
			revert: 'invalid',
			connectWith: "#dock_cartas",
			start: function (event, ui) {
				alert(ui);
            var attr = $(ui.item).attr('data-parent');
			},
			items: "img.inbound",
			update: function(event, ui){
				$('#caldero1').order2();
				$('#jugar').removeClass('jugar').addClass('jugar_activo');
				$('#dock_cartas').sortable("disable");
				$('#jugar').unbind('click');
				$("#caldero1").sortable( "option", "revert", false );
				if ($('#caldero1 img ').val_carta($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
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
				if ($('#caldero2 img ').val_carta($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
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
				if ($('#caldero3 img ').val_carta($(ui.item).attr('id')) == false){
					alert("Carta Incorrecta");
					location.reload();
				}
			}
		});
		
		$('#dock_cartas').sortable({
			revert: 'invalid',
			connectWith: "#caldero1, #caldero2,#caldero3",
			items: "img.inbound"		
		});
		
		$('#jugar').bind('click', function(e){
				e.preventDefault();
				alert('Mueve una carta');
		})

});