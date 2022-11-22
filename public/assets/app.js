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

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var list = document.getElementsByClassName("list");
var i;


for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        }
        else {
            dropdownContent.style.display = "block";
        }
    });
}



document.getElementById("deleteForm").submit();




