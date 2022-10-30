<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #e7e7e7;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        table thead td {
            text-align: center;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #e7e7e7;
            background-color: #FFFFFF;
            border: 0mm none #e7e7e7;
            border-top: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.cost {
            text-align: center;
        }
    </style>
</head>

<body>
<table width="100%" style="font-family: sans-serif;" cellpadding="10">
    <tr>
        <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding:0;">
            <u>INVOICE</u>
        </td>
    </tr>
    <tr>
        <td height="10" style="font-size:0; line-height: 10px; height: 10px; padding:0;">&nbsp;</td>
    </tr>
</table>
<table width="100%" style="font-family: sans-serif;" cellpadding="10">
    <tr>
        <!--    Shipping address    -->
        <td width="49%" style="border: 0.1mm solid #eee;">
            <strong>HOUSE OF BHAVANA</strong>
            <br><br>
            <strong>Ship from Address:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam sint velit? Architecto consequuntur deleniti iusto neque odio quae similique.
            <br><br>
            <strong>GSTIN:</strong> 06FSWPS2032H1ZB
        </td>
        <td width="2%">&nbsp;</td>
        <!--    Invoice Number    -->
        <td width="49%" style="text-align: right;">
            <table align="right" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Invoice number</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">7418529630123456
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Order number</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XXXXXXXX
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Order Date</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">Pessenger Name
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Invoice Date</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XX/XX/XXXX

                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Ship To</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">{ name }
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Address</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XX/XX/XXXX
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Phone</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">xxxxxxxxxx
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<table width="100%" style="font-family: sans-serif; font-size: 14px;" >
    <tr>
        <td>
            <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="padding:0; line-height: 20px;">&nbsp;</td>
                </tr>
            </table>
            <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Order number</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XXXXXXXX
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Order Date</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">Pessenger Name
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Invoice Date</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XX/XX/XXXX

                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Ship To</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">{ name }
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Address</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">XX/XX/XXXX
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">
                        <strong>Phone</strong>
                    </td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">xxxxxxxxxx
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
    <thead>
    <tr>
        <td width="15%" style="text-align: left;"><strong>PAX</strong></td>
        <td width="45%" style="text-align: left;"><strong>Description</strong></td>
        <td width="20%" style="text-align: left;"><strong>Amount</strong></td>
        <td width="20%" style="text-align: left;"><strong>Total Trip Cost</strong></td>
    </tr>
    </thead>
    <tbody>
    <!-- ITEMS HERE -->
    <tr>
        <td style="padding:0 7px; line-height: 20px;"></td>
        <td style="padding:0 7px; line-height: 20px;">Split to Dubrovnik Luxury Cruise on Mama Marija</td>
        <td style="padding:0 7px; line-height: 20px;"></td>
        <td></td>
    </tr>
    <tr>
        <td style="padding:0 7px; line-height: 20px;">
            <br>
        </td>
        <td style="padding:0 7px; line-height: 20px;">
            <br>
        </td>
        <td style="padding:0 7px; line-height: 20px;">
            <br>
        </td>
        <td style="padding:0 7px; line-height: 20px;">
            <br>
        </td>
    </tr>
    <tr>
        <td style="padding:0 7px; line-height: 20px;">2</td>
        <td style="padding:0 7px; line-height: 20px;">VIP cabin with Private Balcony</td>
        <td style="padding:0 7px; line-height: 20px;">£1,295.00</td>
        <td style="padding:0 7px; line-height: 20px;">£2,590.00</td>
    </tr>
    <tr>
        <td style="padding:0 7px; line-height: 20px;">2</td>
        <td style="padding:0 7px; line-height: 20px;">Lower deck cabin</td>
        <td style="padding:0 7px; line-height: 20px;">£000.00</td>
        <td style="padding:0 7px; line-height: 20px;">£000.00</td>
    </tr>
    <tr>
        <td style="padding:0 7px; line-height: 20px;">2</td>
        <td style="padding:0 7px; line-height: 20px;">EasyJet extra legroom seats</td>
        <td style="padding:0 7px; line-height: 20px;">£000.00</td>
        <td style="padding:0 7px; line-height: 20px;">£000.00</td>
    </tr>
    </tbody>
</table>
<br>
<table width="100%" style="font-family: sans-serif; font-size: 14px;" >
    <tr>
        <td>
            <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="padding:0; line-height: 20px;">&nbsp;</td>
                </tr>
            </table>
            <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;"><strong>Total Amount</strong></td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">£000.00</td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;"><strong>Deposit</strong></td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">£000.00</td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;"><strong>Commission</strong></td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">£000.00</td>
                </tr>
                <tr>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;"><strong>Remaining Balance</strong></td>
                    <td style="border: 1px #eee solid; padding:0 8px; line-height: 20px;">Remaining Balance</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<table width="100%" style="font-family: sans-serif; font-size: 14px;" >
    <tr>
        <td>
            <table width="25%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="padding:0; line-height: 20px;">
                        <img src="#" alt="protected" style="display: block; margin: auto;">
                    </td>
                </tr>
            </table>
            <table width="50%" align="left" style="font-family: sans-serif; font-size: 13px; text-align: center;" >
                <tr>
                    <td style="padding:0; line-height: 20px;">
                        <strong>Company Name</strong>
                        <br>
                        ABC AREA
                        <br>
                        Tel: +00 000 000 0000 | Email: info@companyname.com
                        <br>
                        Company Registered in Country Name. Company Reg. 12121212.
                        <br>
                        VAT Registration No. 021021021 | ATOL No. 1234
                    </td>
                </tr>
            </table>
            <table width="25%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                <tr>
                    <td style="padding:0; line-height: 20px;">
                        <img src="#" alt="abtot" style="display: block; margin: auto;">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
