@extends('layouts.app')

@section('head')
<style>
    .btn-primary{
        width: 150px;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row  ">
            @if( session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                       
                        <h2>Hinzufügen Optionen</h2>
                        
                         <form class="form-horizontal" method="POST" action="{{ url('status') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Neu Status</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Neu Status
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('state') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Neu Bundesland</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Neu Bundesland
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('city') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Neu Standort</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Neu Standort
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('job') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Neu Firma</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Neu Firma
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('bdepartment') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Neu Branche</label>

                                <div class="col-md-5">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Neu Branche
                                        </button>
                                </div>
                            </div>
                        </form>
                        <div class="pull-right"> <a href="{{ url('home') }}"  >  << Zurück </a>   &nbsp;  &nbsp; </div>
                    </div>
                </div>
            </div>
            
                        <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                       
                        <h2>LöschenOptionen</h2>
                    
                         <form class="form-horizontal" method="POST" action="{{ url('status/0') }}">
                            {{ csrf_field() }}
                            {{ method_field('Delete') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Löschen Status</label>

                                <div class="col-md-5">
                                    <select id="id" class="form-control"  name="id" required >
									<option value=''>Select</option>
									@foreach($status as $key => $value)
									<option  @if(old('id') == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
									@endforeach
								</select>
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Löschen Status
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('state/0') }}">
                            {{ csrf_field() }}
                            {{ method_field('Delete') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Löschen Bundesland</label>

                                <div class="col-md-5">
                                    <select id="id" class="form-control"  name="id" required >
									<option value=''>Select</option>
									@foreach($state as $key => $value)
									<option  @if(old('id') == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
									@endforeach
								</select>
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Löschen Bundesland
                                        </button>
                                </div>
                            </div>
                   
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('city/0') }}">
                            {{ csrf_field() }}
                            {{ method_field('Delete') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Löschen Standort</label>

                                <div class="col-md-5">
                                    <select id="id" class="form-control"  name="id" required >
									<option value=''>Select</option>
									@foreach($city as $key => $value)
									<option  @if(old('id') == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
									@endforeach
								</select>
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Löschen Standort
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('job/0') }}">
                            {{ csrf_field() }}
                            {{ method_field('Delete') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Löschen Firma</label>

                                <div class="col-md-5">
                                    <select id="id" class="form-control"  name="id" required >
									<option value=''>Select</option>
									@foreach($job as $key => $value)
									<option  @if(old('id') == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
									@endforeach
								</select>
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Löschen Firma
                                        </button>
                                </div>
                            </div>
                        </form>
                         <form class="form-horizontal" method="POST" action="{{ url('bdepartment/0') }}">
                            {{ csrf_field() }}
                            {{ method_field('Delete') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Löschen Branche</label>

                                <div class="col-md-5">
                                    <select id="id" class="form-control"  name="id" required >
									<option value=''>Select</option>
									@foreach($bdepartment as $key => $value)
									<option  @if(old('id') == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
									@endforeach
								</select>
                               </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Löschen Branche
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
