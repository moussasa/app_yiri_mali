@extends('layouts.main')
@section('title', 'Inscription')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@endpush
@section('dynamique')
<section class="">
    <div class="container-fluid">
        <div class="row">
            @if (Session::has('erreur'))
            <div class="bg-danger text-white p-2 m-2">
                {{Session::get('erreur')}}
                {{Session::put('erreur',null)}}
            </div>

            @endif
            
            @if (Session::has('success'))
            <div class="bg-danger text-white p-2 m-2">
                {{Session::get('success')}}
                {{Session::put('success',null)}}
            </div>

            @endif
            <div class="col-sm-6 text-black">

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem;" method="POST" action="{{route('user.login_post_user')}}">
                        @csrf

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Création de compte</h3>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example18">Votre Prenom</label>
                            <input type="text" name="name" value="{{old('name')}}" id="form2Example18"
                                class="form-control form-control-lg" />
                        </div>
                        @error('name')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example18">Votre Nom</label>
                            <input type="text" name="last_name" value="{{old('last_name')}}" id="form2Example18"
                                class="form-control form-control-lg" />
                        </div>
                        @error('last_name')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example18">Votre Télephone</label>
                            <input type="tel" name="telephone" value="{{old('telephone')}}" id="form2Example18"
                                class="form-control form-control-lg" />
                        </div>
                        @error('telephone')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example18">Votre Adresse</label>
                            <input type="tel" name="adresse" value="{{old('adresse')}}" id="form2Example18"
                                class="form-control form-control-lg" />
                        </div>
                        @error('adresse')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form2Example18">Addresse email</label>
                            <input type="email" name="email" value="{{old('email')}}" id="form2Example18"
                                class="form-control form-control-lg" />
                        </div>
                        @error('email')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-outline mb-4">
                              <label class="form-label" for="form2Example28">Password</label>
                        <input type="password" name="password" value="{{old('password')}}" id="form2Example28"
                                class="form-control form-control-lg" />
                          </div>
                        @error('password')
                        <div class="bg-danger mb-2 rounded-full text-white">
                            {{$message}}
                        </div>

                        @enderror

                        <div class="pt-1 mb-4">
                            <input type="submit" name="" value="Créer un Compte" class="btn btn-info btn-lg btn-block">

                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Mot de passe oublié ?</a></p>
                        <p>J'ai dèja un compte ? <a href="{{route('user.login')}}"
                                class="link-info">Se connecté</a></p>

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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
@endpush
@endsection