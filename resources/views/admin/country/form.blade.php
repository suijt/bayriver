<div class="row" data-sticky-container>
    <div class="col-lg-8 col-xl-9">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col">
                        <label>Country Title
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Country Title" name="title" value="@if(isset($country)){{$country->title}}@else{{old('title')}}@endif" required />
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>DLI
                        </label>
                        <input type="text" class="form-control @error('dli_no') is-invalid @enderror" placeholder="Enter DLI No" name="dli_no" value="@if(isset($country)){{$country->dli_no}}@else{{old('dli_no')}}@endif" required />
                        @error('dli_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Caption/Short Description
                        </label>
                        <textarea class="form-control @error('caption') is-invalid @enderror" placeholder="Enter Country caption" name="caption">@if(isset($country)){{$country->caption}}@else{{old('caption')}}@endif</textarea>
                        @error('caption')
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
                        <textarea class="kt_docs_tinymce_hidden form-control @error('description') is-invalid @enderror" name="description">@if(isset($country)){{$country->description}}@else{{old('description')}}@endif</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Primary features
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('learning_outcome') is-invalid @enderror" name="learning_outcome">@if(isset($country)){{$country->learning_outcome}}@else{{old('learning_outcome')}}@endif</textarea>
                        @error('learning_outcome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Secondary features
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('learning_features') is-invalid @enderror" name="learning_features">@if(isset($country)){{$country->learning_features}}@else{{old('learning_features')}}@endif</textarea>
                        @error('learning_features')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Course Description
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('course_dec') is-invalid @enderror" name="course_dec">@if(isset($country)){{$country->course_dec}}@else{{old('course_dec')}}@endif</textarea>
                        @error('course_dec')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Financial
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('financial_desc') is-invalid @enderror" name="financial_desc">@if(isset($country)){{$country->financial_desc}}@else{{old('financial_desc')}}@endif</textarea>
                        @error('financial_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Handbook Description
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('handbook_desc') is-invalid @enderror" name="handbook_desc">@if(isset($country)){{$country->handbook_desc}}@else{{old('handbook_desc')}}@endif</textarea>
                        @error('handbook_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Youtube Video Id
                        </label>
                        <input type="text" class="form-control @error('video_link') is-invalid @enderror" placeholder="youtube video id" name="video_link" value="@if(isset($country)){{$country->video_link}}@else{{old('video_link')}}@endif" />
                        @error('video_link')
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
                                isset($country->status) ?
                            $country->status : '' )=='active' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">Featured</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_featured" type="checkbox" {{ old('is_featured',
                                isset($country->is_featured) ?
                            $country->is_featured : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <label class="col-6 ">Order</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input type="number" min="1" class="form-control @error('order') is-invalid @enderror" placeholder="Order" name="order" value="@if(isset($country)){{$country->order}}@else{{old('order')}}@endif" />
                        </label>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Handbook File</label>
                    @error('handbook_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($country->handbook_file))
                                style="background-image:url({{asset($country->handbook_file_path) }})"
                                @endif></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".pdf" />
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
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Featured Image</label>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($country->image))
                                style="background-image:url({{asset($country->image_path) }})"
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
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($country->banner_image))
                                style="background-image:url({{asset($country->banner_image_path) }})"
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
                <div class="form-group row mt-5">
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Primary Image</label>
                    @error('secondary_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($country->secondary_image))
                                style="background-image:url({{asset($country->secondary_image_path) }})"
                                @endif></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="secondary_image" accept=".png, .jpg, .jpeg" />
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