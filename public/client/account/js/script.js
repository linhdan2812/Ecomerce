(function() {
    var $;
    $ = this.jQuery || window.jQuery;
    win = $(window), body = $('body'), doc = $(document);

    $.fn.hc_accordion = function() {
        var acd = $(this);
        acd.find('ul>li').each(function(index, el) {
            if ($(el).find('ul li').length > 0) $(el).prepend('<button type="button" class="acd-drop"></button>');
        });
        acd.on('click', '.acd-drop', function(e) {
            e.preventDefault();
            var ul = $(this).nextAll("ul");
            if (ul.is(":hidden") === true) {
                ul.parent('li').parent('ul').children('li').children('ul').slideUp(180);
                ul.parent('li').parent('ul').children('li').children('.acd-drop').removeClass("active");
                $(this).addClass("active");
                ul.slideDown(180);
            } else {
                $(this).removeClass("active");
                ul.slideUp(180);
            }
        });
    }

    $.fn.hc_menu = function (options) {
        var settings = $.extend({
            open: '.open-mnav',
        }, options),
            this_ = $(this);
        var m_nav = $('<div class="m-nav"><button class="m-nav-close"><i class="fal fa-times"></i></button><div class="nav-ct"></div></div>');
        var m_nav_over = $('<div class="m-nav-over"></div>');
        body.append(m_nav);
        body.append(m_nav_over);

        m_nav.find('.m-nav-close').click(function (e) {
            e.preventDefault();
            mnav_close();
        });
        m_nav.find('.nav-ct').append($('.logo').clone());
        m_nav.find('.nav-ct').append(this_.children().clone());

        var mnav_open = function () {
            m_nav.addClass('active');
            m_nav_over.addClass('active');
            body.css('overflow', 'hidden');
        }
        var mnav_close = function () {
            m_nav.removeClass('active');
            m_nav_over.removeClass('active');
            body.css('overflow', '');
        }

        doc.on('click', settings.open, function (e) {
            e.preventDefault();
            if (win.width() <= 1199) mnav_open();
        }).on('click', '.m-nav-over', function (e) {
            e.preventDefault();
            mnav_close();
        });

        m_nav.hc_accordion();
    }

    $.fn.hc_countdown = function(options) {
        var settings = $.extend({
                date: new Date().getTime() + 1000 * 60 * 60 * 24,
            }, options),
            this_ = $(this);

        var countDownDate = new Date(settings.date).getTime();

        var count = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            this_.html('<div class="item"><span>' + days + '</span> ngày</div>' +
                '<div class="item"><span>' + hours + '</span> giờ</div>' +
                '<div class="item"><span>' + minutes + '</span> phút </div>' +
                '<div class="item"><span>' + seconds + '</span> giây </div>'
            );
            if (distance < 0) {
                clearInterval(count);
            }
        }, 1000);
    }

    $.fn.hc_upload = function(options) {
        var settings = $.extend({
                multiple: false,
                result: '.hc-upload-pane',
            }, options),
            this_ = $(this);

        var input_name = this_.attr('name');
        this_.removeAttr('name');

        this_.change(function(e) {
            if ($(settings.result).length > 0) {
                var files = event.target.files;
                if (settings.multiple) {
                    for (var i = 0, files_len = files.length; i < files_len; i++) {
                        var path = URL.createObjectURL(files[i]);
                        var name = files[i].name;
                        var size = Math.round(files[i].size / 1024 / 1024 * 100) / 100;
                        var type = files[i].type.slice(files[i].type.indexOf('/') + 1);

                        var img = $('<img src="' + path + '">');
                        var input = $('<input type="hidden" name="' + input_name + '[]"' +
                            '" value="' + path +
                            '" data-name="' + name +
                            '" data-size="' + size +
                            '" data-type="' + type +
                            '" data-path="' + path +
                            '">');
                        var elm = $('<div class="hc-upload"><button type="button" class="hc-del smooth">&times;</button></div>').append(img).append(input);
                        $(settings.result).append(elm);
                    }
                } else {
                    var path = URL.createObjectURL(files[0]);
                    var img = $('<img src="' + path + '">');
                    var elm = $('<div class="hc-upload"><button type="button" class="hc-del smooth">&times;</button></div>').append(img);
                    $(settings.result).html(elm);
                }
            }
        });

        body.on('click', '.hc-upload .hc-del', function(e) {
            e.preventDefault();
            this_.val('');
            $(this).closest('.hc-upload').remove();
        });
    }

}).call(this);


jQuery(function($) {
    var win = $(window),
        body = $('body'),
        doc = $(document);

    var FU = {
        get_Ytid: function(url) {
            var rx = /^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/;
            if (url) var arr = url.match(rx);
            if (arr) return arr[1];
        },
        get_currency: function(str) {
            if (str) return str.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        animate: function(elems) {
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function() {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        },
    };

    var UI = {
        mMenu: function() {

        },
        header: function() {
            var elm = $('header'),
                h = elm.innerHeight(),
                offset = 200,
                mOffset = 0;
            var fixed = function() {
                elm.addClass('fixed');
                body.css('margin-top', h);
            }
            var unfixed = function() {
                elm.removeClass('fixed');
                body.css('margin-top', '');
            }
            var Mfixed = function() {
                elm.addClass('m-fixed');
                body.css('margin-top', h);
            }
            var unMfixed = function() {
                elm.removeClass('m-fixed');
                body.css('margin-top', '');
            }
            if (win.width() > 991) {
                win.scrollTop() > offset ? fixed() : unfixed();
            } else {
                win.scrollTop() > mOffset ? Mfixed() : unMfixed();
            }
            win.scroll(function(e) {
                if (win.width() > 991) {
                    win.scrollTop() > offset ? fixed() : unfixed();
                } else {
                    win.scrollTop() > mOffset ? Mfixed() : unMfixed();
                }
            });
        },
        backTop: function() {
            var back_top = $('.back-to-top'),
                offset = 800;

            back_top.click(function() {
                $("html, body").animate({ scrollTop: 0 }, 800);
                return false;
            });

            if (win.scrollTop() > offset) {
                back_top.fadeIn(200);
            }

            win.scroll(function() {
                if (win.scrollTop() > offset) back_top.fadeIn(200);
                else back_top.fadeOut(200);
            });
        },
        slider: function() {
            /*$('.slider-cas').slick({
            	nextArrow: '<img src="images/next.png" class="next" alt="Next">',
            	prevArrow: '<img src="images/prev.png" class="prev" alt="Prev">',
            })
            FU.animate($(".slider-cas .slick-current [data-animation ^= 'animated']"));
            $('.slider-cas').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            	if(currentSlide!=nextSlide){
            		var aniElm = $(this).find('.slick-slide').find("[data-animation ^= 'animated']");
            		FU.animate(aniElm);
            	}
            });*/
            if($('.cas-home').length) {
                $('.cas-home').slick({
                    autoplay: true,
                    speed: 1500,
                    autoplaySpeed: 5000,
                    pauseOnHover: false,
                    swipeToSlide: true,
                    fade: true,
                    // nextArrow: '<i class="fa fa-angle-right smooth next"></i>',
                    // prevArrow: '<i class="fa fa-angle-left smooth prev"></i>',
                    arrows: false,
                    dots: true,
                })
                FU.animate($(".cas-home .slick-current [data-animation ^= 'animated']"));
                $('.cas-home').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                    if(currentSlide!=nextSlide){
                        var aniElm = $(this).find('.slick-slide[data-slick-index="'+nextSlide+'"]').find("[data-animation ^= 'animated']");
                        FU.animate(aniElm);
                    }
                });
            }
            if($('.cas-banner-research').length) {
                $('.cas-banner-research').slick({
                    autoplay: true,
                    speed: 1500,
                    autoplaySpeed: 5000,
                    pauseOnHover: false,
                    swipeToSlide: true,
                    fade: true,
                    nextArrow: '<i class="far fa-long-arrow-alt-right smooth next"></i>',
                    prevArrow: '<i class="far fa-long-arrow-alt-left smooth prev"></i>',
                    arrows: true,
                    dots: false,
                })
            }
            if($('.cas-news-home').length) {
                $('.cas-news-home').slick({
    	            slidesToShow: 3,
    	            slidesToScroll: 3,
    	            nextArrow: '<i class="cas-arrow smooth next"></i>',
    	            prevArrow: '<i class="cas-arrow smooth prev"></i>',
    	            dots: true,
    	            autoplay: true,
    	            swipeToSlide: true,
    	            autoplaySpeed: 4000,
                    infinite: false,
    	            responsive: [
    	            {
    	                breakpoint: 1199,
    	                settings: {
    	                    slidesToShow: 3,
    	                }
    	            },
    	            {
    	                breakpoint: 991,
    	                settings: {
    	                    slidesToShow: 2,
    	                }
    	            },
    	            {
    	                breakpoint: 700,
    	                settings: {
    	                    slidesToShow: 2,
    	                }
    	            },
    	            {
    	                breakpoint: 480,
    	                settings: {
    	                    slidesToShow: 1,
    	                }
    	            }
    	            ],
    	        })
            }
            if($('.cas-press').length) {
                $('.cas-press').slick({
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    nextArrow: '<i class="cas-arrow smooth next"></i>',
                    prevArrow: '<i class="cas-arrow smooth prev"></i>',
                    dots: true,
                    autoplay: true,
                    swipeToSlide: true,
                    autoplaySpeed: 4000,
                    infinite: false,
                    responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                    ],
                })
            }
            if($('.cas-feedback-big').length) {
                $('.cas-feedback-big').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.cas-feedback-sm',
                    responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            fade: false,
                        }
                    },
                    ],
                });
            }
            if($('.cas-feedback-sm').length) {
                $('.cas-feedback-sm').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    asNavFor: '.cas-feedback-big',
                    dots: false,
                    nextArrow: '<i class="cas-arrow next fas fa-chevron-right"></i>',
                    prevArrow: '<i class="cas-arrow prev fas fa-chevron-left"></i>',
                    centerMode: false,
                    focusOnSelect: true
                });
            }
            if($('.cas-about-big').length) {
                $('.cas-about-big').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.cas-about-sm',
                    responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            fade: false,
                        }
                    },
                    ],
                });
            }
            if($('.cas-about-sm').length) {
                $('.cas-about-sm').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    asNavFor: '.cas-about-big',
                    dots: false,
                    nextArrow: '<i class="cas-arrow next fas fa-chevron-right"></i>',
                    prevArrow: '<i class="cas-arrow prev fas fa-chevron-left"></i>',
                    centerMode: false,
                    focusOnSelect: true
                });
            }


            if ($(window).width()>768) {
                var slidesToShow = 9; 
            }else{
                var slidesToShow = 7; 
            }
            var $slides_img = $('.cas-teacher-img .slide');
            if($('.cas-teacher-top').length) {
                if ($slides_img.length > 0 && $slides_img.length <= slidesToShow) {
                    $('.cas-teacher-top').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: true,
                        infinite: true,
                        nextArrow: '<i class="cas-arrow next fal fa-chevron-right"></i>',
                        prevArrow: '<i class="cas-arrow prev fal fa-chevron-left"></i>',
                        asNavFor: '.cas-teacher-img',
                        adaptiveHeight: true,
                        draggable: false,
                    });
                }else{
                    $('.cas-teacher-top').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        fade: true,
                        infinite: true,
                        nextArrow: '<i class="cas-arrow next fal fa-chevron-right"></i>',
                        prevArrow: '<i class="cas-arrow prev fal fa-chevron-left"></i>',
                        asNavFor: '.cas-teacher-img',
                        adaptiveHeight: true,
                    });
                }
                FU.animate($(".cas-teacher-top .slick-current [data-animation ^= 'animated']"));
                $('.cas-teacher-top').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                    if(currentSlide!=nextSlide){
                        var aniElm = $(this).find('.slick-slide[data-slick-index="'+nextSlide+'"]').find("[data-animation ^= 'animated']");
                        FU.animate(aniElm);
                    }
                });
            }
            // Clone the slides.
            
            if($('.cas-teacher-img').length) {
                if ($slides_img.length > 0 && $slides_img.length <= slidesToShow) {
                    $('.cas-teacher-img').slick({
                        slidesToShow: 9,
                        slidesToScroll: 1,
                        arrows: false,
                        asNavFor: '.cas-teacher-top',
                        centerMode: false,
                        fade: false,
                        focusOnSelect: true,
                        dots: false,
                        infinite: true,
                        responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 7,
                                centerMode: false,
                            }
                        },
                        ],
                    });
                }else{
                    $('.cas-teacher-img').slick({
                        slidesToShow: 9,
                        slidesToScroll: 1,
                        arrows: false,
                        asNavFor: '.cas-teacher-top',
                        centerMode: true,
                        fade: false,
                        focusOnSelect: true,
                        dots: false,
                        infinite: true,
                        responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 7,
                                centerMode: true,
                            }
                        },
                        ],
                    });
                }
            
            }
            if($('.cas-best-seller').length) {
                $('.cas-best-seller').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    nextArrow: '<i class="cas-arrow next fas fa-chevron-right"></i>',
                    prevArrow: '<i class="cas-arrow prev fas fa-chevron-left"></i>',
                    appendArrows: '.cas-nav',
                    centerMode: false,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ],
                });

                if(win.width() > 991) {
                    var containerW = $('.container').width();
                    $('.cas-best-seller').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');
                    $('.cas-best-seller').css('padding-right', 'calc((100vw - '+ containerW +'px)/2)');
    
                    win.resize(function(e) {
                        var containerW = $('.container').width();
                        $('.cas-best-seller').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');
                        $('.cas-best-seller').css('padding-right', 'calc((100vw - '+ containerW +'px)/2)');
                    });
                }
            }
            if($('.cas-related-book').length) {
                $('.cas-related-book').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    dots: false,
                    nextArrow: '<i class="cas-arrow next fas fa-chevron-right"></i>',
                    prevArrow: '<i class="cas-arrow prev fas fa-chevron-left"></i>',
                    appendArrows: '.top-related-book',
                    centerMode: false,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 1,
                            }
                        },
                    ],
                });
            }
        },
        input_number: function() {
            doc.on('keydown', '.numberic', function(event) {
                if (!(!event.shiftKey &&
                        !(event.keyCode < 48 || event.keyCode > 57) ||
                        !(event.keyCode < 96 || event.keyCode > 105) ||
                        event.keyCode == 46 ||
                        event.keyCode == 8 ||
                        event.keyCode == 190 ||
                        event.keyCode == 9 ||
                        event.keyCode == 116 ||
                        (event.keyCode >= 35 && event.keyCode <= 39)
                    )) {
                    event.preventDefault();
                }
            });
            doc.on('click', '.i-number .up', function(e) {
                e.preventDefault();
                var input = $(this).parents('.i-number').children('input');
                var max = Number(input.attr('max')),
                    val = Number(input.val());
                if (!isNaN(val)) {
                    if (!isNaN(max) && input.attr('max').trim() != '') {
                        if (val >= max) {
                            return false;
                        }
                    }
                    input.val(val + 1);
                    input.trigger('change');
                }
            });
            doc.on('click', '.i-number .down', function(e) {
                e.preventDefault();
                var input = $(this).parents('.i-number').children('input');
                var min = Number(input.attr('min')),
                    val = Number(input.val());
                if (!isNaN(val)) {
                    if (!isNaN(min) && input.attr('max').trim() != '') {
                        if (val <= min) {
                            return false;
                        }
                    }
                    input.val(val - 1);
                    input.trigger('change');
                }
            });
        },
        yt_play: function() {
            doc.on('click', '.yt-box .play', function(e) {
                var id = FU.get_Ytid($(this).closest('.yt-box').attr('data-url'));
                $(this).closest('.yt-box iframe').remove();
                $(this).closest('.yt-box').append('<iframe src="https://www.youtube.com/embed/' + id + '?rel=0&amp;autoplay=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>');
            });
        },
        psy: function() {
            var btn = '.psy-btn',
                sec = $('.psy-section'),
                pane = '.psy-pane';
            doc.on('click', btn, function(e) {
                e.preventDefault();
                $(this).closest(pane).find(btn).removeClass('active');
                $(this).addClass('active');
                $("html, body").animate({ scrollTop: $($(this).attr('href')).offset().top - 40 }, 600);
            });

            var section_act = function() {
                sec.each(function(index, el) {
                    if (win.scrollTop() + (win.height() / 2) >= $(el).offset().top) {
                        var id = $(el).attr('id');
                        $(pane).find(btn).removeClass('active');
                        $(pane).find(btn + '[href="#' + id + '"]').addClass('active');
                    }
                });
            }
            section_act();
            win.scroll(function() {
                section_act();
            });
        },
        drop: function(){
            $('.drop').each(function() {
                var this_ = $(this);
                var label = this_.children('.label');
                var ct = this_.children('ul');
                var item = ct.children('li').children('a.drop-item');

                this_.click(function() {
                    ct.slideToggle(150);
                    label.toggleClass('active');
                });

                item.click(function(e) {
                    e.preventDefault();
                    label.html($(this).html());
                });

                win.click(function(e) {
                    if(this_.has(e.target).length == 0 && !this_.is(e.target)){
                        this_.children('ul').slideUp(150);
                        label.removeClass('active');
                    }
                })
            });
        },
        toggle: function() {
            var ani = 100;
            $('[data-show]').each(function(index, el) {
                var ct = $($(el).attr('data-show'));
                $(el).click(function(e) {
                    e.preventDefault();
                    ct.fadeToggle(ani);
                });
            });
            win.click(function(e) {
                $('[data-show]').each(function(index, el) {
                    var ct = $($(el).attr('data-show'));
                    if (ct.has(e.target).length == 0 && !ct.is(e.target) && $(el).has(e.target).length == 0 && !$(el).is(e.target)) {
                        ct.fadeOut(ani);
                    }
                });
            });
        },
        uiCounterup: function() {
            var item = $('.hc-couter'),
                flag = true;
            if (item.length > 0) {
                run(item);
                win.scroll(function() {
                    if (flag == true) {
                        run(item);
                    }
                });

                function run(item) {
                    if (win.scrollTop() + 70 < item.offset().top && item.offset().top + item.innerHeight() < win.scrollTop() + win.height()) {
                        count(item);
                        flag = false;
                    }
                }

                function count(item) {
                    item.each(function() {
                        var this_ = $(this);
                        var num = Number(this_.text().replace(".", ""));
                        var incre = num / 80;

                        function start(counter) {
                            if (counter <= num) {
                                setTimeout(function() {
                                    this_.text(FU.get_currency(Math.ceil(counter)));
                                    counter = counter + incre;
                                    start(counter);
                                }, 20);
                            } else {
                                this_.text(FU.get_currency(num));
                            }
                        }
                        start(0);
                    });
                }
            }
        },
        uiParalax: function() {
            var paralax = function() {
                $('.prl').each(function(index, el) {
                    var num = 20;
                    if ($(el).hasClass('v1')) num = 3;
                    if ($(el).hasClass('v2')) num = 3;
                    if ($(el).hasClass('v3')) num = 3;
                    if ($(el).hasClass('v-ab')) num = 4;
                    if ($(el).hasClass('v-video')) num = 20;
                    if ($(el).hasClass('v-sv1')) num = 20;
                    if ($(el).hasClass('v-sv2')) num = 25;
                    if ($(el).hasClass('v-sv3')) num = 30;
                    var he = $(el).innerHeight(),
                        vtop = $(el).offset().top;
                    win.scroll(function(e) {
                        var top = $(window).scrollTop();
                        $(el).css({
                            'transform': 'translateY(' + (top / num) + 'px)',
                        })
                        if($(el).hasClass('v-video') ){
                            $(el).css({
                                'transform' : 'translate('+(2*top-vtop)/30 +'px,'+(top-vtop)/num+'px)',
                            })
                        }
                        if($(el).hasClass('v-left') ){
                            $(el).css({
                                'transform' : 'translate('+(2*top-vtop)/70 +'px,'+(top-vtop)/num+'px)',
                            })
                        }
                        if($(el).hasClass('v-right') ){
                            $(el).css({
                                'transform' : 'translate('+(2*top-vtop)/70*-1 +'px,'+(top-vtop)/num+'px)',
                            })
                        }
                    });
                });
            }
            if($(win).width()>767){
                paralax();
            }
        },
        ready: function() {
            //UI.mMenu();
            //UI.header();
            UI.slider();
            UI.backTop();
            //UI.toggle();
            UI.input_number();
            UI.uiCounterup();
            //UI.yt_play();
            //UI.psy();
            //UI.uiParalax();
        },
    }
    UI.ready();

    /*custom here*/
    WOW.prototype.addBox = function(element) {
        this.boxes.push(element);
    };

    var wow = new WOW({
        mobile: false
    });
    wow.init();
    /*if ($(window).width() > 1199) {
        $('.wow').on('scrollSpy:exit', function() {
            $(this).css({
                'visibility': 'hidden',
                'animation-name': 'none'
            }).removeClass('animated');
            wow.addBox(this);
        }).scrollSpy();
    }*/

    // disable scroll
    var owl= $('.owl-carousel');
    owl.on('drag.owl.carousel', function(event) {
        document.ontouchmove = function (e) {
            e.preventDefault()
        }
    })
    // enable scroll
    owl.on('dragged.owl.carousel', function(event) {
        document.ontouchmove = function (e) {
            return true
        }
    })
    if ($(window).width() > 991) {
        if ($('.stick').length > 0) {
            $('.stick').stick_in_parent({
                offset_top: 90,
            });
        }
    }
    $('.d-nav').hc_menu({
        open: '.open-mnav',
    })

    if($('.pick-date').length) {
        $('.pick-date').daterangepicker();
    }

    if($('.date-input').length) {
        $('.date-input').datepicker({
            format: 'dd/mm/yyyy',
            orientation: "bottom auto",
            todayHighlight: true,
        });
    }

    if($('.support-time').length) {
        $('.support-time').datetimepicker({
            format: 'HH:mm',
            keepOpen: true,
            locale: 'vi',
            icons: {
                up: "far fa-chevron-up",
                down: "far fa-chevron-down"
            }
        });
    }

    if($('.support-date').length) {
        $('.support-date').datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'vi',
            icons: {
                previous: "far fa-chevron-left",
                next: "far fa-chevron-right"
            }
        });
    }
    if($('.file-upload .file-input').length) {
        $('.file-upload .file-input').click(function(e) {
            $('#supportFileInput').trigger('click');
            var file = $('#supportFileInput');
            file.change(function() {
                var filePath = file.val();
                if (filePath) {
                    var startIndex = (filePath.indexOf('\\') >= 0 ? filePath.lastIndexOf('\\') : filePath.lastIndexOf('/'));
                    var filename = filePath.substring(startIndex);
                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                        filename = filename.substring(1);
                    }
                    $('.file-name').html(filename);
                }
            });
        });
    }


    if($('.password').length) {
        $('.password .fa-eye').mousedown(function() {
            var input = $(this).parents('.password').children('input');
            input.attr('type', 'text');
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
        });
        $('.password .fa-eye').mouseup(function() {
            var input = $(this).parents('.password').children('input');
            input.attr('type', 'password');
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
        });
    }

    $(win).scroll(function() {
        if($(win).scrollTop() > 0 ){
            $('header').addClass('scroll');
        }else{
            $('header').removeClass('scroll');
        }
    });
    //colap pay
    var pay = $('.payment-collapse');
    if (pay.length > 0) {
        pay.find('.item .head').click(function(e) {
            var ct = $(this).nextAll(".ct");
            if (ct.is(":hidden") === true) {
                ct.parent('.item').parent().children().children('.ct').slideUp(300);
                ct.parent('.item').parent().children().children('.head').removeClass("active");
                $(this).addClass("active");
                $('.payment-collapse .item').removeClass('active')
                $(this).parent().addClass("active");

                ct.slideDown(300);
            } else {
                ct.slideUp(300);
                $(this).removeClass("active");
                $(this).parent().removeClass("active");
            }
        });
    }
    if ($('.pay-item-address.v2').length) {
        $('.pay-item-address.v2').click(function(event) {
            $('.pay-item-address.v2').removeClass('active');
            $(this).addClass('active');
        });
    }

    var question = $('.question-item');
    if(question.length > 0) {
        question.find('.item-hd').click(function(e) {
            var icon = $(this).find('i');
            if(icon.length) {
                icon.toggleClass('fa-plus fa-minus');
            }
        });
    }

    var file = $('.document-item');
    if(file.length > 0) {
        file.find('.item-hd').click(function(e) {
            var icon = $(this).find('i');
            if(icon.length) {
                icon.toggleClass('fa-plus fa-minus');
            }
        });
    }

    var map = $('.location-map iframe');
    if(map.length > 0) {
        mapW = map.width();
        map.height(mapW);
        win.resize(function(e) {
            mapW = map.width();
            map.height(mapW);
        });
    }

    var linkMap = $('.link-map');
    if(linkMap.length > 0) {
        linkMap.click(function(e) {
            var data_map = $(this).data('src');
            map.attr('src', data_map).fadeIn(300);
        });
    }

    if($('.preview-img a').length) {
        $('[data-fancybox="book-preview"]').fancybox({
            // Options will go here
        });
    }
    if($('.rating .stars li').length) {
        $('.stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10);
           
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });
            
          }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
        });
    
        $('.stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            
            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }
            
            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
        });
    }
    if($('.block-msutong.v2 .right').length) {
        if(win.width() > 991) {
            var containerW = $('.container').width();
    
            $('.block-msutong.v2 .right').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');

            
        }

        win.resize(function(e) {
            if(win.width() > 991) {
                var containerW = $('.container').width();
                $('.block-msutong.v2 .right').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');
            }
        });
    }

    if($('.teacher-details .bg-decor').length) {
        if(win.width() > 991) {
            var containerW = $('.container').width();
    
            $('.teacher-details .bg-decor').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');
        }

        win.resize(function(e) {
            if(win.width() > 991) {
                var containerW = $('.container').width();
                $('.teacher-details .bg-decor').css('margin-right', 'calc((-100vw + '+ containerW +'px)/2)');
            }
        });
    }
    if($('.ct-expand').length) {
        $('.ct-expand').slideUp();
        $('.block-intro .view-pri').click(function(event) {
            $(this).closest('.block-intro').find('.ct-expand').slideDown();
            $("html, body").animate({ scrollTop: $($(this).closest('.block-intro').find('.ct-expand')).offset().top - 100 }, 600);
            $(this).hide();
        });
    }
})