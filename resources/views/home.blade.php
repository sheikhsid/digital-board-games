@extends('layouts.app')

@section('content')

                
@if (session('status'))
{{ session('status') }}
@endif

<x-navigation name="scripts">
	 <!-- Some JS and styles -->
  </x-navigation>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Welcome {{ Auth::user()->name }}</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                            <a href="/home">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Date of today</h6>
                                                <h6 class="font-extrabold mb-0">{{ now()->format('Y-m-d') }}</h6>
                                            </div>
                                        </div>            
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('/players') }}">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Players</h6>
                                                <h6 class="font-extrabold mb-0">{{ App\Models\Player::count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                            <a href="https://whatismyipaddress.com/ip/{{Request::ip()}}" target="_blank">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">IP Address</h6>
                                                <h6 class="font-extrabold mb-0">{{Request::ip()}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                            <a href="{{ route('/games') }}">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Games</h6>
                                                <h6 class="font-extrabold mb-0">0{{ App\Models\Game::count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>List of Games</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Game Name</th>
                                                        <th>Account Username</th>
                                                        <th>Game URL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($games as $game)
                                                    <tr>
                                                        <td>{{$game['name']}}</td>
                                                        <td>{{$game['username']}}</td>
                                                        <td><a href="{{$game['iframe']}}" target="_blank">Play</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="https://avatars.githubusercontent.com/u/94029719?v=4" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                        <h6 class="text-muted mb-0"><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>List of Players</h4>
                            </div>
                            <div class="card-content pb-4">
                                @foreach($players as $player)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        @foreach($games as $game)
                                            @if ($game['id'] == $player['game_id'])
                                                
                                                
                                        <img src="{{ asset('images/uploads') }}/{{$game['thumbnail']}}">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{$game['name']}}</h5>
                                            @endif
                                        @endforeach
                                        <h6 class="text-muted mb-0"><a href="https://whatismyipaddress.com/ip/{{$player['ip_address']}}" target="_blank">{{$player['ip_address']}}</a></h6>
                                    </div>
                                </div>
                                @endforeach
                                <div class="px-4">
                                    <a href="{{ route('/players') }}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; <a href="https://immensive.it" target="_blank">Immensive</a></p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"></span> by <a href="https://github.com/sheikhsid" target="_blank">SheikhSaad</a></p>
                    </div>
                </div>
            </footer>
        </div>
@endsection
