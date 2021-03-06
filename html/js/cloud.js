function pageScroll() {
    $("#backtop").css("background-position-x", "-28px"),
    window.scrollBy(0, -20),
    scrolldelay = setTimeout("pageScroll()", 2),
    0 == document.documentElement.scrollTop && 0 == document.body.scrollTop && ($("#backtop").css("background-position-x", "0"), clearTimeout(scrolldelay))
}
function cloud_animate(a, b) {
    $("#" + a).animate({
        marginLeft: parseInt($("#" + a).css("marginLeft")) + 30 * b
    },
    cloud_time,
    function() {
        cloud_animate(a, -b)
    })
}
function errorTips(a, b) {
    $.colorbox({
        html: '<div id="uploadFile" class="popup"><table width="100%"><tr><td align="center"><h4 class="error_msg">' + a + "</h4></td>" + "</tr>" + "<tr>" + '<td align="center"><a href="#" class="btn_s">确&nbsp;定</a></td>' + "</tr>" + "</table>" + "</div>",
        title: b ? b: "错误提示"
    })
}
function textCounter(a, b, c) {
    var d = $('textarea[name="' + a + '"]');
    $.trim(d.val()).length > c ? d.val(d.val().substring(0, c)) : d.next(".word_count").children("span").text(c - $.trim(d.val()).length)
}
function placeholderFn() {
    placeholderSupport() || $("[placeholder]").focus(function() {
        var a = $(this);
        a.val() == a.attr("placeholder") && (a.val(""), a.removeClass("placeholder"))
    }).blur(function() {
        var a = $(this); ("" == a.val() || a.val() == a.attr("placeholder")) && (a.addClass("placeholder"), a.val(a.attr("placeholder")))
    }).blur(),
    "" === $("[placeholder]").value && ($("[placeholder]").value = $("[placeholder]").attr("placeholder"))
}
function placeholderSupport() {
    return "placeholder" in document.createElement("input")
}
$(function() {
    $("#email,#password").blur(function() {
        $("#beError").hide()
    }),
    $(".collapsible_menu").hover(function() {
        $(this).addClass("expend"),
        $("dd", this).show()
    },
    function() {
        $(this).removeClass("expend"),
        $("dd", this).hide()
    }),
    $("#qrSide a").click(function() {
        $(this).parent().remove()
    }),
    $("#options dl dt").click(function() {
        $(this).parent().hasClass("slideUp") ? ($(this).children("em").removeClass("transform"), $(this).parent().children("dd").slideDown(200), $(this).parent().removeClass("slideUp").children("dd").slideDown(200)) : ($(this).children("em").addClass("transform"), $(this).parent().children("dd").slideUp(200), $(this).parent().addClass("slideUp").children("dd").slideUp(200))
    }),
    $("#selected ul").delegate("li span", "click",
    function() {
        var b = $(this).parent("li").children("strong").text();
        $("#options dl").each(function() {
            $("dt", this).text() == b && $("dt", this).trigger("click")
        }),
        1 == $("#selected").find("li").length ? $(this).parents("#selected").addClass("dn").find("li").remove() : $(this).parent().remove()
    }),
    cloud_animate("cloud_s", -1),
    cloud_animate("cloud_m", 1),
    $(".job_company h2 img").hover(function() {
        $(this).siblings("span").fadeIn(200)
    },
    function() {
        $(this).siblings("span").fadeOut(200)
    }),
    $(".c_box em").hover(function() {
        $(this).siblings("span.va").fadeIn(200)
    },
    function() {
        $(this).siblings("span.va").fadeOut(200)
    }),
    $(".c_logo").on("mouseenter", 'input[type="file"]',
    function() {
        $("#logoNo").css("backgroundColor", "#7e9597")
    }),
    $(".c_logo").on("mouseleave", 'input[type="file"]',
    function() {
        $("#logoNo").css("backgroundColor", "#93b7bb")
    }),
    $(".new_portrait").on("mouseenter", 'input[type="file"]',
    function() {
        $(".portrait_upload").css("backgroundColor", "#7e9597")
    }),
    $(".new_portrait").on("mouseleave", 'input[type="file"]',
    function() {
        $(".portrait_upload").css("backgroundColor", "#e7e7e7")
    }),
    $("#Product").on("mouseenter", 'input[type="file"]',
    function() {
        $(".product_upload").children("div").css("backgroundColor", "#7e9597")
    }),
    $("#Product").on("mouseleave", 'input[type="file"]',
    function() {
        $(".product_upload").children("div").css("backgroundColor", "#93b7bb")
    }),
    $(".business_license").on("mouseenter", 'input[type="file"]',
    function() {
        $(this).prev(".license_upload").children("div").css("backgroundColor", "#7e9597")
    }),
    $(".business_license").on("mouseleave", 'input[type="file"]',
    function() {
        $(this).prev(".license_upload").children("div").css("backgroundColor", "#93b7bb")
    }),
    $(window).scroll(function() { (document.documentElement.scrollTop || document.body.scrollTop) > 0 ? $("#backtop").show() : $("#backtop").hide()
    }),
    $("#backtop").click(function() {
        pageScroll()
    }),
    $(".footer_qr").hover(function() {
        $("i", this).fadeIn(200)
    },
    function() {
        $("i", this).fadeOut(200)
    }),
    $(document).click(function() {
        $("#box_expectCity").hide(),
        $("#workplaceSelect .more").removeClass("open").children(".citymore_arrow").removeClass("transform")
    }),
    $("#workplaceSelect .more").click(function(a) {
        a.stopPropagation(),
        $(this).hasClass("open") ? ($(this).removeClass("open"), $(this).children(".citymore_arrow").removeClass("transform"), $(this).siblings("#box_expectCity").hide()) : ($(this).addClass("open"), $(this).children(".citymore_arrow").addClass("transform"), $(this).siblings("#box_expectCity").show())
    })
});
var cloud_time = 2e3;
$(function() {
    placeholderFn()
}),
function(a) {
    a.fn.hoverDelay = function(b) {
        var e, f, c = {
            hoverDuring: 200,
            outDuring: 200,
            hoverEvent: function() {
                a.noop()
            },
            outEvent: function() {
                a.noop()
            }
        },
        d = a.extend(c, b || {}),
        g = this;
        return a(this).each(function() {
            a(this).hover(function() {
                clearTimeout(f),
                e = setTimeout(function() {
                    d.hoverEvent.apply(g)
                },
                d.hoverDuring)
            },
            function() {
                clearTimeout(e),
                f = setTimeout(function() {
                    d.outEvent.apply(g)
                },
                d.outDuring)
            })
        })
    }
} (jQuery);