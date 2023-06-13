@extends('layouts.main')
@section('title', 'Formation')

@push('css')
<link rel="stylesheet" href="{{asset('css/interface_formation.css')}}">
@endpush

@section('dynamique')



{{-- session message --}}

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show m-5 bg-blue-500" role="alert">
    <strong>{{Session::get('success')}} </strong>
    <a href="{{route('main')}}" class="btn btn-primary p-2"> Cliquez ici</a>
</div>
{{Session::put('success',null)}}
@endif
@if (Session::has('erreur'))
<div class="alert alert-danger alert-dismissible fade show m-5 bg-blue-500" role="alert">
    <strong>{{Session::get('erreur')}} </strong>
    <a href="{{route('main')}}" class="btn btn-primary p-2"> Cliquez ici</a>
</div>
{{Session::put('erreur',null)}}
@endif




<div class="form_container">

    <form action="{{ route('send_formation') }}" method="POST" id="checkout-form">
        @csrf
        <input type="hidden" required readonly name="prd_id" id="prd_id" value="">
        <h3 class="title">Veillez remplir le formulaire</h3>

        <div class="">

            <div class="">
                <div class="">
                    <label for="nom">Nom</label>
                    <input type="text" required autocomplete="off" id="nom" name="nom" value="{{old('nom')}}"
                        class="form-control" placeholder="">
                </div>
            </div>
            <div class="w-100"></div>



            <div class="">
                <div class="">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{old('adresse')}}"
                        required autocomplete="off" class="form-control" placeholder="Ex. Bamako">
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="formation">Formation</label>
                   <select name="formation" class="select" id="formation" required>
                    <option value="Office">Office</option>
                    <option value="Graphisme">Graphisme</option>
                    <option value="Programmation">Programmation</option>
                   </select>
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="duree">Durée</label>
                   <select name="duree" class="select" id="duree" required>
                    <option value="1 moi">1 moi</option>
                    <option value="2 mois">2 mois</option>
                    <option value="3 mois">3 mois</option>
                    <option value="6 mois">6 mois</option>
                   </select>
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="numero">Numero</label>
                    <input type="number" min="8" value="{{old('numero')}}" autocomplete="off" required name="numero" id="numero"
                        class="form-control" placeholder="Ex. 77665544">
                </div>
            </div>


            <div class="w-100"></div>

        </div>
        <br>
        <input type="submit" name="btn_sold" id="btn_sold" value="Envoyer" class="">
    </form><!-- END -->


</div>



@endsection

@push('scripts')
<script>

</script>
@endpush