(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [2521],
  {
    8273: function (e, t, s) {
      "use strict";
      s.r(t),
        s.d(t, {
          CountUp: function () {
            return i;
          },
        });
      var n = function () {
          return (n =
            Object.assign ||
            function (e) {
              for (var t, s = 1, n = arguments.length; s < n; s++)
                for (var i in (t = arguments[s]))
                  Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
              return e;
            }).apply(this, arguments);
        },
        i = (function () {
          function e(e, t, s) {
            var i = this;
            (this.endVal = t),
              (this.options = s),
              (this.version = "2.8.0"),
              (this.defaults = {
                startVal: 0,
                decimalPlaces: 0,
                duration: 2,
                useEasing: !0,
                useGrouping: !0,
                useIndianSeparators: !1,
                smartEasingThreshold: 999,
                smartEasingAmount: 333,
                separator: ",",
                decimal: ".",
                prefix: "",
                suffix: "",
                enableScrollSpy: !1,
                scrollSpyDelay: 200,
                scrollSpyOnce: !1,
              }),
              (this.finalEndVal = null),
              (this.useEasing = !0),
              (this.countDown = !1),
              (this.error = ""),
              (this.startVal = 0),
              (this.paused = !0),
              (this.once = !1),
              (this.count = function (e) {
                i.startTime || (i.startTime = e);
                var t = e - i.startTime;
                (i.remaining = i.duration - t),
                  i.useEasing
                    ? i.countDown
                      ? (i.frameVal =
                          i.startVal -
                          i.easingFn(t, 0, i.startVal - i.endVal, i.duration))
                      : (i.frameVal = i.easingFn(
                          t,
                          i.startVal,
                          i.endVal - i.startVal,
                          i.duration
                        ))
                    : (i.frameVal =
                        i.startVal +
                        (i.endVal - i.startVal) * (t / i.duration));
                var s = i.countDown
                  ? i.frameVal < i.endVal
                  : i.frameVal > i.endVal;
                (i.frameVal = s ? i.endVal : i.frameVal),
                  (i.frameVal = Number(
                    i.frameVal.toFixed(i.options.decimalPlaces)
                  )),
                  i.printValue(i.frameVal),
                  t < i.duration
                    ? (i.rAF = requestAnimationFrame(i.count))
                    : null !== i.finalEndVal
                    ? i.update(i.finalEndVal)
                    : i.options.onCompleteCallback &&
                      i.options.onCompleteCallback();
              }),
              (this.formatNumber = function (e) {
                var t,
                  s,
                  n,
                  a = (Math.abs(e).toFixed(i.options.decimalPlaces) + "").split(
                    "."
                  );
                if (
                  ((t = a[0]),
                  (s = a.length > 1 ? i.options.decimal + a[1] : ""),
                  i.options.useGrouping)
                ) {
                  n = "";
                  for (var r = 3, o = 0, l = 0, A = t.length; l < A; ++l)
                    i.options.useIndianSeparators &&
                      4 === l &&
                      ((r = 2), (o = 1)),
                      0 !== l && o % r == 0 && (n = i.options.separator + n),
                      o++,
                      (n = t[A - l - 1] + n);
                  t = n;
                }
                return (
                  i.options.numerals &&
                    i.options.numerals.length &&
                    ((t = t.replace(/[0-9]/g, function (e) {
                      return i.options.numerals[+e];
                    })),
                    (s = s.replace(/[0-9]/g, function (e) {
                      return i.options.numerals[+e];
                    }))),
                  (e < 0 ? "-" : "") +
                    i.options.prefix +
                    t +
                    s +
                    i.options.suffix
                );
              }),
              (this.easeOutExpo = function (e, t, s, n) {
                return (s * (1 - Math.pow(2, (-10 * e) / n)) * 1024) / 1023 + t;
              }),
              (this.options = n(n({}, this.defaults), s)),
              (this.formattingFn = this.options.formattingFn
                ? this.options.formattingFn
                : this.formatNumber),
              (this.easingFn = this.options.easingFn
                ? this.options.easingFn
                : this.easeOutExpo),
              (this.startVal = this.validateValue(this.options.startVal)),
              (this.frameVal = this.startVal),
              (this.endVal = this.validateValue(t)),
              (this.options.decimalPlaces = Math.max(
                this.options.decimalPlaces
              )),
              this.resetDuration(),
              (this.options.separator = String(this.options.separator)),
              (this.useEasing = this.options.useEasing),
              "" === this.options.separator && (this.options.useGrouping = !1),
              (this.el = "string" == typeof e ? document.getElementById(e) : e),
              this.el
                ? this.printValue(this.startVal)
                : (this.error = "[CountUp] target is null or undefined"),
              "undefined" != typeof window &&
                this.options.enableScrollSpy &&
                (this.error
                  ? console.error(this.error, e)
                  : ((window.onScrollFns = window.onScrollFns || []),
                    window.onScrollFns.push(function () {
                      return i.handleScroll(i);
                    }),
                    (window.onscroll = function () {
                      window.onScrollFns.forEach(function (e) {
                        return e();
                      });
                    }),
                    this.handleScroll(this)));
          }
          return (
            (e.prototype.handleScroll = function (e) {
              if (e && window && !e.once) {
                var t = window.innerHeight + window.scrollY,
                  s = e.el.getBoundingClientRect(),
                  n = s.top + window.pageYOffset,
                  i = s.top + s.height + window.pageYOffset;
                i < t && i > window.scrollY && e.paused
                  ? ((e.paused = !1),
                    setTimeout(function () {
                      return e.start();
                    }, e.options.scrollSpyDelay),
                    e.options.scrollSpyOnce && (e.once = !0))
                  : (window.scrollY > i || n > t) && !e.paused && e.reset();
              }
            }),
            (e.prototype.determineDirectionAndSmartEasing = function () {
              var e = this.finalEndVal ? this.finalEndVal : this.endVal;
              if (
                ((this.countDown = this.startVal > e),
                Math.abs(e - this.startVal) >
                  this.options.smartEasingThreshold && this.options.useEasing)
              ) {
                this.finalEndVal = e;
                var t = this.countDown ? 1 : -1;
                (this.endVal = e + t * this.options.smartEasingAmount),
                  (this.duration = this.duration / 2);
              } else (this.endVal = e), (this.finalEndVal = null);
              null !== this.finalEndVal
                ? (this.useEasing = !1)
                : (this.useEasing = this.options.useEasing);
            }),
            (e.prototype.start = function (e) {
              this.error ||
                (this.options.onStartCallback && this.options.onStartCallback(),
                e && (this.options.onCompleteCallback = e),
                this.duration > 0
                  ? (this.determineDirectionAndSmartEasing(),
                    (this.paused = !1),
                    (this.rAF = requestAnimationFrame(this.count)))
                  : this.printValue(this.endVal));
            }),
            (e.prototype.pauseResume = function () {
              this.paused
                ? ((this.startTime = null),
                  (this.duration = this.remaining),
                  (this.startVal = this.frameVal),
                  this.determineDirectionAndSmartEasing(),
                  (this.rAF = requestAnimationFrame(this.count)))
                : cancelAnimationFrame(this.rAF),
                (this.paused = !this.paused);
            }),
            (e.prototype.reset = function () {
              cancelAnimationFrame(this.rAF),
                (this.paused = !0),
                this.resetDuration(),
                (this.startVal = this.validateValue(this.options.startVal)),
                (this.frameVal = this.startVal),
                this.printValue(this.startVal);
            }),
            (e.prototype.update = function (e) {
              cancelAnimationFrame(this.rAF),
                (this.startTime = null),
                (this.endVal = this.validateValue(e)),
                this.endVal !== this.frameVal &&
                  ((this.startVal = this.frameVal),
                  null == this.finalEndVal && this.resetDuration(),
                  (this.finalEndVal = null),
                  this.determineDirectionAndSmartEasing(),
                  (this.rAF = requestAnimationFrame(this.count)));
            }),
            (e.prototype.printValue = function (e) {
              var t;
              if (this.el) {
                var s = this.formattingFn(e);
                (
                  null === (t = this.options.plugin) || void 0 === t
                    ? void 0
                    : t.render
                )
                  ? this.options.plugin.render(this.el, s)
                  : "INPUT" === this.el.tagName
                  ? (this.el.value = s)
                  : "text" === this.el.tagName || "tspan" === this.el.tagName
                  ? (this.el.textContent = s)
                  : (this.el.innerHTML = s);
              }
            }),
            (e.prototype.ensureNumber = function (e) {
              return "number" == typeof e && !isNaN(e);
            }),
            (e.prototype.validateValue = function (e) {
              var t = Number(e);
              return this.ensureNumber(t)
                ? t
                : ((this.error =
                    "[CountUp] invalid start or end value: ".concat(e)),
                  null);
            }),
            (e.prototype.resetDuration = function () {
              (this.startTime = null),
                (this.duration = 1e3 * Number(this.options.duration)),
                (this.remaining = this.duration);
            }),
            e
          );
        })();
    },
    1233: function (e, t, s) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/about",
        function () {
          return s(8822);
        },
      ]);
    },
    8668: function (e, t) {
      "use strict";
      t.Z = {
        src: "/_next/static/media/logo-2.96e6f6f4.svg",
        height: 60,
        width: 223,
      };
    },
    2119: function (e, t, s) {
      "use strict";
      s.d(t, {
        Z: function () {
          return l;
        },
      });
      var n = s(5893);
      s(7294);
      var i = {
          src: "/_next/static/media/cta-2.dfeae565.png",
          height: 535,
          width: 538,
          blurDataURL:
            "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAMAAADz0U65AAAAdVBMVEUwMCE6NjyWnqtCU2ldQzrCyNV4aGlXRD1ufpSHl6qnfWzd7vldcITK0uDn8fji6vWvtsSHYVaah4JtU0ebl55YNih4dH2RZVGutcCFiJnByNa4vcu/xM8JAADc4eyNnbFKTlufp7hOYXjFydTt8PrI0eCckJFQJhCzAAAAHnRSTlMB/P7+kaB92P785S3+yU2iSojopZf3+9lv/tK8/BxKETmoAAAACXBIWXMAAAsTAAALEwEAmpwYAAAARklEQVR4nCXGRRKAMBAEwEkghruzm2D/fyJF0acGYGL8khrt97TRGPsdBTF35tEoL8fDdq/IydlZhgWK7OFFUKjOLPJCTi9u/gPLJSm82AAAAABJRU5ErkJggg==",
          blurWidth: 8,
          blurHeight: 8,
        },
        a = s(5675),
        r = s.n(a);
      let o = () =>
        (0, n.jsx)("section", {
          className: "cta_section_s2",
          children: (0, n.jsx)("div", {
            className: "container",
            children: (0, n.jsxs)("div", {
              className: "cta_wrapper",
              children: [
                (0, n.jsxs)("div", {
                  className: "content",
                  children: [
                    (0, n.jsx)("div", {
                      className: "icon",
                      children: (0, n.jsx)("i", {
                        className: "flaticon-phone-call",
                      }),
                    }),
                    (0, n.jsxs)("div", {
                      className: "text",
                      children: [
                        (0, n.jsx)("h2", { children: "Available 24/7" }),
                        (0, n.jsx)("h3", { children: "(208) 555-0112" }),
                      ],
                    }),
                  ],
                }),
                (0, n.jsx)("div", {
                  className: "shape-icon",
                  children: (0, n.jsx)("i", { className: "flaticon-24-7" }),
                }),
                (0, n.jsx)("div", {
                  className: "image",
                  children: (0, n.jsx)(r(), { src: i, alt: "" }),
                }),
              ],
            }),
          }),
        });
      var l = o;
    },
    3694: function (e, t, s) {
      "use strict";
      var n = s(5893);
      s(7294);
      var i = s(7857);
      let a = (e) =>
        (0, n.jsx)("section", {
          className: "" + e.hclass,
          children: (0, n.jsx)("div", {
            className: "container",
            children: (0, n.jsxs)("div", {
              className: "row",
              children: [
                (0, n.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, n.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, n.jsx)("i", { className: "flaticon-doctor" }),
                      (0, n.jsxs)("h3", {
                        children: [
                          (0, n.jsx)(i.ZP, { end: 250, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, n.jsx)("p", { children: "Qualified Doctors" }),
                    ],
                  }),
                }),
                (0, n.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, n.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, n.jsx)("i", { className: "flaticon-businesswoman" }),
                      (0, n.jsxs)("h3", {
                        children: [
                          (0, n.jsx)(i.ZP, { end: 3020, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, n.jsx)("p", { children: " Satisfied Clients" }),
                    ],
                  }),
                }),
                (0, n.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, n.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, n.jsx)("i", { className: "flaticon-award" }),
                      (0, n.jsxs)("h3", {
                        children: [
                          (0, n.jsx)(i.ZP, { end: 25, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, n.jsx)("p", { children: "Award Winning" }),
                    ],
                  }),
                }),
                (0, n.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, n.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, n.jsx)("i", { className: "flaticon-customer-care" }),
                      (0, n.jsxs)("h3", {
                        children: [
                          (0, n.jsx)(i.ZP, { end: 24, enableScrollSpy: !0 }),
                          "/",
                          (0, n.jsx)(i.ZP, { end: 7, enableScrollSpy: !0 }),
                        ],
                      }),
                      (0, n.jsx)("p", { children: "Client Support" }),
                    ],
                  }),
                }),
              ],
            }),
          }),
        });
      t.Z = a;
    },
    467: function (e, t, s) {
      "use strict";
      s.d(t, {
        Z: function () {
          return p;
        },
      });
      var n = s(5893);
      s(7294);
      var i = s(7857),
        a = {
          src: "/_next/static/media/about.cfba8581.jpg",
          height: 644,
          width: 1210,
          blurDataURL:
            "data:image/jpeg;base64,/9j/2wBDAAoHBwgHBgoICAgLCgoLDhgQDg0NDh0VFhEYIx8lJCIfIiEmKzcvJik0KSEiMEExNDk7Pj4+JS5ESUM8SDc9Pjv/2wBDAQoLCw4NDhwQEBw7KCIoOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozv/wAARCAAEAAgDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAX/xAAdEAABBAMBAQAAAAAAAAAAAAACAAEDBQQRITFR/8QAFQEBAQAAAAAAAAAAAAAAAAAAAgP/xAAXEQEAAwAAAAAAAAAAAAAAAAAAATFB/9oADAMBAAIRAxEAPwCdf1+M1blzjEwFO8khMPjOB6HXznERENVin//Z",
          blurWidth: 8,
          blurHeight: 4,
        },
        r = {
          src: "/_next/static/media/1.98207f9c.jpg",
          height: 70,
          width: 70,
          blurDataURL:
            "data:image/jpeg;base64,/9j/2wBDAAoHBwgHBgoICAgLCgoLDhgQDg0NDh0VFhEYIx8lJCIfIiEmKzcvJik0KSEiMEExNDk7Pj4+JS5ESUM8SDc9Pjv/2wBDAQoLCw4NDhwQEBw7KCIoOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozv/wAARCAAIAAgDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAX/xAAfEAACAgIBBQAAAAAAAAAAAAABAgQRAAMFBhIhMVH/xAAVAQEBAAAAAAAAAAAAAAAAAAAAAv/EABwRAQABBAMAAAAAAAAAAAAAAAECAAMEESExUf/aAAwDAQACEQMRAD8ApSOTnt1g0cM+ubolp5N2+pgF7QPZphfyiDjGMizcUd+0zcOEZRIqcHTX/9k=",
          blurWidth: 8,
          blurHeight: 8,
        },
        o = {
          src: "/_next/static/media/2.8097bf4b.jpg",
          height: 70,
          width: 70,
          blurDataURL:
            "data:image/jpeg;base64,/9j/2wBDAAoHBwgHBgoICAgLCgoLDhgQDg0NDh0VFhEYIx8lJCIfIiEmKzcvJik0KSEiMEExNDk7Pj4+JS5ESUM8SDc9Pjv/2wBDAQoLCw4NDhwQEBw7KCIoOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozv/wAARCAAIAAgDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAP/xAAfEAABAwUAAwAAAAAAAAAAAAADAAEEAgUREiETMUH/xAAUAQEAAAAAAAAAAAAAAAAAAAAC/8QAGREAAgMBAAAAAAAAAAAAAAAAAAECESEx/9oADAMBAAIRAxEAPwC8+q6nv47gIcuiZDmMIhB7ZI74bx6/W63fWHRETU6vBuXD/9k=",
          blurWidth: 8,
          blurHeight: 8,
        },
        l = {
          src: "/_next/static/media/3.1a887c8e.jpg",
          height: 70,
          width: 70,
          blurDataURL:
            "data:image/jpeg;base64,/9j/2wBDAAoHBwgHBgoICAgLCgoLDhgQDg0NDh0VFhEYIx8lJCIfIiEmKzcvJik0KSEiMEExNDk7Pj4+JS5ESUM8SDc9Pjv/2wBDAQoLCw4NDhwQEBw7KCIoOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozv/wAARCAAIAAgDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAX/xAAeEAABBAMAAwAAAAAAAAAAAAABAAIEEQMFEiEiYf/EABUBAQEAAAAAAAAAAAAAAAAAAAID/8QAHBEAAQMFAAAAAAAAAAAAAAAAAQACAwQSIUHB/9oADAMBAAIRAxEAPwCzsMs7LvYj+5MeYZdY3W4F/J9mht+Wn6KRETGFeqgbGGW7HSF//9k=",
          blurWidth: 8,
          blurHeight: 8,
        },
        A = {
          src: "/_next/static/media/4.e2199886.jpg",
          height: 70,
          width: 70,
          blurDataURL:
            "data:image/jpeg;base64,/9j/2wBDAAoHBwgHBgoICAgLCgoLDhgQDg0NDh0VFhEYIx8lJCIfIiEmKzcvJik0KSEiMEExNDk7Pj4+JS5ESUM8SDc9Pjv/2wBDAQoLCw4NDhwQEBw7KCIoOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozv/wAARCAAIAAgDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAb/xAAgEAAABAYDAAAAAAAAAAAAAAAAAQIDBAUREhMxISLB/8QAFQEBAQAAAAAAAAAAAAAAAAAABAX/xAAaEQACAwEBAAAAAAAAAAAAAAABAgADETEE/9oADAMBAAIRAxEAPwClSxNDnrsS4bxReZKUFlOllOeut+AACJTc7ltPDE2+ZAFzeT//2Q==",
          blurWidth: 8,
          blurHeight: 8,
        },
        c = s(1446),
        u = s(5675),
        d = s.n(u);
      let h = (e) =>
        (0, n.jsx)("section", {
          className: "" + e.hclass,
          children: (0, n.jsx)("div", {
            className: "container",
            children: (0, n.jsxs)("div", {
              className: "row align-items-center",
              children: [
                (0, n.jsx)("div", {
                  className: "col-lg-6 col-12",
                  children: (0, n.jsx)("div", {
                    className: "about_left",
                    children: (0, n.jsxs)("div", {
                      className: "image",
                      children: [
                        (0, n.jsx)(d(), { src: a, alt: "" }),
                        (0, n.jsx)("span", { className: "round-on" }),
                        (0, n.jsx)("span", { className: "round-two" }),
                        (0, n.jsxs)("div", {
                          className: "award",
                          children: [
                            (0, n.jsx)("div", {
                              className: "icon",
                              children: (0, n.jsx)("i", {
                                className: "flaticon-cup",
                              }),
                            }),
                            (0, n.jsxs)("div", {
                              className: "text",
                              children: [
                                (0, n.jsxs)("h2", {
                                  children: [
                                    (0, n.jsx)(i.ZP, {
                                      end: 25,
                                      enableScrollSpy: !0,
                                    }),
                                    "+",
                                  ],
                                }),
                                (0, n.jsx)("p", {
                                  children: "Years Of Experience",
                                }),
                              ],
                            }),
                          ],
                        }),
                        (0, n.jsxs)("div", {
                          className: "doctors",
                          children: [
                            (0, n.jsxs)("ul", {
                              children: [
                                (0, n.jsx)("li", {
                                  children: (0, n.jsx)(d(), {
                                    src: r,
                                    alt: "",
                                  }),
                                }),
                                (0, n.jsx)("li", {
                                  children: (0, n.jsx)(d(), {
                                    src: o,
                                    alt: "",
                                  }),
                                }),
                                (0, n.jsx)("li", {
                                  children: (0, n.jsx)(d(), {
                                    src: l,
                                    alt: "",
                                  }),
                                }),
                                (0, n.jsx)("li", {
                                  children: (0, n.jsx)(d(), {
                                    src: A,
                                    alt: "",
                                  }),
                                }),
                                (0, n.jsx)("li", {
                                  children: (0, n.jsx)("span", {
                                    children: "95+",
                                  }),
                                }),
                              ],
                            }),
                            (0, n.jsx)("h4", { children: "Available Doctors" }),
                          ],
                        }),
                      ],
                    }),
                  }),
                }),
                (0, n.jsx)("div", {
                  className: "col-lg-6 col-12",
                  children: (0, n.jsxs)("div", {
                    className: "content",
                    children: [
                      (0, n.jsx)("h2", { children: "About Medically" }),
                      (0, n.jsx)("h3", {
                        children: "Your Smile & Happiness Is Our Mission",
                      }),
                      (0, n.jsx)("p", {
                        children:
                          "Our health and hospital policy encompasses the strategies, guidelines, and practices that technology companies use to achieve their goals and objectives. The policies may vary depending on the company's size, market position, and competitive landscape. Commodo erat amet vitae consectetur consectetur feugiat.",
                      }),
                      (0, n.jsx)("p", {
                        children:
                          "Tellus viverra eu risus ut ipsum magna sed odio elit. Sed sem purus tincidunt condimentum amet condimentum massa. Nunc vel nascetur id cras.",
                      }),
                      (0, n.jsxs)("div", {
                        className: "ceo",
                        children: [
                          (0, n.jsxs)("div", {
                            children: [
                              (0, n.jsx)("h4", { children: "Savannah Nguyen" }),
                              (0, n.jsx)("span", {
                                children: "CEO & Founder of Madically",
                              }),
                            ],
                          }),
                          (0, n.jsx)("div", {
                            children: (0, n.jsx)(d(), { src: c.Z, alt: "" }),
                          }),
                        ],
                      }),
                    ],
                  }),
                }),
              ],
            }),
          }),
        });
      var p = h;
    },
    2529: function (e, t, s) {
      "use strict";
      var n = s(5893);
      s(7294);
      var i = s(1664),
        a = s.n(i);
      let r = (e) =>
        (0, n.jsx)("div", {
          className: "wpo-breadcumb-area",
          children: (0, n.jsx)("div", {
            className: "container",
            children: (0, n.jsx)("div", {
              className: "row",
              children: (0, n.jsx)("div", {
                className: "col-12",
                children: (0, n.jsxs)("div", {
                  className: "wpo-breadcumb-wrap",
                  children: [
                    (0, n.jsx)("h2", { children: e.pageTitle }),
                    (0, n.jsxs)("ul", {
                      children: [
                        (0, n.jsx)("li", {
                          children: (0, n.jsx)(a(), {
                            href: "/home",
                            children: "Home",
                          }),
                        }),
                        (0, n.jsx)("li", { children: e.pagesub }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      t.Z = r;
    },
    8822: function (e, t, s) {
      "use strict";
      s.r(t);
      var n = s(5893),
        i = s(7294),
        a = s(1171),
        r = s(2529),
        o = s(467),
        l = s(7578),
        A = s(3694),
        c = s(3567),
        u = s(2119),
        d = s(5812),
        h = s(9393),
        p = s(4620),
        f = s(1935),
        m = s(8668);
      let g = () =>
        (0, n.jsxs)(i.Fragment, {
          children: [
            (0, n.jsx)(a.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: m.Z,
            }),
            (0, n.jsx)(r.Z, { pageTitle: "About Us", pagesub: "About Us" }),
            (0, n.jsx)(o.Z, { hclass: "about_section section-padding s4" }),
            (0, n.jsx)(l.Z, { hclass: "work_section_s2 section-padding" }),
            (0, n.jsx)(A.Z, { hclass: "funfact_section" }),
            (0, n.jsx)(c.Z, { hclass: "team_section_s2 section-padding" }),
            (0, n.jsx)(u.Z, {}),
            (0, n.jsx)(d.Z, { tClass: "blog_section section-padding" }),
            (0, n.jsx)(h.Z, { hclass: "ctafrom_section" }),
            (0, n.jsx)(p.Z, { hclass: "wpo-site-footer" }),
            (0, n.jsx)(f.Z, {}),
          ],
        });
      t.default = g;
    },
    7857: function (e, t, s) {
      "use strict";
      var n = s(7294),
        i = s(8273);
      function a(e, t) {
        var s = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
          var n = Object.getOwnPropertySymbols(e);
          t &&
            (n = n.filter(function (t) {
              return Object.getOwnPropertyDescriptor(e, t).enumerable;
            })),
            s.push.apply(s, n);
        }
        return s;
      }
      function r(e) {
        for (var t = 1; t < arguments.length; t++) {
          var s = null != arguments[t] ? arguments[t] : {};
          t % 2
            ? a(Object(s), !0).forEach(function (t) {
                !(function (e, t, s) {
                  var n;
                  (t =
                    "symbol" ==
                    typeof (n = (function (e, t) {
                      if ("object" != typeof e || !e) return e;
                      var s = e[Symbol.toPrimitive];
                      if (void 0 !== s) {
                        var n = s.call(e, t || "default");
                        if ("object" != typeof n) return n;
                        throw TypeError(
                          "@@toPrimitive must return a primitive value."
                        );
                      }
                      return ("string" === t ? String : Number)(e);
                    })(t, "string"))
                      ? n
                      : String(n)) in e
                    ? Object.defineProperty(e, t, {
                        value: s,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                      })
                    : (e[t] = s);
                })(e, t, s[t]);
              })
            : Object.getOwnPropertyDescriptors
            ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(s))
            : a(Object(s)).forEach(function (t) {
                Object.defineProperty(
                  e,
                  t,
                  Object.getOwnPropertyDescriptor(s, t)
                );
              });
        }
        return e;
      }
      function o() {
        return (o = Object.assign
          ? Object.assign.bind()
          : function (e) {
              for (var t = 1; t < arguments.length; t++) {
                var s = arguments[t];
                for (var n in s)
                  Object.prototype.hasOwnProperty.call(s, n) && (e[n] = s[n]);
              }
              return e;
            }).apply(this, arguments);
      }
      function l(e, t) {
        if (null == e) return {};
        var s,
          n,
          i = (function (e, t) {
            if (null == e) return {};
            var s,
              n,
              i = {},
              a = Object.keys(e);
            for (n = 0; n < a.length; n++)
              (s = a[n]), t.indexOf(s) >= 0 || (i[s] = e[s]);
            return i;
          })(e, t);
        if (Object.getOwnPropertySymbols) {
          var a = Object.getOwnPropertySymbols(e);
          for (n = 0; n < a.length; n++)
            (s = a[n]),
              !(t.indexOf(s) >= 0) &&
                Object.prototype.propertyIsEnumerable.call(e, s) &&
                (i[s] = e[s]);
        }
        return i;
      }
      function A(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var s = 0, n = Array(t); s < t; s++) n[s] = e[s];
        return n;
      }
      var c =
        "undefined" != typeof window &&
        void 0 !== window.document &&
        void 0 !== window.document.createElement
          ? n.useLayoutEffect
          : n.useEffect;
      function u(e) {
        var t = n.useRef(e);
        return (
          c(function () {
            t.current = e;
          }),
          n.useCallback(function () {
            for (var e = arguments.length, s = Array(e), n = 0; n < e; n++)
              s[n] = arguments[n];
            return t.current.apply(void 0, s);
          }, [])
        );
      }
      var d = function (e, t) {
          var s = t.decimal,
            n = t.decimals,
            a = t.duration,
            r = t.easingFn,
            o = t.end,
            l = t.formattingFn,
            A = t.numerals,
            c = t.prefix,
            u = t.separator,
            d = t.start,
            h = t.suffix,
            p = t.useEasing,
            f = t.useGrouping,
            m = t.useIndianSeparators,
            g = t.enableScrollSpy,
            x = t.scrollSpyDelay,
            j = t.scrollSpyOnce,
            E = t.plugin;
          return new i.CountUp(e, o, {
            startVal: d,
            duration: a,
            decimal: s,
            decimalPlaces: n,
            easingFn: r,
            formattingFn: l,
            numerals: A,
            separator: u,
            prefix: c,
            suffix: h,
            plugin: E,
            useEasing: p,
            useIndianSeparators: m,
            useGrouping: f,
            enableScrollSpy: g,
            scrollSpyDelay: x,
            scrollSpyOnce: j,
          });
        },
        h = [
          "ref",
          "startOnMount",
          "enableReinitialize",
          "delay",
          "onEnd",
          "onStart",
          "onPauseResume",
          "onReset",
          "onUpdate",
        ],
        p = {
          decimal: ".",
          separator: ",",
          delay: null,
          prefix: "",
          suffix: "",
          duration: 2,
          start: 0,
          decimals: 0,
          startOnMount: !0,
          enableReinitialize: !0,
          useEasing: !0,
          useGrouping: !0,
          useIndianSeparators: !1,
        },
        f = function (e) {
          var t = Object.fromEntries(
              Object.entries(e).filter(function (e) {
                return (
                  void 0 !==
                  ((function (e) {
                    if (Array.isArray(e)) return e;
                  })(e) ||
                    (function (e, t) {
                      var s =
                        null == e
                          ? null
                          : ("undefined" != typeof Symbol &&
                              e[Symbol.iterator]) ||
                            e["@@iterator"];
                      if (null != s) {
                        var n,
                          i,
                          a,
                          r,
                          o = [],
                          l = !0,
                          A = !1;
                        try {
                          if (((a = (s = s.call(e)).next), 0 === t)) {
                            if (Object(s) !== s) return;
                            l = !1;
                          } else
                            for (
                              ;
                              !(l = (n = a.call(s)).done) &&
                              (o.push(n.value), o.length !== t);
                              l = !0
                            );
                        } catch (c) {
                          (A = !0), (i = c);
                        } finally {
                          try {
                            if (
                              !l &&
                              null != s.return &&
                              ((r = s.return()), Object(r) !== r)
                            )
                              return;
                          } finally {
                            if (A) throw i;
                          }
                        }
                        return o;
                      }
                    })(e, 2) ||
                    (function (e, t) {
                      if (e) {
                        if ("string" == typeof e) return A(e, t);
                        var s = Object.prototype.toString.call(e).slice(8, -1);
                        if (
                          ("Object" === s &&
                            e.constructor &&
                            (s = e.constructor.name),
                          "Map" === s || "Set" === s)
                        )
                          return Array.from(e);
                        if (
                          "Arguments" === s ||
                          /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(s)
                        )
                          return A(e, t);
                      }
                    })(e, 2) ||
                    (function () {
                      throw TypeError(
                        "Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
                      );
                    })())[1]
                );
              })
            ),
            s = n.useMemo(
              function () {
                return r(r({}, p), t);
              },
              [e]
            ),
            i = s.ref,
            a = s.startOnMount,
            o = s.enableReinitialize,
            c = s.delay,
            f = s.onEnd,
            m = s.onStart,
            g = s.onPauseResume,
            x = s.onReset,
            j = s.onUpdate,
            E = l(s, h),
            O = n.useRef(),
            v = n.useRef(),
            w = n.useRef(!1),
            b = u(function () {
              return d("string" == typeof i ? i : i.current, E);
            }),
            y = u(function (e) {
              var t = O.current;
              if (t && !e) return t;
              var s = b();
              return (O.current = s), s;
            }),
            z = u(function () {
              var e = function () {
                return y(!0).start(function () {
                  null == f ||
                    f({ pauseResume: S, reset: D, start: B, update: N });
                });
              };
              c && c > 0 ? (v.current = setTimeout(e, 1e3 * c)) : e(),
                null == m || m({ pauseResume: S, reset: D, update: N });
            }),
            S = u(function () {
              y().pauseResume(),
                null == g || g({ reset: D, start: B, update: N });
            }),
            D = u(function () {
              y().el &&
                (v.current && clearTimeout(v.current),
                y().reset(),
                null == x || x({ pauseResume: S, start: B, update: N }));
            }),
            N = u(function (e) {
              y().update(e),
                null == j || j({ pauseResume: S, reset: D, start: B });
            }),
            B = u(function () {
              D(), z();
            }),
            V = u(function (e) {
              a && (e && D(), z());
            });
          return (
            n.useEffect(
              function () {
                w.current ? o && V(!0) : ((w.current = !0), V());
              },
              [
                o,
                w,
                V,
                c,
                e.start,
                e.suffix,
                e.prefix,
                e.duration,
                e.separator,
                e.decimals,
                e.decimal,
                e.formattingFn,
              ]
            ),
            n.useEffect(
              function () {
                return function () {
                  D();
                };
              },
              [D]
            ),
            { start: B, pauseResume: S, reset: D, update: N, getCountUp: y }
          );
        },
        m = ["className", "redraw", "containerProps", "children", "style"];
      t.ZP = function (e) {
        var t = e.className,
          s = e.redraw,
          i = e.containerProps,
          a = e.children,
          A = e.style,
          c = l(e, m),
          d = n.useRef(null),
          h = n.useRef(!1),
          p = f(
            r(
              r({}, c),
              {},
              {
                ref: d,
                startOnMount: "function" != typeof a || 0 === e.delay,
                enableReinitialize: !1,
              }
            )
          ),
          g = p.start,
          x = p.reset,
          j = p.update,
          E = p.pauseResume,
          O = p.getCountUp,
          v = u(function () {
            g();
          }),
          w = u(function (t) {
            e.preserveValue || x(), j(t);
          }),
          b = u(function () {
            if (
              "function" == typeof e.children &&
              !(d.current instanceof Element)
            ) {
              console.error(
                'Couldn\'t find attached element to hook the CountUp instance into! Try to attach "containerRef" from the render prop to a an Element, eg. <span ref={containerRef} />.'
              );
              return;
            }
            O();
          });
        return (n.useEffect(
          function () {
            b();
          },
          [b]
        ),
        n.useEffect(
          function () {
            h.current && w(e.end);
          },
          [e.end, w]
        ),
        n.useEffect(
          function () {
            s && h.current && v();
          },
          [v, s, s && e]
        ),
        n.useEffect(
          function () {
            !s && h.current && v();
          },
          [
            v,
            s,
            e.start,
            e.suffix,
            e.prefix,
            e.duration,
            e.separator,
            e.decimals,
            e.decimal,
            e.className,
            e.formattingFn,
          ]
        ),
        n.useEffect(function () {
          h.current = !0;
        }, []),
        "function" == typeof a)
          ? a({
              countUpRef: d,
              start: g,
              reset: x,
              update: j,
              pauseResume: E,
              getCountUp: O,
            })
          : n.createElement(
              "span",
              o({ className: t, ref: d, style: A }, i),
              void 0 !== e.start ? O().formattingFn(e.start) : ""
            );
      };
    },
  },
  function (e) {
    e.O(
      0,
      [1664, 1002, 5675, 8885, 6183, 66, 3450, 9774, 2888, 179],
      function () {
        return e((e.s = 1233));
      }
    ),
      (_N_E = e.O());
  },
]);
