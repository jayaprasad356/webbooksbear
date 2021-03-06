/*
 * Lazy Load - jQuery plugin for lazy loading images
 *
 * Copyright (c) 2007-2013 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://www.appelsiini.net/projects/lazyload
 *
 * Version:  1.9.1
 *
 */

!(function (e, t, i, o) {
    var n = e(t);
    (e.fn.lazyload = function (o) {
        var r,
            f = this,
            l = {
                threshold: 0,
                failure_limit: 0,
                event: "scroll",
                effect: "show",
                container: t,
                data_attribute: "original",
                skip_invisible: !0,
                appear: null,
                load: null,
            };
        function a() {
            var t = 0;
            f.each(function () {
                var i = e(this);
                if (!l.skip_invisible || i.is(":visible"))
                    if (e.abovethetop(this, l) || e.leftofbegin(this, l));
                    else if (e.belowthefold(this, l) || e.rightoffold(this, l)) {
                        if (++t > l.failure_limit) return !1;
                    } else i.trigger("appear"), (t = 0);
            });
        }
        return (
            o && (void 0 !== o.failurelimit && ((o.failure_limit = o.failurelimit), delete o.failurelimit), void 0 !== o.effectspeed && ((o.effect_speed = o.effectspeed), delete o.effectspeed), e.extend(l, o)),
            (r = void 0 === l.container || l.container === t ? n : e(l.container)),
            0 === l.event.indexOf("scroll") &&
                r.bind(l.event, function () {
                    return a();
                }),
            this.each(function () {
                var t = this,
                    i = e(t);
                (t.loaded = !1),
                    (void 0 !== i.attr("src") && !1 !== i.attr("src")) || (i.is("img") && i.attr("src", l.placeholder)),
                    i.one("appear", function () {
                        if (!this.loaded) {
                            if (l.appear) {
                                var o = f.length;
                                l.appear.call(t, o, l);
                            }
                            e("<img />")
                                .bind("load", function () {
                                    var o = i.attr("data-" + l.data_attribute);
                                    i.hide(), i.is("img") ? i.attr("src", o) : i.css("background-image", "url('" + o + "')"), i[l.effect](l.effect_speed), (t.loaded = !0);
                                    var n = e.grep(f, function (e) {
                                        return !e.loaded;
                                    });
                                    if (((f = e(n)), l.load)) {
                                        var r = f.length;
                                        l.load.call(t, r, l);
                                    }
                                })
                                .attr("src", i.attr("data-" + l.data_attribute));
                        }
                    }),
                    0 !== l.event.indexOf("scroll") &&
                        i.bind(l.event, function () {
                            t.loaded || i.trigger("appear");
                        });
            }),
            n.bind("resize", function () {
                a();
            }),
            /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) &&
                n.bind("pageshow", function (t) {
                    t.originalEvent &&
                        t.originalEvent.persisted &&
                        f.each(function () {
                            e(this).trigger("appear");
                        });
                }),
            e(i).ready(function () {
                a();
            }),
            this
        );
    }),
        (e.belowthefold = function (i, o) {
            return (void 0 === o.container || o.container === t ? (t.innerHeight ? t.innerHeight : n.height()) + n.scrollTop() : e(o.container).offset().top + e(o.container).height()) <= e(i).offset().top - o.threshold;
        }),
        (e.rightoffold = function (i, o) {
            return (void 0 === o.container || o.container === t ? n.width() + n.scrollLeft() : e(o.container).offset().left + e(o.container).width()) <= e(i).offset().left - o.threshold;
        }),
        (e.abovethetop = function (i, o) {
            return (void 0 === o.container || o.container === t ? n.scrollTop() : e(o.container).offset().top) >= e(i).offset().top + o.threshold + e(i).height();
        }),
        (e.leftofbegin = function (i, o) {
            return (void 0 === o.container || o.container === t ? n.scrollLeft() : e(o.container).offset().left) >= e(i).offset().left + o.threshold + e(i).width();
        }),
        (e.inviewport = function (t, i) {
            return !(e.rightoffold(t, i) || e.leftofbegin(t, i) || e.belowthefold(t, i) || e.abovethetop(t, i));
        }),
        e.extend(e.expr[":"], {
            "below-the-fold": function (t) {
                return e.belowthefold(t, { threshold: 0 });
            },
            "above-the-top": function (t) {
                return !e.belowthefold(t, { threshold: 0 });
            },
            "right-of-screen": function (t) {
                return e.rightoffold(t, { threshold: 0 });
            },
            "left-of-screen": function (t) {
                return !e.rightoffold(t, { threshold: 0 });
            },
            "in-viewport": function (t) {
                return e.inviewport(t, { threshold: 0 });
            },
            "above-the-fold": function (t) {
                return !e.belowthefold(t, { threshold: 0 });
            },
            "right-of-fold": function (t) {
                return e.rightoffold(t, { threshold: 0 });
            },
            "left-of-fold": function (t) {
                return !e.rightoffold(t, { threshold: 0 });
            },
        });
})(jQuery, window, document);
