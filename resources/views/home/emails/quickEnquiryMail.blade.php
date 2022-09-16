<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
            border: 1px solid #fff;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            max-width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0"
        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <thead bgColor="#eee" style="border-radius: 12px;">
            <th style="padding: 50px">
                <img src="{{ $message->embed(public_path() . '/home/images/sri-golju-furniture-industries-logo.png') }}" alt="Sri Golju Furniture Industries">
            </th>
        </thead>
        <tbody bgColor="#2582EB" style="color:#fff">
            <tr>
                <th>
                    Enquiry Name
                </th>
                <td>
                    {{ $data['name'] }}
                </td>
            </tr>
            <tr>
                <th>
                    Enquiry Number
                </th>
                <td>
                    {{ $data['mobile_number'] }}
                </td>
            </tr>
            <tr>
                <th>
                    Enquiry Email
                </th>
                <td>
                    {{ $data['email'] }}
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellpadding="0" cellspacing="0"
        style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <tfoot>
            <tr>
                <td align="left" style="padding-top:50px;">
                    Thanks & Reguards <br> <strong>Sri Golju Furniture Industries</strong>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>

