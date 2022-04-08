@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mes commandes que j'ai proposées :</h2>
        @foreach($commandes as $commande)
            <div class="card">
                <div class="card-header">
                    {{$commande->titre}}
                </div>
                <div class="card-body">
                    <p class="card-text">{{$commande->description}}</p>
                    @php($count = count($commande->reservations))
                   Il y  {{$count}} personnes interessés <br>
                    <a href="{{route('showPeople.commande',['id' => $commande->id])}}" class="btn btn-primary">Voir les personnes interessée</a>
                </div>
            </div>
        @endforeach

        <h2 class="mt-3"> Commandes auquelle j'ai repondu  : </h2>

        @foreach($reservations as $commande)
            @php($oldResa = $commande)
            @php($commande = $commande->commande()->first())

            <div class="card">
                <div class="card-header">
                    {{$commande->titre}}
                </div>
                <div class="card-body">a
                    <p class="card-text">{{$commande->description}}</p>

                   Status de votre demande :
                    @if($oldResa->state == "demande")
                    <button class="btn btn-warning">En attente de réponse</button>
                    @endif

                    @if($oldResa->state == "ok")
                        <button class="btn btn-success">Pris en compte, Solde à payer : {{$oldResa->prix}}€</button>
                    @endif

                    @if($oldResa->state == "refuser")
                        <button class="btn btn-danger">Refusé</button>
                    @endif



                    <br>
                    Vous avez commander :<br>
                    {{$oldResa->commande}}
                    <br>
{{--                    <a href="#" class="btn btn-primary">Voir les personnes interessée</a>--}}
                </div>
            </div>
        @endforeach

    </div>
@endsection
