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

        .search-wrapper {
            position: relative;
        }
        .search-result {
            /* border: 1px solid #f00; */
            box-shadow: 0 0 10px #eee;
            position: absolute;
            width: 100%;
        }

        .search-result a {
            display: block;
            text-decoration: none;
            color: #333;
            background: rgb(246, 251, 255);
            padding: 5px 15px;
            border-bottom: 1px solid rgb(209, 209, 209);
        }

        .search-result a:hover {
            background: rgb(219, 229, 237);
        }

        .search-result a:last-of-type {
            border: 0
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <h1>All Posts</h1>
        <form method="get" action="{{ route('posts.index') }}">
        <div class="row my-4">
            <div class="col-1">
                <select name="searchby" class="form-select">
                    <option {{ request()->searchby == 'id' ? 'selected' : '' }} value="id">ID</option>
                    <option {{ request()->searchby == 'title' ? 'selected' : '' }} value="title">Title</option>
                    <option {{ request()->searchby == 'content' ? 'selected' : '' }} value="content">Content</option>
                </select>
            </div>
            <div class="col-8">
                <div class="search-wrapper">
                    <input type="text" name="word" class="form-control" placeholder="Search here.." value="{{ request()->word }}">
                    <div class="search-result">
                    </div>
                </div>
            </div>
            <div class="col-1">
                <select name="count" class="form-select">
                    <option {{ request()->count == '10' ? 'selected' : '' }} value="10">10</option>
                    <option {{ request()->count == '15' ? 'selected' : '' }} value="15">15</option>
                    <option {{ request()->count == '20' ? 'selected' : '' }} value="20">20</option>
                    <option {{ request()->count == '25' ? 'selected' : '' }} value="25">25</option>
                    <option {{ request()->count == $posts->total() ? 'selected' : '' }} value="{{ $posts->total() }}">All</option>
                </select>
            </div>
            <div class="col-2">
                <button class="btn-show btn btn-primary w-100"><i class="fas fa-search"></i></button>
            </div>
        </div>
        </form>



                {{-- <div class="search-wrapper my-4">
                    <div class="search-form">
                        <form>
                        <div class="row">
                            <div class="col-1 p-0">
                                <select name="searchby" class="form-select hidesearch">
                                    <option value="id">ID</option>
                                    <option value="title">Title</option>
                                    <option value="content">Content</option>
                                </select>
                            </div>
                            <div class="col-10 p-0">
                                <input type="text" name="word" class="form-control hidesearch">
                            </div>
                            <div class="col-1 p-0">
                                <select name="count" class="form-select hidesearch">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="text-end btn-wrapper">
                        <button class="btn-show btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <div style="clear: both"></div>
                </div> --}}



        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><img width="100" src="{{ $post->image }}" alt=""></td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                        <form class="d-none" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $posts->appends($_GET)->links() }}
    </div>

    <script>
        // let btn = document.querySelector('.btn-show');
        // let wrapper = document.querySelector('.btn-wrapper');
        // let form = document.querySelector('.search-form');
        // btn.onclick = (e) => {
        //     e.preventDefault();
        //     wrapper.style.width = '15%';
        //     form.style.width = '85%';
        // }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btn-delete').click(function() {
            var btn = $(this);
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                btn.next('form').submit();
            }
            })
        })
        // Swal.fire({
        // title: 'Error!',
        // text: 'Do you want to continue',
        // icon: 'error',
        // confirmButtonText: 'Cool'
        // })
    </script>


{{-- Search Box Ajax --}}
    <script>
        $('.search-wrapper input').on('keyup', function() {
            var texttext = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ route("posts.search") }}',
                data: {
                    txt: texttext
                },
                success: function(res) {
                    console.log(res);
                }
            })
            // console.log(txt);
        })
    </script>
</body>
</html>
