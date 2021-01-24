@extends('layouts.app')

@section('title', 'Show list of Roles')

@section('third_party_stylesheets')
    <link href="{{ mix('css/role.css') }}" rel="stylesheet">
@endsection

@section('third_party_scripts')
  <script src="{{ mix('js/role.js') }}"></script>
@endsection

@section('content')

<div>
    <div id="stars-table-wrapper">
        <h2 class="mb-4">Roles Info</h2>
         <!--Message de réussite lors de la soumission du formulaire-->
                @if(Session::has('success'))
                <div class="alert alert-success create-alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
        
        <!--Erreur lors de la suppression du rôle-->
                @if(Session::has('errorMessage'))
                <div class="alert alert-danger create-alert-error">
                    {{Session::get('errorMessage')}}
                </div>
                @endif

          <!--Message d'erreur lors de la soumission du formulaire-->
                @if ($errors->any())
                <div class="alert alert-danger create-alert-error">
                    <strong>Whoops!</strong> Ce rôle existe déjà
                </div>
                @endif

        <!--Create button-->
        <div class="mb-5 float-right">
            <button id="create_record" class="create">Create a Role</button>
        </div>
        <table class="table table-bordered" id="star-add-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td> {{ $role->id }} </td>
                    <td>{{ $role->name }}</td>
                    <td class="action-buttons">
                        <div>
                            <a id="edit" class="crud-links" href="{{ route('roles.edit', ['role' => $role->id]) }}">
                                <i class="far fa-md fa-edit"></i>&nbsp; Edit 
                            </a>
                        </div>

                      <!-- Delete modal -->
                        <div class="modal delete-modal" data-tab="{{ $role->id}}">
                            <div class="modal-content delete-modal-content">

                                <div class="close-btn-container">
                                    <span class="delete-close-btn" style="color: red;">&times;</span>
                                </div>
                            
                                <h3 class="modal-header"> Voulez-vous vraiment supprimer ce rôle ? </h3>
                            
                                <div class="create-form-container">
                                    <form  action="{{ route('roles.destroy', $role->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')

                                        <div class="form-content">
                                            <div class="align-buttons">
                                                <button type="button" class="close-when-no">No</button>
                                                <button type="submit" class="delete-submit-button">Yes</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                       <div class="delete-container"> 
                            <button type="submit" class="crud-links deleteById" id="delete" data-for-tab="{{ $role->id}}">
                                <i class="fas fa-trash fa-md text-danger"></i>&nbsp;Delete
                            </button>
                       </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!--  create modal -->

        <div class="modal create-modal">
            <div class="modal-content">

                <div class="close-btn-container">
                    <span class="close-btn" style="color: red;">&times;</span>
                </div>
            
                <h3 class="modal-header">Create Role</h3>
            
                <div class="create-form-container">
                    <form action="{{ route('roles.store') }}" method="POST" >
                        @csrf

                        <div class="form-content">
                            <div>
                                <strong>Name:</strong>
                                <input type="text" name="name" placeholder="Name">
                            </div>

                            <div>
                                <button type="submit" class="submit-button">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pagination links -->
        <div class="pagination-links">
            {!! $roles->links() !!} 
        </div>
    </div>
</div>

@endsection