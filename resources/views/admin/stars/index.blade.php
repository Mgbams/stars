@extends('layouts.app')

@section('title', 'Show lists of Stars')

@section('content')

<div>
    <div id="stars-table-wrapper">
        <h2 class="mb-4">Stars Info</h2>
        <!--Create button-->
        <div class="mb-5 float-right">
            <a id="create_record" href="{{ route('stars.create') }}">Create a Star</a>
        </div>
        <table class="table table-bordered" id="star-add-table">
            <thead>
                <tr>
                    <th class="hide-on-small-screen">image</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th style="width: 35%;">Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($stars as $star)
                <tr>
                    <td class="hide-on-small-screen"><img src="/images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}"/></td>
                    <td> {{ $star->nom }} </td>
                    <td>{{ $star->prenom }}</td>
                    <td  style="width: 35%;">
                    <!-- Affichez seulement 100 caractères à partir de la première position 
                    et ajoutez des points de suspension si la longueur de la chaîne est supérieure à 100. -->
                        {{ substr(strip_tags($star->description), 0, 100) }}
                        {{ strlen(strip_tags($star->description)) > 100 ? '...' : ''}}
                    </td>
                    <td class="action-buttons">
                        <a id="edit" class="crud-links" href="{{ route('stars.edit', ['star' => $star->id]) }}">
                            <i class="far fa-md fa-edit"></i>&nbsp; Edit 
                        </a>

                        <a id="view" class="crud-links" href="{{ route('stars.show', ['star' => $star->id]) }}">
                            <i class="far fa-eye"></i></i>&nbsp; View 
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="pagination-links">
            {!! $stars->links() !!} 
        </div>
    </div>
</div>

@endsection