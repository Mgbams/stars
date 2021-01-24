@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-welcome-container">
        <h1 class="dashboard-header">Vous êtes connecté en tant qu'administrateur</h1>
        <div class="inner-container">
            <div>
                <h6>Total Stars</h6>
                <p>{{ $starsCount }}</p>
            </div>

            <div>
                <h6>Total Users</h6>
                <p>{{ $usersCount }}</p>
            </div>
        </div>
    </div>
@endsection
