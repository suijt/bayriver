jQuery(document).ready(function () {
    // Banner slider
    $(".slider").slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    // student review under prereq sec
    $(".student-review").slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    // easy tab for courses
    $(".tab-holder").easyResponsiveTabs({
        type: "default", //Types: default, vertical, accordion
        width: "auto", //auto or any custom width
        fit: true, // 100% fits in a container
        tabidentify: "hor_1", // The tab groups identifier
        activetab_bg: "transparent", // background color for active tabs in this group
        inactive_bg: "transparent", // background color for inactive tabs in this group
        active_border_color: "transparent", // border color for active tabs heads in this group
        active_content_border_color: "transparent", // border color for active tabs contect in this group so that it matches the tab head border
        activate: function (event) {
            // Callback function if tab is switched
            $(".partners-carousel__secondary").slick("refresh");
            $(".student-review").slick("refresh");
        },
    });
    /* if ($('.popup-message').length > 0) {
        $(".popup-message").slideDown();


        $('.popup-message__close').on('click', function (e) {
            e.preventDefault();

            $('.popup-message').slideUp(function () {
                $(this).remove()
            });
        });
    }*/
    // Pop message on center
    if ($(".popup-message").length > 0) {
        if (localStorage.getItem("popState1") != "shown") {
            $(".popup-message").delay(1100).fadeIn();
            localStorage.setItem("popState1", "shown");
        }
        function popTime1() {
            localStorage.removeItem("popState1", "");
        }
        setTimeout(popTime1, "1800000000");
        $(document).on("click", ".popup-message__close", function (e) {
            e.preventDefault();
            $(".popup-message").fadeOut("fast", function () {
                $(this).remove();
            });
        });
    }

    // our featured program
    $(".featured-program__sliderholder").slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: false,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    // our our partners
    $(".partners-carousel__primary").slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                },
            },
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 676,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
        ],
    });

    // inner-courses
    $(".partners-carousel__secondary").slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    // Accordian JS - FAQs
    $(".faqs-item > h3").on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).siblings(".answer").slideUp(200);
            $(".faqs-item > h3 i")
                .removeClass("fa-caret-up")
                .addClass("fa-caret-right");
        } else {
            $(".faqs-item > h3 i")
                .removeClass("fa-caret-up")
                .addClass("fa-caret-right");
            $(this)
                .find("i")
                .removeClass("fa-caret-right")
                .addClass("fa-caret-up");
            $(".faqs-item > h3").removeClass("active");
            $(this).addClass("active");
            $(".answer").slideUp(200);
            $(this).siblings(".answer").slideDown(200);
        }
    });

    // pop script
    if ($(".modal-box").length > 0) {
        if (localStorage.getItem("popState") != "shown") {
            $(".modal-box__overlay").delay(800).fadeIn();
            $(".modal-box").delay(1100).fadeIn();
            localStorage.setItem("popState", "shown");
        }
        function popTime() {
            localStorage.removeItem("popState", "");
        }
        setTimeout(popTime, "1800000000");
        $(document).on("click", ".modal-close", function (e) {
            e.preventDefault();
            $(".modal-box").fadeOut("fast", function () {
                $(this).remove();
            });
            $(".modal-box__overlay").fadeOut();
        });
    }
});

/* top hearder search */
$(document).ready(function () {
    var submitIcon = $(".searchbar-icon");
    var inputBox = $(".searchbar-input");
    var searchbar = $(".searchbar");
    var isOpen = false;
    submitIcon.click(function () {
        if (isOpen == false) {
            searchbar.addClass("searchbar-open");
            inputBox.focus();
            isOpen = true;
        } else {
            searchbar.removeClass("searchbar-open");
            inputBox.focusout();
            isOpen = false;
        }
    });
    submitIcon.mouseup(function () {
        return false;
    });
    searchbar.mouseup(function () {
        return false;
    });
    $(document).mouseup(function () {
        if (isOpen == true) {
            $(".searchbar-icon").css("display", "block");
            submitIcon.click();
        }
    });
});
function buttonUp() {
    var inputVal = $(".searchbar-input").val();
    inputVal = $.trim(inputVal).length;
    if (inputVal !== 0) {
        $(".searchbar-icon").css("display", "none");
    } else {
        $(".searchbar-input").val("");
        $(".searchbar-icon").css("display", "block");
    }
}

$(window)
    .scroll(function () {
        var scrollDistance = $(window).scrollTop();

        // Show/hide menu on scroll
        //if (scrollDistance >= 850) {
        //		$('nav').fadeIn("fast");
        //} else {
        //		$('nav').fadeOut("fast");
        //}

        // Assign active class to nav links while scolling
        $(".course-nav__detail-item").each(function (i) {
            if ($(this).position().top <= scrollDistance) {
                $(".course-nav__navigation  a.active").removeClass("active");
                $(".course-nav__navigation a").eq(i).addClass("active");
            }
        });
    })
    .scroll();

/* sticky course nav */

$(window).on("scroll", function () {
    if ($(".course-nav").length) {
        var headerScrollPos = 300;
        var sticky = $(".course-nav");
        if ($(window).scrollTop() > headerScrollPos) {
            sticky.addClass("sticky-fixed");
        } else if ($(this).scrollTop() <= headerScrollPos) {
            sticky.removeClass("sticky-fixed");
        }
    }
});
// admission form for radio select
$(document).ready(function () {
    $('.form-item__radio-student input[type="radio"]').click(function () {
        if ($(this).attr("value") == "Canadian") {
            // $(".canadian-resident__fields").show('fast');
            // $(".international-students__fields").hide('fast');
            $(".canadian-resident__fields").css("display", "block");
            $(".international-students__fields").css("display", "none");
        }
        if ($(this).attr("value") == "international-student") {
            // $(".international-students__fields").show('fast');
            //  $(".canadian-resident__fields").hide('fast');
            $(".international-students__fields").css("display", "block");
            $(".canadian-resident__fields").css("display", "none");
        }
    });

    // $('.form-item__radio-student input[type="radio"]').trigger('click');  // trigger the event
});

/* scroll to section */
$(document).ready(function () {
    // signature
    if ($("#signature").length) {
        var color = "#000000";
        var context = $("canvas")[0].getContext("2d");
        var canvas = $("canvas");
        var lastEvent;
        var mouseDown = false;
        var weight = "3";

        // //Bind weight val to selection on click
        var updateWeight = function () {
            return weight;
        };

        //Draw on the canvas on mouse events
        canvas
            .mousedown(function (e) {
                lastEvent = e;
                mousedown = true;
            })
            .mousemove(function (e) {
                if (mousedown) {
                    context.beginPath();
                    context.moveTo(lastEvent.offsetX, lastEvent.offsetY);
                    context.lineTo(e.offsetX, e.offsetY);
                    context.strokeStyle = color;
                    context.lineWidth = updateWeight();
                    context.stroke();
                    lastEvent = e;
                }
            })
            .mouseup(function () {
                mousedown = false;
            })
            .mouseleave(function () {
                canvas.mouseup();
            });

        //Download your drawing
        var downloadImg = function () {
            var img = canvas[0].toDataURL("image/png");
            var $imgLink = $("#download").attr("href", img);
        };

        var clearSig = function () {
            context.clearRect(0, 0, 500, 100);
        };

        $("#download").click(downloadImg);
        $("#clearSig").click(clearSig);
    }

    $("a[href*=#]").bind("click", function (e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $(target).offset().top,
                },
                600,
                function () {
                    location.hash = target; //attach the hash (#jumptarget) to the pageurl
                }
            );

        return false;
    });
});
