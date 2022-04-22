@extends('layouts.admin.app')

@section('title')
Dashboard
@endsection
@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <a href="#" class="text-muted">Dashboard</a>
            </li>
        </ul>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>

@endsection
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-graph :data="$chart_data" />
                <x-table :columns="['Date', 'Visitors']">
                    @forelse ($visitors as $day)
                    <x-table-row :row="[date('d.m.Y', strtotime($day->date)), $day->total]" />
                    @empty
                    <x-table-row :row="['-', 'No data available']" />
                    @endforelse
                </x-table>
            </div>
        </div>
    </div>
</div>
<!--end::Search-->
@endsection
@section('page-specific-scripts')
@endsection