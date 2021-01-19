@extends('layouts.app')

@section('title', 'Create a Star profile')

@section('content')
    <!--Message de réussite lors de la soumission du formulaire-->
    @if(Session::has('success'))
    <div class="alert alert-success create-alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    <div class="create-form-container">
        {!! Form::open([
            'route' => ['stars.store'],
            'id' => 'form-container',
            'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-container'])
        !!}
        <!--Form contents-->
            <div class="form-group">
                {!! Form::label('nom', 'Nom', ['class' => 'nom']) !!}
                {!! Form::text('nom', '', ['id' => 'nom', 'class' => 'form-control '.($errors->has('nom') ? 'error':'')]) !!}

                 <!-- Error -->
                @if ($errors->has('nom'))
                <div class="error nomError">
                    {{ $errors->first('nom') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('prenom', 'Prénom', ['class' => 'prenom']) !!}
                {!! Form::text('prenom', '', ['id' => 'prenom', 'class' => 'form-control  '.($errors->has('prenom') ? 'error':'')]) !!}

                <!-- Error -->
                @if ($errors->has('prenom'))
                <div class="error prenomError">
                    {{ $errors->first('prenom') }}
                </div>
                @endif
            </div>

             <div class="form-group">
                {!! Form::label('description', 'description', ['class' => 'description']) !!} <br />
                {!! Form::textarea('description', '', 
                    ['id' => 'description', 'class' => 'form-conrol description '.($errors->has('description') ? 'error':''), 
                    'rows' => 5, 'placeholder'=> 'Entrez la description du star'
                    ]) 
                !!}

                <!-- Error -->
                @if ($errors->has('description'))
                <div class="error descriptionError">
                    {{ $errors->first('description') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                {{ Form::file('image'), ['id' => 'image', 'class' => 'form-control  '.($errors->has('image') ? 'error':'')] }}

                <!-- Error -->
                @if ($errors->has('image'))
                <div class="error fileError">
                    {{ $errors->first('image') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
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