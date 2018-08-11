@extends('panel.admin.dashboard')

@section('head')
    <script src="//cdn.ckeditor.com/4.9.0/full/ckeditor.js"></script>
@stop

@section('content')
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('/admin')}}">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('admin.posts.index')}}">Posts Manager</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit Post</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="RTL_direction main_fonts">ویرایش پست</h2>
        {!! Form::model($post , ['method'=>'PATCH', 'action'=>['PostsController@update',$post->id],'files' => true]) !!}
            <div class="form-group has-success has-feedback RTL_direction">
                <div class="row">
                    <div class="col-lg-12 margin-top-20">
                        @if($post->photo)
                            <img src="{{asset('upload/post/'.$post->photo->path)}}" alt="post photo" class="img-responsive center-block">
                        @endif
                        <input type="file" name="photo_id" class="margin-top-20">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-top-10">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <label class="control-label" for="title">تاپیک</label>
                                </span>
                            <input name="title" type="text" class="form-control text-right RTL_direction" id="title" value="{{$post->title}}">
                        </div>
                    </div>
                    <div class="col-lg-12 margin-top-10">
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <label class="control-label" for="description">توضیح کوتاه</label>
                                </span>
                            <textarea name="description" id="description" class="form-control text-right RTL_direction common_textarea" maxlength="700">{{$post->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 pull-right">
                        <div class="input-group margin-top-20">
                            <span class="input-group-addon">
                                <label class="control-label" for="form_category">دسته بندی</label>
                            </span>
                            <select name="category_id" id="form_category" class="col-xs-12">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$post->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>{{--ROW--}}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group margin-top-20">
                            <span class="input-group-addon">
                                <label class="control-label" for="tagsInput">تگ ها</label>
                            </span>
                            <input type="text" name="tags" id="tagsInput" class="form-control LTR_direction text-left EnFont col-xs-12" style="padding-left: 12px;padding-right: 42.5px;" placeholder="English Words Only">
                        </div>
                    </div>
                </div>
                <div class="row margin-bottom-20 margin-top-20">
                    <div class="col-xs-12 col-sm-6">
                        <div class="tag-result-container margin-bottom-10">

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 tagged-container">
                        @foreach ($post->tags as $tag)
                            {{-- tagged class is used in Ajax--}}
                            <div class="btn btn-danger tagged" data-postid="{{$post->id}}" data-tagid="{{$tag->id}}">
                                {{$tag->name}}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>{{-- FORM-GROUP --}}
            <div class="row margin-top-10">
                <div class="col-lg-12">
                    <textarea name="text">{{$post->text}}</textarea>
                    <script>
                        var options = {
                            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                            customConfig: '{{asset('panel/assets/js/ckeditor-config.js')}}'
                        };
                        CKEDITOR.config.removeDialogTabs = 'image:Link;image:Upload';
                        CKEDITOR.replace( 'text',options);
                    </script>
                </div>
                <div class="col-lg-12">
                    <input name="update" id="text" type="submit" class="btn btn-success margin-top-10 pull-left background-color-main-blue" value="ویرایش">
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('script')
    <script>
        var token = '{{ Session::token() }}';
        var urlTag = '{{route('ajax.tags')}}';
        var urlDeleteTag = '{{route('ajax.tags.delete')}}';
    </script>
@stop
