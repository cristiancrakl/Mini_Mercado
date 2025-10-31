$(document).ready(function () {
    // Inicializar Bootstrap Switch para elementos con la clase toggle-class
    $(".toggle-class").bootstrapSwitch();

    // Manejar el evento de cambio para cualquier elemento con la clase toggle-class
    $(document).on(
        "switchChange.bootstrapSwitch",
        ".toggle-class",
        function (event, state) {
            var elementType = $(this).data("type"); // Obtener el tipo de elemento (cliente, etc.)
            var elementId = $(this).attr("data-id"); // Obtener el ID del elemento
            var url; // Determinar la URL según el tipo de elemento

            // Configurar la URL según el tipo de elemento
            switch (elementType) {
                case "cliente":
                    url = $(this).data("url");
                    break;
                case "producto":
                case "factura":
                case "proveedor":
                case "metodopago":
                case "ordencompra":
                    url = $(this).data("url");
                    break;
                default:
                    return; // Salir de la función si el tipo de elemento no es válido
            }

            // Determinar el método HTTP según el tipo de elemento
            var method = elementType === "cliente" ? "GET" : "POST";

            // Realizar la solicitud AJAX con la URL y los datos configurados
            $.ajax({
                type: method,
                dataType: "json",
                url: url,
                data:
                    method === "POST"
                        ? {
                              _token: $('meta[name="csrf-token"]').attr(
                                  "content"
                              ), // CSRF token para POST
                              estado: state ? 1 : 0, // Estado (1 para activo, 0 para inactivo)
                              id: elementId, // ID del elemento
                          }
                        : {
                              estado: state ? 1 : 0, // Estado (1 para activo, 0 para inactivo)
                              id: elementId, // ID del elemento
                          },
                success: function (data) {
                    console.log(
                        "Se ha cambiado el estado del " +
                            elementType +
                            " correctamente."
                    );
                    console.log("Respuesta del servidor:", data);
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Error al cambiar el estado del " + elementType + ":",
                        error
                    );
                    // Revertir el switch en caso de error
                    $(this).bootstrapSwitch("state", !state, true);
                },
            });
        }
    );
});
