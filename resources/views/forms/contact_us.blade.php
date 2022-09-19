<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact us</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container my-5">
        <h1>Contact Us</h1>
        <form method="POST" action="{{ route('contact_us_data') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Message</label>
                <textarea name="message" placeholder="Message" class="form-control" rows="5"></textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-success w-50">Send</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
