(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [2197],
  {
    850: function (e, s, r) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/404",
        function () {
          return r(7444);
        },
      ]);
    },
    8668: function (e, s) {
      "use strict";
      s.Z = {
        src: "/_next/static/media/logo-2.96e6f6f4.svg",
        height: 60,
        width: 223,
      };
    },
    2529: function (e, s, r) {
      "use strict";
      var i = r(5893);
      r(7294);
      var c = r(1664),
        n = r.n(c);
      let a = (e) =>
        (0, i.jsx)("div", {
          className: "wpo-breadcumb-area",
          children: (0, i.jsx)("div", {
            className: "container",
            children: (0, i.jsx)("div", {
              className: "row",
              children: (0, i.jsx)("div", {
                className: "col-12",
                children: (0, i.jsxs)("div", {
                  className: "wpo-breadcumb-wrap",
                  children: [
                    (0, i.jsx)("h2", { children: e.pageTitle }),
                    (0, i.jsxs)("ul", {
                      children: [
                        (0, i.jsx)("li", {
                          children: (0, i.jsx)(n(), {
                            href: "/home",
                            children: "Home",
                          }),
                        }),
                        (0, i.jsx)("li", { children: e.pagesub }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      s.Z = a;
    },
    7444: function (e, s, r) {
      "use strict";
      r.r(s),
        r.d(s, {
          default: function () {
            return g;
          },
        });
      var i = r(5893),
        c = r(7294),
        n = r(1171),
        a = r(2529),
        t = r(1664),
        l = r.n(t),
        d = {
          src: "/_next/static/media/error-404.d1ed3eb2.png",
          height: 500,
          width: 700,
          blurDataURL:
            "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAGCAMAAADJ2y/JAAAAVFBMVEVMaXGJx/P3+PiByf+9ztr49/jJ3On29/fq+P9ot+621On48vi43fXDkZP/9u79+PPAmZny9vm6u7tSYGViv/99hI3J0dfa3N6HjZPa7PhseYCmvcuf/Q3QAAAAF3RSTlMA/k2KkNHzQgz+2SjpZq78LZL9+/7Bry3K78kAAAAJcEhZcwAACxMAAAsTAQCanBgAAAA4SURBVHicFcZHEoAgEADBIe6iKMEs//+nZZ8a6qKzArSg3v857nhlB/bdHpOMRfrYUywCck5hFT4rhAG7RVmLnQAAAABJRU5ErkJggg==",
          blurWidth: 8,
          blurHeight: 6,
        },
        h = r(5675),
        o = r.n(h);
      let A = (e) => {
        let s = () => {
          window.scrollTo(10, 0);
        };
        return (0, i.jsx)("section", {
          className: "error-404-section section-padding",
          children: (0, i.jsx)("div", {
            className: "container",
            children: (0, i.jsx)("div", {
              className: "row",
              children: (0, i.jsx)("div", {
                className: "col col-xs-12",
                children: (0, i.jsxs)("div", {
                  className: "content clearfix",
                  children: [
                    (0, i.jsx)("div", {
                      className: "error",
                      children: (0, i.jsx)(o(), { src: d, alt: "" }),
                    }),
                    (0, i.jsxs)("div", {
                      className: "error-message",
                      children: [
                        (0, i.jsx)("h3", { children: "Oops! Page Not Found!" }),
                        (0, i.jsx)("p", {
                          children:
                            "We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly.",
                        }),
                        (0, i.jsx)(l(), {
                          onClick: s,
                          href: "/home",
                          className: "theme-btn",
                          children: " Back to home",
                        }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      };
      var u = r(1935),
        x = r(4620),
        m = r(8668);
      let j = () =>
        (0, i.jsxs)(c.Fragment, {
          children: [
            (0, i.jsx)(n.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: m.Z,
            }),
            (0, i.jsx)(a.Z, { pageTitle: "404", pagesub: "404" }),
            (0, i.jsx)(A, {}),
            (0, i.jsx)(x.Z, { hclass: "wpo-site-footer_s2" }),
            (0, i.jsx)(u.Z, {}),
          ],
        });
      var g = j;
    },
  },
  function (e) {
    e.O(0, [1664, 1002, 5675, 8885, 6183, 66, 9774, 2888, 179], function () {
      return e((e.s = 850));
    }),
      (_N_E = e.O());
  },
]);
