<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
                <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
            </g>
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<!--begin::Javascript-->

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<script src="{{ asset('assets/admin/js/libs/bootbox/bootbox.min.js') }}"></script>

<!-- csrf setup for ajax -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{!! Toastr::render() !!}
<!--begin::Page Custom Javascript(used by this page)-->
@yield('page-specific-scripts')
<!--end::Page Custom Javascript-->

<!-- js for clock -->
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>
<!-- end js for clock -->

<script>
    $(document).on("click", ".item-delete", function() {

        var $button = $(this);
        var url_id = $button.attr("id");

        $row = $(this).closest("tr");
        bootbox.confirm("Are you sure you want to delete this item?", function(response) {
            // alert(url_id);
            if (response)
                $.ajax({
                    "type": "GET",
                    "url": $button.data("url"),
                    "data": {
                        _method: "delete"

                    },
                    "success": function(data) {
                        $row.addClass("danger").fadeOut();
                    },
                    "error": function(err) {
                        bootbox.alert("Delete failed!");
                    }
                });

        });
    });
</script>