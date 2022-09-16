<!DOCTYPE html>
<html>

<head>
    <style>
    @page {
        margin: 0cm 0cm;
    }

    body {
        margin-top: 4.5cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 2cm;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    header {
        position: fixed;
        top: 0.5cm;
        left: 0.5cm;
        right: 0.5cm;
        height: 2cm;
    }

    footer {
        position: fixed;
        bottom: 1cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
    }

    .img-fluid {
        width: 40px;
        object-fit: cover;
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

    .ctable tbody tr:nth-child(3n) {
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

    .pageCount:before {
        content: counter(page);
    }
    </style>
</head>

<body>
    <header>
        <table>
            <tr>
                <td>
                    Date: {{$data->added_date}}
                </td>
                <td style="text-align:right">
                    GSTIN/UIN: 05ABGFS2757M1ZR
                </td>
            </tr>
            <tr>
                <td>
                    Ref. No: {{$data->reference_number}}
                </td>
                <td style="text-align:right">
                    HSN Code: 940310
                </td>
            </tr>
        </table>
    </header>
    <header>
        <img src="{{ asset('images/template-header.png') }}" alt="Sri Golju Furniture Indistries"
            style="width:100%;object-fit:cover">
    </header>

    <main>
        <table>
            <tr>
                <td>
                    To,<br>
                    <strong>
                        {{$data->client_name}}
                    </strong>
                </td>
            </tr>
        </table>
        <table class="ctable">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Particular</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>M.R.P</th>
                    @if ($data->price_type === "mrp" && $data->sector === 'non-government')
                    <th>Rate</th>
                    @endif
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($items as $item)
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset('images/quotation/'.$item->image) }}" alt="{{ $item->name }}"
                            class="img-fluid">
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td><span style="font-family: DejaVu Sans;">&#8377;</span>{{ $item->unit_price }}</td>
                    @if ($data->price_type === "mrp" && $data->sector === 'non-government')
                    <td><span style="font-family: DejaVu Sans;">&#8377;</span>{{ $item->rate }}</td>
                    @endif
                    <td><span style="font-family: DejaVu Sans;">&#8377;</span>{{ $item->discounted_total }}</td>
                </tr>
                <tr>
                    <td colspan="12">
                        <strong>Description:-</strong>
                        {{ $item->description }}
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <strong>Color:-</strong>
                        {{ $item->color }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table">
            @if ($data->discount)
            <tr>
                <td><b>Sub Total:</b></td>
                <td><b><span style="font-family: DejaVu Sans;">&#8377;</span>{{ $data->sub_total }}</b></td>
            </tr>
            <tr>
                <td><b>Discount:</b></td>
                <td><b>{{ $data->discount }}%</b></td>
            </tr>
            @endif
            <tr>
                <td><b>Grand Total:</b></td>
                <td><b><span style="font-family: DejaVu Sans;">&#8377;</span>{{ $data->grand_total }}</b></td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="6">
                    <b>Bank Info:-</b>
                    <br>
                    <b>Bank Name:</b> {{ $bank->title }}<br>
                    <b>A/C Number:</b> {{ $bank->number }}<br>
                    <b>A/C Name:</b> {{ $bank->name }}<br>
                    <b>IFSC Code:</b> {{ $bank->ifsc_code }}<br>
                </td>
                <td colspan="6" style="text-align:center">
                    <br>
                    <br>
                    <br>
                    <br>
                    --------------------------------------------------
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <b>Terms & Conditions:-</b>
                    <br>
                    @if($data->terms_and_conditions)
                        {!! $data->terms_and_conditions !!}
                    @endif
                </td>
                <td style="text-align:right">
                    Your Sincerely<br>
                    <strong>{{ $made_by->name }}</strong><br>
                    {{ $designation }}<br>
                    {{ $made_by->mobile_number }}
                </td>
            </tr>
        </table>
    </main>

    <footer>
        <table>
            <tr>
                <td style="text-align:center; font-size:12px">
                    ---------------------------------------------------------Thank you for doing business with
                    us.---------------------------------------------------------
                    <br>
                    <br>
                    <b>Phone No:</b> 1800-123-777-778(Toll-Free) &nbsp; <b>Email:</b> sales.srigoljufurniture@gmail.com
                    &nbsp;
                    <b>Website:</b> www.srigoljufurniture.com<br>
                    Sri Golju Tower, Opposite Jivan Daan Hospital, Bareilly - Nainital Rd, Moti Nagar Road
                    Haldwani,Uttarakhand
                    | 263139
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    Page - <span class="pageCount"></span>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>