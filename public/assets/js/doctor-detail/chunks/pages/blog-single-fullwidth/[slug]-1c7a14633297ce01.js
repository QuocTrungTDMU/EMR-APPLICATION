(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [6048],
  {
    2732: function (e, s, t) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/blog-single-fullwidth/[slug]",
        function () {
          return t(7337);
        },
      ]);
    },
    7337: function (e, s, t) {
      "use strict";
      t.r(s);
      var l = t(5893),
        n = t(7294),
        u = t(1163),
        o = t(1063),
        i = t(1171),
        r = t(2529),
        f = t(9484),
        g = t(1935),
        _ = t(4620),
        c = t(8668);
      let a = () => {
        let e = (0, u.useRouter)(),
          s = o.Z.find((s) => s.slug === e.query.slug);
        return (0, l.jsxs)(n.Fragment, {
          children: [
            (0, l.jsx)(i.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: c.Z,
            }),
            (0, l.jsx)(r.Z, {
              pageTitle: null == s ? void 0 : s.title,
              pagesub: "Blog",
            }),
            (0, l.jsx)(f.Z, {
              blLeft: "d-none",
              blRight: "col-lg-10 offset-lg-1",
            }),
            (0, l.jsx)(_.Z, { hclass: "wpo-site-footer_s2" }),
            (0, l.jsx)(g.Z, {}),
          ],
        });
      };
      s.default = a;
    },
  },
  function (e) {
    e.O(
      0,
      [1664, 1002, 5675, 8885, 6183, 66, 480, 9484, 9774, 2888, 179],
      function () {
        return e((e.s = 2732));
      }
    ),
      (_N_E = e.O());
  },
]);
