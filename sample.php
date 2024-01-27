<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
@media print{
    
    .invoice {
            border: 1px solid #000;
            padding: 20px;
            margin: 20px;
        }
}
        .invoice {
            border: 1px solid #000;
            padding: 20px;
            margin: 20px;
        }

        /* Add more styles for your invoice content as needed */
    </style>
</head>
<body>

    <!-- Invoice content -->
    <div class="invoice">
        <h2>Invoice</h2>
        <p>Date: January 22, 2024</p>
        <p>Customer: John Doe</p>
        <!-- Add more invoice details as needed -->

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item 1</td>
                    <td>Description 1</td>
                    <td>2</td>
                    <td>$20.00</td>
                </tr>
                <!-- Add more rows for additional items -->
            </tbody>
        </table>

        <p>Total: $40.00</p>
    </div>

    <!-- Buttons to trigger the print preview and direct print -->
    <button onclick="previewInvoice()">Print Preview</button>
    <button onclick="printInvoice()">Print Directly</button>

    <!-- JavaScript functions for printing -->
    <script>
        function previewInvoice() {
            // Open the browser's print preview
            window.print();
        }

        function printInvoice() {
            // Get the invoice element
            var invoiceElement = document.querySelector('.invoice');

            // Open a new window and write the invoice content to it
            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Print Invoice</title></head><body>');
            printWindow.document.write(invoiceElement.outerHTML);
            printWindow.document.write('</body></html>');

            // Close the document stream
            printWindow.document.close();

            // Print the contents of the new window directly
            printWindow.print();

            // Close the new window after printing
            printWindow.close();
        }

        document.addEventListener('keydown', function (event) {
    // Check if Ctrl + P (Windows/Linux) or Command + P (Mac) is pressed
    if ((event.ctrlKey || event.metaKey) && event.key === 'p') {
        // Simulate pressing "Enter" key after a short delay
        setTimeout(function () {
            window.print();
        }, 500);
    }
});

    </script>

</body>
</html>
