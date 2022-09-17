<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>
</head>
<body>
    <div>
        <h5>Simple qr code</h5>
        {{QrCode::generate("webappfix.com")}}
    </div>
    <div>
        <h5>QR Code with specific size</h5>
        {!! QrCode::size(200)->generate('Webappfix.com'); !!}

        {{QrCode::size(200)->generate('Webappfix.com')}}
    </div>

    <div>
        <h5>QR Code with background</h5>
        {{ QrCode::size(200)->backgroundColor(255,55,0)->generate('Webappfix.com')}}
    </div>


    <div>
        <h5>QR With Email Send</h5>
        <?php
        $to_address = 'wariszargardev@gmail.com';
        $subject = 'QR code scan';
        $body = 'Thanks for scanning';

        //YOU CAN JUST ADD EMAIL ADDRESS
        // QrCode::email('john@w3adda.com');

        // PREFIX SUBJECT AND BODY EMAIL WILL ENTERED
        // QrCode::email(null, 'Test message subject', 'This is message body.');

        //SPECIFY EMAIL,SUBJECT,BODY
        // QrCode::email('john@w3adda.com', 'Thank you for visiting w3adda.com', 'Laravel Tutorial');
        ?>
        {{ QrCode::email($to_address, $subject, $body)}}
    </div>

    <div>
        <h5>QR code with phone number</h5>
        {{QrCode::phoneNumber('03086529243')}}
    </div>

    <div>
        <h5>QR with Send SMS</h5>
        {{QrCode::SMS("03086529243", "I am scanning ")}}
    </div>

    <div>
        <h5>QR Code Base On Geo co-ordinates</h5>
        {{QrCode::geo('31.5204', '74.3587')}}
    </div>
</body>
</html>
