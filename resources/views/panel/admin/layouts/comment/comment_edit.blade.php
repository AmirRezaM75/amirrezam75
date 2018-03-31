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
            <a href="{{url('/admin/comments/manage')}}">Comment Manager</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Comment</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">

    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش پیام</h2>
        {!! Form::model($comment , ['method'=>'PATCH', 'action'=>['CommentsController@update',$comment->id]]) !!}
            @if($comment->photo)
            <label for="photo"> <img width="150" src="{{asset('upload/profile/'.$comment->photo->path)}}" class="img-responsive" alt="picture profile"></label>
            <input type="file" name="photo" style="display: none;" id="photo">
            @endif
            <div class="form-group has-success has-feedback RTL_direction">
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_name">نام</label>
                    </span>
                    <input name="name" id="form_name" type="text" class="form-control text-right RTL_direction" value="{{$comment->user->name}}" disabled>
                </div>
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_email">ایمیل</label>
                    </span>
                    <input name="email" id="form_email" type="text" class="form-control text-right EnFont" value="{{$comment->user->email}}" disabled>
                </div>
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_username"><a href="{{url('post/'.$comment->post->id)}}">پست</a></label>
                    </span>
                    <input name="subject" id="form_username" type="text" class="form-control RTL_direction text-right" value="{{$comment->post->title}}" disabled>
                </div>
                <div class="input-group margin-top-20">
                    <span class="input-group-addon">
                        <label class="control-label" for="form_username">متن پیام</label>
                    </span>
                    <textarea name="text" id="form_username" type="text" class="form-control text-right RTL_direction common_textarea" required cols="30" rows="10">{{$comment->text}}</textarea>
                </div>
                <input name="update" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop