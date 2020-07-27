@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                @role('doctor')
                         @include('panels.welcome-panel')

                <div class="clearfix"></div>

                @include('flash::message')

                <div class="clearfix"></div>

                @endrole
                @role('patient')
                     @include('panels.welcome-panel')

                <div class="clearfix"></div>

                @include('flash::message')

                <div class="clearfix"></div>

                @endrole






                @role('unverified')
                {{--@include('panels.welcome-panel')--}}

                <div class="panel panel-default">
                    <div class="panel-heading">SELECT ROLE</div>

                    <div class="panel-body">
                        @php

                            $currentUser = Auth::user();
                            $user = App\Models\User::find($currentUser->id);
                            $roles = jeremykenedy\LaravelRoles\Models\Role::where('id', '=' , 2 )->orWhere( 'id', '=' , 3 )->pluck('name', 'id');

                        @endphp


                        {!! Form::model($user, array(
                        'action' => array('UserController@update', $user->id),
                        'method' => 'PUT'))
                        !!}

                        {{ csrf_field() }}


                        <div class="form-group ">
                            <label for="role" class="col-sm-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select name="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" value="{{ old('role') }}" required>
                                    @foreach($roles as $id=>$role)

                                        <option value="{{$id}}">{{$role}}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </br>
                            </br>
                            <div class="col-lg-5"></div>
                            {!! Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> Save Changes',
                             array('class' => 'btn  btn-success col-md-3 btn-save',
                             'type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave',
                             'data-title' => trans('modals.edit_user__modal_text_confirm_title'),
                             'data-message' => trans('modals.edit_user__modal_text_confirm_message'))) !!}

                        </div>


                        {!! Form::close() !!}

                    </div>
                </div>


                @endrole
            </div>
        </div>
        </div>
    </div>




@endsection

@section('footer_scripts')

    @include('modals.modal-save')

    @include('modals.modal-delete')

    @include('scripts.form-modal-script')
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.check-changed')

@endsection