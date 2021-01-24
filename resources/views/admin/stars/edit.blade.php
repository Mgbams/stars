@extends('layouts.app')

@section('title', 'Edit a Star profile')

@section('third_party_scripts')
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
        selector:'textarea',
        plugins:'code',
        menubar:false
        });
  </script>
  <script src="{{ mix('js/edit-star.js') }}"></script>
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
    
@endsection