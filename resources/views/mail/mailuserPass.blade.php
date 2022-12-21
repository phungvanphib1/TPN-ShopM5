<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <div class="row">
                            <img src="https://dynamic.brandcrowd.com/asset/logo/18bb4196-1343-4949-85e5-57c4eb52b536/logo-search-grid-1x?v=637913693981800000&text=TPNstore"
                                alt="" style="right: 50px; width: 260px;" />
                        </div>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        @if (isset($params['name']))
                                            <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                                <h2 style="text-align:center;">Xin Chào: <i>{{ $params['name'] }}</i></h2>
                                            </h1>
                                            <h3 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                                <h4 style="text-align:center;">Bạn đã gửi yêu cầu cấp lại mật khẩu đến
                                                    chúng tôi!</i></h4>
                                            </h3>
                                        @endif
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0;">
                                        <table role="presentation"
                                            style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <p
                                                    style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                    <b><i>Hãy Dùng Mật Khẩu Này Để Truy Cập Tài Khoản Của
                                                            Bạn</i></b><br>
                                                    <b style="color: #ee4c50"><i>Không chia sẽ mật khẩu này với bất kì
                                                            ai! <br></i></b>
                                                <h4>
                                                    @if (isset($params['password']))
                                                        <p
                                                            style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                            <a href="#"
                                                                style="color:#ee4c50;text-decoration:underline;"><b
                                                                    style="color: blue"><i>Mật khẩu của bạn là:
                                                                    </i></b>{{ $params['password'] }}<br></a>
                                                        </p>
                                                    @endif
                                                </h4>
                                                </p>
                                                <p
                                                    style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                    <a href="#"
                                                        style="color:#ee4c50;text-decoration:underline;">Email Liên
                                                        Hệ: <a href="mailto:phungvanphib1@gmail.com"
                                                            style="color:rgb(17,85,204)" target="_blank">TPNSHOP</a></a>
                                                </p>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
