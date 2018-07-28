@extends('panel.admin.dashboard')

@section('content')
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="dashboard.php">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Users Manager</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <div class="row">
        <div class="col-lg-12">
            @if($users)
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="question_manager_table">
                        <thead>
                        <tr>
                            <th class="text-center">عملیات</th>
                            <th class="text-center">تاریخ آپدیت</th>
                            <th class="text-center">تاریخ ساخت</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">نقش</th>
                            <th class="text-right">ایمیل</th>
                            <th class="text-right">نام</th>
                            <th class="text-right">شماره</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">
                                    <form action="{{url('admin/users/'. $user->id)}}" method="post" style="display:inline-block;">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button class="btn btn-danger"> حذف </button>
                                    </form>
                                    <button class="btn btn-info"><a href="{{route('admin.users.edit',$user->id)}}"> ویرایش </a> </button>
                                </td>
                                <td class="text-center">{{$user->updated_at->diffForHumans()}}</td>
                                <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                                <td class="text-center">{{$user->status == 1 ? 'فعال' : 'غیر فعال'}}</td>
                                <td class="text-center">{{$user->role->name}}</td>
                                <td class="text-right RTL_direction EnFont">{{$user -> email}}</td>
                                <td class="text-right RTL_direction">{{$user -> name}}</td>
                                <td class="text-right">{{$user -> id}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- END TABLE-RESPONSIVE -->
            @endif
        </div>{{-- .COL-LG-12 --}}
    </div>{{-- .ROw --}}
@stop
