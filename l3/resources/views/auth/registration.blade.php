@extends('layout')
@section('title', 'Register Form')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <table>
            <tr>
                <td>firstname</td>
                <td> <input type="text" name="firstname" value="{{ old('firstname') }} "/> </td>
            </tr>
            <td>
                @error('firstname')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>    

            <tr>
                <td>lastname</td>
                <td> <input type="text" name="lastname" value="{{ old('lastname') }} "/> </td>
            </tr>
            <td>
                @error('lastname')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>username</td>
                <td> <input type="text" name="username"  value="{{ old('username') }} "/> </td>
            </tr>
            <td>
                @error('username')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td> 

            <tr>
                <td>email</td>
                <td> <input type="email" name="email" value="{{ old('email') }} "/> </td>
            </tr>
            <td>
                @error('email')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>

            <tr>
                <td>password</td>
                <td> <input type="password" name="password" value="{{ old('password') }}"/> </td>
            </tr>
            <td>
                @error('password')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>

            <tr>
                <td>confirm_password</td>
                <td> <input type="password" name="confirm_password"  value="{{ old('confirm_password') }}" /> </td>
            </tr>
            <td>
                @error('confirm_password')
                <td class="alert alert-danger">{{ $message }}</td>
                @enderror
            </td>

            <tr>
                <td> <input type="submit" name="submit" value="Register" /> </td>
            </tr>
        </table>
    </form>
@endsection

    