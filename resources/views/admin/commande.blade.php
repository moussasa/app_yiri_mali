@extends('admin.main')
@section('page')
<div class="p-2 ">

    <h1>Liste de tous les Commandes</h1>
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
                <th scope="col">Mois</th>
                <th scope="col">Rdv</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($commande as $commandes)
            <tr>
                <td scope="row">{{$commandes->id}}</td>
                <td>{{$commandes->user->name}}</td>
                <td>{{$commandes->user->phone}}</td>
                <td>{{$commandes->produit->id.': '.$commandes->produit->nom_prod}}</td>
                <td>
                    <img style="width: 60px;height: 60px;border-radius: 50%" src="{{asset('storage/produit/'.$commandes->produit->image[0]->chemin)}}" alt="">
                </td>
                <td>{{($commandes->produit->prix_prod/$commandes->mois_comm).' ('. $commandes->mois_comm.')'}}</td>
                <td>{{$commandes->rdv_comm}}</td>
                <td>{{$commandes->created_at}}</td>
            </tr>
            @empty
            <tr >
                <td colspan="8" style="text-align: center;background-color: white;">
                    <img style="height: 200px;width: 200px;" src="{{asset('images/no-data.png')}}" alt="">
                </td>
                
            </tr>
            <tr >
                <td colspan="8" style="text-align: center;background-color: white;color: black;">Aucun resultat</td>
            </tr>
            @endforelse



        </tbody>
    </table>

    <div class="links">
        {{$commande->links()}}
    </div>
</div>
@endsection

