@extends('panel.admin.dashboard')

@section('content')
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/admin')}}">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{url('/admin/users')}}">Users</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit User</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<h2 class="RTL_direction main_fonts">ویرایش کاربر</h2>
<div class="row">
    <div class="col-md-4">
        <img id="photo" src="{{$user->photo ? asset('upload/profile/'.$user->photo->path) : asset('images/user.png')}}" class="img-responsive center-block" alt="picture profile">
    </div>

    <div class="col-md-8 form-group has-success has-feedback RTL_direction">
        <div class="input-group margin-top-20">
            <span class="input-group-addon">
                <label class="control-label" for="name">نام</label>
            </span>
            <input id="name" type="text" class="form-control text-right RTL_direction" value="{{$user->name}}" required disabled>
        </div>
        <div class="input-group margin-top-20">
            <span class="input-group-addon">
                <label class="control-label" for="email">ایمیل</label>
            </span>
            <input id="email" type="text" class="form-control text-right EnFont" value="{{$user->email}}" required disabled>
        </div>
        <div class="input-group margin-top-20">
            <span class="input-group-addon">
                <label class="control-label" for="username">نام کاربری</label>
            </span>
            <input id="username" type="text" class="form-control text-right EnFont" value="{{$user->username}}" required disabled>
        </div>
        {!! Form::model($user , ['method'=>'PATCH', 'action'=>['UsersController@update',$user->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="role">نقش</label>
                    </span>
                    <select name="role_id" id="role" class="col-xs-12">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="status">وضعیت</label>
                    </span>
                    <select name="status" id="status" class="col-xs-12">
                        <option value="0" {{$user->status == 0 ? 'selected' : ''}}>غیرفعال</option>
                        <option value="1" {{$user->status == 1 ? 'selected' : ''}}>فعال</option>
                    </select>
                </div>
            </div>
        </div>{{--ROW--}}
        <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left" value="اعمال تغییرات">
        {!! Form::close() !!}
    </div>
</div>
@stop