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

<section class="section_prd">
    {{-- foreach --}}

    {{-- input search --}}
    <input type="text" wire:model="search_n" id="search_n" class="search_n" placeholder="Rechercher...">

    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>

    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    <div class="content">
        <div class="prd_img">
            <img src="{{asset('images/yiri_mali_logo.png')}}" alt="Produit {{asset('images/yiri_mali_logo.png')}}">
            <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: green;">N</span>
            {{-- <span
                style="position: absolute;bottom: 0;right: 0; border-radius: 3px; color: white;padding: 2px;background-color: red;">O</span>
            --}}
        </div>
        <div class="prd_txt">
            <p class="Name">Ordinateur</p>
            <p class="Price">125 000 FCFA</p>
        </div>
        <div class="prd_btn">
            <a href="#">Payer</a>
            <a href="{{route('credit',2)}}">Crédit</a>
        </div>
    </div>
    {{-- end foreach --}}

</section>