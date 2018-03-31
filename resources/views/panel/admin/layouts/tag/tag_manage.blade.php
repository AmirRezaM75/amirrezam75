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
                <span>Tag Manager</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <div class="row">
        <div class="col-lg-12">
            @if($tags)
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="question_manager_table">
                        <thead>
                        <tr>
                            <th class="text-center">عملیات</th>
                            <th class="text-center">تاریخ آپدیت</th>
                            <th class="text-center">تاریخ ساخت</th>
                            <th class="text-right">نام</th>
                            <th class="text-right">شماره</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td class="text-center">
                                    {!! Form::open(['method'=>'DELETE', 'class'=>'visible-xs-inline visible-sm-inline visible-md-inline visible-lg-inline','action'=>['TagsController@destroy',$tag->id]]) !!}
                                    <button class="btn btn-danger">حذف</button>
                                    {!! Form::close() !!}
                                    <button class="btn btn-info"><a href="{{route('admin.tags.edit',$tag->id)}}"> ویرایش </a> </button>
                                </td>
                                <td class="text-center">{{$tag->updated_at->diffForHumans()}}</td>
                                <td class="text-center">{{$tag->created_at->diffForHumans()}}</td>
                                <td class="text-right RTL_direction">{{$tag->name}}</td>
                                <td class="text-right">{{$tag->id}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- END TABLE-RESPONSIVE -->
            @endif
        </div>{{-- .COL-LG-12 --}}
    </div>{{-- .ROw --}}
    @if(Session::has('deleted_tag'))
    <div class="alert alert-danger">
        {{session('deleted_tag')}}
    </div>
    @endif
@stop
