@extends('layouts.app')

@section('head')
<style>
        body{
            background-color: #661421;
        }
</style>

@endsection

@section('content')

    <div class="container login">
        <div class="row vertical-offset">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6 text-center">
                            <div class="row">
                                <ul>
                                <div class="col-md-12"><img src="{{url('/img/logo2.png')}}"  width="100"/><br><br></div>
                                <div class="col-md-12"><a href="{{ route('password.request') }}" class="btn btn-info"> Passwort zurücksetzen </a><br><br></div>
                                <div class="col-md-12 "><a href="{{ route('register') }}" class="btn btn-info">   Neues Konto </a><br><br></div>
                                <br>
                                </ul>
                            </div>
                            {{-- {{ route('register') }} --}}
                        </div>
                        <form class="col-md-6 form-horizontal" method="POST" action="{{ route('login') }}"  >
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 ">Email Address</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12">Passwort</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" checked > Erinnere mich
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Anmeldung
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('foot')
@endsection
