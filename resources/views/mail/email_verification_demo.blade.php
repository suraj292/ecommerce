<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('assets/fixed-image/logo.png')}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('assets/fixed-image/logo.png')}}" type="image/x-icon" />
    <title>House Of Bhavana | Email Verification</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet" />


</head>
<body>
<style>
    ul {
        list-style: none;
    }
    li {
        display: inline-block;
    }
    body {
        text-align: center;
        margin: 20px auto;
        width: 650px;
        font-family: "Nunito Sans", sans-serif;
        background-color: #e2e2e2;
        display: block;
        position: relative;
    }
    @media only screen and (max-width: 665px) {
        body {
            width: 100%;
            margin: 0;
        }
    }

    a {
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .main-logo {
        width: 110px;
        height: auto;
    }
    .header td {
        padding: 16px calc(12px + (26 - 12) * ((100vw - 320px) / (1920 - 320)));
    }
    @media only screen and (max-width: 450px) {
        .header {
            display: block;
            text-align: center;
            padding: 16px 0;
        }
        .header td {
            display: block;
            text-align: center;
            padding-top: 0;
            padding-bottom: 0;
        }
        .menu {
            margin-top: 6px;
        }
        .menu li {
            margin-left: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));
            margin-right: calc(5px + (20 - 5) * ((100vw - 320px) / (1920 - 320)));
        }
    }
    .menu {
        width: 100%;
    }
    .menu li {
        margin-left: calc(10px + (20 - 10) * ((100vw - 320px) / (1920 - 320)));
    }

    .menu li a {
        font-weight: bold;
        font-size: 14px;
        line-height: 19px;
        color: #252525;
        text-transform: capitalize;
    }
    .button-solid {
        font-weight: bold;
        font-size: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));
        line-height: calc(22px + (27 - 22) * ((100vw - 320px) / (1920 - 320)));
        display: inline-block;
        color: #ffffff;
        background: #ff4c3b;
        border-radius: 6px;
        padding: calc(10px + (14 - 10) * ((100vw - 320px) / (1920 - 320))) calc(24px + (43 - 24) * ((100vw - 320px) / (1920 - 320)));
    }
    .banner {
        position: relative;
    }
    .banner img {
        margin-bottom: -6px;
    }
    .section-t {
        margin-top: calc(25px + (32 - 25) * ((100vw - 320px) / (1920 - 320)));
        display: block;
    }
    .heading-1 {
        font-weight: bold;
        font-size: 16px;
        line-height: calc(17px + (20 - 17) * ((100vw - 320px) / (1920 - 320)));
        color: #252525;
    }
    .pera {
        font-weight: 600;
        font-size: 14px;
        line-height: calc(21px + (23 - 21) * ((100vw - 320px) / (1920 - 320)));
        text-align: center;
        color: #939393;
        margin-bottom: -4px;
    }
    .pera a {
        font-weight: bold;
        text-decoration-line: underline;
        color: #ff4c3b;
    }

    .footer {
        position: relative;
        width: 100%;
    }
    @media only screen and (max-width: 345px) {
        .footer-content {
            padding-left: 15px;
            padding-right: 15px;
        }
        .footer-content > table {
            width: 100% !important;
        }
    }
    .footer-content p,
    .footer-content a {
        font-weight: 800;
        font-size: calc(11px + (12 - 11) * ((100vw - 320px) / (1920 - 320)));
        line-height: 23px;
        text-align: center;
        letter-spacing: 0.5px;
    }
    .footer-content p {
        color: #e4e4e4;
        margin-top: 15px;
        text-transform: uppercase;
    }
    .footer-content .unsubscribe {
        text-decoration-line: underline;
        text-transform: uppercase;
        color: #ff4c3b;
        display: inline-block;
        margin-top: calc(15px + (21 - 15) * ((100vw - 320px) / (1920 - 320)));
    }
    .footer-content .social td {
        width: calc(18px + (20 - 18) * ((100vw - 320px) / (1920 - 320)));
        height: calc(18px + (20 - 18) * ((100vw - 320px) / (1920 - 320)));
        display: inline-block;
        margin: 0 calc(7px + (10 - 7) * ((100vw - 320px) / (1920 - 320)));
    }
    .footer-content td img {
        width: 100%;
    }
</style>
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #fff; width: 100%">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr class="header">
                    <td align="center" valign="top">
                        <img clicktracking="off" src="{{asset('assets/fixed-image/logo.png')}}" class="main-logo" style="width: 30px;" alt="logo"/>
                        <h3 style="font-family: Trebuchet MS, Tahoma, sans-serif;">
                            BHAVANA
                        </h3>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td class="banner">
            <table>
                <tr>
                    <td colspan="2">
                        <img clicktracking="off" style="width: 100%" src="{{ asset('assets/images/banner5.jpg') }}" alt="banner" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td class="section-t" style="position: relative; padding: 0 calc(15px + (88 - 15) * ((100vw - 320px) / (1920 - 320)))">
            <table style="width: 100%">
                <tr>
                    <td>
                        <h1 class="heading-1" style="margin-bottom: 6px">Hi {{ $name }} And Welcome To House Of Bhavana.!</h1>
                        <p class="pera">
                            We hope our product will lead you, like many other before you. to a place where your-ideas where your ideas can spark and grow.n a place where you’ll find all your inspiration
                            needs. before we get started, we’ll need to verify your email.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td class="section-t">
            <a clicktracking="off" href="{{ route('home').'/'.'verification'.'?id='.$userId.'&verification='.$link }}" class="button-solid">Verify Email</a>
        </td>
    </tr>

    <tr>
        <td class="section-t" style="padding: 0 calc(15px + (46 - 15) * ((100vw - 320px) / (1920 - 320)))">
            <p class="pera">
                If you have any question, please email us at <a href="javascript:void(0)">care@houseofbhavana.in </a> or visit our <a href="javascript:void(0)"> FAQs.</a> You can also chat with a real
                live human during our operating hours. they can answer questions about account or help you with your meditation practice.
            </p>
        </td>
    </tr>

    <tr>
        <td colspan="2" class="section-t" style="background-color: #212121; padding: calc(20px + (26 - 20) * ((100vw - 320px) / (1920 - 320))) 0">
            <table class="footer">
                <tr>
                    <td class="footer-content">
                        <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center" class="text-center" style="vertical-align: middle; margin: 0 auto; width: 326px">
                            <tr>
                                <td>
                                    <p>THIS EMAIL WAS AUTOGENERATED BY SYSTEM. MADE WITH BY DESIGN HOB TEAM.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
