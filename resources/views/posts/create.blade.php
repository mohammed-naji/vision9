<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between">
            <h1>Add New Post</h1>
            <a href="{{ route('posts.index') }}" class="btn btn-dark px-4"> <i class="fas fa-arrow-left"></i> Return Back</a>
            {{-- <a onclick="history.back()" class="btn btn-dark px-4"> <i class="fas fa-arrow-left"></i> Return Back</a> --}}
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" placeholder="Title" name="title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" />
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image')
                    is-invalid
                @enderror" />
                @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea placeholder="Content" name="content" class="form-control @error('content')
                    is-invalid
                @enderror" rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-success"> <i class="fas fa-plus"></i> Add</button>

        </form>


    </div>

</body>
</html>
