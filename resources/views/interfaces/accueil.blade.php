@extends('layouts.main')
@section('title', 'Accueil')

@push('css')
<link rel="stylesheet" href="{{asset('css/interface_accueil.css')}}">
@endpush

@section('dynamique')
{{-- accueil --}}
<div class="first_view">
    {{-- <div class="first_view_cercle"></div> --}}
    <div class="first_view_text">
        <h4>Yiri-<span>Mali</span> </h4>
        <p>
            Nous sommes une entreprise spécialisée dans les domaines suivants:
            développement des applications (web, mobile), la maintenance, la formation en informatique, Vente
            d'ordinateur, l’illustration, le montage vidéo et plein de d'autre.
        </p>
        <a href="tel:777">Passer un appel</a>
    </div>

    <div class="first_view_img">
        <img src="{{asset('images/R.png')}}" alt="">
    </div>
</div>


{{-- session message --}}

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show m-5 bg-blue-500" role="alert">
    <strong>{{Session::get('success')}} </strong>
   <a href="{{route('main')}}" class="btn btn-primary p-2"> Cliquez ici</a>
</div>
{{Session::put('success',null)}}
@endif

    <div>
        @livewire('accueil')
    </div>


@endsection

@push('scripts')
<script>

</script>
@endpush