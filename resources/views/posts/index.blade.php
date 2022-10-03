<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        img {
            height: 80px;
            object-fit: cover;
        }
    </style>

    <script>
        // console.log(Number.MAX_VALUE + 5555);
    </script>
</head>

<body>

    <div class="container my-5">
        <a download="download" href="{{ asset('Q1.docx') }}" class="btn btn-info px-5"><i class="fas fa-download"></i>
            Save File</a>
        <a class="btn btn-warning" href="{{ route('posts.trash') }}"><i class="fas fa-trash"></i> Trash</a>
        <div class="d-flex align-items-center justify-content-between">
            <h1>All Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-dark px-4"> <i class="fas fa-plus"></i> Add New
                Item</a>
        </div>
        <form method="get" action="{{ route('posts.index') }}">
            <div class="row my-4">
                <div class="col-1">
                    <select name="searchby" class="form-select">
                        <option {{ request()->searchby == 'id' ? 'selected' : '' }} value="id">ID</option>
                        <option {{ request()->searchby == 'title' ? 'selected' : '' }} value="title">Title</option>
                        <option {{ request()->searchby == 'content' ? 'selected' : '' }} value="content">Content
                        </option>
                    </select>
                </div>
                <div class="col-8">
                    <div class="search-wrapper">
                        <input type="text" name="word" class="form-control" placeholder="Search here.."
                            value="{{ request()->word }}">
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
                        <option {{ request()->count == $posts->total() ? 'selected' : '' }}
                            value="{{ $posts->total() }}">All</option>
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

        {{-- @dump(session('msg')) --}}

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


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
                    <td>
                        <a download href="{{ asset('uploads/posts/' . $post->image) }}">{{ $post->image }}</a>
                        <br>
                        <a download href="{{ asset('uploads/posts/' . $post->image) }}"><img width="100"
                                src="{{ asset('uploads/posts/' . $post->image) }}" alt=""></a>
                    </td>
                    <td>{{ $post->created_at->format('F d, Y') }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm"><i
                                    class="fas fa-eye"></i></a>
                            <a
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                href="{{ route('posts.edit', $post->id) }}"
                                class="btn btn-primary btn-sm btn-edit"
                                data-title="{{ $post->title }}"
                                data-image="{{ asset('uploads/posts/' . $post->image) }}"
                                data-content="{{ $post->content }}"
                                data-url="{{ route('posts.update', $post->id) }}"
                            ><i
                                    class="fas fa-edit"></i></a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" id="edit-form">
                        @csrf
                        @method('put')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" placeholder="Title" name="title" class="form-control"
                                    value="" />
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img width="100" src="" alt="">
                            </div>

                            <div class="mb-3">
                                <label>Content</label>
                                <textarea placeholder="Content" name="content" class="form-control" rows="5"></textarea>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
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

    <script>
        $('.btn-edit').on('click', function() {

            var title = $(this).data('title');
            var image = $(this).data('image');
            var content = $(this).data('content');
            var url = $(this).data('url');

            $('#edit-form').attr('action', url)

            $('#edit-form input[name=title]').val(title)
            $('#edit-form img').attr('src', image)
            $('#edit-form textarea').val(content)

        })
    </script>

    <script>
        setTimeout(() => {
            $('.alert-success').fadeOut();
        }, 3000);

        $('.search-wrapper input').on('keyup', function() {
            let text = $(this).val();

            console.log(text.length);
            $('.search-result a').remove();
            if (text.length >= 1) {
                $.ajax({
                    type: 'get',
                    url: '{{ route('posts.search') }}',
                    data: {
                        text: text
                    },
                    success: function(res) {


                        res.data.forEach(element => {

                            // console.log(element.title);
                            let url = '{{ route('posts.index') }}/' + element.id;
                            // let a = '<a href="'+url+'">'+element.title+'</a>';

                            // let x = `
                        // <div>
                        //     <h2></h2>
                        //     <p></p>
                        //     <a></a>
                        // </div>
                        // `


                            let a = `<a href="${url}">${element.title}</a>`;
                            $('.search-result').append(a)
                        });

                        // console.log(res.data);
                    }
                })
            }
        })
    </script>

</body>

</html>
