<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.loading {
    position: fixed;
    background: #666;
    width: 100%;
    height: 100%;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loading img {
    width: 200px;
}

.prog-bar {
    width: 300px;
    height: 3px;
    background: #222;
    margin-top: 20px;
    border-radius: 5px;
    overflow: hidden;
}

.prog-bar div {
    width: 0%;
    background: #fff;
    height: 3px;
    transition: all .3s ease;
}
    </style>
  </head>
  <body>


    <div class="loading text-center">
        <div>
            <img src="{{ asset('assets/img/Horse_gif.gif') }}" alt="">
            <div class="prog-bar">
                <div></div>
            </div>
        </div>
    </div>


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
                <input type="text" placeholder="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" placeholder="Age" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" />
                @error('age')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" placeholder="Age" name="age1" class="form-control @error('age1') is-invalid @enderror" value="{{ old('age1') }}" />
                @error('age1')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" placeholder="Age" name="age2" class="form-control @error('age2') is-invalid @enderror" value="{{ old('age2') }}" />
                @error('age2')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" placeholder="Age" name="age3" class="form-control @error('age3') is-invalid @enderror" value="{{ old('age3') }}" />
                @error('age3')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success" disabled>Send</button>
        </form>
    </div>

    <script>


        let inputs = document.querySelectorAll('input');
        let btn = document.querySelector('.btn');

        inputs.forEach(el => {
            el.onkeyup = () => {
                let error = [];

                if(el.value.length > 0) {
                    el.classList.add('is-valid')
                    el.classList.remove('is-invalid')
                }else {
                    el.classList.add('is-invalid')
                    el.classList.remove('is-valid')
                }


                inputs.forEach(el => {
                    if(el.value.length == 0) {
                        error.push(1)
                    }
                });

                console.log(error);

                if(error.length == 0) {
                    btn.disabled = false;
                }else {
                    btn.disabled = true;
                }
            }
        });


        let loading = document.querySelector('.loading');
        let body = document.querySelector('body');
        let div = document.querySelector('.prog-bar div');
        body.onload = () => {
            setTimeout(() => {
                loading.style.display = 'none';
            }, 2000);

            let i = 1;
            setInterval(() => {
                div.style.width = 25 * i + '%';
                i++;
            }, 500);
        }

    </script>
  </body>
</html>
