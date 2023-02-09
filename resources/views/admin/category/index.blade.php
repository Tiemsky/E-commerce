@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

<div class="sl-pagebody">
    <div class="sl-page-title">
    <h5>Tableau des catégories</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Liste des categories
        <a href="#" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#modaldemo3"> Ajouter une Catégorie</a>
    </h6>

    <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
        <thead>
            <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Nom de la catégorie</th>
            <th class="wd-20p">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key=>$category)
            
            <tr>
            <td>{{ $key +1 }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                <form action="{{route('category.destroy',[$category->id])}}" method="post">
                    <a href=" {{route('category.edit',$category->category_slug)}}" class="btn btn-sm btn-info">Modifier</a>
                    @csrf
                    @method('DELETE')
                <button href="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
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

        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom de la catégorie</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Catégorie" name="category_name">
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