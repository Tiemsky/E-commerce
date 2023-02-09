@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
    

    <div class="sl-pagebody">
        <div class="sl-page-title">
        <h5>Modifier la Marque</h5>
        
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Mise à jour de la marque

        </h6>
        

        <div class="table-wrapper">
        
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('brand.update', [$brand->brand_slug]) }}" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="modal-body pd-20"> 
        <div class="form-group">
        <label for="exampleInputEmail1">Nom de la Marque</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_name">
        
        </div>


        <div class="form-group">
        <label for="exampleInputEmail1">Logo de la Marque</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brand->brand_name }}" name="brand_logo">
        
        </div>


        <div class="form-group">
        <label for="exampleInputEmail1"> Ancien Logo</label>
        <img src="{{ URL::to($brand->brand_logo) }}" height="70px;" width="90px;">
        <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">   
        
        </div>


        
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Actualiser</button>
                
            </div>
                </form>


        </div><!-- table-wrapper -->
        </div><!-- card -->

        


    </div><!-- sl-mainpanel -->





@endsection