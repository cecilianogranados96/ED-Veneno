$(document).ready(function () {
				$('#caldero1').disableSelection();
				$('#caldero1').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#jugar').unbind('click');
						$('#dock_cartas').sortable("disable");
						$("#caldero1").sortable( "option", "revert", false );
					}	
				});
				
				$('#caldero2').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#dock_cartas').sortable("disable");
						$('#jugar').unbind('click');
						$("#caldero1").sortable( "option", "revert", false );
					}
				});
				
				$('#caldero3').sortable({
					revert: 'invalid',
					connectWith: "#dock_cartas",
					items: "img.inbound",
					update: function(){
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
						$('#jugar').removeClass('jugar').addClass('jugar_activo');
						$('#dock_cartas').sortable("disable");
						$('#jugar').unbind('click');
						$("#caldero1").sortable( "option", "revert", false );
					}
				});
				
				$('#dock_cartas').sortable({
					revert: 'invalid',
					connectWith: "#caldero1, #caldero2,#caldero3",
					items: "img.inbound"
				});
				$('#jugar').bind('click', function(e){
						e.preventDefault();
						alert('mueve una carta');
				})
				
				//Ordea en caso de que ya se encuentren
						$('#caldero1 img:nth-child(1)').addClass('c1');
						$('#caldero1 img:nth-child(2)').addClass('c2');
						$('#caldero1 img:nth-child(3)').addClass('c2');
						$('#caldero1 img:nth-child(4)').addClass('c2');
						$('#caldero1 img:nth-child(5)').addClass('c2');
						$('#caldero1 img:nth-child(6)').addClass('c2');
						$('#caldero1 img:nth-child(7)').addClass('c2');
						$('#caldero1 img:nth-child(8)').addClass('c2');
	
						$('#caldero2 img:nth-child(1)').addClass('c1');
						$('#caldero2 img:nth-child(2)').addClass('c2');
						$('#caldero2 img:nth-child(3)').addClass('c2');
						$('#caldero2 img:nth-child(4)').addClass('c2');
						$('#caldero2 img:nth-child(5)').addClass('c2');
						$('#caldero2 img:nth-child(6)').addClass('c2');
						$('#caldero2 img:nth-child(7)').addClass('c2');
						$('#caldero2 img:nth-child(8)').addClass('c2');
						
						$('#caldero3 img:nth-child(1)').addClass('c1');
						$('#caldero3 img:nth-child(2)').addClass('c2');
						$('#caldero3 img:nth-child(3)').addClass('c2');
						$('#caldero3 img:nth-child(4)').addClass('c2');
						$('#caldero3 img:nth-child(5)').addClass('c2');
						$('#caldero3 img:nth-child(6)').addClass('c2');
						$('#caldero3 img:nth-child(7)').addClass('c2');
						$('#caldero3 img:nth-child(8)').addClass('c2');
				
			});