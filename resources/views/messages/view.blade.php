@if($errors->any())
    <div class="alert alert-danger" style="margin: 5px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(count($Errors) > 0)
	<div class="alert alert-danger" style="margin: 5px;">
		@if(count($Errors) == 1)
			{{ $Errors[0] }}
		@else
	        <ul>
	            @foreach ($Errors AS $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    @endif
    </div>
@endif

@if(count($Success) > 0)
	<div class="alert alert-success" style="margin: 5px;">
		@if(count($Success) == 1)
			{{ $Success[0] }}
		@else
		    <ul>
		        @foreach ($Success AS $success)
		            <li>{{ $success }}</li>
		        @endforeach
		    </ul>
		@endif
    </div>
@endif