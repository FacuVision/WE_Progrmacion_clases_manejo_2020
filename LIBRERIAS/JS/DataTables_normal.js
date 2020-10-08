
//ESTE CODIGO VA AL FINAL DEL ARCHIVO importacionesPie.php


    $(document).ready(function () {
        $('#example').DataTable(
            {
                "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }
            }
        );

    });  

