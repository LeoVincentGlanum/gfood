@extends('layouts.app')


@section('content')
    <div class="container">
        <form method="post" action="{{route('store.commande')}}" enctype='multipart/form-data' >
            @CSRF
            <div class="form-group">
                <label for="exampleInputEmail1">Titre de la commande</label>
                <input required="required" type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer le titre de la commande">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Saisir l'heure du repas</label>
                <input name="heure" value="12:00" type="time" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
{{--            <div class="form-check">--}}
{{--                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                <label class="form-check-label" for="exampleCheck1">J'invite ! </label>--}}
{{--            </div>--}}

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input name="img" class="form-control" type="file" id="formFile">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
