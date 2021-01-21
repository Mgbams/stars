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

    <div class="create-form-container">
        {{ Form::open([
            'route' => ['stars.store'],
            'id' => 'form-container',
            'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-container'])
        }}
        <!--Form contents-->
        
            <!-- Add create partials -->
            @include('./../../partials/_create-form')

            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>

    <!--Script-->
    <script>
        function formMonitor(formElements) {

            //nom field error text monitoring
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

            //prenom field error text monitoring
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

            //Description field error text monitoring
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

             //image field error text monitoring
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