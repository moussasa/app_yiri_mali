@extends('layouts.main')
@section('title', 'Information')
@push('css')
<link rel="stylesheet" href="{{asset('css/interface_credit.css')}}">
@endpush

@section('dynamique')
<section class="details_prds">
    <div class="details_bg">
        <img id="bg_change" src="{{asset('storage/produit/'.$image_first->chemin)}}" alt="">
    </div>

    <div class="details_imgs">
        @foreach ($image as $images)
        <img src="{{asset('storage/produit/'.$images->chemin)}}" alt="">
        @endforeach
 
    </div>
    <div class="details_txt">
        <p><span>Nom: </span>{{$produit->nom_prod}}</p>
        <p><span>Prix: </span>{{$produit->prix_prod}} <span> FCFA</span></p>
        <p>
            <span>Etat: </span>
            @if ($produit->stat_prod===1)
            Nouveau
            @else
            Ancien
            @endif
        </p>
        <p class="description">
            {{$produit->desc_prod}}
        </p>

      <div class="conseil">
        <p>
            Avant d'éffectuer une commande vous devez vous s'inscrire sur notre plateforem (ou vous connecter si vous êtes deja inscris) en cliquant sur le boutton si dessous
        </p>
        <p>
            Vous serez rediriger vers notre interface de connection.
        </p>
      </div>
        <div>
            <a href="{{route('credit.form',$produit->id)}}">Commander</a>
        </div>
    </div>


</section>


@push('scripts')
<script>
    var details_imgs=document.querySelectorAll('.details_imgs img');
    var bg_change=document.getElementById('bg_change');
        details_imgs.forEach(element => {
            element.addEventListener('click',function(){
                bg_change.src=element.src;
                remove_bd();
                element.classList.add('active');
                
            });
        });

        function remove_bd(){
            details_imgs.forEach(element => {
                element.classList.remove('active');
        });
        }
</script>
@endpush
@endsection