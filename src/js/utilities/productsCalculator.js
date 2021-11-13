function calculateProduct() {
    let precioventa = 0;
    let valor = parseInt(document.getElementById('valor').value);
    let valiva = parseInt(document.getElementById('iva').value) / 100;
    let valutilidad = parseInt(document.getElementById('utilidad').value) / 100;
    let iva = valiva * valor;
    let utilidad = valutilidad * valor;
    precioventa = iva + valor + utilidad;
    document.getElementById('resultado').value = precioventa;
}