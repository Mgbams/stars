@extends('layouts.app')

@section('title', 'Create a User profile')

@section('third_party_scripts')
  <script src="{{ mix('js/create-user.js') }}"></script>
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
        {{ Form::open([
            'route' => ['users.store'],
            'id' => 'form-container',
            'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-container'])
        }}
        <!--Form contents-->
        
            <!-- Add create partials -->
            @include('./../../partials/_user-create-form')

            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>

@endsection