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
           Vous pouvez effectué l'achat si vous disposez d'une carte visa ou master card.
        </p>
        <p>
            Avant d'éffectuer l'achat vous devez vous s'inscrire sur notre plateforme (ou vous connecter si vous êtes deja inscris) en cliquant sur le boutton si dessous.
        </p>        
      </div>
        <div style="display: flex;justify-content: space-between;align-items: center;width: 200px;height: 60px;margin:auto;">
            <a href="{{route('payer.form',$produit->id)}}" style="padding: 0;display: flex;justify-content: center;align-items: center;border-radius: 22px;width: calc(100% - 10px);height: 100%;margin: 0 10px">
                <img style="width: 100%;height: 100%;border-radius: 12px;" src="{{asset('images/visa_master_card.jpeg')}}" alt="">
            </a>
            <a href="#" style="padding: 0;display: flex;justify-content: center;align-items: center;border-radius: 22px;width: calc(100% - 10px);height: 100%;margin: 0 10px">
                <img style="width: 80%;height: 100%;border-radius: 12px;" src="{{asset('images/paypal.png')}}" alt="">
            </a>
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