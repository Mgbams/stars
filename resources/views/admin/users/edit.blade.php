@extends('layouts.app')

@section('title', 'Edit a User profile')

@section('third_party_scripts')
  <script src="{{ mix('js/edit-user.js') }}"></script>
@endsection

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

@endsection