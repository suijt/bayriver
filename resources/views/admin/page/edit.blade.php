@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.dashboard') }}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.page.index')}}" class="text-muted">Page</a>
            </li>
            <li class="breadcrumb-item text-active">
                <a href="#" class="text-active">Edit</a>
            </li>
        </ul>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
<form action="{{route('admin.page.update',$page->id)}}" method="post" class="custom-validation" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('admin.page.form')
</form>
@endsection
