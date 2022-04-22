<div class="row" data-sticky-container>
    <div class="col-lg-8 col-xl-9">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Name</label>
                        <input type="text" class="form-control @error('page_name') is-invalid @enderror"
                               placeholder="Enter name" name="name"
                               value="@if(isset($page)){{$page->name}}@else{{old('name')}}@endif"
                               required />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Short Description
                        </label>
                        <input type="text" class=" form-control @error('short_description') is-invalid @enderror" name="short_description" value="@if(isset($page)){{$page->short_description}}@else{{old('short_description')}}@endif">
                        @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Description
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('description') is-invalid @enderror" name="description">@if(isset($page)){{$page->description}}@else{{old('description')}}@endif</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                               placeholder="Enter meta_title" name="meta_title"
                               value="@if(isset($page)){{$page->meta_title}}@else{{old('meta_title')}}@endif"
                               required />
                        @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Meta Description
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('meta_description') is-invalid @enderror" name="meta_description">@if(isset($page)){{$page->meta_description}}@else{{old('meta_description')}}@endif</textarea>
                        @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                </div>
            </div>
        </div>
    <div class="col-lg-4 col-xl-3">
        <div class="card card-custom sticky" data-sticky="true" data-margin-top="140" data-sticky-for="1023" data-sticky-class="stickyjs">
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-6 ">Status</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="status" type="checkbox" checked {{ old('status',
                                isset($page->status) ?
                            $page->status : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-6 ">Quick Links</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="quick_links" type="checkbox" checked {{ old('quick_links',
                                isset($page->quick_links) ?
                            $page->quick_links : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Image</label>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($page->image))
                                style="background-image:url({{asset($page->image_path) }})"
                                @endif></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Banner Image</label>
                    @error('banner_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($page->banner_image))
                                style="background-image:url({{asset($page->banner_image_path) }})"
                                @endif></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="banner_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('page-specific-scripts')
<script src="{{asset('assets/admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script>
    tinymce.init({
        selector: ".kt_docs_tinymce_hidden",
        menubar: false,
        toolbar: ["styleselect fontselect fontsizeselect",
            "undo redo | cut copy paste | bold italic | link | alignleft aligncenter alignright alignjustify",
            "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
        ],
        plugins: "advlist autolink link lists charmap print preview code"
    });
</script>

@endsection
