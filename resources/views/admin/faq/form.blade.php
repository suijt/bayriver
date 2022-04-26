@csrf
<div class="row" data-sticky-container xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-8 col-xl-9">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col">
                        <label>Question
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" placeholder="Enter Question" name="question" value="@if(isset($faq)){{$faq->question}}@else{{old('question')}}@endif" required />
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label>Answer
                        </label>
                        <textarea type="text" class="form-control kt_docs_tinymce_basic" name="answer">@if(isset($faq)){{$faq->answer}}@else{{old('answer')}}@endif</textarea>
                        @error('answer')></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('page-specific-scripts')
<script src="{{asset('assets/admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: ".kt_docs_tinymce_basic",
        menubar: false,
        toolbar: ["styleselect fontselect fontsizeselect",
            "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
            "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
        plugins : "advlist autolink link image lists charmap print preview code"
    });
</script>

@endsection
