@extends('layouts.app')
@section('content')
@section('template_title')
  Create Appointment 
@endsection

@section('template_fastload_css')
@endsection



    <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            Search For Doctor

            <!-- <a href="/users" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span>
              <span class="hidden-xs"> Users</span>
            </a> -->

          </div>
          <div class="panel-body">

            {!! Form::open(array('action' => 'AppointmentController@filter' , 'method' => 'GET')) !!}             

              <div class="form-group has-feedback row {{ $errors->has('filter') ? ' has-error ' : '' }}">
                {!! Form::label('filter', 'SearchBy', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    <select class="form-control" name="filter" id="filter">
                     
                      <option value="location"> By Location </option>
                      <option value="speciality"> By Speciality </option>
                      <option value="name"> By Username </option>
                      <option value="placeofwork"> By Hospital </option>
                      
                    </select>
                    <label class="input-group-addon" for="name">
                        <i class="fa fa-fw" aria-hidden="true"></i>
                    </label>
                    
                  </div>
                
                </div>
              </div>

	          <div class="form-group has-feedback row {{ $errors->has('keyword') ? ' has-error ' : '' }}">
                {!! Form::label('keyword', 'Keyword', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                  <div class="input-group">
                    {!! Form::text('keyword', NULL, array('id' => 'keyword', 
                        'class' => 'form-control', 'placeholder' => 'Keyword')) !!}  
                        <label class="input-group-addon" for="name"><i class="fa fa-fw" aria-hidden="true"></i></label>                  
                  </div>
                  @if ($errors->has('keyword'))
                    <span class="help-block">
                        <strong>{{ $errors->first('keyword') }}</strong>
                    </span>
                  @endif
               
                </div>
              </div>

              <div class="col-md-9">
            <h2>thet</h2>
              </div>

       

              {!! Form::button('<i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;' 
              . 'Search', 
              array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right',
                    'type' => 'submit', )) !!}

            {!! Form::close() !!}

          </div>

        </div>
      </div>
    </div>
  </div>

          @if( $items != null)
            @section('content')
                @foreach($items as $item)
                <hr>
                <hr>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="text-center lead">
                        Your Search Results
                        </div>
                    </div>
                    <p>
                   {{ $item->location }} 
                                        </p>
                @endforeach
            @else


            @endif
          
           
@endsection

@section('footer_scripts')
@endsection
