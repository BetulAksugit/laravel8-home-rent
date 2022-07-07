@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'User Profile '.$setting->title)
@include('home._header')
@section('content')
    <section id="subintro">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <ul class="breadcrumb">
                        <li><a href="{{route('home')}}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="{{route('userprofile')}}">User Profile</a><i class="icon-angle-right"></i></li>
                        <li class="active">{{Auth::user()->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="maincontent">
        <div class="container">
            <div class="row">
                <div class="span14">


                    <div class="clearfix">
                    </div>
                    <div class="row">
                        <div class="span10">

                            <div class="card">
                                <div class="card-header">
                                    <h2>Kiralık Evler Listesi</h2>
                                    <h5>Kiralık Evler Listesi</h5>
                                    <a href="{{route('user_house_create')}}" class="btn btn-danger square-btn-adjust" style="padding: 15px 50px 5px 50px; float: right;">Kiralık Ev Ekle</a>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <th><b>Id</b></th>
                                            <th><b>Category</b></th>
                                            <th><b>Title(s)</b></th>
                                            <th><b>Image</b></th>
                                            <th><b>Image Gallery</b></th>
                                            <th><b>Oda Sayısı</b></th>
                                            <th><b>Metre Kare</b></th>
                                            <th><b>Fiyat</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>Edit</b></th>
                                            <th><b>Delete</b></th>

                                            </thead>


                                            <tbody>
                                            @foreach($datalist as $rs)
                                                <tr>
                                                    <td>
                                                        {{$rs->id}}
                                                    </td>
                                                    <td>
                                                        {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}
                                                    </td>
                                                    <td>
                                                        {{$rs->title}}
                                                    </td>
                                                    <td>
                                                        @if($rs->image)
                                                            <img src="{{Storage::url($rs->image)}}" height="60" width="120" alt=""/>
                                                        @endif

                                                    </td>
                                                    <td><a href="{{route('user_image_add',['house_id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/images')}}/gallery.png" height="30"></a></td>
                                                    <td>
                                                        {{$rs->odasayisi}}
                                                    </td>
                                                    <td>
                                                        {{$rs->metrekare}}
                                                    </td>
                                                    <td>
                                                        {{$rs->price}} ₺
                                                    </td>
                                                    <td>
                                                        {{$rs->status}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('user_house_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="30"></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('user_house_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="span4">
                            <aside>
                                <div class="widget">
                                    <div class="project-widget">
                                        <h4 class="rheading">Profil Detayları: {{Auth::user()->name}}<span></span></h4>
                                        <ul class="project-detail">
                                            <li><a href="{{route('userprofile')}}">Profilim</a></li>
                                            <li><a href="{{route('user_houses')}}">İlanlarım</a></li>
                                            <li><a href="{{route('logout')}}">Logout</a></li>
                                            @php
                                                $userRoles=Auth::User()->roles->pluck('name');
                                            @endphp
                                            @if($userRoles->contains('admin'))
                                                <li><a href="{{route('admin_home')}}" target="_blank">ADMIN PANEL</a></li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

