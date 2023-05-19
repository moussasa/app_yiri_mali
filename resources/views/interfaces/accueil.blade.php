@extends('layouts.main')
@section('title', 'Accueil')

@push('css')
<link rel="stylesheet" href="{{asset('css/interface_accueil.css')}}">
@endpush

@section('dynamique')

<div>
    @livewire('accueil')
</div>

@endsection

@push('scripts')
<script>
   
</script>
@endpush