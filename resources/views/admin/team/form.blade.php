@section('page-specific-style')
@endsection

<div class="row" data-sticky-container>
    <div class="col-lg-8 col-xl-9">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col">
                        <label>Title/Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" name="title" value="@if(isset($team)){{$team->title}}@else{{old('title')}}@endif" required />
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Position/Designation
                        </label>
                        <input type="text" class="form-control @error('caption') is-invalid @enderror" placeholder="Enter Postion/Designation" name="caption" value="@if(isset($team)){{$team->caption}}@else{{old('caption')}}@endif" required />
                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Facebook
                        </label>
                        <input type="text" class="form-control @error('fb') is-invalid @enderror" placeholder="Enter Facebook Handle" name="fb" value="@if(isset($team)){{$team->fb}}@else{{old('fb')}}@endif" required />
                        @error('fb')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Twitter
                        </label>
                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" placeholder="Enter Twitter Handle" name="twitter" value="@if(isset($team)){{$team->twitter}}@else{{old('twitter')}}@endif" required />
                        @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <div class="col">
                        <label>LinkedIn
                        </label>
                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror" placeholder="Enter LinkedIn Handle" name="linkedin" value="@if(isset($team)){{$team->linkedin}}@else{{old('linkedin')}}@endif" required />
                        @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Instagram
                        </label>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" placeholder="Enter Instagram Handle" name="instagram" value="@if(isset($team)){{$team->instagram}}@else{{old('instagram')}}@endif" required />
                        @error('instagram')
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
                                isset($team->status) ?
                            $team->status : '' )=='active' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <label class="col-6 ">Order</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input type="number" min="1" class="form-control @error('order') is-invalid @enderror" placeholder="Order" name="order" value="@if(isset($team)){{$team->order}}@else{{old('order')}}@endif" required />
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
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($team->image))
                                style="background-image:url({{asset($team->image_path) }})"
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
    var options = {
        selector: "#kt_docs_tinymce_basic",
        menubar: false,
        toolbar: ["styleselect fontselect fontsizeselect",
            "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
            "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
        ],
        plugins: "advlist autolink link lists charmap print preview code"
    };

    if (KTApp.isDarkMode()) {
        options["skin"] = "oxide-dark";
        options["content_css"] = "dark";
    }

    tinymce.init(options);
</script>

@endsection