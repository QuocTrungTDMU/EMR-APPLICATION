(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [7746],
  {
    7814: function (e, s, i) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/faq",
        function () {
          return i(8919);
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
    2529: function (e, s, i) {
      "use strict";
      var t = i(5893);
      i(7294);
      var n = i(1664),
        a = i.n(n);
      let c = (e) =>
        (0, t.jsx)("div", {
          className: "wpo-breadcumb-area",
          children: (0, t.jsx)("div", {
            className: "container",
            children: (0, t.jsx)("div", {
              className: "row",
              children: (0, t.jsx)("div", {
                className: "col-12",
                children: (0, t.jsxs)("div", {
                  className: "wpo-breadcumb-wrap",
                  children: [
                    (0, t.jsx)("h2", { children: e.pageTitle }),
                    (0, t.jsxs)("ul", {
                      children: [
                        (0, t.jsx)("li", {
                          children: (0, t.jsx)(a(), {
                            href: "/home",
                            children: "Home",
                          }),
                        }),
                        (0, t.jsx)("li", { children: e.pagesub }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      s.Z = c;
    },
    8919: function (e, s, i) {
      "use strict";
      i.r(s),
        i.d(s, {
          default: function () {
            return h;
          },
        });
      var t = i(5893),
        n = i(7294),
        a = i(1171),
        c = i(2529);
      let l = [
          {
            title: "What types of cases does your firm handle?",
            content:
              "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem pariatur iure nemo esse repellendus est quo recusandae. Delectus, maxime.",
          },
          {
            title:
              "Before hiring a counsel, what kind of questions should I ask?",
            content:
              "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem pariatur iure nemo esse repellendus est quo recusandae. Delectus, maxime.",
          },
          {
            title:
              "Before hiring a counsel, what kind of questions should I ask?",
            content:
              "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem pariatur iure nemo esse repellendus est quo recusandae. Delectus, maxime.",
          },
          {
            title:
              "Before hiring a counsel, what kind of questions should I ask?",
            content:
              "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem pariatur iure nemo esse repellendus est quo recusandae. Delectus, maxime.",
          },
        ],
        r = () => {
          let [e, s] = (0, n.useState)(null),
            i = (i) => {
              s(e === i ? null : i);
            };
          return (0, t.jsx)("section", {
            className: "wpo-faq-section section-padding",
            children: (0, t.jsx)("div", {
              className: "container",
              children: (0, t.jsxs)("div", {
                className: "row align-items-center",
                children: [
                  (0, t.jsx)("div", {
                    className: "col-lg-8 offset-lg-2",
                    children: (0, t.jsx)("div", {
                      className: "section_title",
                      children: (0, t.jsx)("h3", {
                        children: "Frequently Asked Questions",
                      }),
                    }),
                  }),
                  (0, t.jsx)("div", {
                    className: "col-lg-8 offset-lg-2",
                    children: (0, t.jsx)("div", {
                      className: "wpo-faq-wrap",
                      children: (0, t.jsx)("div", {
                        className: "row",
                        children: (0, t.jsx)("div", {
                          className: "col-lg-12 col-12",
                          children: (0, t.jsx)("div", {
                            className: "wpo-benefits-item",
                            children: l.map((s, n) =>
                              (0, t.jsxs)(
                                "div",
                                {
                                  className: "accordion-item ".concat(
                                    e === n ? "active" : ""
                                  ),
                                  children: [
                                    (0, t.jsx)("h3", {
                                      className: "accordion-header",
                                      children: (0, t.jsx)("button", {
                                        onClick: () => i(n),
                                        children: s.title,
                                      }),
                                    }),
                                    e === n &&
                                      (0, t.jsx)("div", {
                                        className: "accordion-body",
                                        children: (0, t.jsx)("p", {
                                          children: s.content,
                                        }),
                                      }),
                                  ],
                                },
                                n
                              )
                            ),
                          }),
                        }),
                      }),
                    }),
                  }),
                ],
              }),
            }),
          });
        };
      var o = i(4620),
        d = i(1935),
        u = i(8668);
      let m = () =>
        (0, t.jsxs)(n.Fragment, {
          children: [
            (0, t.jsx)(a.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: u.Z,
            }),
            (0, t.jsx)(c.Z, { pageTitle: "Faq", pagesub: "Faq" }),
            (0, t.jsx)(r, {}),
            (0, t.jsx)(o.Z, { hclass: "wpo-site-footer_s2" }),
            (0, t.jsx)(d.Z, {}),
          ],
        });
      var h = m;
    },
  },
  function (e) {
    e.O(0, [1664, 1002, 5675, 8885, 6183, 66, 9774, 2888, 179], function () {
      return e((e.s = 7814));
    }),
      (_N_E = e.O());
  },
]);
