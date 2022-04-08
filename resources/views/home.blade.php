@extends('layouts.app')

@section('content')
<div class="container">

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row justify-content-center">


{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    Prochaine commande : --}}
{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


            @foreach($commandes as $commande)
            <div class="col-md-3 m-3" >
                <div class="card" style="width: 18rem;">
                    @if($commande->user_id == \Illuminate\Support\Facades\Auth::id())
                        <a style="width: fit-content" data-id="{{$commande->id}}" class="delete btn btn-danger">X</a>
                    @endif
                    <img class="card-img-top" src="{{$commande->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$commande->titre}} pour {{$commande->heure}}</h5>
                        <p class="card-text">{{$commande->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><button class="badge badge-success">Validé</button>
                            @foreach($commande->reservations as $resa)
                                @if($resa->state == "ok")
                                    <span class="badge badge-success">{{$resa->user->name}} </span>
                                @endif
                            @endforeach</li>
                        <li class="list-group-item"><button class="badge badge-warning">En cours</button>
                        @foreach($commande->reservations as $resa)
                            @if($resa->state == "demande")
                                <span class="badge badge-success">{{$resa->user->name}} </span>
                            @endif
                        @endforeach

                        </li>
                        <li class="list-group-item"><button class="badge badge-info">Peut etre</button>Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{route('show.commande',['id' => $commande->id])}}" class="btn btn-success">Je commande</a>
                        <a href="#" class="btn btn-secondary">Peut etre</a>
                    </div>
                </div>
            </div>
            @endforeach


</div>
@endsection


@push('js')
    <script>

        $( document ).ready(function() {
            $(document).on('click','.delete',function (){
                let id = this.dataset.id
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    method  : "POST",
                    url: "{{route('delete.commande')}}",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        id : id
                    },

                    context: document.body
                }).done(function() {
                    alert('deleted');
                });
            })
        });

    </script>
@endpush
