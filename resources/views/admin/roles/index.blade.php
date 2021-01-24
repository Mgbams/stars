@extends('layouts.app')

@section('title', 'Show list of Roles')

@section('content')

<style>
.modal, .delete-modal {
    display: none;
    position: fixed; 
    padding-top: 50px;
    left: 0; 
    top: 0;
    width: 100%;
    height: 100%; 
    background-color: rgba(0, 0, 0, 0.5);
}
    
.modal-content, .delete-modal-content {
    position: relative; 
    padding: 20px; 
    width: 50%;  
    top: 20%;
    left: 25%;
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
}
    
.close-btn, .delete-close-btn{
    color: lightgray; 
    font-size: 24px;  
    font-weight: bold;
    width: 30px;
    height: 30px;
    cursor: pointer;
}

.close-btn-container {
    display: flex;
    justify-content: flex-end;
}
    
.close-btn:hover, .delete-close-btn:hover {
    color: darkgray;
}
    
@-webkit-keyframes animatetop {
    from {
        top: -300px; 
        opacity: 0;
    } 

    to {
        top: 0; 
        opacity: 1;
    }
}
    
@keyframes animatetop {
    from {
        top: -300px; 
        opacity: 0;
    }

    to {
        top: 0; 
        opacity: 1;
    }
}

#create_record {
    width: 120px !important;
}

.submit-button {
    margin-top: 20px;
    padding: 5px 20px;
    background-color: blue;
    color: white;
    border: none;
    cursor: pointer;
    width: 100%;
}

.submit-button:hover {
    background-color: green;
}

.create-form-container {
    width: 50%;
}

form {
    width: 100%;
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    box-sizing: border-box;
}

@media screen and (max-width: 900px) {

    .modal-content {
        width: 80%; 
        left: 10%;
        top: 10%; 
    }
        
    .create-form-container {
        width: 100%;
    }

        input[type=text] {
            width: 100%;
        }

    }

@media screen and (max-width: 980px) {
    .create-form-container {
        width: 80%;
    }

    .modal-content, .delete-modal-content {
        top: 8%;
    }
}

.action-buttons {
   display: flex;
   justify-content: space-between;
}

.align-buttons {
    display: flex;
   justify-content: space-between;
}

.close-when-no {
    background-color: blue;
}

.delete-submit-button {
    background-color: red;
}

.delete-submit-button, .close-when-no {
    margin-top: 20px;
    padding: 5px 20px;
    color: white;
    border: none;
    cursor: pointer;
    width: 40%;
}
</style>

<div>
    <div id="stars-table-wrapper">
        <h2 class="mb-4">Roles Info</h2>
         <!--Message de réussite lors de la soumission du formulaire-->
                @if(Session::has('success'))
                <div class="alert alert-success create-alert-success">
                    {{Session::get('success')}}
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

                       <div class="delete-container"> 
                            <button type="submit" class="crud-links deleteById" id="delete">
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


        <!-- Delete modal -->

        <div class="modal delete-modal">
            

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

        <!-- Pagination links -->
        <div class="pagination-links">
            {!! $roles->links() !!} 
        </div>
    </div>
</div>

<script>

    /**************   Create Modal   *******************/ 
    let modalBtn = document.getElementById("create_record");

    let modal = document.querySelector(".create-modal");

    let closeBtn = document.querySelector(".close-btn");

    modalBtn.onclick = function() {
         modal.style.display = "block";
    }

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(e) {
        if(e.target == modal){
            modal.style.display = "none";
        }
    }


/****   Delete Modal  ******/

let deleteModalBtn = document.getElementsByClassName("deleteById");

let deleteModal = document.querySelector(".delete-modal");

let deleteCloseBtn = document.querySelector(".delete-close-btn");

let noBtn = document.querySelector(".close-when-no");

for (let i = 0; i < deleteModalBtn.length; i++) {
    deleteModalBtn[i].addEventListener('click', function() {
        deleteModal.style.display = "block";
    });
}

deleteCloseBtn.onclick = function() {
    deleteModal.style.display = "none";
}

noBtn.onclick = function() {
    deleteModal.style.display = "none";
}

window.onclick = function(e) {
    if(e.target == deleteModal){
        deleteModal.style.display = "none";
    }
}
    
</script>

@endsection