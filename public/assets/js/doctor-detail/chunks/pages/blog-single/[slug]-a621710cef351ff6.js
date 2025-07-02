(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [5962],
  {
    9793: function (e, s, n) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/blog-single/[slug]",
        function () {
          return n(7893);
        },
      ]);
    },
    7893: function (e, s, n) {
      "use strict";
      n.r(s);
      var t = n(5893),
        u = n(7294),
        i = n(1171),
        l = n(2529),
        o = n(1935),
        r = n(1163),
        _ = n(1063),
        a = n(9484),
        c = n(4620),
        g = n(8668);
      let f = (e) => {
        let s = (0, r.useRouter)(),
          n = _.Z.find((e) => e.slug === s.query.slug);
        return (0, t.jsxs)(u.Fragment, {
          children: [
            (0, t.jsx)(i.Z, {
              Logo: g.Z,
              hclass: "wpo-site-header wpo-site-header-s2",
            }),
            (0, t.jsx)(l.Z, { pageTitle: n.title, pagesub: "Blog Single" }),
            (0, t.jsx)(a.Z, {}),
            (0, t.jsx)(c.Z, { hclass: "wpo-site-footer_s2" }),
            (0, t.jsx)(o.Z, {}),
          ],
        });
      };
      s.default = f;
    },
  },
  function (e) {
    e.O(
      0,
      [1664, 1002, 5675, 8885, 6183, 66, 480, 9484, 9774, 2888, 179],
      function () {
        return e((e.s = 9793));
      }
    ),
      (_N_E = e.O());
  },
]);
