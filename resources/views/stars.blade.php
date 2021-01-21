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
    <div class="flex-center position-ref">
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
    
    <!-- Page contents starts here -->
   <div class="main">
        <div class="page-title-container">
            <h1 class="page-title">Profile Browser</h1>
        </div>

        <!-- displayed on small screens -->
        <div id="stars-lists">
            @if($stars)
            @foreach($stars as $star)
            <!-- si l'id de $star est égal à l'id de $firstStar, alors la description est ouverte par défaut -->
            <div class="panel ($firstStar->id ===  $star->id) ? 'active' : ''"> 
                <div class="acc-header">{{ $star->nom}}&nbsp;{{ $star->prenom}}</div>
                <div class="acc-body">
                    <span class="img-span"><img align="left" src="images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}" class="star-profile-image"/></span>
                    <span>{!! $star->description !!}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- displayed on small screen ends here -->

        <div class="startabs">
            <div class="startabs_sidebar">
                @if($stars)
                    @foreach($stars as $star)
                        <button class="startabs_button" data-for-tab="{{ $star->id}}">
                            {{ $star->nom}}&nbsp;{{ $star->prenom}}
                        </button>
                    @endforeach
                @endif
            </div>

            @if($stars)
                @foreach($stars as $star)
                    <div class="startabs_contents" data-tab="{{ $star->id}}">
                        <span class="img-span">
                            <img align="left" src="images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}" class="star-profile-image"/>
                        </span>
                        <span>{!! $star->description !!}</span>
                    </div>
                @endforeach
            @endif

        </div>
   </div>

    <script type="text/javascript" src="{{ asset('js/stars-index.js') }}"></script>
</body>
</html>