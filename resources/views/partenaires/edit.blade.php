@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h5 class="card-title">Changer statut</h5>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('update-partenaire', ['partenaire'=>$partenaire->id])}}" method="post">
                <!-- @method('PATCH') -->
            @csrf
            <input type="hidden" name="_method" value="put">
        <div class="card-body row g-3">

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom partenaire</label>
                <input value="{{$partenaire->nom}}" name="nom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Pays</label>
                <input value="{{$partenaire->pays}}"  required name="pays" type="text" class="form-control" id="exampleInputEmail1" placeholder="Pays : ">
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputEmail1">Adresse</label>
                <input value="{{$partenaire->adresse}}"   required name="adresse" type="text" class="form-control" id="exampleInputEmail1" placeholder="Adresse : ">
            </div>
            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button href="{{route('partenaires')}}" type="submit" class="btn btn-info"><i class="fas fa-save"></i> Modifier</button>
            <a href="{{route('partenaires')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection