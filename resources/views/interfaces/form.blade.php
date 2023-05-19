@extends('layouts.main')
@section('title', 'Formulaire')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/interface_form.css')}}">
@endpush
@section('dynamique')


{{-- session message --}}

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show m-5" role="alert">
    <strong>{{Session::get('success')}} </strong>
   <a href="{{route('main')}}" class="btn btn-primary p-2"> Cliquez ici</a>
</div>
{{Session::put('success',null)}}
@endif

{{-- div du formulaire --}}
<div id="form">


    <div id="form_first" class="form form-group">

        <h4>Veillez remplir le formulaire</h4>
        {{-- form --}}
        <form action="{{route('credit.form_commande')}}" method="post">
            @csrf

            {{-- hidden inputs --}}
            <input readonly type="hidden" name="prd_id" id="prd_id" value="{{$produit->id}}">
            <input readonly type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
            <input readonly type="hidden" name="mois" id="mois" value="{{$mois}}">
            <input readonly type="hidden" name="mensuel" id="mensuel" value="{{$mensuel}}">
            <input readonly type="hidden" name="rdv" id="rdv" value="{{$rdv}}">

            {{-- start --}}
            <div class="form-outline mb-2 p-2">
                <label class="form-label" for="form2Example18">Nom de la Banque</label>
                <input type="text" required name="nom_bank" value="{{old('nom_bank')}}" id="form2Example18"
                    class="form-control form-control-lg" />

                @error('nom_bank')
                <div class="bg-danger mb-2 rounded-full text-white">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- end --}}
            {{-- start --}}
            <div class="form-outline mb-2 p-2">
                <label class="form-label" for="form2Example18">Numero de la carte Bancaire (16*)</label>
                <input type="text" required min="16" name="num_bank" value="{{old('num_bank')}}" id="form2Example18"
                    class="form-control form-control-lg" />

                @error('num_bank')
                <div class="bg-danger mb-2 rounded-full text-white">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- end --}}


            <input type="submit" value="Commander" id="" class="btn btn-success m-2">

            <a href="{{route('credit',$produit->id)}}" class="btn btn-danger m-2">Annuler</a>
        </form>

    </div>
    <div id="form_second">
        <h4>Vous allez payer un montant total de: {{$produit->prix_prod. ' FCFA'}}</h4>
        <p>Dont un montand mensuel de: {{$mensuel . ' FCFA'}}</p>
        <p>Mendant {{$mois}} mois.</p>
        <p>Nous allons vous contacter pour un rendez-vous le <span style="font-weight:900;">
                {{$rdv}}
            </span> prochain.
        </p>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script>

</script>
@endpush
@endsection