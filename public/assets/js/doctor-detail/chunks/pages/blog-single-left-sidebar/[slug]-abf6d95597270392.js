(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [2629],
  {
    5897: function (e, s, l) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/blog-single-left-sidebar/[slug]",
        function () {
          return l(6338);
        },
      ]);
    },
    6338: function (e, s, l) {
      "use strict";
      l.r(s);
      var t = l(5893),
        n = l(7294),
        i = l(2529),
        o = l(9484),
        r = l(1935),
        u = l(1163),
        g = l(1063),
        a = l(1171),
        c = l(4620),
        f = l(8668);
      let _ = () => {
        let e = (0, u.useRouter)(),
          s = g.Z.find((s) => s.slug === e.query.slug);
        return (0, t.jsxs)(n.Fragment, {
          children: [
            (0, t.jsx)(a.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: f.Z,
            }),
            (0, t.jsx)(i.Z, {
              pageTitle: null == s ? void 0 : s.title,
              pagesub: "Blog",
            }),
            (0, t.jsx)(o.Z, {
              blLeft: "order-lg-1",
              blRight: "order-lg-2",
              blSclass: "blog-single-left-sidebar-section",
            }),
            (0, t.jsx)(c.Z, { hclass: "wpo-site-footer_s2" }),
            (0, t.jsx)(r.Z, {}),
          ],
        });
      };
      s.default = _;
    },
  },
  function (e) {
    e.O(
      0,
      [1664, 1002, 5675, 8885, 6183, 66, 480, 9484, 9774, 2888, 179],
      function () {
        return e((e.s = 5897));
      }
    ),
      (_N_E = e.O());
  },
]);
