<!-- <div class="d-flex align-items-center">
    <a href="{{asset($object->image_path)}}" data-toggle="lightbox" data-gallery="example-gallery">
        <div class="symbol symbol-50 flex-shrink-0">
            <img src="{{asset($object->thumbnail_path)}}" alt="photo">
        </div>
    </a>
</div> -->



<!--begin::Overlay-->
<a class="d-block overlay min-h-55px" data-fslightbox="lightbox-basic" href="{{asset($object->image_path)}}" style="max-width:55px">
    <!--begin::Image-->
    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-55px" style="background-image:url('{{asset($object->thumbnail_path)}}')">
    </div>
    <!--end::Image-->

    <!--begin::Action-->
    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
        <i class="bi bi-eye-fill text-white fs-3x"></i>
    </div>
    <!--end::Action-->
</a>
<!--end::Overlay-->