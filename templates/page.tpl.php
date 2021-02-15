<!DOCTYPE html>
<html>
    <head>
        <title>Power Distribution Box</title>
        <link rel="stylesheet" href="/build/stylesheets/App.css" />
        <script type="text/javascript" src="/build/scripts/snapsvg.js"></script>
        <link href="/static/css/main.a25a15eb.chunk.css" rel="stylesheet" />
    </head>
    <body>
        <div class="clearfix" id="header_fixed">
            <div id="page_header" class="container-fluid">
                <?php require_once "header.tpl.php"; ?>
            </div>
        </div>
        <div class="clearfix" id="page_full">
            <!--<div id="page_body">
                <?php //echo $html_content; ?>
            </div>-->

            <div id="root"></div>
            <div id="distribution-front-side" style="display: none">
            <svg
                id="distribution_front_side"
                viewBox="0 0 3200 2400"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.2"
            ></svg>
            </div>
            <div id="distribution-rear-side" style="display: none">
            <svg
                id="distribution_rear_side"
                viewBox="0 0 3200 2400"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.2"
            ></svg>
            </div>
            <script>
            !(function (e) {
                function r(r) {
                for (
                    var n, i, a = r[0], c = r[1], l = r[2], s = 0, p = [];
                    s < a.length;
                    s++
                )
                    (i = a[s]),
                    Object.prototype.hasOwnProperty.call(o, i) &&
                        o[i] &&
                        p.push(o[i][0]),
                    (o[i] = 0);
                for (n in c)
                    Object.prototype.hasOwnProperty.call(c, n) && (e[n] = c[n]);
                for (f && f(r); p.length; ) p.shift()();
                return u.push.apply(u, l || []), t();
                }
                function t() {
                for (var e, r = 0; r < u.length; r++) {
                    for (var t = u[r], n = !0, a = 1; a < t.length; a++) {
                    var c = t[a];
                    0 !== o[c] && (n = !1);
                    }
                    n && (u.splice(r--, 1), (e = i((i.s = t[0]))));
                }
                return e;
                }
                var n = {},
                o = { 1: 0 },
                u = [];
                function i(r) {
                if (n[r]) return n[r].exports;
                var t = (n[r] = { i: r, l: !1, exports: {} });
                return e[r].call(t.exports, t, t.exports, i), (t.l = !0), t.exports;
                }
                (i.e = function (e) {
                var r = [],
                    t = o[e];
                if (0 !== t)
                    if (t) r.push(t[2]);
                    else {
                    var n = new Promise(function (r, n) {
                        t = o[e] = [r, n];
                    });
                    r.push((t[2] = n));
                    var u,
                        a = document.createElement("script");
                    (a.charset = "utf-8"),
                        (a.timeout = 120),
                        i.nc && a.setAttribute("nonce", i.nc),
                        (a.src = (function (e) {
                        return (
                            i.p +
                            "static/js/" +
                            ({}[e] || e) +
                            "." +
                            { 3: "cccabdaa" }[e] +
                            ".chunk.js"
                        );
                        })(e));
                    var c = new Error();
                    u = function (r) {
                        (a.onerror = a.onload = null), clearTimeout(l);
                        var t = o[e];
                        if (0 !== t) {
                        if (t) {
                            var n = r && ("load" === r.type ? "missing" : r.type),
                            u = r && r.target && r.target.src;
                            (c.message =
                            "Loading chunk " +
                            e +
                            " failed.\n(" +
                            n +
                            ": " +
                            u +
                            ")"),
                            (c.name = "ChunkLoadError"),
                            (c.type = n),
                            (c.request = u),
                            t[1](c);
                        }
                        o[e] = void 0;
                        }
                    };
                    var l = setTimeout(function () {
                        u({ type: "timeout", target: a });
                    }, 12e4);
                    (a.onerror = a.onload = u), document.head.appendChild(a);
                    }
                return Promise.all(r);
                }),
                (i.m = e),
                (i.c = n),
                (i.d = function (e, r, t) {
                    i.o(e, r) ||
                    Object.defineProperty(e, r, { enumerable: !0, get: t });
                }),
                (i.r = function (e) {
                    "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
                    Object.defineProperty(e, "__esModule", { value: !0 });
                }),
                (i.t = function (e, r) {
                    if ((1 & r && (e = i(e)), 8 & r)) return e;
                    if (4 & r && "object" == typeof e && e && e.__esModule) return e;
                    var t = Object.create(null);
                    if (
                    (i.r(t),
                    Object.defineProperty(t, "default", { enumerable: !0, value: e }),
                    2 & r && "string" != typeof e)
                    )
                    for (var n in e)
                        i.d(
                        t,
                        n,
                        function (r) {
                            return e[r];
                        }.bind(null, n)
                        );
                    return t;
                }),
                (i.n = function (e) {
                    var r =
                    e && e.__esModule
                        ? function () {
                            return e.default;
                        }
                        : function () {
                            return e;
                        };
                    return i.d(r, "a", r), r;
                }),
                (i.o = function (e, r) {
                    return Object.prototype.hasOwnProperty.call(e, r);
                }),
                (i.p = "/"),
                (i.oe = function (e) {
                    throw (console.error(e), e);
                });
                var a = (this["webpackJsonppower-distribution-box"] =
                    this["webpackJsonppower-distribution-box"] || []),
                c = a.push.bind(a);
                (a.push = r), (a = a.slice());
                for (var l = 0; l < a.length; l++) r(a[l]);
                var f = c;
                t();
            })([]);
            </script>
            <script src="/build/static/js/2.38de3ee7.chunk.js"></script>
            <script src="/build/static/js/main.5edd628d.chunk.js"></script>

            <div id="page_footer">
                <div class="container">
                    <?php require_once "footer.tpl.php"; ?>
                </div>
            </div>
        </div>
    </body>
</html>