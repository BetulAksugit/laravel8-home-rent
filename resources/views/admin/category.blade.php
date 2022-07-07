@extends('layouts.admin')

@section('title','Kategoriler')

@section('content')
    <section class="content contact">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Kategoriler
                        <small class="text-muted">Welcome to Compass</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Compass</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card action_bar">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-3">
                                    <div class="checkbox inlineblock delete_all">
                                        <input id="deleteall" type="checkbox">
                                        <label for="deleteall">
                                            All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-6">
                                    <div class="input-group search">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-addon">
                                        <i class="zmdi zmdi-search"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-5 col-3">
                                    <div class="btn-group hidden-sm-down" role="group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-simple dropdown-toggle btn-round" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="zmdi zmdi-label"></i>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right slideDown">
                                                <li>
                                                    <a href="javascript:void(0);">Family</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Work</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Google</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0);">Create a Label</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round hidden-sm-down">
                                        <i class="zmdi zmdi-plus-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-icon btn-simple btn-icon-mini btn-round hidden-sm-down">
                                        <i class="zmdi zmdi-archive"></i>
                                    </button>
                                    <a href="{{route('admin_category_add')}}" class="btn btn-icon btn-simple btn-icon-mini btn-round btn-danger float-md-right">
+
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Parent</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datalist as $rs)
                                    <tr>
                                        <td>
                                            {{$rs->id}}
                                        </td>
                                        <td>
                                            {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}
                                        </td>
                                        <td>
                                            {{$rs->title}}
                                        </td>
                                        <td>
                                            {{$rs->status}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin_category_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="30"></a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin_category_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            </div>
        </div>
    </section>
@endsection
