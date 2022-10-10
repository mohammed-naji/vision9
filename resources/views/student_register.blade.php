<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

    <div class="container my-5">
        {{-- @dump($std->subjects->find(3)) --}}
        <h2>Welcome : {{ $std->name }}</h2>
        <form action="{{ route('many_to_many_data') }}" method="POST">
            @csrf
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Hours</th>
                </tr>
                @foreach ($subjects as $subject)
                    <tr>
                        <td><input type="checkbox" {{ $std->subjects->find($subject->id) ? 'checked' : '' }} name="subjects[]" value="{{ $subject->id }}"> {{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->hour }}</td>
                    </tr>
                @endforeach
            </table>
            <button class="btn btn-success px-4">Register</button>
        </form>

    </div>

</body>
</html>
