@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h3 class="card-title">Enrégistrer une réalisation</h3>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('store-realisation')}}" method="post">
            @csrf
        <div class="card-body row g-3">
            <div class="col-md-8">
                <!-- select -->
                <div class="form-group">
                    <label>Projet</label>
                    <select required name="projet_id" class="form-control shadow-sm">
                        @foreach($projets as $projet)
                    <option value="{{$projet->id}}">{{$projet->libelle}}
                        / {{ $projet->partenaire->nom}}
                         / {{$projet->date_initiation}}
                    </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Date realisation</label>
                <input required name="date_realisation" type="date" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
            <a href="{{route('realisations')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection