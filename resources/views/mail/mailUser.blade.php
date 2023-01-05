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
    <table role="presentation"
        style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        @if(isset($data['name']))
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">
                                            <h2 style="text-align:center;">Xin Chào: <i>{{ $data['name'] }}</i></h2>
                                        </h1>
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
                                                <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                    <p
                                                        style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                        <img src="https://dynamic.brandcrowd.com/asset/logo/18bb4196-1343-4949-85e5-57c4eb52b536/logo-search-grid-1x?v=637913693981800000&text=TPNstore"
                                                            alt="" width="260" style="height:auto;display:block;" />
                                                    </p>
                                                    <p
                                                        style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">

                                                        <b><i>Hãy Dùng Mật Khẩu Này Để Truy Cập Tài Khoản Của
                                                                Bạn</i></b><br>
                                                        <b><i>Không chia sẽ mật khẩu này với bất kì ai! <br></i></b>
                                                        <b><i>Chúc Bạn Một Ngày Làm Việc Vui Vẻ!.</i></b><br>
                                                        <b><i>Thân Ái!.</i></b><br>
                                                    <h4>
                                                        @if(isset($data['pass']))
                                                        <p
                                                            style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                            <a href="#"
                                                                style="color:#ee4c50;text-decoration:underline;"><b
                                                                    style="color: blue"><i>Mật khẩu: </i></b>{{
                                                                $data['pass'] }}<br></a>
                                                        </p>
                                                        @endif
                                                    </h4>
                                                    </p>
                                                    <p
                                                        style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                        <a href="#"
                                                            style="color:#ee4c50;text-decoration:underline;">Email Liên
                                                            Hệ: <a href="mailto:phungvanphib1@gmail.com"
                                                                style="color:rgb(17,85,204)"
                                                                target="_blank">TPNSHOP</a></a>
                                                    </p>
                                                </td>
                                                <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                                <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                                    <p
                                                        style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                        <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/318028963_1197603350858587_862164060244926472_n.png?stp=dst-png_p403x403&_nc_cat=102&ccb=1-7&_nc_sid=aee45a&_nc_ohc=Jd2RSrFOwKkAX9jKwdu&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTtL9wIujpn3a4WzaQF79ztQ_GTPcId8vA9kWBt3AbScg&oe=63C86FC1"
                                                            alt="" width="260" style="height:auto;display:block;" />
                                                    </p>
                                                    <p
                                                        style="margin: 45px 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                        <b><i>Chào Mừng Bạn Đã Gia Nhập Vào Công Ty Của Chúng
                                                                Tôi</i></b><br>
                                                        <b><i>Chúng Tôi Rất Mong Muốn Bạn Luôn Đồng hành Cùng Chúng Tôi
                                                                Và Cống Hiến Hiến Mình. Mọi Nổ Lực Của Bạn Sẽ Được Đền
                                                                Đáp</i></b><br>
                                                    </p>
                                                    </p>
                                                    <p
                                                        style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                                        <a href="#"
                                                            style="color:#ee4c50;text-decoration:underline;"></a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;background:#ee4c50;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                <tr>
                                    <td style="padding:0;width:50%;" align="left">
                                        <p
                                            style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                            &reg; PTNShope, limited 2023<br />
                                        </p>
                                    </td>
                                    <td style="padding:0;width:50%;" align="right">
                                        <table role="presentation"
                                            style="border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img
                                                            src="https://assets.codepen.io/210284/tw_1.png"
                                                            alt="Twitter" width="38"
                                                            style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img
                                                            src="https://assets.codepen.io/210284/fb_1.png"
                                                            alt="Facebook" width="38"
                                                            style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
