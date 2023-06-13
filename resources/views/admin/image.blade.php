@extends('admin.main')
@section('page')
<div class="p-1 ">

    <h2>Liste de tous les produits et leurs images</h2>
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
                <th scope="col">Prix</th>
                <th scope="col">Image</th>
                <th scope="col">Image</th>
                <th scope="col">Image</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produit as $produits)
            <tr style="padding: 0;margin: 0;">
                <td>{{$produits->id}}</td>
                <td>{{$produits->nom_prod}}</td>
                <td>{{$produits->prix_prod}}</td>
                <td>
                    @if ($produits->image->first() !=null)
                    <img style="width:60px;height:60px;border-radius: 50%;"
                        src="{{asset('storage/produit/'.$produits->image[0]->chemin)}}" alt="Produit">
                    @else
                    <img style="height: 60px;width: 60px;border-radius: 50%;" src="{{asset('images/no-data.png')}}"
                        alt="">
                    @endif
                </td>
                <td>
                    @if ($produits->image->first() !=null)
                    <img style="width:60px;height:60px;border-radius: 50%;"
                        src="{{asset('storage/produit/'.$produits->image[1]->chemin)}}" alt="Produit">
                    @else
                    <img style="height: 60px;width: 60px;border-radius: 50%;" src="{{asset('images/no-data.png')}}"
                        alt="">
                    @endif
                </td>
                <td>
                    @if ($produits->image->first() !=null)
                    <img style="width:60px;height:60px;border-radius: 50%;"
                        src="{{asset('storage/produit/'.$produits->image[2]->chemin)}}" alt="Produit">
                    @else
                    <img style="height: 60px;width: 60px;border-radius: 50%;" src="{{asset('images/no-data.png')}}"
                        alt="">
                    @endif
                </td>
                <td>
                    @if ($produits->image->first() !=null)
                    <img style="width:60px;height:60px;border-radius: 50%;"
                        src="{{asset('storage/produit/'.$produits->image[3]->chemin)}}" alt="Produit">
                    @else
                    <img style="height: 60px;width: 60px;border-radius: 50%;" src="{{asset('images/no-data.png')}}"
                        alt="">
                    @endif
                </td>
                <td>
                    <button id="edit_btn" value="{{$produits->id}}" type="button" class="btn btn-warning text-white">
                        <i class="fa fa-add"></i>
                    </button>
                    <button id="edit_spr" value="{{$produits->id}}" type="button" class="btn btn-danger text-white">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;background-color: white;">
                    <img style="height: 200px;width: 200px;" src="{{asset('images/no-data.png')}}" alt="">
                </td>

            </tr>
            <tr>
                <td colspan="8" style="text-align: center;background-color: white;color: black;">Aucun resultat</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Ajout de image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.image_add')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')

                    <label for="nom_prod">Nom  image</label>
                    <input type="text" required min="1" name="nom_prod" id="nom_prod" class="form form-control">

                    <label for="prix_prod">Pix du image</label>
                    <input type="number" required min="1" name="prix_prod" id="prix_prod" class="form form-control">

                    <label for="stat_prod">Status du image</label>
                    <select required name="stat_prod" id="stat_prod" class="form form-control">
                        <option value="0">Désactive</option>
                        <option value="1">Active</option>
                    </select>

                    <label for="etat_prod">Etat du image</label>
                    <select required name="etat_prod" id="etat_prod" class="form form-control">
                        <option value="1">Nouveau</option>
                        <option value="0">Ancien</option>
                    </select>

                    <label for="produit_id">Catégorie du image</label>
                    <select required name="produit_id" id="produit_id" class="form form-control">
                        @forelse ($produit as $produits)
                        <option value="{{$produits->id}}">{{$produits->nom_cate}}</option>
                        @empty
                        <option value="">Aucune catégorie disponible</option>
                        @endforelse
                    </select>

                    <label for="desc_prod">Description du image</label>
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
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('admin.image_add')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    @csrf
                    @method('post')

                    <input readonly class="form form-control m-1" type="text" name="id_image_edit" id="id_image_edit"
                        id="">
                    <input readonly class="form form-control m-1" type="text" name="nom_image_edit" id="nom_image_edit"
                        id="">


                    <div class="w-100 p-2 border-black">
                        <label for="un_image_edit">Veillez selectionner les 4 images !</label>
                        <input type="file" multiple required name="files[]" id="files" class="form form-control"
                            style="text-align: center;padding: 0;height: 100%;margin: 5px;">


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Ajouter" id="" class="btn btn-primary">

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
            <form action="{{route('admin.image_delete')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    @method('post')
                    <input type="hidden" required name="edit_prod_id_supr" id="edit_prod_id_supr">
                    <p>Voulez vous supprimer Ce image ?</p>
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
                url: "/admin/image-delete_search/"+edit_spr,
                data: {edit_spr:edit_spr},
                success: function (response) {
                    $('#edit_prod_id_supr').val(response.image.id);
                    $('.edit_prod_name_sup').html(response.image.nom_prod);
                }
            });
        });

        // show with product id and name
            $(document).on('click','#edit_btn',function () { 
               var edit_prod_id=$(this).val();
                $('#modal_edit').modal('show');
              
                $.ajax({
                type: "GET",
                url: "/admin/image-edit/"+edit_prod_id,
                success: function (response) {
                    $('#id_image_edit').val(response.image.id);
                    $('#nom_image_edit').val(response.image.nom_prod);
                }
              });
            });

        });
</script>
@endpush