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
            <span>Create Category</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">افزودن دسته بندی</h2>
        {!! Form::open(['method'=>'POST', 'action'=>'CategoriesController@store']) !!}
            <div class="form-group has-success has-feedback RTL_direction">
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                    <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction">
                </div>
                <input name="submit" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ثبت">
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop