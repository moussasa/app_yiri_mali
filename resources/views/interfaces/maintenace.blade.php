@extends('layouts.main')
@section('title', 'Maintenance')

@push('css')
<link rel="stylesheet" href="{{asset('css/interface_formation.css')}}">
@endpush

@section('dynamique')

<div class="form_container">
    
    <form action="{{ route('main') }}" method="POST" id="checkout-form">
        @csrf
        <input type="hidden" required readonly name="prd_id" id="prd_id" value="">
        <h3 class="title">Veillez Saisir les information de votre appareil</h3>
        <div class="">

            <div class="">
                <div class="">
                    <label for="emailaddress">Marque</label>
                    <input type="text" required autocomplete="off" id="Marque" name="Marque"
                        value="{{old('Marque')}}" class="form-control" placeholder="Ex. DELL">
                </div>
            </div>
            <div class="w-100"></div>



            <div class="">
                <div class="">
                    <label for="emailaddress">Carractéristique</label>
                    <input type="text" id="Carracteristique" name="Carracteristique"
                        value="{{old('Carracteristique')}}" required autocomplete="off"
                        class="form-control" placeholder="Ex. i5 ram 16g">
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="emailaddress">Panne</label>
                    <input type="text" id="Panne" name="Panne" value="{{old('Panne')}}"
                        required autocomplete="off" class="form-control" placeholder="Ex. batterie">
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="emailaddress">Etat</label>
                    <input type="text" value="{{old('Etat')}}" autocomplete="off"
                        required name="Etat" id="Etat"
                        class="form-control" placeholder="Ex. Ancien">
                </div>
            </div>
           

            <div class="w-100"></div>

        </div>
        <br>
        <input type="submit" name="btn_sold" id="btn_sold" value="Envoyer" class="">
    </form><!-- END -->


</div>


{{-- session message --}}

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show m-5 bg-blue-500" role="alert">
    <strong>{{Session::get('success')}} </strong>
   <a href="{{route('main')}}" class="btn btn-primary p-2"> Cliquez ici</a>
</div>
{{Session::put('success',null)}}
@endif

 
@endsection

@push('scripts')
<script>

</script>
@endpush