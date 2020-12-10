	
	
	$(document).ready(function () {
			$('#example').DataTable(
				{
					"lengthMenu": [[25,50,100], [25, 50,100]],
					"language": {
						"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
						},
						responsive: "true",
						dom: 'Bfrtilp',       
						buttons:[ 
							{
								extend:    'excelHtml5',
								text:      '<img src="../../LIBRERIAS/images/excel.png" width="30px"> ',
								titleAttr: 'Exportar a Excel',
								className: 'btn btn-success'
							},
							{
								extend:    'pdfHtml5',
								text:      '<img src="../../LIBRERIAS/images/pdf.png" width="30px"> ',
								titleAttr: 'Exportar a PDF',
								className: 'btn btn-danger'
							},
							{
								extend:    'print',
								text:      '<img src="../../LIBRERIAS/images/impresora.png" width="30px">  ',
								titleAttr: 'Imprimir',
								className: 'btn btn-info'
							},
						]
				
				}
			);
	
		});  
	
	/*
	
	$(document).ready(function() {    
		$('#example').DataTable({        
			language: {
					"lengthMenu": "Mostrar_registros",
					"zeroRecords": "No se encontraron resultados",
					"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"infoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sSearch": "Buscar:",
					"oPaginate": {
						"sFirst": "Primero",
						"sLast":"Último",
						"sNext":"Siguiente",
						"sPrevious": "Anterior"
					},
					"sProcessing":"Procesando...",
				},
			//para usar los botones   
			responsive: "true",
			dom: 'Bfrtilp',       
			buttons:[ 
				{
					extend:    'excelHtml5',
					text:      '<i class="fas fa-file-excel"></i> ',
					titleAttr: 'Exportar a Excel',
					className: 'btn btn-success'
				},
				{
					extend:    'pdfHtml5',
					text:      '<i class="fas fa-file-pdf"></i> ',
					titleAttr: 'Exportar a PDF',
					className: 'btn btn-danger'
				},
				{
					extend:    'print',
					text:      '<i class="fa fa-print"></i> ',
					titleAttr: 'Imprimir',
					className: 'btn btn-info'
				},
			]	        
		});     
	});*/