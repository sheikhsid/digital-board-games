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
                            <h3>Games Area</h3>
                            <p class="text-subtitle text-muted">You can list your game from here</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Games Area</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('game') }}">
                                        @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Game Name*</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Game Name" id="first-name-icon" name="name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-joystick"></i>
                                                                </div>
                                                            </div>
                                                            @error('name'){{$message}}@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Username</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Username of profile" id="first-name-icon" name="username">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                            @error('username'){{$message}}@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Game URL*</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Game URL (Iframe)" id="mobile-id-icon" name="iframe">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-link-45deg"></i>
                                                                </div>
                                                            </div>
                                                            @error('iframe'){{$message}}@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Game Thumbnail*</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="image.jpg" id="mobile-id-icon" name="thumbnail">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-link-45deg"></i>
                                                                </div>
                                                            </div>
                                                            @error('thumbnail'){{$message}}@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                                <input type="checkbox" id="remember-me-v" class='form-check-input' name="status">
                                                                <label for="remember-me-v">Active</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Vertical form layout section end -->
                <section class="section">
                    <div class="card">
                        <div class="card-header">All Listed Games</div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Account Username</th>
                                        <th>Game URL</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($games as $game)
                                    <tr>
                                        <td>{{$game['name']}}</td>
                                        <td>{{$game['username']}}</td>
                                        <td><a href="{{$game['iframe']}}" target="_blank">Play</a></td>
                                        <td>@if ($game['status'] == 'on')
                                                <form method="POST" action="{{ route('active') }}">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{$game['id']}}">
                                                    <input type="hidden" name="status" value="0">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Active</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('active') }}">
                                                @csrf
                                                    <input type="hidden" name="id" value="{{$game['id']}}">
                                                    <input type="hidden" name="status" value="on">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Inactive</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td><a href=""><i class="bi bi-trash" style="font-size: 25px;"></i></a></td>
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
