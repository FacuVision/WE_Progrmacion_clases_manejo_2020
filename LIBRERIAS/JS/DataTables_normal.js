
//ESTE CODIGO VA AL FINAL DEL ARCHIVO importacionesPie.php


    $(document).ready(function () {
        $('#example').DataTable(
            {
                "lengthMenu": [[25,50,100], [25, 50,100]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }
            
            }
        );

    });  

