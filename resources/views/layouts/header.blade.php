<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
  <header>
@if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: rgb(255, 255, 255); border-radius:30px">
            <a class="navbar-brand" href="{{url('/')}}">User</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                    
                @auth
                    <li class="nav-item">
                      <a class="nav-link active" href="{{url('userformview')}}" aria-current="page">My Profile<span class="visually-hidden"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}" aria-current="page">Home <span class="visually-hidden"></span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('logout') }}" aria-current="page">Log Out<span class="visually-hidden"></span></a>
                    </li>
                @else
                        <li class="nav-item">
                          <a class="nav-link active" href="{{ route('login') }}" aria-current="page">Login<span class="visually-hidden"></span></a>
                        </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}" aria-current="page">Register <span class="visually-hidden"></span></a>
                    </li>
                @endif
                @endauth
                    
              </ul>
             
            </div>
          </nav>
@endif
    
  </header>


<div class="background">
  
  