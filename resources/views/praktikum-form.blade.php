@extends('layouts.app')

@section('head')

<style>
        body{
            background-image: none;
        }
</style>
	
@endsection

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        
                        <h2> Praktikum Details</h2>
                        <form method="POST" action="{{ @$praktikum->praktikumid ? url('/praktikum/'.$praktikum->id) : url('/praktikum') }}">
                            {{ csrf_field() }}
							@if(@$praktikum->praktikumid)
								{{ method_field('PUT') }}
							@endif
                                
                                {{-- input begin here --}}
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="form-group{{ $errors->has('praktikumid') ? ' has-error' : '' }}">
                                            <label for="praktikumid">Firma</label>
                                            <input id="praktikumid" type="text" class="form-control" name="praktikumid" value="{{ old('praktikumid') ? old('praktikumid')  :  @$praktikum->praktikumid }}" required autofocus>
                                            @if ($errors->has('praktikumid'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('praktikumid') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <div class="form-group">
                                        <label for="contact_id">Anschprechpartner</label>
                                        <select id="contact_id" class="form-control"  name="contact_id">
                                            <option value=''>Anschprechpartners</option>
                                            @foreach($contacts as $key => $value)
                                            <option  @if(old('contact_id') == $value->id) {{'selected'}} @elseif(@$praktikum->contact_id == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                        <label for="bdepartment_id">Branche</label>
                                        <select id="bdepartment_id" class="form-control"  name="bdepartment_id" required>
                                            <option value=''>Wählen</option>
                                            @foreach($bdepartments as $key => $value)
                                            <option  @if(old('bdepartment_id') == $value->id) {{'selected'}} @elseif(@$praktikum->bdepartment_id == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                        <label for="job_id">Beruf</label>
                                        <select id="job_id" class="form-control"  name="job_id" required >
                                            <option value=''>Wählen</option>
                                            @foreach($jobs as $key => $value)
                                            <option  @if(old('job_id') == $value->id) {{'selected'}} @elseif(@$praktikum->job_id == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>	

                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <label for="state_id">Bundesland</label>
                                                <select id="state_id" class="form-control"  name="state_id" required >
                                                    <option value=''>Wählen</option>
                                                    @foreach($states as $key => $value)
                                                    <option  @if(old('state_id') == $value->id) {{'selected'}} @elseif(@$praktikum->state_id == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>	
                                            
                                            <div class="form-group col-md-6">
                                                <label for="city_id">Standort</label>
                                                    <div class="form-group">
                                                <select multiple class="selectpicker form-control" multiple name="city_id[]" required>
                                                    <option value='' disabled>Wählen</option>
                                                    @foreach($cities as $key => $value)
                                                    <option @if(isset($praktikum))    
                                                        @foreach ($praktikum->city as $cityobject) 
                                                            @if ($cityobject->id == $value->id) {{'selected'}}  @endif
                                                        @endforeach
                                                        @endif
                                                    value='{{$value->id}}'>{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>	
                                    </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">   
                                        <label for="phone">Firmennummer 1</label>
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') ? old('phone')  :  @$praktikum->phone }}" >  
                                    </div>
                                           	
                                            
                                    <div class="form-group col-md-4">
                                        <label for="phone2">Firmennummer 2</label>
                                        <input id="phone2" type="text" class="form-control" name="phone2" value="{{ old('phone2') ? old('phone2')  :  @$praktikum->phone2 }}" >        
                                    </div>
                                    
                                
                                    <div class="form-group col-md-4">
                                        <label for="phone3">Firmennummer 3</label>
                                        <input id="phone3" type="text" class="form-control" name="phone3" value="{{ old('phone3') ? old('phone3')  :  @$praktikum->phone3 }}" >                     
                                    </div>
                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="fax">Fax</label>
                                            <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') ? old('fax')  :  @$praktikum->fax }}" >                     
                                        </div>
                                    
                                    
                                        <div class="form-group col-md-4">
                                        <label for="mobile">Handy</label>
                                            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') ? old('mobile')  :  @$praktikum->mobile }}" >                     
                                        </div>
                                
                                    
                                        <div class="form-group col-md-4">
                                            <label for="privat">Privat</label>
                                            <input id="privat" type="text" class="form-control" name="privat" value="{{ old('privat') ? old('privat')  :  @$praktikum->privat }}" >                     
                                        </div>
                                </div>
                                                        
                                <div class="from-row">
                                    <div class="form-group col-md-4">
                                        <label for="zipcode">Postleitzahl</label>
                                        <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') ? old('zipcode')  :  @$praktikum->zipcode }}" >                 
                                    </div>	
                                    
                                    <div class="form-group col-md-4">
                                        <label for="address">Straße</label>
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') ? old('address')  :  @$praktikum->address }}" >                 
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="address2">Adresszusatz</label>
                                        <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') ? old('address2')  :  @$praktikum->address2 }}" >                
                                    </div>
                                </div>
                            
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="email">Email </label>
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ? old('email')  :  @$praktikum->email }}" >                     
                                    </div>
                                    
                                    
                                        <div class="form-group col-md-4">
                                        <label for="email2" >Email 2</label>
                                        <input id="email2" type="text" class="form-control" name="email2" value="{{ old('email2') ? old('email2')  :  @$praktikum->email2 }}" >                     
                                    </div>
                                    
                                    
                                        <div class="form-group col-md-4">
                                        <label for="website">Website</label>
                                        <input id="website" type="text" class="form-control" name="website" value="{{ old('website') ? old('website')  :  @$praktikum->website }}" > 
                                    </div>
                                </div>
                         
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="status_id">Status</label>
                                        <select id="status_id" class="form-control"  name="status_id" required >
                                            <option value=''>Wählen</option>
                                            @foreach($statuses as $key => $value)
                                            <option  @if(old('status_id') == $value->id) {{'selected'}} @elseif(@$praktikum->status_id == $value->id) {{'selected'}} @endif value='{{$value->id}}'>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-9">
                                        <label for="notes">Notizen</label>
                                        <textarea id="notes" class="form-control noteInput2" name="notes">
                                            {{ old('notes') ? old('notes')  :  @$praktikum->notes }}
                                        </textarea>                                               
                                    </div>
                                </div>
                            
                            
                                {{-- buttons --}}
                                <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <a  class="btn btn-warning" href="{{ url('login') }}"> << Zurück </a>                   
                                            </div>

                                            <div class="form-group col-md-2">
                                                <button type="submit" class="btn btn-primary">Einreichen</button>                     
                                            </div>

                                            <div class="form-group col-md-8">
                                                    @if(@$praktikum->praktikumid)<button type="button" onClick="praktikum_delete()"  class="btn btn-danger pull-right">Firma löschen </button>@endif 
                                            </div>       
                                </div>

                                </form>
                                
                                @if(@$praktikum->praktikumid)
                                <form id="praktikumdelete" action="{{ url('/praktikum/'.$praktikum->id) }}" method="POST"  style="display:none" >
                                            {{ csrf_field() }}
                                            {{ method_field('Delete') }}								
                                </form>
                                @endif
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@section('foot')


        

	<script>
		function praktikum_delete(){ 
			var praktikum = confirm('Sind Sie sicher, dass Sie löschen möchten?');			
			if(praktikum){			
                $( "#praktikumdelete" ).submit();
			}			
		}		
	</script>
@endsection
