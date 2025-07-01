(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [9195],
  {
    7286: function (s, e, l) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/blog",
        function () {
          return l(8547);
        },
      ]);
    },
    988: function (s, e, l) {
      "use strict";
      var i = l(5893);
      l(7294);
      var a = l(1664),
        n = l.n(a),
        c = l(9013),
        t = l(2654),
        r = l(1063),
        o = l(5675),
        d = l.n(o);
      let h = () => {
          window.scrollTo(10, 0);
        },
        g = (s) =>
          (0, i.jsx)("section", {
            className: "wpo-blog-pg-section section-padding",
            children: (0, i.jsx)("div", {
              className: "container",
              children: (0, i.jsxs)("div", {
                className: "row",
                children: [
                  (0, i.jsx)("div", {
                    className: "col col-lg-8 col-12 ".concat(s.blRight),
                    children: (0, i.jsxs)("div", {
                      className: "wpo-blog-content",
                      children: [
                        r.Z.slice(0, 3).map((s, e) =>
                          (0, i.jsxs)(
                            "div",
                            {
                              className: "post  ".concat(s.blClass),
                              children: [
                                (0, i.jsxs)("div", {
                                  className: "entry-media video-holder",
                                  children: [
                                    (0, i.jsx)(d(), {
                                      src: s.blogSingleImg,
                                      alt: "",
                                    }),
                                    (0, i.jsx)(t.Z, {}),
                                  ],
                                }),
                                (0, i.jsx)("div", {
                                  className: "entry-meta",
                                  children: (0, i.jsxs)("ul", {
                                    children: [
                                      (0, i.jsxs)("li", {
                                        children: [
                                          (0, i.jsx)("i", {
                                            className: "fi flaticon-user",
                                          }),
                                          " By ",
                                          (0, i.jsx)(n(), {
                                            onClick: h,
                                            href: "/blog-single/[slug]",
                                            as: "/blog-single/".concat(s.slug),
                                            children: s.author,
                                          }),
                                          " ",
                                        ],
                                      }),
                                      (0, i.jsxs)("li", {
                                        children: [
                                          (0, i.jsx)("i", {
                                            className:
                                              "fi flaticon-comment-white-oval-bubble",
                                          }),
                                          " Comments ",
                                          s.comment,
                                          " ",
                                        ],
                                      }),
                                      (0, i.jsxs)("li", {
                                        children: [
                                          (0, i.jsx)("i", {
                                            className: "fi flaticon-calendar",
                                          }),
                                          " ",
                                          s.create_at,
                                        ],
                                      }),
                                    ],
                                  }),
                                }),
                                (0, i.jsxs)("div", {
                                  className: "entry-details",
                                  children: [
                                    (0, i.jsx)("h3", {
                                      children: (0, i.jsx)(n(), {
                                        onClick: h,
                                        href: "/blog-single/[slug]",
                                        as: "/blog-single/".concat(s.slug),
                                        children: s.title2,
                                      }),
                                    }),
                                    (0, i.jsx)("p", {
                                      children:
                                        "Law is a great career path if you want to build a broad skill set that includes everything from critical thinking and strategic planning to communications. If you love rising to a challenge.",
                                    }),
                                    (0, i.jsx)(n(), {
                                      onClick: h,
                                      href: "/blog-single/[slug]",
                                      as: "/blog-single/".concat(s.slug),
                                      className: "read-more",
                                      children: "READ MORE...",
                                    }),
                                  ],
                                }),
                              ],
                            },
                            e
                          )
                        ),
                        (0, i.jsx)("div", {
                          className:
                            "pagination-wrapper pagination-wrapper-left",
                          children: (0, i.jsxs)("ul", {
                            className: "pg-pagination",
                            children: [
                              (0, i.jsx)("li", {
                                children: (0, i.jsx)(n(), {
                                  href: "/blog-left-sidebar",
                                  "aria-label": "Previous",
                                  children: (0, i.jsx)("i", {
                                    className: "fi ti-angle-left",
                                  }),
                                }),
                              }),
                              (0, i.jsx)("li", {
                                className: "active",
                                children: (0, i.jsx)(n(), {
                                  href: "/blog-left-sidebar",
                                  children: "1",
                                }),
                              }),
                              (0, i.jsx)("li", {
                                children: (0, i.jsx)(n(), {
                                  href: "/blog-left-sidebar",
                                  children: "2",
                                }),
                              }),
                              (0, i.jsx)("li", {
                                children: (0, i.jsx)(n(), {
                                  href: "/blog-left-sidebar",
                                  children: "3",
                                }),
                              }),
                              (0, i.jsx)("li", {
                                children: (0, i.jsx)(n(), {
                                  href: "/blog-left-sidebar",
                                  "aria-label": "Next",
                                  children: (0, i.jsx)("i", {
                                    className: "fi ti-angle-right",
                                  }),
                                }),
                              }),
                            ],
                          }),
                        }),
                      ],
                    }),
                  }),
                  (0, i.jsx)(c.Z, { blLeft: s.blLeft }),
                ],
              }),
            }),
          });
      e.Z = g;
    },
    2654: function (s, e, l) {
      "use strict";
      var i = l(5893),
        a = l(7294),
        n = l(1239);
      let c = () => {
        let [s, e] = (0, a.useState)(!1);
        return (0, i.jsxs)(a.Fragment, {
          children: [
            (0, i.jsx)(n.Z, {
              channel: "youtube",
              autoplay: !0,
              isOpen: s,
              videoId: "74DWwSxsVSs?si=qaPBPdX-wN9e8VH0",
              onClose: () => e(!1),
            }),
            (0, i.jsx)("div", {
              className: "video-btn",
              onClick: () => e(!0),
              children: (0, i.jsx)("i", { className: "flaticon-play" }),
            }),
          ],
        });
      };
      e.Z = c;
    },
    8547: function (s, e, l) {
      "use strict";
      l.r(e);
      var i = l(5893),
        a = l(7294),
        n = l(2529),
        c = l(988),
        t = l(1171),
        r = l(4620),
        o = l(1935),
        d = l(8668);
      let h = () =>
        (0, i.jsxs)(a.Fragment, {
          children: [
            (0, i.jsx)(t.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: d.Z,
            }),
            (0, i.jsx)(n.Z, { pageTitle: "Latest News", pagesub: "Blog" }),
            (0, i.jsx)(c.Z, {}),
            (0, i.jsx)(r.Z, { hclass: "wpo-site-footer_s2" }),
            (0, i.jsx)(o.Z, {}),
          ],
        });
      e.default = h;
    },
  },
  function (s) {
    s.O(
      0,
      [1664, 1002, 5675, 8885, 6183, 1239, 66, 480, 9774, 2888, 179],
      function () {
        return s((s.s = 7286));
      }
    ),
      (_N_E = s.O());
  },
]);
