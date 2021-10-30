@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h3 class="card-title">Enrégistrer un don</h3>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('store-don')}}" method="post">
            @csrf
        <div class="card-body row g-3">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Objet</label>
                <textarea required name="objet" class="form-control" rows="3" placeholder="Saisir ... "></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Contenu</label>
                <textarea required name="libelle" class="form-control" rows="3" placeholder="Saisir ... "></textarea>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Date de réception</label>
                <input required name="date" type="date" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <!-- select -->
            <div class="col-md-4">
                <!-- select -->
                <div class="form-group">
                    <label>Partenaire</label>
                    <select required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                    <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>            
            <!-- end select -->
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Structure bénéficiaire</label>
                <input required name="beneficiaire" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>

            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
            <a href="{{route('dons')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection