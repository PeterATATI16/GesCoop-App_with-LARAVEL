@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h3 class="card-title">Enrégistrer un partenaire</h3>
        </div>
        @if(session()->has("success"))
          <h5 class="shadow-lg alert alert-info" style="margin:4px;width:720px;">
              {{session()->get('success')}}</h5>
        @endif
        
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('store-partenaire')}}" method="post">
            @csrf
        <div class="card-body row g-3">

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom partenaire</label>
                <input name="nom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Pays</label>
                <input required name="pays" type="text" class="form-control" id="exampleInputEmail1" placeholder="Pays : ">
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputEmail1">Adresse</label>
                <input required name="adresse" type="text" class="form-control" id="exampleInputEmail1" placeholder="Adresse : ">
            </div>
            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
            <a href="{{route('partenaires')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection