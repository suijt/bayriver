@extends('layouts.admin.app')

@section('title', 'Settings')

@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.dashboard') }}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item text-active">
                <a href="#" class="text-active">Setting</a>
            </li>
        </ul>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
@endsection

@section('page-specific-styles')
<!-- DROPIFY -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/dropify.css') }}" />
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <div class="card-title">
        <h3 class="card-label">Update Site Content</h3>
    </div>
    </div>
    <div class="card-body" id="settingContainerSection">
        @include('admin.setting.includes.settingTabsSection')
        <div class="container p-0 m-0 w-100 ">
            <div class="d-flex justify-content-center w-100 align-middle my-8">
                <div class="spinner spinner-track spinner-lg spinner-primary mx-auto " id="settingFormsSpinner"></div>
            </div>
            <div id="settingFormsSection" class="mt-3 px-5"></div>
        </div>

    </div>
</div>
@endsection

@section('page-specific-scripts')
<!-- DROPIFY -->
<script src="{{ asset('assets/admin/js/libs/dropify/dropify.min.js') }}"></script>
<!-- SELECT 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('assets/admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // $(function () {
        //     $('[data-toggle="popover"]').popover()
        // })
        setTimeout(function() {
            $('.btnSettingTab').first().click();
        }, 300);
        $('#base_district').select2();
    });

    var selected_group = "";

    $('body').on('click', '.btnSettingTab', function(e) {
        e.preventDefault();
        $('.btnSettingTab').removeClass('active');
        $(this).addClass('active');
        var group = selected_group = $(this).data('group');
        loadSettingFormsSection(group);
        $('#base_district').select2();
        tinymce.remove();
        tinymce.init({
            selector: '.kt_docs_tinymce_basic',
            menubar: false,
            toolbar: ["styleselect fontselect fontsizeselect",
                    "undo redo | cut copy paste | bold italic | link | alignleft aligncenter alignright alignjustify",
                    "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
            plugins : "advlist autolink link lists charmap print preview code"
        });
    });

    function loadSettingFormsSection(group) {
        var url ='{{ route('admin.setting.loadSettingForms', ':group') }}'.replace(':group', group);
        $.ajax({
            type: 'get',
            url: url,
            async: false,
            success: function(response) {
                $('#settingFormsSection').html(response);
                $('.dropify').dropify();
                $('[data-toggle="popover"]').popover();
            },
            error: function(data) {
            }
        });
        $('#settingFormsSpinner').hide();

    }
</script>

@endsection