@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">ویرایش پروفایل</div>
                    <div class="panel-body">
                        <img src="{{$user->photo ? asset('upload/profile/'.Auth::user()->photo->path) : asset('images/user.png')}}" class="img-responsive img-circle center-block" style="margin-bottom: 10px; width: 200px;" alt="" id="photo">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/profile/edit') }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">نام</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">نام کاربری</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control EnFont" name="username" value="{{ $user->username }}">

                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">ایمیل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control EnFont" name="email" value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-primary margin-top-10 margin-right-10" data-toggle="modal" data-target="#myModal">تغییر عکس<i class="fa fa-photo" style="margin-left: 5px"></i></button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-btn fa-pencil"></i> ویرایش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-10 col-lg-push-1">
                                        <img id="image" style="max-width: 100%;" src="{{$user->photo ? asset('upload/profile/'.$user->photo->path) : asset('images/user.png')}}" class="img-responsive center-block" alt="picture profile">
                                        <label for="inputImage"><a class="btn btn-default" style="margin-top: 10px">انتخاب تصویر از کامپیوتر <i class="fa fa-upload"></i></a></label>
                                        <input type="file" class="hidden" id="inputImage">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                <button type="button" class="btn btn-primary" id="update">ذخیره تغییرات</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.1/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        const token = '{{ Session::token() }}';
        const updatePictureProfile = '{{route('updatePictureProfile')}}';
        const userId = '{{Auth::user()->id}}';

        $('#myModal').modal('hide');

        window.onload = function () {
            'use strict';

            var Cropper = window.Cropper;
            var URL = window.URL || window.webkitURL;
            var image = document.getElementById("image");

            var options = {
                aspectRatio: 1 / 1,
            };
            var cropper = new Cropper(image, options);
            cropper.destroy();
            var originalImageURL = image.src;
            var uploadedImageType = 'image/jpeg';
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageURL;


            // Import image
            var inputImage = document.getElementById('inputImage');

            if (URL) {
                inputImage.onchange = function () {
                    var files = this.files;
                    var file;

                    if (cropper && files && files.length) {
                        file = files[0];

                        if (/^image\/\w+/.test(file.type)) {
                            uploadedImageType = file.type;
                            uploadedImageName = file.name;

                            if (uploadedImageURL) {
                                URL.revokeObjectURL(uploadedImageURL);
                            }

                            image.src = uploadedImageURL = URL.createObjectURL(file);
                            cropper.destroy();
                            cropper = new Cropper(image, options);
                            inputImage.value = null;
                        } else {
                            window.alert('Please choose an image file.');
                        }
                    }
                };
            } else {
                inputImage.disabled = true;
                inputImage.parentNode.className += ' disabled';
            }

            $("button#update").on('click',function(event){
                cropper.getCroppedCanvas().toBlob((blob) => {
                    var formData = new FormData();
                    formData.append('croppedImage', blob);
                    formData.append('userId', userId);
                    formData.append('_token', token);
                    event.preventDefault();
                    $.ajax({
                        method: 'POST',
                        url: updatePictureProfile,
                        processData: false,
                        contentType: false,
                        data: formData
                    }).done(function(data){
                        $('#myModal').modal('hide');
                        $("#photo").attr("src", "{{asset('upload/profile')}}" +'/'+ data);
                        $(".dropdown img").attr("src", "{{asset('upload/profile')}}" +'/'+ data);
                        toastr.success('عکس پروفایل شما با موفقیت آپدیت شد');
                        cropper.destroy();
                    });//ajax
                });//getCroppedCanvas
            });//update.click
        };//window.onload

    </script>
@endsection
