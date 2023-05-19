@extends('admin.main')
@section('page')
<div class="p-2 ">

    <h1>Liste de tous les catégories</h1>
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
        <button data-toggle='modal' data-target="#modal_ajout" class="btn btn-primary p-2 m-2">Ajouter Une
            Catégorie</button>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorie as $categories)
            <tr>
                <td scope="row">{{$loop->index++}}</td>
                <td>{{$categories->nom_cate}}</td>
                <td>{{$categories->updated_at}}</td>
                <td>
                    <button id="edit_btn" value="{{$categories->id}}" type="button" class="btn btn-warning text-white">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button id="edit_spr" value="{{$categories->id}}" type="button" class="btn btn-danger text-white">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr >
                <td colspan="4" style="text-align: center;background-color: white;">
                    <img style="height: 200px;width: 200px;" src="{{asset('images/no-data.png')}}" alt="">
                </td>
                
            </tr>
            <tr >
                <td colspan="4" style="text-align: center;background-color: white;color: black;">Aucun resultat</td>
            </tr>
            @endforelse



        </tbody>
    </table>

    <div class="links">
        {{$categorie->links()}}
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
                <h5 class="modal-title" id="exampleModalLabel">Ajout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.categorie_add')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')

                    <label for="edit_cat_name">Nom de la catégorie</label>
                    <input type="text" required min="1" name="nom_cate" id="nom_cate" class="form form-control">

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
                <h5 class="modal-title" id="exampleModalLabel">Edition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.categorie_update')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')
                    <input type="hidden" required name="edit_cat_id" id="edit_cat_id">
                    <label for="edit_cat_name">Nom de la catégorie</label>
                    <input type="text" required min="1" name="edit_cat_name" id="edit_cat_name"
                        class="form form-control">

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
            <form action="{{route('admin.categorie_delete')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')
                    <input type="hidden" required name="edit_cat_id_supr" id="edit_cat_id_supr">
                    <p>Voulez vous supprimer Cette catégorie ?</p>
                    <p class="edit_cat_name_sup text-red"></p>
                   

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
        $(document).on('click','#edit_spr',function (e) { 
            e.preventDefault();
            var edit_spr=$(this).val();
            $('#modal_supr').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/categorie-delete_search/"+edit_spr,
                data: {edit_spr:edit_spr},
                success: function (response) {
                    $('#edit_cat_id_supr').val(response.categories.id);
                    $('.edit_cat_name_sup').html(response.categories.nom_cate);
                }
            });
        });

            $(document).on('click','#edit_btn',function () { 
               var edit_cat_id=$(this).val();
                $('#modal_edit').modal('show');
              
                $.ajax({
                type: "GET",
                url: "/admin/categorie-edit/"+edit_cat_id,
                success: function (response) {
                    $('#edit_cat_id').val(response.categories.id);
                    $('#edit_cat_name').val(response.categories.nom_cate);
                    
                }
              });
            });

        });
</script>
@endpush