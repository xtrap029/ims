@extends('basic')
@section('content')
    <div class="text-center bg-white p-4 rounded shadow-lg m-auto" style="
        max-width: 400px;
        position: absolute;
        left: 0;
        right: 0;
        top: 100px;
    ">
        <h3>Scan Asset QR</h3>
        <form id="qr-form">
            <div class="mb-3">
                <input type="hidden" id="qr-result" name="qr_data" class="form-control" readonly>
            </div>
            <div id="reader" class="rounded p-4"></div>
        </form>
    </div>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script>
        $(function() {
            function onScanSuccess(decodedText, decodedResult) {
                // Populate the QR code result in the input field
                document.getElementById('qr-result').value = decodedText;
                document.getElementById('qr-form').submit();
            }
        
            function onScanFailure(error) {
                // Log errors (optional)
                console.warn(`QR Code scan error: ${error}`);
            }
        
            // Initialize the QR code scanner
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", 
                { fps: 10, qrbox: 250 } // Adjust fps and QR box size as needed
            );

            $('document').ready("#reader__dashboard_section_csr button").addClass("btn btn-primary btn-fill")
            $(document).on("DOMNodeInserted", "#reader__dashboard_section_csr", function () {
                $("#reader__dashboard_section_csr button").addClass("btn btn-primary btn-fill");
                $("#reader").addClass("bg-white shadow-lg border-light");
            });
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        })        
    </script>
@endsection