/*global jQuery:false */
jQuery(document).ready(function ($) {
    //scroll to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });

    $("#DOB").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: '1950:1999'
    });

    $.validator.addMethod("regx", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Please enter a valid phone number");

    // validate signup form on keyup and submit
    $("#signupForm").validate({
        submitHandler: function (form) {
            form.submit();
        },
        rules: {
            profile_for: "required",
            name: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: "remote_validate.php",
                    type: "post",
                    data: {
                        reg_email: function () {
                            return $("#Email").val();
                        }
                    }
                }
            },
            phone: {
                required: true,
                regx: /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/,
                remote: {
                    url: "remote_validate.php",
                    type: "post",
                    data: {
                        reg_phone: function () {
                            return $("#Phone").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 6
            },
            dob: "required",
            gender: "required",
            caste: "required",
            address: "required"
        },
        messages: {
            profile_for: "Please select profile for",
            caste: "Please select Caste",
            address: "Please enter Address",
            name: "Please enter your Full Name",
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address.",
                remote: "This Email Address is already taken."
            },
            phone: {
                required: "Please enter your Phone Number.",
                regx: "Please enter a valid Phone Number.",
                remote: "This Phone Number is already taken."
            },
            password: {
                required: "Please provide a Password",
                minlength: "Your Password must be at least 5 characters long"
            },
            dob: "Please enter your Date of Birth",
            gender: "Please select your Gender"
        }
    });

    $('#LoginForm').validate({
        submitHandler: function (form) {
            form.submit();
        },
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                    url: "remote_validate.php",
                    type: "post",
                    data: {
                        log_email: function () {
                            return $("#LogEmail").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                minlength: 6,
                remote: {
                    url: "remote_validate.php",
                    type: "post",
                    data: {
                        log_email: function () {
                            return $("#LogEmail").val();
                        },
                        log_pass: function () {
                            return $("#LogPassword").val();
                        }
                    }
                }
            }
        },
        messages: {
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address.",
                remote: "This Email Address is not exists."
            },
            password: {
                required: "Please provide a Password",
                minlength: "Your Password must be at least 5 characters long",
                remote: "Email/Password incorrect"
            }
        }
    });
    $('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });


});