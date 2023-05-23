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
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos unde eaque voluptatibus vero quaerat iure error
            quisquam corrupti dolorem molestias officiis asperiores ab dolores laborum, facilis quam inventore omnis
            neque?</p>
        <a href="tel:777">Passer un appel</a>
    </div>

    <div class="first_view_img">
        <img src="{{asset('images/R.png')}}" alt="">
    </div>
</div>

    <div>
        @livewire('accueil')
    </div>


@endsection

@push('scripts')
<script>

</script>
@endpush