// Lógica de factura separada de la vista
document.addEventListener("DOMContentLoaded", function () {
    // Variables globales locales al módulo
    let detalles = [];
    const IVA_PORCENTAJE = 0.19;

    // Establecer fecha actual (solo si existe el campo `fecha`)
    const fechaEl = document.getElementById("fecha");
    if (fechaEl) {
        try {
            fechaEl.valueAsDate = new Date();
        } catch (e) {
            // Ignorar si falla
        }
    }

    const agregarBtn = document.getElementById("agregarProducto");
    const productoSelect = document.getElementById("producto");
    const cantidadInput = document.getElementById("cantidad");
    const detalleBody = document.getElementById("detalleBody");
    const subtotalLabel = document.getElementById("subtotalLabel");
    const ivaLabel = document.getElementById("ivaLabel");
    const totalLabel = document.getElementById("totalLabel");
    const totalInput = document.getElementById("totalInput");
    const ivaInput = document.getElementById("ivaInput");
    const saldoInput = document.getElementById("saldoInput");
    const detalleProductosInput = document.getElementById("detalleProductos");
    const facturaForm = document.getElementById("facturaForm");

    // Seguridad: si el DOM no tiene los elementos esperados, salir sin fallar
    if (!agregarBtn || !productoSelect || !cantidadInput || !detalleBody) {
        return;
    }

    // Agregar producto
    agregarBtn.addEventListener("click", function () {
        const productoId = productoSelect.value;
        const productoNombre =
            productoSelect.options[productoSelect.selectedIndex]?.text || "";
        const precioAttr =
            productoSelect.options[productoSelect.selectedIndex]?.dataset
                ?.precio;
        const precioUnitario = parseFloat(precioAttr || "0");
        const cantidad = parseInt(cantidadInput.value) || 0;

        if (!productoId || cantidad <= 0) {
            alert("Por favor seleccione un producto y una cantidad válida");
            return;
        }

        // Verificar si el producto ya existe
        const existe = detalles.find((d) => d.productoId === productoId);
        if (existe) {
            alert(
                "Este producto ya fue agregado. Elimínalo si deseas agregar otra cantidad."
            );
            return;
        }

        const subtotal = precioUnitario * cantidad;

        detalles.push({
            productoId: productoId,
            productoNombre: productoNombre,
            cantidad: cantidad,
            precioUnitario: precioUnitario,
            subtotal: subtotal,
        });

        agregarFilaTabla();
        recalcularTotales();

        // Limpiar inputs
        productoSelect.value = "";
        cantidadInput.value = "1";
    });

    // Agregar fila a la tabla
    function agregarFilaTabla() {
        detalleBody.innerHTML = "";

        detalles.forEach((detalle, index) => {
            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${detalle.productoNombre}</td>
                <td>${detalle.cantidad}</td>
                <td>$${detalle.precioUnitario.toFixed(2)}</td>
                <td>$${detalle.subtotal.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm detalle-eliminar" data-index="${index}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            `;
            detalleBody.appendChild(fila);
        });

        // Asignar manejadores a botones eliminar (delegación simple)
        const botones = detalleBody.querySelectorAll(".detalle-eliminar");
        botones.forEach((btn) => {
            btn.addEventListener("click", function () {
                const idx = parseInt(this.dataset.index);
                eliminarProducto(idx);
            });
        });
    }

    // Eliminar producto
    function eliminarProducto(index) {
        detalles.splice(index, 1);
        agregarFilaTabla();
        recalcularTotales();
    }

    // Recalcular totales
    function recalcularTotales() {
        const subtotal = detalles.reduce(
            (sum, d) => sum + (d.subtotal || 0),
            0
        );
        const iva = subtotal * IVA_PORCENTAJE;
        const total = subtotal + iva;

        if (subtotalLabel)
            subtotalLabel.textContent = `$${subtotal.toFixed(2)}`;
        if (ivaLabel) ivaLabel.textContent = `$${iva.toFixed(2)}`;
        if (totalLabel) totalLabel.textContent = `$${total.toFixed(2)}`;

        if (totalInput) totalInput.value = total.toFixed(2);
        if (ivaInput) ivaInput.value = iva.toFixed(2);
        if (saldoInput) saldoInput.value = total.toFixed(2);
        if (detalleProductosInput)
            detalleProductosInput.value = JSON.stringify(detalles);
    }

    // Validar antes de enviar
    if (facturaForm) {
        facturaForm.addEventListener("submit", function (e) {
            if (detalles.length === 0) {
                e.preventDefault();
                alert("Por favor agregue al menos un producto a la factura");
                return false;
            }
        });
    }
});
