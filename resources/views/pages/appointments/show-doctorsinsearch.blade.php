@extends('layouts.app')


@section('styles') 
    <link rel="stylesheet" href="/css/maverickstyles.css">
    


@endsection

 @section('content')
<div class="panel @role('admin', true) panel-info  @endrole">

<div class="panel-heading">

     Doctors Found From the Search

    @role('admin', true)
        <span class="pull-right label label-primary" style="margin-top:4px">
        Admin Access
        </span>

    @endrole
    
    @role('doctor', true)
        <span class="pull-right label label-warning" style="margin-top:4px">
        Doctor Access
        </span>
    @endrole
    @role('patient', true)
            <a href="/home" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Search for Doctor</span>
            </a>
     @endrole
    
</div> 
<hr>
<div class="panel-body">

@role('patient', true)

<main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">

@if( $items != null) 

    @foreach($users as $user) 
        @foreach($user->roles as $user_role )            

                @if($user_role->name == 'doctor')
                    <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img id="user_selected_avatar" class="card-img-top" 
					  src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @else {{ "https://www.gravatar.com/avatar/aadacec5a1966989ef7f866b22e74b0b.jpg?d=http%3A%2F%2Fc1940652.r52.cf0.rackcdn.com%2F51ce28d0fb4f442061000000%2FScreen-Shot-2013-06-28-at-5.22.23-PM.png&r=g" }} @endif" 
																alt="{{ $user->name }}">
                                                      
                        <div class="card-body">
                        <p class="card-text">
                        {{ $user->name }} </p>

                        <p class="card-text">
                        
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            
                            {!! HTML::link(url('/AppointmentResquest/'.$user->id  ), trans('MAKE APPOINTMENT') , array( 'class' => 'btn btn-sm btn-primary btn-outline-secondary', 'type' => 'button')) !!}
                                               
                                      
                            <button type="button" class="btn btn-sm btn-default btn-outline-secondary">Veiw Doctor Details</button>
                            </div>
                            <small class="text-muted ">
                            @if($user->isOnline())                           
                                Online
                            @else                    
                                Offline                            
                            @endif
                            </small>
                        </div>
                        </div>
                    </div>

             </div>
            
                @endif
              
        @endforeach             
      @endforeach
              

@else
    
<p> NO RESULTS FOUND PLEASE SEARCH AGAIN </p>
@endif            

          </div>
        </div>
      </div>

    </main>



 @endrole
 </div>

</div>
</div>

 @endsection
 

