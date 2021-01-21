@extends('layouts.app')

@section('title', 'Show lists of Stars')

@section('content')

<div class="show-container">
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

    <div class="date-created">
        <p class="name">{{   strtoupper($star->nom) }} &nbsp;{{   strtoupper($star->prenom)  }}</p>
        <p  class="name"><i>Créeé à: &nbsp;{{  date('j-m-y', strtotime($star->created_at)) }}</i></p>
    </div>

    <div class="show-page-inner-div">
        <div class="action-buttons-container">
            <div class="action-buttons">
                <a id="edit" class="crud-links" href="{{ route('stars.edit', ['star' => $star->id]) }}">
                    <i class="far fa-md fa-edit"></i>&nbsp; Edit 
                </a>
                <form action="{{ route('stars.destroy', $star->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="crud-links" id="delete">
                        <i class="fas fa-trash fa-md text-danger"></i>&nbsp;Delete
                    </button>
                </form>
            </div>

            <div class="show-page-description">
                <p>{!! $star->description  !!}</p>
            </div>
        </div>

        <div class="show-page-nom-prenom-container">
            <p><img src="/images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}" /></p>
            <div class="nom-pronom">
                <p>Nom: &nbsp;</p>
                <p>{{   $star->nom  }}</p>
            </div>

             <div class="nom-pronom">
                <p>Prénom: &nbsp;</p>
                <p>{{ $star->prenom  }}</p>
            </div>

        </div>
    </div>
</div>

@endsection