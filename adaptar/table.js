class CustomDataTable {
    constructor(id) {
        this.id = id;
        this.initializeDataTable();
    }

    initializeDataTable() {
        $(this.id).DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            searching: true,
            language: {
                sLengthMenu: "Mostrar MENU entradas",
                sEmptyTable: "No hay datos disponibles en la tabla",
                sInfo: "Mostrando START a END de TOTAL entradas",
                sInfoEmpty: "Mostrando 0 a 0 de 0 entradas",
                sSearch: "Buscar:",
                sZeroRecords:
                    "No se encontraron registros coincidentes en la tabla",
                sInfoFiltered: "(Filtrado de MAX entradas totales)",
                oPaginate: {
                    sFirst: "Primero",
                    sPrevious: "Anterior",
                    sNext: "Siguiente",
                    sLast: "Último",
                },
            },
        });
    }
}

// Uso de la clase CustomDataTable
$(document).ready(function () {
    const myDataTable = new CustomDataTable("#example1");
});
