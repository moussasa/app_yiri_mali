@extends('layouts.main')
@section('title', 'Maintenance')

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
    
    <form action="{{ route('send_maintenance') }}" method="POST" id="checkout-form">
        @csrf
        <input type="hidden" required readonly name="prd_id" id="prd_id" value="">
        <h3 class="title">Veillez Saisir les information de votre appareil</h3>
        <div class="">

            <div class="">
                <div class="">
                    <label for="nom">Nom</label>
                    <input type="text" required autocomplete="off" id="nom" name="nom"
                        value="{{old('nom')}}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="">
                <div class="">
                    <label for="adresse">Adresse</label>
                    <input type="text" required autocomplete="off" id="adresse" name="adresse"
                        value="{{old('adresse')}}" class="form-control" placeholder="Ex. Bamako">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="">
                <div class="">
                    <label for="phone">Numero</label>
                    <input type="number" min="8" required autocomplete="off" id="phone" name="phone"
                        value="{{old('phone')}}" class="form-control" placeholder="Ex. 77665545">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="">
                <div class="">
                    <label for="marque">Marque</label>
                    <input type="text" required autocomplete="off" id="marque" name="marque"
                        value="{{old('marque')}}" class="form-control" placeholder="Ex. DELL">
                </div>
            </div>
            <div class="w-100"></div>



            <div class="">
                <div class="">
                    <label for="carracteristique">Carractéristique</label>
                    <input type="text" id="carracteristique" name="carracteristique"
                        value="{{old('carracteristique')}}" required autocomplete="off"
                        class="form-control" placeholder="Ex. i5 ram 16g">
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="panne">Panne</label>
                    <input type="text" id="panne" name="panne" value="{{old('panne')}}"
                        required autocomplete="off" class="form-control" placeholder="Ex. batterie">
                </div>
            </div>
            <div class=" ">
                <div class=" ">
                    <label for="etat">Etat</label>
                    <select class="select" required name="etat" id="etat">
                        <option value="ancien">Ancien</option>
                        <option value="nouveau">Nouveau</option>
                    </select>
                   
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