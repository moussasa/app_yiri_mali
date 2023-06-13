<section class="section_prd">


    {{-- input search --}}
    <input type="text" wire:model="search_n" id="search_n" class="search_n" placeholder="Rechercher...">

    {{-- foreach --}}

    @forelse ($produit as $produits)
    <div class="content">
        <div class="prd_img">
            @if ($produits->image->first() !=null)
            <img src="{{asset('storage/produit/'.$produits->image[0]->chemin)}}" alt="Produit">
            @else
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit">
            @endif

            @if ($produits->stat_prod == 1)
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>

            @else
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>

            @endif

        </div>
        <div class="prd_txt">
            <p class="Name">{{$produits->nom_prod}}</p>
            <p class="Price">{{$produits->prix_prod}} FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="{{route('payer',$produits->id)}}">Payer</a>
            <a href="{{route('credit',$produits->id)}}">Crédit</a>
        </div>
    </div>
    @empty
    <center>Aucun résultat pour {{$search_n}}</center>
    @endforelse
   
   
    {{-- end foreach --}}

</section>
 <div class="links">
        {{$produit->links('pagination::bootstrap-4')}}
    </div>