<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  >
    <title>Login</title>
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                @if (Session::has('erreur'))
                 <div class="bg-danger text-white p-2 m-2">
                    {{Session::get('erreur')}}
                    {{Session::put('erreur',null)}}
                 </div>
                    
                @endif
                @if (Session::has('success'))
                 <div class="bg-success text-white p-2 m-2">
                    {{Session::get('success')}}
                    {{Session::put('success',null)}}
                 </div>
                    
                @endif
                <div class="col-sm-6 text-black">


                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" method="POST" action="{{route('user.login_post')}}">
                            @csrf

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connection</h3>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" value="{{old('email')}}" id="form2Example18"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example18">Addresse email</label>
                            </div>
                            @error('email')
                            <div class="bg-danger mb-2 rounded-full text-white">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-outline mb-4">
                                <input type="password" name="password" value="{{old('password')}}" id="form2Example28"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example28">Password</label>
                            </div>
                            @error('password')
                            <div class="bg-danger mb-2 rounded-full text-white">
                                {{$message}}
                            </div>

                            @enderror

                            <div class="pt-1 mb-4">
                                <input type="submit" name="" value="Se connecter" class="btn btn-info btn-lg btn-block">

                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Mot de passe oublié ?</a></p>
                            <p>Vous n'avez pas de compte ? <a href="{{route('user.create_account')}}" class="link-info">Créer un compte ici</a></p>

                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Login image" class="w-100 vh-70"
                        style="object-fit: cover; ">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        >
    </script>
</body>

</html>