<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <!-- Include HTML5 QR Code Library -->
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body>

<div id="qr-reader" style="width:500px"></div>
<input type="text" id="barcodeInput" name="barcode" placeholder="Scan or enter barcode">
<div id="qr-reader-results"></div>
<button id="scanButton">Scan Barcode</button>

<script>
var resultContainer = document.getElementById('qr-reader-results');
var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        document.getElementById('barcodeInput').value = decodedText;
        // Handle on success condition with the decoded message.
        html5QrcodeScanner.clear();
    }
}

// Initialize HTML5 QR Code Scanner
var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });

// Function to start barcode scanning
function startBarcodeScan() {
    html5QrcodeScanner.render(onScanSuccess);
}

// Add click event listener to the button to start barcode scan
document.getElementById("scanButton").addEventListener("click", startBarcodeScan);
</script>

</body>
</html>