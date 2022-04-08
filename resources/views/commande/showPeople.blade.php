@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($reservations as $resa)
            <div class="card">
                <div class="card-header">
                    {{$resa->user->name}}
                    @if($resa->state == "demande")
                        <span class="badge badge-primary">En attente</span>
                    @elseif($resa->state == "refuser")
                        <span class="badge badge-danger">Refusé</span>
                    @else
                        <span class="badge badge-success">Accepté</span>
                    @endif


                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$resa->tel}}</h5>
                    <p class="card-text">{{$resa->commande}}</p>

                    <form method="post" action="{{route('sendConf.commande')}}">
                        @csrf
                        <input type="hidden" name="idResa" value="{{$resa->id}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prix de la commande </label>
                            <input name="prix" @if($resa->prix != 0) value="{{$resa->prix}}" @endif  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Renseigner le prix de la commande.">
                            <small id="emailHelp" class="form-text text-muted">Ces infos seront affichés pour GDDETES</small>
                        </div>
                        <button onclick="return false;" data-id="{{$resa->id}}" class="refuser btn btn-danger">Refuser</button>
                    <a href="#"><button type="submit" href="#"   class="btn btn-success">Accepter</button></a>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@push('js')
    <script>

        $( document ).ready(function() {
            $(document).on('click','.refuser',function (){
                let id = this.dataset.id
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    method  : "POST",
                    url: "{{route('refuse.commande')}}",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        id : id
                    },

                    context: document.body
                }).done(function() {
                    window.location = "/showAll"
                });
            })
        });

    </script>
@endpush
