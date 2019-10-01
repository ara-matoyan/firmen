@extends('layouts.app')

@section('head')


@endsection

@section('content')

<section>

<div class="container">
<!-- title -->
<div class="row">
	<div class="col text-center">
		<h1 class="desplay-4 text-uppercase text-dark mb-0">
		<strong>{{ $praktikum->praktikumid }}</strong>
	</div>	

</div> 
<!-- end of title -->
<div class="row">
	<div class="col-md-3 my-3">
		<div class="card card-body bg-secondary">
		<form method="POST" action="{{ url('history') }}">
		<!-- simple form-->
		<div class="form-group mt-5 {{ $errors->has('name') ? ' has-error' : '' }}">
		<div class="form-group">
		<label for="name">Anschprechpartner</label>
		<select id="contact_id" class="form-control"  name="contact_id" required autofocus>
		@foreach($contacts as $key => $value)
		<option value='{{ $value->id }}'>{{ $value->name }}</option>
		@endforeach
		</select>

		</div>
		<textarea id="name" name="name" class="form-control noteInput" required></textarea>
		<input type="hidden" name="praktikum_id" value="{{$praktikum->id}}">
		</div>
			<div>
			<button type="submit" class="btn btn-primary">Neu Entry</button>
			</div>
			{{ csrf_field() }}
		</form>
		</div>
	</div>

	<!-- history table -->

<div class="col-md-9 my-3">
	<div class="embed-responsive embed-responsive-4by3">
		<div class="tab-content">
			<div id="menu1" class="tab-pane fade in active ">
				<div class="embed-responsive embed-responsive-4by3">
					<div class="tab-content">
						<div id="menu1" class="tab-pane fade in active ">
							<table class="display text-wrap" cellspacing="0" width="100%" id="contactstable">
								<thead>
								<tr>
								<th>Ansprechpartner</th>
								<th>Notizen</th>
								<th>Date</th>
								</tr>
								</thead>
								<tbody>
								@foreach($contacts as $contact)
								@foreach($contact->histories as $history)
								<tr>		
								<td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{!! nl2br(e($contact->name))!!}</td>
								<td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$history->name}}</td>
								<td>{{ @$history->created_at->toDateString() }}</td> 
								</tr>
								@endforeach
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
</div>
</div>


</section>

@endsection    

@section('foot')

<script>
		$(document).ready(function(){
	
			$("#contact_id").select2({
			  tags: true
			});
    	// $('#contactstable').DataTable();
		 });
</script>
<script>
		var table = $('#contactstable').dataTable( {	
		 	 "scrollY":        "290px",
             dom: '<"top"Bf>rt<"bottom">',
             "scrollX": true,
             
             buttons: [
            {
                //print in landscape script
                extend: "print", text:'Drucken',
                customize: function(win)
                {
 
                var last = null;
                var current = null;
                var bod = [];
 
                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
 
                style.type = 'text/css';
                style.media = 'print';
 
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
 
                head.appendChild(style);
            }
            
            },

            //select col visibility
            {
                extend: 'colvis',text:'Spalten Anzeigen'
                
            }

        ],

        //end buttons

        //drag and drop columns
        colReorder: true,


        // 'Aktiv Status green color'   
        "createdRow": function ( row, data, index ) {
         if ( data[3]== 'Aktiv') {
             $('td', row).eq(3).addClass('aktiv');
         }
     },
     //German language 
     "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        } 
         });	



        $('.dt-button').addClass('btn btn-default').removeClass('dt-button');

		 
	</script>	


@endsection


