@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h5 class="card-title">Modifier convention</h5>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('update-convention', ['convention'=>$convention->id])}}" method="post">
                <!-- @method('PATCH') -->
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="card-body row g-3">
            <div class="col-md-6">
                <!-- select -->
                <div class="form-group">
                    <label>Partenaire</label>
                    <select  required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                            @if($partenaire->id == $convention->partenaire_id)
                            <option value="{{$partenaire->id}}" selected>{{$partenaire->nom}}</option>
                            @else
                            <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="form-group col-md-6">
                <label>Coopétation</label>
                <select required name="type" class="form-control" >
                    <option>{{$convention->type}}</option>
                    <option>Nord-Sud</option>
                    <option>Sud-Sud</option>
                    <option>Ville-Organisation</option>
                    <option>Réseaux de villes</option>
                </select> 
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Domaines</label>
                <textarea required name="domaines" class="form-control" rows="3" placeholder="Saisir ...">{{$convention->domaines}}</textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Objet</label>
                <textarea required name="objet" class="form-control" rows="3" placeholder="Saisir ...">{{$convention->objet}}</textarea>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Date signature</label>
                <input value="{{$convention->date_sign}}" required name="date_sign" type="date" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Période</label>
                <input value="{{$convention->validite}}" required name="validite" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="xxxx-yyyy">
            </div>
            <!-- select -->
            <div class="col-md-4">
                <!-- select -->
                <div class="form-group ">
                    <label>Statut</label>
                    <select required name="statut" class="form-control shadow-sm">
                    <option>{{$convention->statut}}</option>
                    <option>En cours</option>
                    <option>Expirée</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                <label>Perspectives</label>
                <textarea value="{{$convention->perspectives}}" name="perspectives" class="form-control" rows="3" placeholder="Saisir ...">{{$convention->perspectives}}</textarea>
                </div>
            </div>            
            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button href="{{route('conventions')}}" type="submit" class="btn btn-info"><i class="fas fa-save"></i> Modifier</button>
            <a href="{{route('conventions')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection