@extends('admin.main')
@section('page')
<div class="p-2 ">

    <h1>Liste de tous les produits</h1>
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

    <div class="header float-right">
        <button data-toggle='modal' data-target="#modal_ajout" class="btn btn-primary p-2 m-2">Ajouter Un
            Produit</button>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Status</th>
                <th scope="col">Etat</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produit as $produits)
            <tr>
                <td scope="row">{{$produits->id}}</td>
                <td>{{$produits->nom_prod}}</td>
                <td>{{$produits->prix_prod}}</td>
                <td>
                    @if ($produits->stat_prod ==1)
                    <span class="bg-success rounded-lg p-2">Active</span>
                    @else
                    
                    <span class="bg-danger rounded-lg p-2">Désactive</span>
                    @endif
                </td>
                <td>
                    @if ($produits->etat_prod ==1)
                    Nouveau
                    @else
                    Ancien
                    @endif
                </td>
                <td>{{$produits->categorie->nom_cate}}</td>
                <td>
                    <button id="edit_btn" value="{{$produits->id}}" type="button" class="btn btn-warning text-white">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button id="edit_spr" value="{{$produits->id}}" type="button" class="btn btn-danger text-white">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;background-color: white;">
                    <img style="height: 200px;width: 200px;" src="{{asset('images/no-data.png')}}" alt="">
                </td>

            </tr>
            <tr>
                <td colspan="7" style="text-align: center;background-color: white;color: black;">Aucun resultat</td>
            </tr>
            @endforelse



        </tbody>
    </table>

    <div class="links">
        {{$produit->links()}}
    </div>
</div>
@endsection

@section('modal')

<!-- ajout Modal -->
<div class="modal fade" id="modal_ajout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout de produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.produit_add')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')

                    <label for="nom_prod">Nom du produit</label>
                    <input type="text" required min="1" name="nom_prod" id="nom_prod" class="form form-control">

                    <label for="prix_prod">Pix du produit</label>
                    <input type="number" required min="1" name="prix_prod" id="prix_prod" class="form form-control">

                    <label for="stat_prod">Status du produit</label>
                    <select required name="stat_prod" id="stat_prod" class="form form-control">
                        <option value="0">Désactive</option>
                        <option value="1">Active</option>
                    </select>

                    <label for="etat_prod">Etat du produit</label>
                    <select required name="etat_prod" id="etat_prod" class="form form-control">
                        <option value="1">Nouveau</option>
                        <option value="0">Ancien</option>
                    </select>

                    <label for="categorie_id">Catégorie du produit</label>
                    <select required name="categorie_id" id="categorie_id" class="form form-control">
                        @forelse ($categorie as $categories)
                        <option value="{{$categories->id}}">{{$categories->nom_cate}}</option>
                        @empty
                        <option value="">Aucune catégorie disponible</option>
                        @endforelse
                    </select>

                    <label for="desc_prod">Description du produit</label>
                    <textarea name="desc_prod" id="desc_prod" rows="3" class="form form-control"></textarea>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Ajouter" id="" class="btn btn-primary">

                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edition du produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.produit_update')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')

                    <input type="hidden" name="id_prod_edit" id="id_prod_edit" id="">

                    <label for="nom_prod_edit">Nom du produit</label>
                    <input type="text" required min="1" name="nom_prod_edit" id="nom_prod_edit" class="form form-control">

                    <label for="prix_prod_edit">Pix du produit</label>
                    <input type="number" required min="1" name="prix_prod_edit" id="prix_prod_edit" class="form form-control">

                    <label for="stat_prod_edit">Status du produit</label>
                    <select required name="stat_prod_edit" id="stat_prod_edit" class="form form-control">
                        <option value="0">Désactive</option>
                        <option value="1">Active</option>
                    </select>

                    <label for="etat_prod_edit">Etat du produit</label>
                    <select required name="etat_prod_edit" id="etat_prod_edit" class="form form-control">
                        <option value="1">Nouveau</option>
                        <option value="0">Ancien</option>
                    </select>

                    <label for="categorie_id_edit">Catégorie du produit</label>
                    <select required name="categorie_id_edit" id="categorie_id_edit" class="form form-control">
                        @forelse ($categorie as $categories)
                        <option value="{{$categories->id}}">{{$categories->nom_cate}}</option>
                        @empty
                        <option value="">Aucune catégorie disponible</option>
                        @endforelse
                    </select>

                    <label for="desc_prod_edit">Description du produit</label>
                    <textarea name="desc_prod_edit" id="desc_prod_edit" rows="3" class="form form-control"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Modifier" id="" class="btn btn-primary">

                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal suppression --}}
<div class="modal fade" id="modal_supr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.produit_delete')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')
                    <input type="hidden" required name="edit_prod_id_supr" id="edit_prod_id_supr">
                    <p>Voulez vous supprimer Ce produit ?</p>
                    <p class="edit_prod_name_sup text-red"></p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Supprimer" id="" class="btn btn-danger">

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
      
        // suppresion
        $(document).on('click','#edit_spr',function (e) { 
            e.preventDefault();
            var edit_spr=$(this).val();
            $('#modal_supr').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/produit-delete_search/"+edit_spr,
                data: {edit_spr:edit_spr},
                success: function (response) {
                    $('#edit_prod_id_supr').val(response.produit.id);
                    $('.edit_prod_name_sup').html(response.produit.nom_prod);
                }
            });
        });

        // edition
            $(document).on('click','#edit_btn',function () { 
               var edit_prod_id=$(this).val();
                $('#modal_edit').modal('show');
              
                $.ajax({
                type: "GET",
                url: "/admin/produit-edit/"+edit_prod_id,
                success: function (response) {
                    $('#id_prod_edit').val(response.produit.id);
                    $('#nom_prod_edit').val(response.produit.nom_prod);
                    $('#prix_prod_edit').val(response.produit.prix_prod);
                    $('#stat_prod_edit').val(response.produit.stat_prod);
                    $('#etat_prod_edit').val(response.produit.etat_prod);
                    $('#categorie_id_edit').val(response.produit.categorie_id);
                    $('#desc_prod_edit').val(response.produit.desc_prod);
                    console.log(response.produit)
                    
                }
              });
            });

        });
</script>
@endpush