
<div class="panel @role('admin', true) panel-info  @endrole">

    <div class="panel-heading">

        Welcome {{ Auth::user()->name }}

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
            <span class="pull-right label label-warning" style="margin-top:4px">
            Patient Access
            </span>
         @endrole
        
    </div> 
    <hr>
    <div class="panel-body">
    @role('patient', true)
   
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="panel">
          <div class="panel-heading">
            <div class="text-center lead">
            Find a Doctor
            </div>
          </div>
         

            {!! Form::open(array('action' => 'AppointmentController@filter' , 'method' => 'GET')) !!}             

              <div class="form-group has-feedback row ">
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
         
              </div>

       

              {!! Form::button('<i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;' 
              . 'Search', 
              array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right',
                    'type' => 'submit', )) !!}

            {!! Form::close() !!}
            
           
          </div>

           


        </div>
      </div>
   
  
        
     @endrole
     </div>

    </div>
</div>
