@extends('layout')
@section('title', 'Dashboard')

@section('content')

    <p>hey, {{ Auth::user()->username }}</p>
   


    <table class="table">

        <thead class="table-dark">
            <tr>
                <th scope="col">s.no.</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $users)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $users->firstname }}</td>
                    <td>{{ $users->lastname }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a class="btn btn-primary" href="{{ route('logout') }}">logout</a>
    </div>
@endsection
