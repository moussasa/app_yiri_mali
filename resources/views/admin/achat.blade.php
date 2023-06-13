@extends('admin.main')
@section('page')
<div class="p-2 ">

    <h1>Liste de tous les achats</h1>
    @if (Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('success')}}.</strong>
        {{Session::put('success')}}
    </div>
    @endif
    @if (Session::has('erreur'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('erreur')}}.</strong>
        {{Session::put('erreur')}}
    </div>
    @endif


    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Numero</th>
                <th scope="col">Produit</th>
                <th scope="col">Image</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($achat as $achats)
            <tr>
                <td scope="row">{{$achats->id}}</td>
                <td>{{$achats->user->id.' '.$achats->user->name}}</td>
                <td>{{$achats->user->phone}}</td>
                <td>{{$achats->produit->id.': '.$achats->produit->nom_prod}}</td>
                <td>
                    @if ($achats->produit->image->first() !=null)
                    <img style="width: 60px;height: 60px;border-radius: 50%" src="{{asset('storage/produit/'.$achats->produit->image[0]->chemin)}}" alt="">
                    @else
                    <img style="height: 60px;width: 60px;border-radius: 50%;" src="{{asset('images/no-data.png')}}"
                        alt="">
                    @endif
                   
                </td>
                <td>{{$achats->created_at}}</td>
            </tr>
            @empty
            <tr >
                <td colspan="6" style="text-align: center;background-color: white;">
                    <img style="height: 200px;width: 200px;" src="{{asset('images/no-data.png')}}" alt="">
                </td>
                
            </tr>
            <tr >
                <td colspan="6" style="text-align: center;background-color: white;color: black;">Aucun resultat</td>
            </tr>
            @endforelse



        </tbody>
    </table>

    <div class="links">
        {{$achat->links()}}
    </div>
</div>
@endsection

