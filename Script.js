// Función para buscar y filtrar 
function filterTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    // Iterar sobre las filas de datos (omitir la fila del encabezado)
    for (i = 1; i < tr.length; i++) { // Comienza desde 1 para omitir la fila de encabezado
        tds = tr[i].getElementsByTagName("td");
        matches = false;

        // Iterar sobre las celdas de cada fila
        for (j = 0; j < tds.length; j++) {
            td = tds[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    matches = true;
                    break;
                }
            }
        }

        // Mostrar u ocultar la fila según si hay coincidencias
        if (matches) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

// Agregar un evento de escucha al campo de búsqueda
document.getElementById("searchInput").addEventListener("input", filterTable);