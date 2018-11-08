@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @foreach(Auth::user()->roles as $r)
                    <li>{{$r->name}}</li>
                    @endforeach
                    <h5>Magasins</h5>
                    @hasrole('Admin')
                    <h5>Super Admin</h5>
                    <ul>
                    @foreach(App\Magasin::all() as $m)
                        <li>{{$m->name}}</li>
                        @endforeach
                        </ul>
                    @endhasrole
                    @hasrole('User')
                    @php
                    
                    @endphp
                    @foreach(Auth::user()->magasins as $m)
                        <li>{{$m->name}}</li>
                        <h6>Roles On {{$m->name}}</h6>
                        
                        @foreach(Auth::user()->rolesByMagasin($m->id) as $rbm)
                        <li style="list-style-type:square">{{$rbm->name}}</li>
                        @endforeach
                        @endforeach
                    @endhasrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
