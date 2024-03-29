/*!
 * response.js 0.9.1+201410311050
 * https://github.com/ryanve/response.js
 * MIT License (c) 2014 Ryan Van Etten
 */
!function (a, b, c) {
    var d = a.jQuery || a.Zepto || a.ender || a.elo;
    "undefined" != typeof module && module.exports ? module.exports = c(d) : a[b] = c(d)
}(this, "Response", function (a) {
    function b(a) {
        return a === +a
    }

    function c(a, b) {
        return function () {
            return a.apply(b, arguments)
        }
    }

    function d(a, b) {
        var c = this.call();
        return c >= (a || 0) && (!b || b >= c)
    }

    function e(a, b, c) {
        for (var d = [], e = a.length, f = 0; e > f;)d[f] = b.call(c, a[f], f++, a);
        return d
    }

    function f(a) {
        return a ? i("string" == typeof a ? a.split(" ") : a) : []
    }

    function g(a, b, c) {
        if (null == a)return a;
        for (var d = a.length, e = 0; d > e;)b.call(c || a[e], a[e], e++, a);
        return a
    }

    function h(a, b, c) {
        null == b && (b = ""), null == c && (c = "");
        for (var d = [], e = a.length, f = 0; e > f; f++)null == a[f] || d.push(b + a[f] + c);
        return d
    }

    function i(a, b, c) {
        var d, e, f, g = [], h = 0, i = 0, j = "function" == typeof b, k = !0 === c;
        for (e = a && a.length, c = k ? null : c; e > i; i++)f = a[i], d = j ? !b.call(c, f, i, a) : b ? typeof f !== b : !f, d === k && (g[h++] = f);
        return g
    }

    function j(a, c) {
        if (null == a || null == c)return a;
        if ("object" == typeof c && b(c.length))_.apply(a, i(c, "undefined", !0)); else for (var d in c)cb.call(c, d) && void 0 !== c[d] && (a[d] = c[d]);
        return a
    }

    function k(a, c, d) {
        return null == a ? a : ("object" == typeof a && !a.nodeType && b(a.length) ? g(a, c, d) : c.call(d || a, a), a)
    }

    function l(a) {
        var b = T.devicePixelRatio;
        return null == a ? b || (l(2) ? 2 : l(1.5) ? 1.5 : l(1) ? 1 : 0) : isFinite(a) ? b && b > 0 ? b >= a : (a = "only all and (min--moz-device-pixel-ratio:" + a + ")", zb(a) ? !0 : zb(a.replace("-moz-", ""))) : !1
    }

    function m(a) {
        return a.replace(tb, "$1").replace(sb, function (a, b) {
            return b.toUpperCase()
        })
    }

    function n(a) {
        return "data-" + (a ? a.replace(tb, "$1").replace(rb, "$1-$2").toLowerCase() : a)
    }

    function o(a) {
        var b;
        return "string" == typeof a && a ? "false" === a ? !1 : "true" === a ? !0 : "null" === a ? null : "undefined" === a || (b = +a) || 0 === b || "NaN" === a ? b : a : a
    }

    function p(a) {
        return !a || a.nodeType ? a : a[0]
    }

    function q(a, b, c) {
        var d, e, f, g, h;
        if (a.attributes)for (d = "boolean" == typeof c ? /^data-/ : d, g = 0, h = a.attributes.length; h > g;)(f = a.attributes[g++]) && (e = "" + f.name, d && d.test(e) !== c || null == f.value || b.call(a, f.value, e, f))
    }

    function r(a) {
        var b;
        if (a && 1 === a.nodeType)return (b = Y && a.dataset) ? b : (b = {}, q(a, function (a, c) {
            b[m(c)] = "" + a
        }, !0), b)
    }

    function s(a, b, c) {
        for (var d in b)cb.call(b, d) && c(a, d, b[d])
    }

    function t(a, b, c) {
        if (a = p(a), a && a.setAttribute) {
            if (void 0 === b && c === b)return r(a);
            var d = db(b) && n(b[0]);
            if ("object" != typeof b || d) {
                if (b = d || n(b), !b)return;
                return void 0 === c ? (b = a.getAttribute(b), null == b ? c : d ? o(b) : "" + b) : (a.setAttribute(b, c = "" + c), c)
            }
            b && s(a, b, t)
        }
    }

    function u(a, b) {
        b = f(b), k(a, function (a) {
            g(b, function (b) {
                a.removeAttribute(n(b))
            })
        })
    }

    function v(a) {
        for (var b, c = [], d = 0, e = a.length; e > d;)(b = a[d++]) && c.push("[" + n(b.replace(qb, "").replace(".", "\\.")) + "]");
        return c.join()
    }

    function w(b) {
        return a(v(f(b)))
    }

    function x() {
        return window.pageXOffset || V.scrollLeft
    }

    function y() {
        return window.pageYOffset || V.scrollTop
    }

    function z(a, b) {
        var c = a.getBoundingClientRect ? a.getBoundingClientRect() : {};
        return b = "number" == typeof b ? b || 0 : 0, {
            top: (c.top || 0) - b,
            left: (c.left || 0) - b,
            bottom: (c.bottom || 0) + b,
            right: (c.right || 0) + b
        }
    }

    function A(a, b) {
        var c = z(p(a), b);
        return !!c && c.right >= 0 && c.left <= Ab()
    }

    function B(a, b) {
        var c = z(p(a), b);
        return !!c && c.bottom >= 0 && c.top <= Bb()
    }

    function C(a, b) {
        var c = z(p(a), b);
        return !!c && c.bottom >= 0 && c.top <= Bb() && c.right >= 0 && c.left <= Ab()
    }

    function D(a) {
        var b = {
            img: 1,
            input: 1,
            source: 3,
            embed: 3,
            track: 3,
            iframe: 5,
            audio: 5,
            video: 5,
            script: 5
        }, c = b[a.nodeName.toLowerCase()] || -1;
        return 4 > c ? c : null != a.getAttribute("src") ? 5 : -5
    }

    function E(a, b, c) {
        var d;
        if (!a || null == b)throw new TypeError("@store");
        return c = "string" == typeof c && c, k(a, function (a) {
            d = c ? a.getAttribute(c) : 0 < D(a) ? a.getAttribute("src") : a.innerHTML, null == d ? u(a, b) : t(a, b, d)
        }), N
    }

    function F(a, b) {
        var c = [];
        return a && b && g(f(b), function (b) {
            c.push(t(a, b))
        }, a), c
    }

    function G(a, b) {
        return "string" == typeof a && "function" == typeof b && (fb[a] = b, gb[a] = 1), N
    }

    function H(a) {
        return X.on("resize", a), N
    }

    function I(a, b) {
        var c, d, e = wb.crossover;
        return "function" == typeof a && (c = b, b = a, a = c), d = a ? "" + a + e : e, X.on(d, b), N
    }

    function J(a) {
        return k(a, function (a) {
            W(a), H(a)
        }), N
    }

    function K(a) {
        return k(a, function (a) {
            if ("object" != typeof a)throw new TypeError("@create");
            var b, c = ub(O).configure(a), d = c.verge, e = c.breakpoints, f = vb("scroll"), h = vb("resize");
            e.length && (b = e[0] || e[1] || !1, W(function () {
                function a() {
                    c.reset(), g(c.$e, function (a, b) {
                        c[b].decideValue().updateDOM()
                    }).trigger(i)
                }

                function e() {
                    g(c.$e, function (a, b) {
                        C(c[b].$e, d) && c[b].updateDOM()
                    })
                }

                var i = wb.allLoaded, j = !!c.lazy;
                g(c.target().$e, function (a, b) {
                    c[b] = ub(c).prepareData(a), (!j || C(c[b].$e, d)) && c[b].updateDOM()
                }), c.dynamic && (c.custom || lb > b) && H(a, h), j && (X.on(f, e), c.$e.one(i, function () {
                    X.off(f, e)
                }))
            }))
        }), N
    }

    function L(a) {
        return P[Q] === N && (P[Q] = R), "function" == typeof a && a.call(P, N), N
    }

    if ("function" != typeof a)try {
        return void console.warn("response.js aborted due to missing dependency")
    } catch (M) {
    }
    var N, O, P = this, Q = "Response", R = P[Q], S = "init" + Q, T = window, U = document, V = U.documentElement, W = a.domReady || a, X = a(T), Y = "undefined" != typeof DOMStringMap, Z = Array.prototype, $ = Object.prototype, _ = Z.push, ab = Z.concat, bb = $.toString, cb = $.hasOwnProperty, db = Array.isArray || function (a) {
            return "[object Array]" === bb.call(a)
        }, eb = {
        width: [0, 320, 481, 641, 961, 1025, 1281],
        height: [0, 481],
        ratio: [1, 1.5, 2]
    }, fb = {}, gb = {}, hb = {all: []}, ib = 1, jb = screen.width, kb = screen.height, lb = jb > kb ? jb : kb, mb = jb + kb - lb, nb = function () {
        return jb
    }, ob = function () {
        return kb
    }, pb = /[^a-z0-9_\-\.]/gi, qb = /^[\W\s]+|[\W\s]+$|/g, rb = /([a-z])([A-Z])/g, sb = /-(.)/g, tb = /^data-(.+)$/, ub = Object.create || function (a) {
            function b() {
            }

            return b.prototype = a, new b
        }, vb = function (a, b) {
        return b = b || Q, a.replace(qb, "") + "." + b.replace(qb, "")
    }, wb = {
        allLoaded: vb("allLoaded"),
        crossover: vb("crossover")
    }, xb = T.matchMedia || T.msMatchMedia, yb = xb ? c(xb, T) : function () {
        return {}
    }, zb = xb ? function (a) {
        return !!xb.call(T, a).matches
    } : function () {
        return !1
    }, Ab = function () {
        var a = V.clientWidth, b = T.innerWidth;
        return b > a ? b : a
    }, Bb = function () {
        var a = V.clientHeight, b = T.innerHeight;
        return b > a ? b : a
    }, Cb = c(d, Ab), Db = c(d, Bb), Eb = {band: c(d, nb), wave: c(d, ob)};
    return O = function () {
        function b(a) {
            return "string" == typeof a ? a.toLowerCase().replace(pb, "") : ""
        }

        function c(a, b) {
            return a - b
        }

        var d = wb.crossover, k = Math.min;
        return {
            $e: 0,
            mode: 0,
            breakpoints: null,
            prefix: null,
            prop: "width",
            keys: [],
            dynamic: null,
            custom: 0,
            values: [],
            fn: 0,
            verge: null,
            newValue: 0,
            currValue: 1,
            aka: null,
            lazy: null,
            i: 0,
            uid: null,
            reset: function () {
                for (var a = this.breakpoints, b = a.length, c = 0; !c && b--;)this.fn(a[b]) && (c = b);
                return c !== this.i && (X.trigger(d).trigger(this.prop + d), this.i = c || 0), this
            },
            configure: function (a) {
                j(this, a);
                var d, l, m, n, o, p = !0, q = this.prop;
                if (this.uid = ib++, null == this.verge && (this.verge = k(lb, 500)), !(this.fn = fb[q]))throw new TypeError("@create");
                if (null == this.dynamic && (this.dynamic = "device" !== q.slice(0, 6)), this.custom = gb[q], m = this.prefix ? i(e(f(this.prefix), b)) : ["min-" + q + "-"], n = 1 < m.length ? m.slice(1) : 0, this.prefix = m[0], l = this.breakpoints, db(l)) {
                    if (g(l, function (a) {
                            if (!a && 0 !== a)throw"invalid breakpoint";
                            p = p && isFinite(a)
                        }), p && l.sort(c), !l.length)throw new TypeError(".breakpoints")
                } else if (l = eb[q] || eb[q.split("-").pop()], !l)throw new TypeError(".prop");
                if (this.breakpoints = l, this.keys = h(this.breakpoints, this.prefix), this.aka = null, n) {
                    for (o = [], d = n.length; d--;)o.push(h(this.breakpoints, n[d]));
                    this.aka = o, this.keys = ab.apply(this.keys, o)
                }
                return hb.all = hb.all.concat(hb[this.uid] = this.keys), this
            },
            target: function () {
                return this.$e = a(v(hb[this.uid])), E(this.$e, S), this.keys.push(S), this
            },
            decideValue: function () {
                for (var a = null, b = this.breakpoints, c = b.length, d = c; null == a && d--;)this.fn(b[d]) && (a = this.values[d]);
                return this.newValue = "string" == typeof a ? a : this.values[c], this
            },
            prepareData: function (b) {
                if (this.$e = a(b), this.mode = D(b), this.values = F(this.$e, this.keys), this.aka)for (var c = this.aka.length; c--;)this.values = j(this.values, F(this.$e, this.aka[c]));
                return this.decideValue()
            },
            updateDOM: function () {
                return this.currValue === this.newValue ? this : (this.currValue = this.newValue, 0 < this.mode ? this.$e[0].setAttribute("src", this.newValue) : null == this.newValue ? this.$e.empty && this.$e.empty() : this.$e.html ? this.$e.html(this.newValue) : (this.$e.empty && this.$e.empty(), this.$e[0].innerHTML = this.newValue), this)
            }
        }
    }(), fb.width = Cb, fb.height = Db, fb["device-width"] = Eb.band, fb["device-height"] = Eb.wave, fb["device-pixel-ratio"] = l, N = {
        deviceMin: function () {
            return mb
        },
        deviceMax: function () {
            return lb
        },
        noConflict: L,
        create: K,
        addTest: G,
        datatize: n,
        camelize: m,
        render: o,
        store: E,
        access: F,
        target: w,
        object: ub,
        crossover: I,
        action: J,
        resize: H,
        ready: W,
        affix: h,
        sift: i,
        dpr: l,
        deletes: u,
        scrollX: x,
        scrollY: y,
        deviceW: nb,
        deviceH: ob,
        device: Eb,
        inX: A,
        inY: B,
        route: k,
        merge: j,
        media: yb,
        mq: zb,
        wave: Db,
        band: Cb,
        map: e,
        each: g,
        inViewport: C,
        dataset: t,
        viewportH: Bb,
        viewportW: Ab
    }, W(function () {
        var b = t(U.body, "responsejs"), c = T.JSON && JSON.parse || a.parseJSON;
        b = b && c ? c(b) : b, b && b.create && K(b.create), V.className = V.className.replace(/(^|\s)(no-)?responsejs(\s|$)/, "$1$3") + " responsejs "
    }), N
});

/** @preserve
 *
 * slippry v1.3.1 - Responsive content slider for jQuery
 * http://slippry.com
 *
 * Authors: Lukas Jakob Hafner - @saftsaak
 *          Thomas Hurd - @SeenNotHurd
 *
 * Copyright 2015, booncon oy - http://booncon.com
 *
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 */
!function(a){"use strict";var b;b={slippryWrapper:'<div class="sy-box" />',slideWrapper:'<div class="sy-slides-wrap" />',slideCrop:'<div class="sy-slides-crop" />',boxClass:"sy-list",elements:"li",activeClass:"sy-active",fillerClass:"sy-filler",loadingClass:"sy-loading",adaptiveHeight:!0,start:1,loop:!0,captionsSrc:"img",captions:"overlay",captionsEl:".sy-caption",initSingle:!0,responsive:!0,preload:"visible",pager:!0,pagerClass:"sy-pager",controls:!0,controlClass:"sy-controls",prevClass:"sy-prev",prevText:"Previous",nextClass:"sy-next",nextText:"Next",hideOnEnd:!0,transition:"fade",kenZoom:120,slideMargin:0,transClass:"transition",speed:800,easing:"swing",continuous:!0,useCSS:!0,auto:!0,autoDirection:"next",autoHover:!0,autoHoverDelay:100,autoDelay:500,pause:4e3,onSliderLoad:function(){return this},onSlideBefore:function(){return this},onSlideAfter:function(){return this}},a.fn.slippry=function(c){var d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A;return e=this,0===e.length?this:e.length>1?(e.each(function(){a(this).slippry(c)}),this):(d={},d.vars={},n=function(){var a,b,c;b=document.createElement("div"),c={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",MSTransition:"msTransitionEnd",OTransition:"oTransitionEnd",transition:"transitionEnd transitionend"};for(a in c)if(void 0!==b.style[a])return c[a]},w=function(){var a=document.createElement("div"),b=["Khtml","Ms","O","Moz","Webkit"],c=b.length;return function(d){if(d in a.style)return!0;for(d=d.replace(/^[a-z]/,function(a){return a.toUpperCase()});c--;)if(b[c]+d in a.style)return!0;return!1}}(),z=function(b,c){var d,e,f,g;return d=c.split("."),e=a(b),f="",g="",a.each(d,function(a,b){b.indexOf("#")>=0?f+=b.replace(/^#/,""):g+=b+" "}),f.length&&e.attr("id",f),g.length&&e.attr("class",a.trim(g)),e},A=function(){var a,b,c,e;c={},e={},a=100-d.settings.kenZoom,e.width=d.settings.kenZoom+"%",d.vars.active.index()%2===0?(e.left=a+"%",e.top=a+"%",c.left="0%",c.top="0%"):(e.left="0%",e.top="0%",c.left=a+"%",c.top=a+"%"),b=d.settings.pause+2*d.settings.speed,d.vars.active.css(e),d.vars.active.animate(c,{duration:b,easing:d.settings.easing,queue:!1})},l=function(){d.vars.fresh?(d.vars.slippryWrapper.removeClass(d.settings.loadingClass),d.vars.fresh=!1,d.settings.auto&&e.startAuto(),d.settings.useCSS||"kenburns"!==d.settings.transition||A(),d.settings.onSliderLoad.call(void 0,d.vars.active.index())):a("."+d.settings.fillerClass,d.vars.slideWrapper).addClass("ready")},q=function(b,c){var e,f,g;e=b/c,f=1/e*100+"%",g=a("."+d.settings.fillerClass,d.vars.slideWrapper),g.css({paddingTop:f}),l()},g=function(b){var c,d;void 0!==a("img",b).attr("src")?a("<img />").load(function(){c=b.width(),d=b.height(),q(c,d)}).attr("src",a("img",b).attr("src")):(c=b.width(),d=b.height(),q(c,d))},f=function(){if(0===a("."+d.settings.fillerClass,d.vars.slideWrapper).length&&d.vars.slideWrapper.append(a('<div class="'+d.settings.fillerClass+'" />')),d.settings.adaptiveHeight===!0)g(a("."+d.settings.activeClass,e));else{var b,c,f;c=0,f=0,a(d.vars.slides).each(function(){a(this).height()>c&&(b=a(this),c=b.height()),f+=1,f===d.vars.count&&(void 0===b&&(b=a(a(d.vars.slides)[0])),g(b))})}},p=function(){d.settings.pager&&(a("."+d.settings.pagerClass+" li",d.vars.slippryWrapper).removeClass(d.settings.activeClass),a(a("."+d.settings.pagerClass+" li",d.vars.slippryWrapper)[d.vars.active.index()]).addClass(d.settings.activeClass))},u=function(){!d.settings.loop&&d.settings.hideOnEnd&&(a("."+d.settings.prevClass,d.vars.slippryWrapper)[d.vars.first?"hide":"show"](),a("."+d.settings.nextClass,d.vars.slippryWrapper)[d.vars.last?"hide":"show"]())},i=function(){var b,c;d.settings.captions!==!1&&(b="img"!==d.settings.captionsSrc?d.vars.active.attr("title"):void 0!==a("img",d.vars.active).attr("title")?a("img",d.vars.active).attr("title"):a("img",d.vars.active).attr("alt"),c="custom"!==d.settings.captions?a(d.settings.captionsEl,d.vars.slippryWrapper):a(d.settings.captionsEl),void 0!==b&&""!==b?c.html(b).show():c.hide())},e.startAuto=function(){void 0===d.vars.timer&&void 0===d.vars.delay&&(d.vars.delay=window.setTimeout(function(){d.vars.autodelay=!1,d.vars.timer=window.setInterval(function(){d.vars.trigger="auto",t(d.settings.autoDirection)},d.settings.pause)},d.vars.autodelay?d.settings.autoHoverDelay:d.settings.autoDelay),d.settings.autoHover&&d.vars.slideWrapper.unbind("mouseenter").unbind("mouseleave").bind("mouseenter",function(){void 0!==d.vars.timer?(d.vars.hoverStop=!0,e.stopAuto()):d.vars.hoverStop=!1}).bind("mouseleave",function(){d.vars.hoverStop&&(d.vars.autodelay=!0,e.startAuto())}))},e.stopAuto=function(){window.clearInterval(d.vars.timer),d.vars.timer=void 0,window.clearTimeout(d.vars.delay),d.vars.delay=void 0},e.refresh=function(){d.vars.slides.removeClass(d.settings.activeClass),d.vars.active.addClass(d.settings.activeClass),d.settings.responsive?f():l(),u(),p(),i()},s=function(){e.refresh()},m=function(){d.vars.moving=!1,d.vars.active.removeClass(d.settings.transClass),d.vars.fresh||d.vars.old.removeClass("sy-ken"),d.vars.old.removeClass(d.settings.transClass),d.settings.onSlideAfter.call(void 0,d.vars.active,d.vars.old.index(),d.vars.active.index()),d.settings.auto&&(d.vars.hoverStop&&void 0!==d.vars.hoverStop||e.startAuto())},r=function(){var b,c,f,g,h,i,j;d.settings.onSlideBefore.call(void 0,d.vars.active,d.vars.old.index(),d.vars.active.index()),d.settings.transition!==!1?(d.vars.moving=!0,"fade"===d.settings.transition||"kenburns"===d.settings.transition?(d.vars.fresh?(d.settings.useCSS?d.vars.slides.css({transitionDuration:d.settings.speed+"ms",opacity:0}):d.vars.slides.css({opacity:0}),d.vars.active.css("opacity",1),"kenburns"===d.settings.transition&&d.settings.useCSS&&(h=d.settings.pause+2*d.settings.speed,d.vars.slides.css({animationDuration:h+"ms"}),d.vars.active.addClass("sy-ken")),m()):d.settings.useCSS?(d.vars.old.addClass(d.settings.transClass).css("opacity",0),d.vars.active.addClass(d.settings.transClass).css("opacity",1),"kenburns"===d.settings.transition&&d.vars.active.addClass("sy-ken"),a(window).off("focus").on("focus",function(){d.vars.moving&&d.vars.old.trigger(d.vars.transition)}),d.vars.old.one(d.vars.transition,function(){return m(),this})):("kenburns"===d.settings.transition&&A(),d.vars.old.addClass(d.settings.transClass).animate({opacity:0},d.settings.speed,d.settings.easing,function(){m()}),d.vars.active.addClass(d.settings.transClass).css("opacity",0).animate({opacity:1},d.settings.speed,d.settings.easing)),s()):("horizontal"===d.settings.transition||"vertical"===d.settings.transition)&&(i="horizontal"===d.settings.transition?"left":"top",b="-"+d.vars.active.index()*(100+d.settings.slideMargin)+"%",d.vars.fresh?(e.css(i,b),m()):(j={},d.settings.continuous&&(!d.vars.jump||"controls"!==d.vars.trigger&&"auto"!==d.vars.trigger||(c=!0,g=b,d.vars.first?(f=0,d.vars.active.css(i,d.vars.count*(100+d.settings.slideMargin)+"%"),b="-"+d.vars.count*(100+d.settings.slideMargin)+"%"):(f=(d.vars.count-1)*(100+d.settings.slideMargin)+"%",d.vars.active.css(i,-(100+d.settings.slideMargin)+"%"),b=100+d.settings.slideMargin+"%"))),d.vars.active.addClass(d.settings.transClass),d.settings.useCSS?(j[i]=b,j.transitionDuration=d.settings.speed+"ms",e.addClass(d.settings.transition),e.css(j),a(window).off("focus").on("focus",function(){d.vars.moving&&e.trigger(d.vars.transition)}),e.one(d.vars.transition,function(){return e.removeClass(d.settings.transition),c&&(d.vars.active.css(i,f),j[i]=g,j.transitionDuration="0ms",e.css(j)),m(),this})):(j[i]=b,e.stop().animate(j,d.settings.speed,d.settings.easing,function(){return c&&(d.vars.active.css(i,f),e.css(i,g)),m(),this}))),s())):(s(),m())},v=function(a){d.vars.first=d.vars.last=!1,"prev"===a||0===a?d.vars.first=!0:("next"===a||a===d.vars.count-1)&&(d.vars.last=!0)},t=function(b){var c,f;d.vars.moving||("auto"!==d.vars.trigger&&e.stopAuto(),c=d.vars.active.index(),"prev"===b?(f=b,c>0?b=c-1:d.settings.loop&&(b=d.vars.count-1)):"next"===b?(f=b,c<d.vars.count-1?b=c+1:d.settings.loop&&(b=0)):(b-=1,f=c>b?"prev":"next"),d.vars.jump=!1,"prev"===b||"next"===b||b===c&&!d.vars.fresh||(v(b),d.vars.old=d.vars.active,d.vars.active=a(d.vars.slides[b]),(0===c&&"prev"===f||c===d.vars.count-1&&"next"===f)&&(d.vars.jump=!0),r()))},e.goToSlide=function(a){d.vars.trigger="external",t(a)},e.goToNextSlide=function(){d.vars.trigger="external",t("next")},e.goToPrevSlide=function(){d.vars.trigger="external",t("prev")},j=function(){if(d.settings.pager&&d.vars.count>1){var b,c,e;for(b=d.vars.slides.length,e=a('<ul class="'+d.settings.pagerClass+'" />'),c=1;b+1>c;c+=1)e.append(a("<li />").append(a('<a href="#'+c+'">'+c+"</a>")));d.vars.slippryWrapper.append(e),a("."+d.settings.pagerClass+" a",d.vars.slippryWrapper).click(function(){return d.vars.trigger="pager",t(parseInt(this.hash.split("#")[1],10)),!1}),p()}},k=function(){d.settings.controls&&d.vars.count>1&&(d.vars.slideWrapper.append(a('<ul class="'+d.settings.controlClass+'" />').append('<li class="'+d.settings.prevClass+'"><a href="#prev">'+d.settings.prevText+"</a></li>").append('<li class="'+d.settings.nextClass+'"><a href="#next">'+d.settings.nextText+"</a></li>")),a("."+d.settings.controlClass+" a",d.vars.slippryWrapper).click(function(){return d.vars.trigger="controls",t(this.hash.split("#")[1]),!1}),u())},o=function(){d.settings.captions!==!1&&("overlay"===d.settings.captions?d.vars.slideWrapper.append(a('<div class="sy-caption-wrap" />').html(z("<div />",d.settings.captionsEl))):"below"===d.settings.captions&&d.vars.slippryWrapper.append(a('<div class="sy-caption-wrap" />').html(z("<div />",d.settings.captionsEl))))},y=function(){t(d.vars.active.index()+1)},x=function(b){var c,e,f,g;return g="all"===d.settings.preload?b:d.vars.active,f=a("img, iframe",g),c=f.length,0===c?void y():(e=0,void f.each(function(){a(this).one("load error",function(){++e===c&&y()}).each(function(){this.complete&&a(this).load()})}))},e.getCurrentSlide=function(){return d.vars.active},e.getSlideCount=function(){return d.vars.count},e.destroySlider=function(){d.vars.fresh===!1&&(e.stopAuto(),d.vars.moving=!1,d.vars.slides.each(function(){void 0!==a(this).data("sy-cssBckup")?a(this).attr("style",a(this).data("sy-cssBckup")):a(this).removeAttr("style"),void 0!==a(this).data("sy-classBckup")?a(this).attr("class",a(this).data("sy-classBckup")):a(this).removeAttr("class")}),void 0!==e.data("sy-cssBckup")?e.attr("style",e.data("sy-cssBckup")):e.removeAttr("style"),void 0!==e.data("sy-classBckup")?e.attr("class",e.data("sy-classBckup")):e.removeAttr("class"),d.vars.slippryWrapper.before(e),d.vars.slippryWrapper.remove(),d.vars.fresh=void 0)},e.reloadSlider=function(){e.destroySlider(),h()},h=function(){var f;return d.settings=a.extend({},b,c),d.vars.slides=a(d.settings.elements,e),d.vars.count=d.vars.slides.length,d.settings.useCSS&&(w("transition")||(d.settings.useCSS=!1),d.vars.transition=n()),e.data("sy-cssBckup",e.attr("style")),e.data("sy-classBackup",e.attr("class")),e.addClass(d.settings.boxClass).wrap(d.settings.slippryWrapper).wrap(d.settings.slideWrapper).wrap(d.settings.slideCrop),d.vars.slideWrapper=e.parent().parent(),d.vars.slippryWrapper=d.vars.slideWrapper.parent().addClass(d.settings.loadingClass),d.vars.fresh=!0,d.vars.slides.each(function(){a(this).addClass("sy-slide "+d.settings.transition),d.settings.useCSS&&a(this).addClass("useCSS"),"horizontal"===d.settings.transition?a(this).css("left",a(this).index()*(100+d.settings.slideMargin)+"%"):"vertical"===d.settings.transition&&a(this).css("top",a(this).index()*(100+d.settings.slideMargin)+"%")}),d.vars.count>1||d.settings.initSingle?(-1===a("."+d.settings.activeClass,e).index()?(f="random"===d.settings.start?Math.round(Math.random()*(d.vars.count-1)):d.settings.start>0&&d.settings.start<=d.vars.count?d.settings.start-1:0,d.vars.active=a(d.vars.slides[f]).addClass(d.settings.activeClass)):d.vars.active=a("."+d.settings.activeClass,e),k(),j(),o(),x(d.vars.slides),void 0):this},h(),this)}}(jQuery);
$(document).ready(function () {
    var videos = $('video');

    if (Response.band(0, 768)) { // mobile
        $('.video-browser').remove();

        videos.attr('controls', 'true');
    } else { //desktop or tablet
        $('.video-mobile').remove();

        videos.on('click', function (e) {
            var url = $(this).data('url');

            if (url) {
                window.location = url;
            }
        });
    }

    videos.load();


    $('.slide').slippry({
        transition: 'horizontal',
        speed: 400
    });

});



// Mute youtube videos
var tag = document.createElement('script');

tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('ytplayer', {
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady() {
    player.playVideo();
    // Mute!
    player.mute();
}

//# sourceMappingURL=all.js.map
