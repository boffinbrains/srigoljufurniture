<!DOCTYPE html>
<html>

<head>
    <style>
    @page {
        margin: 0cm 0cm;
    }

    body {
        margin-top: 1cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 1cm;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0.5cm;
    }

    table thead th {
        padding-top: 12px;
        padding-bottom: 12px;
        color: white;
        background-color: #d72519;
        margin-bottom: 0.5cm;
    }

    table tbody {
        margin-bottom: 0.5cm;
    }

    .ctable tbody tr:nth-child(2n) {
        background-color: #f2f2f2;
    }

    table th {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table td {
        padding: 8px;
    }

    .table tr td {
        padding-top: 0.2cm;
        padding-bottom: 0.2cm;
        padding-left: 0.5cm;
        padding-right: 0.5cm;
        border: 1px solid;
    }
    </style>
</head>

<body>
    <main>
        <table class="ctable">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Image</th>
                    <th style="width:50%">Description</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1; 
                @endphp
                @foreach ($items as $item)
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td>
                        <img src="{{ asset('images/order-slip/'.$item->item_image) }}" alt="{{ $item->item_name }}" style="width: 240px;height: 140px;">
                    </td>
                    <td>{{ $item->fabric }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>