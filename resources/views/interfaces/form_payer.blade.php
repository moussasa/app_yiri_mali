@extends('layouts.main')
@section('title', 'Formulaire')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/interface_form.css')}}">

@endpush
@section('dynamique')


<div class="panel-body">
    @if (Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
        {{Session::put('success',null)}}
        <a href="{{route('main')}}">Retourner à l'accueil</a>

    </div>
    @endif

    <div class="panel-body">
        @if (Session::has('erreur'))
        <div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('erreur') }}</p>
            {{Session::put('erreur',null)}}
            <a href="{{route('main')}}">Retourner à l'accueil</a>

        </div>
        @endif




        <section class="ftco-section m-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <form action="{{ route('payer.form_payer') }}" method="POST" id="checkout-form">
                            @csrf
                            <input type="hidden" required readonly name="prd_id" id="prd_id" value="{{ $produit->id}}">
                            <h3 class="mb-4 billing-heading">Veillez entrer les détails de votre carte visa</h3>
                            <div class="row align-items-end">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">Nom sur la carte</label>
                                        <input type="text" required autocomplete="off" id="card-name" name="card-name"
                                            value="{{old('card-name')}}" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">Numero de la catre</label>
                                        <input type="text" id="card-number" name="card-number"
                                            value="{{old('card-number')}}" required autocomplete="off"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">CVC</label>
                                        <input type="text" id="card-cvc" name="card-cvc" value="{{old('card-cvc')}}"
                                            required autocomplete="off" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">Mois d'expiration de la carte</label>
                                        <input type="text" value="{{old('card-expiry-month')}}" autocomplete="off"
                                            required name="card-expiry-month" id="card-expiry-month"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">Année d'expiration de la carte</label>
                                        <input type="text" autocomplete="off" required id="card-expiry-year"
                                            name="card-expiry-year" value="{{old('card-expiry-year')}}"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="w-100"></div>

                            </div>
                            <br>
                            <input type="submit" name="btn_sold" id="btn_sold" value="Payer" class="btn btn-primary">
                        </form><!-- END -->
                    </div>

                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total à payer: </span>
                                    <span>{{ $produit->prix_prod}}</span>
                                </p>
                            </div>

                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </div>
        </section> <!-- .section -->
        @push('scripts')


        <script src="https://js.stripe.com/v2/"></script>
        <script src="{{asset('src/js/paiement.js')}}"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script>

        </script>
        @endpush
        @endsection