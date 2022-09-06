@extends('layout')
@section('title', 'Login Form')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <table>

            <tr>
                <td>email</td>
                <td> <input type="text" name="email" value="{{ old('email') }} " /> </td>
            </tr>
            <td>
                @error('email')
                <td class="alert alert-danger">{{ $message }}</td>
            @enderror
            </td>


            <tr>
                <td>password</td>
                <td> <input type="password" name="password" value="{{ old('password') }}" /> </td>
            </tr>
            <td>
                @error('password')
                <td class="alert alert-danger">{{ $message }}</td>
            @enderror
            </td>



            <tr>
                <td> <input type="submit" name="submit" value="Login" /> </td>
            </tr>
        </table>
    </form>
@endsection
