$(document).ready(function () {
    $('#tabel').DataTable( {
        "language": {
            "lengthMenu": "Toon _MENU_ records per pagina   ",
            "zeroRecords": "Niets gevonden - sorry",
            "info": "Pagina _PAGE_ van _PAGES_ wordt weergegeven",
            "infoEmpty": "Geen gegevens beschikbaar",
            "search":         "Zoeken:",
            "infoFiltered": "(gefilterd uit _MAX_ totale records)",
            "paginate": {
                "next":       "Volgende",
                "previous":   "Vorige"
            }

        }
    } );

});



document.getElementById("deleteForm").submit();




