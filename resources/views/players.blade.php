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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Players Area</h3>
                            <p class="text-subtitle text-muted">You can list your game from here</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Players Area</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                        @foreach($games as $game)
                            <div class="col-3 col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <h6 class="text-muted font-semibold">{{$game['name']}}</h6>
                                                <h6 class="font-extrabold mb-0">Play - {{ App\Models\Player::where('game_id', $game['id'])->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="card">
                        <div class="card-header">All Listed Games</div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>IP Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($players as $player)
                                    <tr>
                                        <td>
                                            @foreach($games as $game)
                                                @if ($game['id'] == $player['game_id'])
                                                {{$game['name']}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$player['ip_address']}}</td>
                                        <td>{{$player['created_at']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
