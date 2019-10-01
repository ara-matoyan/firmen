@extends('layouts.app')

@section('head')
    <style>
        body{
            background-image: none;
        }  		

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:visited,
        .btn-primary:focus,
        .btn-primary-border {
    background-color: #661421;
    border-color: #661421;
}
    </style>

@endsection

@section('content')
    <div class="container" style="width: 100%">
        <div class="row  ">

            <div class="col-md-12 main-bar">
                <div id="main" class="panel panel-default">
                    <div class="panel-body">
						@if( session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif


                        <nav class="navbar navbar-inverse" id="newNavBar">
                                <div class="container-fluid">
                                  <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>                        
                                    </button>
                                    <a class="navbar-brand" href="{{ url('/praktikum/create') }}">Neue Hinzufügen</a>
                                  </div>
                                  <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                    <li><a href="{{url('/options')}}">Optionen</a></li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                    <li><a href="?type=city">{{ $standort->name }}</a></li>
                                      <li><a href="?type=state">{{ $bundesland->name }}</a></li>
                                      <li><a href="?type=all">Ganze</a></li>
                                    </ul>    
                                  </div>
                                </div>
                              </nav>

                       
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active ">
                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Firma</th>
                                        <th>Branche</th>
                                        <th>Beruf</th>   
                                        <th>Status</th>
										<th>Tel</th>
                                        <th>Email</th>
                                        <th>Bundesland</th>
                                        <th>Standort</th>
                                        <th>Anschrift</th>
                                        <th>Ansprechpartner</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($praktikum as $item)
                                    <tr>
                                        <td><a title=' zum Bearbeiten anklicken ' href="{{url('praktikum/'.$item->id.'/edit')}}" ><strong>{{@$item->praktikumid}}</strong></a></td>
                                        <td>{{ @$item->bdepartment->name }}</td> 
                                        <td>{{ @$item->job->name }}</td>
                                        <td>{{ @$item->mystatus->name }}</td>
                                        <td>{{ @$item->phone}}</td>
                                        <td>{{ @$item->email}}</td>
                                        <td>{{ @$item->state->name}}</td>
                                        <td>
                                            @foreach ($item->city as $cityid)
                                                {{$cityid->name}}, &nbsp;
                                            @endforeach
                                        </td>
                                        <td>{{@$item->address}}</td>
                                        <td><a title='Kontake' href="{{url('contacts/'.$item->id)}}" >Ansprechpartner</a></td>
                                    </tr>
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

@endsection

@section('foot')



    <script>
		//  show loading
		 function my_submit(){
		$(".se-pre-con").fadeIn();			
		 }
		 $('.pagination li').on('click', function () {
		 $(".se-pre-con").fadeIn();
		 });



 
	// data table        
         var table = $('#example').dataTable( {	
            "scrollY":        "480px",
            dom: '<"top"Bf>rt<"bottom p" >',
            "scrollX": true,
            "paging":   true,

            'columnDefs': [ {

            'targets': [1,2,3], /* column index */

            'orderable': false, /* true or false */

            }],



            initComplete: function () {
            this.api().columns([1,2,3]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
            },
            

             
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
    
		// home menu activation
		$('.home').addClass('active');
	
	</script>
@endsection
