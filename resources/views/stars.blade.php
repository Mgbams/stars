<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Stars de HelloCSE</title>
    
    <!--app.css-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Stars.css -->
    <link href="{{ asset('css/stars.css') }}" rel="stylesheet">
        
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links" id="top-right-links">
               
                @If(Auth::check())
                    <!--Si authentifié et que l'utilisateur est un admin, affichez le lien du tableau de bord-->
                    @if(Auth::check() && Auth::user()->isAdministrator())
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else 
                         <!--Sinon affichez le bouton de sign out-->
                         <a href="#" class="btn btn-default btn-flat float-right signout-modified-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                 @endauth
            </div>
        @endif
    </div>
    <div class="main">
        <div class="page-title">
            <h1>Profile Browser</h1>
        </div>
        <div id="stars-lists">
            @if($stars)
            @foreach($stars as $star)
            <!-- si l'id de $star est égal à l'id de $firstStar, alors la description est ouverte par défaut -->
            <div syle="padding-bottom: 30px;" class="panel ($firstStar->id ===  $star->id) ? 'active' : ''"> 
                <div class="acc-header" style="font-weight: bold;">{{ $star->nom}}&nbsp;{{ $star->prenom}}</div>
                <div class="acc-body" style="min-height: 150px;">
                    <span style="margin-bottom: 30px;"><img align="left" style="width: 100px; height: 100px; margin: 6px 10px 0px 0px;" src="images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}" class="star-profile-image"/></span>
                    <span>{{ $star->description}}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    
    </div>
    <script type="text/javascript" src="{{ asset('js/stars-index.js') }}"></script>
</body>
</html>