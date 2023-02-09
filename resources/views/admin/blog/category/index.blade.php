@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

<div class="sl-pagebody">
    <div class="sl-page-title">
    <h5>Tableau des Blog</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Liste des Blog
        <a href="#" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3"> Ajouter un Blog</a>
    </h6>

    <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
        <thead>
            <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Nom de la catégorie En</th>
            <th class="wd-15p">Nom de la catégorie Fr</th>
            <th class="wd-20p">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogcat as $key=>$row)
            
            <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $row->category_name_en }}</td>
            <td>{{ $row->category_name_fr }}</td>
            <td>
                <a href=" {{ URL::to('edit/blogcategory/'.$row->id) }} " class="btn btn-sm btn-info">Modifier</a>
                <a href=" {{ URL::to('delete/blogcategory/'.$row->id) }} " class="btn btn-sm btn-danger" id="delete">Supprimer</a>
            </td>
            </tr>

            @endforeach
        </tbody>
        </table>
    </div><!-- table-wrapper -->
    </div><!-- card -->


</div><!-- sl-mainpanel -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ajouter une catégorie</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('store.blog.category') }}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de la catégorie en Anglais</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="catégorie en Anglais" name="category_name_en">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de la catégorie en Francais</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="catégorie en Francais" name="category_name_fr">
                </div>

            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Sauvegarder</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Fermer</button>
            </div>
        </form>
            </div>
        </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection