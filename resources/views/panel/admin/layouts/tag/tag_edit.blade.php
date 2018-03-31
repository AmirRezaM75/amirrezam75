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
            <a href="{{url('/admin/categories')}}">Tag Manager</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Tag</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش تگ ها</h2>
        {!! Form::model($tag , ['method'=>'PATCH', 'action'=>['TagsController@update',$tag->id]]) !!}
        <div class="form-group has-success has-feedback RTL_direction">
            <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction" value="{{$tag->name}}">
            </div>
            <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop