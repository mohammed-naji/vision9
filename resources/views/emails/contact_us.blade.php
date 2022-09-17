<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #eee;font-family: Arial, Helvetica, sans-serif">

    <div style="background: #fff;width:600px;margin: 0 auto;border: 2px solid #979797;padding:30px;margin-top:40px">
        <h2>Welcome Dear,</h2>
        <p>Hope this email finds you well</p>

        <br>

        <p>There is new contact us email with the following data:</p>
        <p><b>Name:</b> {{ $data['name'] }}</p>
        <p><b>Email:</b> {{ $data['email'] }}</p>
        <p><b>Message:</b> {{ $data['message'] }}</p>


        <br>
        <br>
        <p>Best Regards</p>
        <p>Mohammed N. Abu alqumbuz</p>
    </div>

</body>
</html>
