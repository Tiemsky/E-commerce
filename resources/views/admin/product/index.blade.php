    @extends('admin.admin_layouts')

    @section('admin_content')

    <div class="sl-mainpanel">
        

        <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Tableau des produits</h5>
            
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Liste des produits
    <a href="{{ route('product.create') }}" class="btn btn-sm btn-warning float-right">Ajouter un produit</a>
            </h6>
            

            <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">Code du produit</th>
                    <th class="wd-15p">Nom du produit</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Catégorie</th>
                    <th class="wd-15p">Marque</th>
                    <th class="wd-15p">Quantité</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-20p">Action</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>

                <td> <img src="{{ URL::to($product->image_one) }}" height="50px;" width="50px;"> </td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td> 
                    @if($product->status == 1)
                <span class="badge badge-success">Active</span>
                    @else
                <span class="badge badge-danger">Inactive</span>
                    @endif                  

                </td>
                <form action="{{route('product.destroy',[$product->id])}} " method="post">
                    @csrf
                    @method('DELETE')
                    <td>
                        <a href="{{route('product.edit',[$product->id,$product->product_slug])}} " class="btn btn-sm btn-info" title="Modifier">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ URL::to('delete/product/'.$product->id) }}" class="btn btn-sm btn-danger" title="Supprimer" id="delete"><i class="fas fa-trash"></i></a>
                    
                        <a href="{{ route('product.show',[$product->id, $product->product_slug]) }}" class="btn btn-sm btn-warning" title="Voir"><i class="fa fa-eye"></i></a>
                    
                    
                        @if($product->status == 1)
                            <a href="{{ URL::to('inactive/product/'.$product->id) }}" class="btn btn-sm btn-danger" title="Inactive" ><i class="fa fa-thumbs-down"></i></a>
                        @else
                            <a href="{{ URL::to('active/product/'.$product->id) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>
                        @endif
                                        
                    
                    
                    </td>
                </form>
                    
                </tr>
                @endforeach
                    
                </tbody>
            </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->

    @endsection