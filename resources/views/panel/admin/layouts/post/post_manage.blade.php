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
                <span>Posts Manager</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="question_manager_table">
                    <thead>
                    <tr>
                        <th class="text-center">عملیات</th>
                        <th class="text-right">تاپیک</th>
                        <th class="text-right">شماره</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="text-center">
                            {!! Form::open(['method'=>'DELETE', 'class'=>'visible-xs-inline visible-sm-inline visible-md-inline visible-lg-inline','action'=>['PostsController@destroy',$post->id]]) !!}
                            <button class="btn btn-danger">حذف</button>
                            {!! Form::close() !!}
                            <button class="btn btn-info"><a href="{{route('admin.posts.edit',$post->id)}}"> ویرایش </a> </button>
                        </td>
                        <td class="text-right RTL_direction">{{$post -> title}}</td>
                        <td class="text-right">{{$post -> id}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- END TABLE-RESPONSIVE -->
        </div>{{-- .COL-LG-12 --}}
    </div>{{-- .ROw --}}
    @if(Session::has('deleted_post'))
        <div class="alert alert-danger">
            {{session('deleted_post')}}
        </div>
    @endif
@stop
