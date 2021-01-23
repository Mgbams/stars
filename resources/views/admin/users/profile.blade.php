@extends('layouts.app')

@section('title', 'Show User')

@section('content')

<div class="show-container">
    <!--Message de réussite lors de la soumission du formulaire-->
    @if(Session::has('success'))
    <div class="alert alert-success create-alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="back-link-container">
        <a class="back-to-index-link" href="{{ route('users.index') }}">
            <i class="far fa-hand-point-left"></i>&nbsp; Back
        </a>
    </div>

    <div class="date-created">
        <p class="name">{{   strtoupper($user->name) }}</p>
        <p  class="name"><i>Créeé le: &nbsp;{{  date('j-m-y', strtotime($user->created_at)) }}</i></p>
    </div>

    <div class="show-page-inner-div">
        <div class="action-buttons-container">
            <div class="action-buttons">
                <a id="edit" class="crud-links" href="{{ route('users.edit', ['user' => $user->id]) }}">
                    <i class="far fa-md fa-edit"></i>&nbsp; Edit 
                </a>
                <!-- Protéger l'utilisateur authentifié de la suppression de son compte -->
                @if(Auth::user()->id !== $user->id)
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="crud-links" id="delete">
                        <i class="fas fa-trash fa-md text-danger"></i>&nbsp;Delete
                    </button>
                </form>
                @endif
            </div>

            <div class="show-page-description" style="margin-top: 20px;">
               <p>Adresse Mail:&nbsp;<span style="color: blue;">{{ $user->email  }}</span></p>
               <p>Role:&nbsp;{{ $user->roleName }}</p>
            </div>
        </div>

        <div class="show-page-nom-prenom-container">
            <p>
                @if($user->photo !== "avatar1.png")
                    <img src="/images/users/{{$user->id}}/{{$user->photo}}" alt="{{ $user->name }}"/>
                @else
                    <img src="/images/avatar/{{$user->photo}}" alt="{{ $user->name }}"/>
                @endif
            </p>
            <div class="nom-pronom">
                <p>Nom: &nbsp;</p>
                <p>{{   $user->name  }}</p>
            </div>

             <div class="nom-pronom">
                <p>Email: &nbsp;</p>
                <p>{{ $user->email }}</p>
            </div>

        </div>
    </div>
</div>

@endsection