@extends('layouts.app')

@section('title', 'Show lists of Stars')

@section('content')
<style>

     /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    position: relative;
    top: 40%;
    left: 10%;
    border: 1px solid #888;
    width: 50%; 
    }

    /* The Close Button */
    .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    } 
</style>
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
                    <td class="hide-on-small-screen"><img src="images/{{$star->id}}/{{$star->image}}" alt="{{ $star->prenom }}"/></td>
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

                        <form action="{{ route('stars.destroy', $star->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="crud-links" id="delete">
                                <i class="fas fa-trash fa-md text-danger"></i>&nbsp;Delete
                            </button>
                        </form>
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