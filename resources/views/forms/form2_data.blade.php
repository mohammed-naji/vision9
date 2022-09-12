<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <div class="alert alert-success">
            <p><b>Name:</b> {{ $name }}</p>
            <p><b>Email:</b> {{ $email }}</p>
            <p><b>Message:</b> {{ $message }}</p>
        </div>
    </div>

  </body>
</html>
