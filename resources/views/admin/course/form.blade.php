<div class="row" data-sticky-container>
    <div class="col-lg-8 col-xl-9">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col">
                        <label>Category
                            <span class="text-danger">*</span>
                        </label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if(isset($course) && $course->category_id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Course Title
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Course Title" name="title" value="@if(isset($course)){{$course->title}}@else{{old('title')}}@endif" required />
                        @error('title')
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
                        <textarea class="form-control @error('caption') is-invalid @enderror" placeholder="Enter Course caption" name="caption">@if(isset($course)){{$course->caption}}@else{{old('caption')}}@endif</textarea>
                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Overview
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('description') is-invalid @enderror" name="description">@if(isset($course)){{$course->description}}@else{{old('description')}}@endif</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Practicum Duration
                        </label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" placeholder="Enter Course Duration" name="duration" value="@if(isset($course)){{$course->duration}}@else{{old('duration')}}@endif" />
                        @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Study Option
                        </label>
                        <select name="study_option" id="" class="form-control">
                            <option value="Online" @if(isset($course) && $course->study_option == 'online') selected @endif>Online/In Person</option>
                            <option value="Online/In Person" @if(isset($course) && $course->study_option == 'online') selected @endif>Online/In Person</option>
                            <option value="In Class" @if(isset($course) && $course->study_option == 'in_class') selected @endif>In Class</option>
                            <option value="Hybrid" @if(isset($course) && $course->study_option == 'hybrid') selected @endif>Hybrid</option>
                        </select>
                        @error('study_option')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Work Placement
                        </label>
                        <input type="text" class="form-control @error('work_placement') is-invalid @enderror" placeholder="Enter work placement" name="work_placement" value="@if(isset($course)){{$course->work_placement}}@else{{old('work_placement')}}@endif" />
                        @error('work_placement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Credential
                        </label>
                        <input type="text" class="form-control @error('credential') is-invalid @enderror" placeholder="Enter credential" name="credential" value="@if(isset($course)){{$course->credential}}@else{{old('credential')}}@endif" />
                        @error('credential')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Industrial Demand
                        </label>
                        <input type="text" class="form-control @error('industrial_demand') is-invalid @enderror" placeholder="Enter industrial demand" name="industrial_demand" value="@if(isset($course)){{$course->industrial_demand}}@else{{old('industrial_demand')}}@endif" />
                        @error('industrial_demand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Expected Salary
                        </label>
                        <input type="text" class="form-control @error('expected_salary') is-invalid @enderror" placeholder="Enter expected salary" name="expected_salary" value="@if(isset($course)){{$course->expected_salary}}@else{{old('expected_salary')}}@endif" />
                        @error('expected_salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Professional Level
                        </label>
                        <input type="text" class="form-control @error('professional_level') is-invalid @enderror" placeholder="Enter professional level" name="professional_level" value="@if(isset($course)){{$course->professional_level}}@else{{old('professional_level')}}@endif" />
                        @error('professional_level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Program Type
                        </label>
                        <input type="text" class="form-control @error('program_type') is-invalid @enderror" placeholder="Enter program type" name="program_type" value="@if(isset($course)){{$course->program_type}}@else{{old('program_type')}}@endif" />
                        @error('program_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Learing Outcome
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('learning_outcome') is-invalid @enderror" name="learning_outcome">@if(isset($course)){{$course->learning_outcome}}@else{{old('learning_outcome')}}@endif</textarea>
                        @error('learning_outcome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Who Can Apply
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('learning_features') is-invalid @enderror" name="learning_features">@if(isset($course)){{$course->learning_features}}@else{{old('learning_features')}}@endif</textarea>
                        @error('learning_features')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Prerequisite
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('prerequisite_desc') is-invalid @enderror" name="prerequisite_desc">@if(isset($course)){{$course->prerequisite_desc}}@else{{old('prerequisite_desc')}}@endif</textarea>
                        @error('prerequisite_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Prerequisite features
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('prerequisite_subdesc') is-invalid @enderror" name="prerequisite_subdesc">@if(isset($course)){{$course->prerequisite_subdesc}}@else{{old('prerequisite_subdesc')}}@endif</textarea>
                        @error('prerequisite_subdesc')
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
                        <textarea class="kt_docs_tinymce_hidden form-control @error('financial_desc') is-invalid @enderror" name="financial_desc">@if(isset($course)){{$course->financial_desc}}@else{{old('financial_desc')}}@endif</textarea>
                        @error('financial_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Industrial
                        </label>
                        <textarea class="kt_docs_tinymce_hidden form-control @error('industrial_desc') is-invalid @enderror" name="industrial_desc">@if(isset($course)){{$course->industrial_desc}}@else{{old('industrial_desc')}}@endif</textarea>
                        @error('industrial_desc')
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
                        <input type="text" class="form-control @error('video_link') is-invalid @enderror" placeholder="youtube video id" name="video_link" value="@if(isset($course)){{$course->video_link}}@else{{old('video_link')}}@endif" />
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
                                isset($course->status) ?
                            $course->status : '' )=='active' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">Featured</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_featured" type="checkbox" {{ old('is_featured',
                                isset($course->is_featured) ?
                            $course->is_featured : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">Program Menu</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_program" type="checkbox" {{ old('is_program',
                                isset($course->is_program) ?
                            $course->is_program : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">Affiliated Menu</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_affiliated" type="checkbox" {{ old('is_affiliated',
                                isset($course->is_affiliated) ?
                            $course->is_affiliated : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">Continious Menu</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_continious" type="checkbox" {{ old('is_continious',
                                isset($course->is_continious) ?
                            $course->is_continious : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-6 ">International</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_international" type="checkbox" {{ old('is_international',
                                isset($course->is_international) ?
                            $course->is_international : '' )=='yes' ? 'checked' :'' }} />
                        </label>
                    </div>
                </div>
                <div class="form-group row  mt-5">
                    <label class="col-12 ">Country</label>
                    <div class="col-12">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <select name="country_id" id="" class="form-control">
                                <option value="">Select Country</option>
                                @foreach ($countries as $contry)
                                <option value="{{$contry->id}}" @if(isset($course) && $course->country_id == $contry->id) selected @endif>{{$contry->title}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <label class="col-6 ">Order</label>
                    <div class="col-6">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input type="number" min="1" class="form-control @error('order') is-invalid @enderror" placeholder="Order" name="order" value="@if(isset($course)){{$course->order}}@else{{old('order')}}@endif" />
                        </label>
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
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($course->image))
                                style="background-image:url({{asset($course->image_path) }})"
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
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($course->banner_image))
                                style="background-image:url({{asset($course->banner_image_path) }})"
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
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($course->secondary_image))
                                style="background-image:url({{asset($course->secondary_image_path) }})"
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
                <div class="form-group row mt-5">
                    <label class="col-xl-12 col-lg-12 col-form-label text-left">Secondary Image</label>
                    @error('icon_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-lg-12 col-xl-12">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{asset('assets/admin/media/svg/avatars/007-boy-2.svg')}})">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" @if(isset($course->icon_image))
                                style="background-image:url({{asset($course->icon_image_path) }})"
                                @endif></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="icon_image" accept=".png, .jpg, .jpeg" />
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