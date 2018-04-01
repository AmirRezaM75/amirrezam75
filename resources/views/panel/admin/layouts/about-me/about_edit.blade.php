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
            <span>Edit About Me</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش مشخصات شما</h2>
        {!! Form::open(['method'=>'POST', 'action'=>'AboutController@update']) !!}
        <div class="form-group has-success has-feedback RTL_direction">
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction" value="{{$about->name}}">
            </div>
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_date">سال تولد</label>
                    </span>
                <input name="birthday" id="form_date" type="text" class="form-control text-right EnFont" value="{{$about->birthday}}">
            </div>
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_job">شغل</label>
                    </span>
                <input name="job" id="form_job" type="text" class="form-control text-right RTL_direction" value="{{$about->job}}">
            </div>
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_email">ایمیل</label>
                    </span>
                <input name="email" id="form_email" type="text" class="form-control text-right RTL_direction EnFont" value="{{$about->email}}">
            </div>
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_address">آدرس</label>
                    </span>
                <input name="address" id="form_address" type="text" class="form-control text-right RTL_direction" value="{{$about->address}}">
            </div>

            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_text">درباره من</label>
                    </span>
                <textarea name="text" id="form_text" type="text" class="form-control common_textarea text-right RTL_direction">{{$about->text}}</textarea>
            </div>

            <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
        </div>
        {!! Form::close() !!}
    </div>
</div>
@if(Session::has('update_message'))
<div class="row margin-top-20">
    <div class="col-lg-12">
        <div class="alert alert-success">
            {{session('update_message')}}
        </div>
    </div>
</div>
@endif
@stop