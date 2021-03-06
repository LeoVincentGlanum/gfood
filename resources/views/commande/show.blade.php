@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{$commande->titre}}</h1>
                 Pour   {{$commande->heure}}  h <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                </svg>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="{{asset($commande->image)}}">
            </div>
        </div>
      <div class="row">
          <div class="col">
              Description de la commande :
          </div>
      </div>
        <div class="row">
            <div class="col">
                {{$commande->description}}
            </div>
        </div>


        <hr>

        <button type="submit" class="btn btn-info">Indiquer que cela peut m'interesser</button>

        <h1 class="mt-5">Je veux commander </h1>

        <form method="post" action="{{route('send.commande')}}">
            @csrf
            <input type="hidden" name="idCommande" value="{{$commande->id}}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description de votre commande</label>
                <textarea name="commande" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Numero de t??l??phone au cas ou</label>
                <input type="text" name="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre t??l??phone 0600006600">
            </div>

            <button type="submit" class="btn btn-primary">Je commande</button>
        </form>









    </div>
@endsection
<script>
    import Index
        from "../../../vendor/phpunit/php-code-coverage/tests/_files/Report/HTML/CoverageForClassWithAnonymousFunction/index.html";
    export default {
        components: {Index}
    }
</script>
