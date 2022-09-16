<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0"
        style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;">
        <thead bgColor="#eee" style="border-radius: 12px;">
            <th style="padding: 50px">
                <img src="{{ $message->embed(public_path() . '/home/images/sri-golju-furniture-industries-logo.png') }}" alt="Sri Golju Furniture Industries">
            </th>
        </thead>
        <tbody bgColor="#2582EB" style="color:#fff">
            <tr>
                <td align="center" style="padding:50px;font-size:24px">
                      Thank You For Subscribing our newsletter.
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellpadding="0" cellspacing="0"
        style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;">
        <tbody bgColor="#eee">
            <tr>
                <td align="center" style="padding:50px">
                    We will send you notifications about our new offers and furnitures.
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td align="left" style="padding-top:50px;">
                    Thanks & Reguards <br> <strong>Sri Golju Furniture Industries</strong>
                </td>
            </tr>
            <tr>
                <td align="right" style="padding-top:50px;">
                    <a href="{{ url('/unsubcribe-newsletter/'. $data['encrypt_email']) }}" style="padding: 6px 10px; text-align: center;background-color: red;color:white;text-decoration:none;">Unsubscribe</a>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
