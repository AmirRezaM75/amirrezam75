@extends('panel.admin.dashboard')

@section('content')
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="dashboard.php">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit User</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش کاربر</h2>
        {!! Form::model($user , ['method'=>'PATCH', 'action'=>['UsersController@update',$user->id], 'files' => true]) !!}
            @if($user->photo)
            <label for="photo"> <img width="150" src="{{asset('upload/profile/'.$user->photo->path)}}" class="img-responsive" alt="picture profile"></label>
            <input type="file" name="photo" style="display: none;" id="photo">
            @endif
            <div class="form-group has-success has-feedback RTL_direction">
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                    <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction" value="{{$user->name}}" required>
                </div>
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_email">ایمیل</label>
                    </span>
                    <input name="email" id="form_email" type="text" class="form-control text-right EnFont" value="{{$user->email}}" required>
                </div>
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_username">نام کاربری</label>
                    </span>
                    <input name="username" id="form_username" type="text" class="form-control text-right EnFont" value="{{$user->username}}" required>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="input-group margin-top-20">
                        <span class="input-group-addon">
                            <label class="control-label" for="form_role">نقش</label>
                        </span>
                            <select name="role_id" id="form_role" class="col-xs-12">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="input-group margin-top-20">
                            <span class="input-group-addon">
                                <label class="control-label" for="form_status">وضعیت</label>
                            </span>
                            <select name="status" id="form_status" class="col-xs-12">
                                <option value="0" {{$user->status == 0 ? 'selected' : ''}}>Deactivate</option>
                                <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Active</option>
                            </select>
                        </div>
                    </div>
                </div>{{--ROW--}}




                {{--<div class="input-group">
                    <span class="input-group-addon">
                        <label class="control-label">رمز عبور</label>
                    </span>
                    <input name="password" type="password" class="form-control text-right RTL_direction" value="" required>
                </div>--}}
                <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop