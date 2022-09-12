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

        {{-- @dump($errors) --}}
        {{-- @dump($errors->any())
        @dump($errors->all()) --}}

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <h1>Basic Form</h1>
        <form action="{{ route('form3_data') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="text" placeholder="Age" name="age" class="form-control @error('age') is-invalid @enderror" />
                @error('age')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">Send</button>
        </form>
    </div>

  </body>
</html>
