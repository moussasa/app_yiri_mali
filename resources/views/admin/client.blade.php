@extends('admin.main')
@section('page')
<div class="p-2 ">

    <h1>Liste des clients</h1>
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
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Numero</th>
                <th scope="col">Numero</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($client as $clients)
            <tr>
                <td scope="row">{{$clients->id}}</td>
                <td>{{$clients->name}}</td>
                <td>{{$clients->last_name}}</td>
                <td>{{$clients->adresse}}</td>
                <td>{{$clients->phone}}</td>
                <td>{{$clients->email}}</td>
               
                <td>{{$clients->created_at}}</td>
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
        {{$client->links()}}
    </div>
</div>
@endsection

