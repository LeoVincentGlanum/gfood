@extends('layouts.app')

@section('content')
    <div class="container">

        Vous avez commandé {{count($reservations)}} fois

        <br>
        Vous devez donc :

        <br>
        <ul class="list-group">
        @foreach($reservations as $resa)




                <li class="list-group-item">

            {{$resa->prix}} € à {{$resa->user->name}} de la commande : {{$resa->commande()->first()->titre}}   du  {{$resa->commande()->first()->created_at}}
                </li>
            @endforeach
        </ul>

    </div>

@endsection
