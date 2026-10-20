<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice_number }}</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .header-left {
            display: table-cell;
        }

        .header-right {
            display: table-cell;
            text-align: right;
        }

        .details {
            width: 100%;
            margin-bottom: 40px;
        }

        .details td {
            padding: 5px 0;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
        }

        .items-table th {
            background: #f9f9f9;
            text-align: left;
            padding: 10px;
            border-bottom: 2px solid #eee;
        }

        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .total-section {
            text-align: right;
            margin-top: 30px;
        }

        .total-amount {
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="header">
            <div class="header-left">
                <h1>INVOICE</h1>
                <p>#{{ $invoice_number }}</p>
            </div>
            <div class="header-right">
                <p><strong>Date:</strong> {{ $date }}</p>
            </div>
        </div>

        <table class="details">
            <tr>
                <td>
                    <strong>From:</strong><br>
                    {{ config('app.name') }}<br>
                    your@email.com
                </td>
                <td style="text-align: right">
                    <strong>To:</strong><br>
                    {{ $client_name }}<br>
                    {{ $client_email }}
                </td>
            </tr>
        </table>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <p><strong>Total Amount:</strong> <span class="total-amount">${{ number_format($total, 2) }}</span></p>
        </div>
    </div>
</body>

</html>