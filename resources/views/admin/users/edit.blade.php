@extends('layouts.app')

@section('title', 'Edit a User profile')

@section('content')
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

    <div class="create-form-container">
        <!--utiliser la liaison de modèle pour remplir les champs html-->
        {{  Form::model($user, ['route' => ['users.update', $user->id], 'enctype' => 'multipart/form-data']) }}
        <!--Form contents-->
            @method('PUT')

            <!-- Inclure les partial edit ici-->
            @include('./../../partials/_user-edit-form')

        {{ Form::close() }}
    </div>

    <!--Script-->
    <script>
        function formMonitor(formElements) {

            //surveillance du texte d'erreur du champ name
            document.getElementById("name").addEventListener("input", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("nomError") && document.getElementById("name").value !== "") {
                        document.getElementsByClassName("nomError")[0].style.display = 'none';
                        document.getElementById("name").style.border = '1px solid green';
                        document.getElementById("name").style.color = 'black';
                    }
                }
            });

            // surveillance du texte d'erreur du champ prénom
            document.getElementById("email").addEventListener("input", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("prenomError") && document.getElementById("email").value !== "") {
                        document.getElementsByClassName("prenomError")[0].style.display = 'none';
                        document.getElementById("email").style.border = '1px solid green';
                        document.getElementById("email").style.color = 'black';
                    }
                }
            });

             // surveillance du texte d'erreur du champ roles
            document.getElementById("roles").addEventListener("change", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("prenomError") && document.getElementById("roles").value !== "") {
                        document.getElementsByClassName("prenomError")[0].style.display = 'none';
                        document.getElementById("roles").style.border = '1px solid green';
                        document.getElementById("roles").style.color = 'black';
                    }
                }
            });

             //surveillance du texte d'erreur du champ image
            document.getElementById("image").addEventListener("change", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("fileError") && document.getElementById("image").value !== "") {
                        document.getElementsByClassName("fileError")[0].style.display = 'none';
                        document.getElementById("image").style.border = '1px solid green';
                        document.getElementById("image").style.color = 'black';
                    }
                }
            });
        }

        formMonitor(document.getElementById("form-container")); // invoke the function
    </script>
@endsection