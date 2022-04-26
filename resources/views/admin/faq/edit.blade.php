@extends('layouts.admin.app')

@section('title', 'Edit FAQ')

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
                <a href="{{ route('admin.faq.index')}}" class="text-muted">FAQ</a>
            </li>
            <li class="breadcrumb-item text-active">
                <a href="#" class="text-active">Create</a>
            </li>
        </ul>
    </div>
    <!--end::Container-->
</div>
<form class="custom-validation" action="{{route('admin.faq.update',$faq->id)}}" method="POST" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @include('admin.faq.form')
</form>

@endsection
