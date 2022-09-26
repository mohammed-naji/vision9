<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }
        .btn {
            border: 0 !important;
            margin: 0 !important;

        }

        .search-form {
            width: 0;
            overflow: hidden;
            float: left;
            transition: all .8s ease;
        }

        .btn-wrapper {
            text-align: right;
            width: 100%;
            float: right;
            transition: all .8s ease;
        }

        .btn-show {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <h1>Deleted Posts</h1>

        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->deleted_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-undo"></i></a>
                        <a onclick="return confirm('Are you sure?')" href="{{ route('posts.forcedelete', $post->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $posts->appends($_GET)->links() }}
    </div>
</body>
</html>
