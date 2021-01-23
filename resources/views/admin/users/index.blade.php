@extends('layouts.app')

@section('title', 'Show lists of Users')

@section('content')

<div>
    <div id="stars-table-wrapper">
        <h2 class="mb-4">User's Info</h2>
        <!--Create button-->
        <div class="mb-5 float-right">
            <a id="create_record" href="{{ route('users.create') }}">Create a User</a>
        </div>
        <table class="table table-bordered" id="star-add-table">
            <thead>
                <tr>
                    <th class="hide-on-small-screen">Photo</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="hide-on-small-screen">
                        @if($user->photo !== "avatar1.png")
                            <img src="/images/users/{{$user->id}}/{{$user->photo}}" alt="{{ $user->name }}"/>
                        @else
                            <img src="/images/avatar/{{$user->photo}}" alt="{{ $user->name }}"/>
                        @endif
                    </td>
                    <td> {{ $user->name }} </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roleName }}</td>
                    <td class="action-buttons">
                        <a id="edit" class="crud-links" href="{{ route('users.edit', ['user' => $user->id]) }}">
                            <i class="far fa-md fa-edit"></i>&nbsp; Edit 
                        </a>

                        <a id="view" class="crud-links" href="{{ route('users.show', ['user' => $user->id]) }}">
                            <i class="far fa-eye"></i></i>&nbsp; View 
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination links -->
        <div class="pagination-links">
            {!! $users->links() !!} 
        </div>
    </div>
</div>

@endsection