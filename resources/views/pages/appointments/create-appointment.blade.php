@extends('layouts.app')

@section('js')
<link rel="stylesheet" href="/css/maverickstyles.css">  

      
@endsection 
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
          <label class="control-label"><h5> REQUEST FOR AN APPOINTMENT DATE</h5></label>
            </div>

          
        @role('patient', true) 
        <div class="text-center">
    
                <div class="date-picker" data-date="2016-04-22" style="text-align:center;">
                    <div class="date-container">
                    Select Appointment Date<br>
                    <h3 class="date">
                        <span data-toggle="datepicker" data-method="subtract" data-type="d" class="fa fa-angle-left lefty"></span>
                        <span class="text">17th</span>
                        <span data-toggle="datepicker" data-method="add" data-type="d" class="fa fa-angle-right righty"></span>
                    </h3>
                    <h2 class="month" style="min-width:190px;">
                        <span data-toggle="datepicker" data-method="subtract" data-type="M" class="fa fa-angle-left lefty"></span>
                        <span class="text">December</span>
                        <span data-toggle="datepicker" data-method="add" data-type="M" class="fa fa-angle-right righty"></span>
                    </h2>
                    <h3 class="year">
                        <span data-toggle="datepicker" data-method="subtract" data-type="y" class="fa fa-angle-left lefty"></span>
                        <span class="text">2014</span>
                        <span data-toggle="datepicker" data-method="add" data-type="y" class="fa fa-angle-right righty"></span>
                    </h3>
                    <hr>Select Appointment Time<br>
                    <h3 class="hour">
                        <span data-toggle="datepicker" data-method="subtract" data-type="H" class="fa fa-angle-down lefty"></span>
                        <span class="text">12</span>
                        <span data-toggle="datepicker" data-method="add" data-type="H" class="fa fa-angle-up righty"></span>
                    </h3>
                    <h3 class="minute">
                        <span data-toggle="datepicker" data-method="subtract" data-type="m" class="fa fa-angle-down lefty"></span>
                        <span class="text">00</span>
                        <span data-toggle="datepicker" data-method="add" data-type="m" class="fa fa-angle-up righty"></span>
                    </h3>

                        
                    </div>
				</div>
                <div class="date-picker" data-date="2016-04-22" style="text-align:center; padding-left:10%;">
                    <div class="date-container">
                   
                                {!! Form::open(array('action' => 'AppointmentController@store', $id))  !!} 

            {{ Form::hidden('dateinput', 'dateinput', array('id' => 'dateinput')) }}

            {{ Form::hidden('patient_id', Auth::user()->id, array('id' => 'patient_id')) }}

            {{ Form::hidden('doctor_id', $id, array('id' => 'doctor_id')) }}

            {{ Form::hidden('appointmentstatus', 'PENDING', array('id' => 'appointmentstatus')) }}



           
            <div class="form-group">
                {!! Form::textarea('appointmentreason', old('appointmentreason'), 
                array('id' => 'appointmentreason', 
                'class' => 'form-control', 
                'placeholder' => 'Reason For The Appointment')) !!}
                @if ($errors->has('appointmentreason'))
                    <span class="help-block">
                        <strong>{{ $errors->first('appointmentreason') }}</strong>
                    </span>
                @endif
                    
            </div>
                    
            <div class="form-group">
            {!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 
            'Request For Appointments', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right ','type' => 'submit' )) !!}

            </div>
            
         

                    </div>
				</div>
           
        
            
           
          </div>
                
                 
                           
                                           
            
              {!! Form::close() !!}
             

       

         </div>
      </div>
    </div>
  </div>
  @endrole

@endsection

@section('footer_scripts')

@endsection
