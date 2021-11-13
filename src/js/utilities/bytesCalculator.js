function dataCalculator() {
    let megabytes = document.getElementById('megabytes').value;
    let format = parseInt(document.getElementById('format').value);
    let resultText = document.getElementById('resultText');
    let result = 0;
    if (megabytes == 0) {
        alert('Por favor añade un valor de megabytes mayor a 0');
    } else {
        if (format == 0) alert('Por favor selecciona metodo de conversion');
        switch (format) {
            case 1:
                resultText.innerHTML = "Resultado en Bytes"
                result = megabytes * 1000000;
                document.getElementById('result').value = result;
                break;
            case 2:
                resultText.innerHTML = "Resultado en Kilobytes"
                result = megabytes * 1000;
                document.getElementById('result').value = result;
                break;
            case 3:
                resultText.innerHTML = "Resultado en Gigabytes"
                result = megabytes / 1000;
                document.getElementById('result').value = result;
                break;
            case 4:
                resultText.innerHTML = "Resultado en Terabytes"
                result = megabytes / 1000000;
                document.getElementById('result').value = result;
                break;
        }
    }
}