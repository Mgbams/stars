@extends('layouts.app')

@section('title', 'Create a Star profile')

@section('third_party_scripts')
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
        selector:'textarea',
        plugins:'code',
        menubar:false
        });
  </script>
@endsection

@section('content')
    <!--Message de réussite lors de la soumission du formulaire-->
    @if(Session::has('success'))
    <div class="alert alert-success create-alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="back-link-container">
        <a class="back-to-index-link" href="{{ route('stars.index') }}">
            <i class="far fa-hand-point-left"></i>&nbsp; Back
        </a>
    </div>

    <div class="create-form-container">
        <!--utiliser la liaison de modèle pour remplir les champs html-->
        {{  Form::model($star, ['route' => ['stars.update', $star->id], 'enctype' => 'multipart/form-data']) }}
        <!--Form contents-->
            @method('PUT')

            <!-- Inclure les partial edit ici-->
            @include('./../../partials/_edit-form')

        {{ Form::close() }}
    </div>

    <!--Script-->
    <script>
        function formMonitor(formElements) {

            //surveillance du texte d'erreur du champ nom
            document.getElementById("nom").addEventListener("input", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("nomError") && document.getElementById("nom").value !== "") {
                        document.getElementsByClassName("nomError")[0].style.display = 'none';
                        document.getElementById("nom").style.border = '1px solid green';
                        document.getElementById("nom").style.color = 'black';
                    }
                }
            });

            // surveillance du texte d'erreur du champ prénom
            document.getElementById("prenom").addEventListener("input", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("prenomError") && document.getElementById("prenom").value !== "") {
                        document.getElementsByClassName("prenomError")[0].style.display = 'none';
                        document.getElementById("prenom").style.border = '1px solid green';
                        document.getElementById("prenom").style.color = 'black';
                    }
                }
            });

            //surveillance du texte d'erreur du champ Description
            document.getElementById("description").addEventListener("input", function() {
                if( this.value === "") {
                    // faire rien
                } else {
                    if( document.getElementsByClassName("descriptionError") && document.getElementById("description").value !== "") {
                        document.getElementsByClassName("descriptionError")[0].style.display = 'none';
                        document.getElementById("description").style.border = '1px solid green';
                        document.getElementById("description").style.color = 'black';
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