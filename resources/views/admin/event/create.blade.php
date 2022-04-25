@extends('layouts.admin.app')

@section('title', 'Add Events')

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
				<a href="{{ route('admin.event.index')}}" class="text-muted">Events</a>
			</li>
			<li class="breadcrumb-item text-active">
				<a href="#" class="text-active">Create</a>
			</li>
		</ul>
	</div>
	<!--end::Container-->
</div>
<form action="{{route('admin.event.store')}}" class="custom-validation" method="post" enctype="multipart/form-data">
	@csrf
	@include('admin.event.form')
</form>
@endsection