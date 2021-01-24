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
  <script src="{{ mix('js/create-star.js') }}"></script>
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

@endsection