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
            <a href="{{url('/admin/members')}}">Members Manager</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Member</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش عضو</h2>
        {!! Form::model($member , ['method'=>'PATCH', 'action'=>['MembersController@update',$member->id],'files'=>true]) !!}
        <div class="form-group has-success has-feedback RTL_direction">
            <input type="file" name="photo">
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction" value="{{$member->name}}">
            </div>
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_role">نقش</label>
                    </span>
                <input name="role" id="form_role" class="form-control text-right RTL_direction" value="{{$member->role}}">
            </div>

            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_text">متن</label>
                    </span>
                <textarea name="text" id="form_text" class="form-control text-right common_textarea RTL_direction">{{$member->text}}</textarea>
            </div>
            <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop