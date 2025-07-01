(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [4800],
  {
    3085: function (e, s, i) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/shop",
        function () {
          return i(2655);
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
    4929: function (e, s, i) {
      "use strict";
      i.d(s, {
        Z: function () {
          return a;
        },
      });
      var l = JSON.parse(
          '[{"id":1,"proImg":"/images/product/1.jpg","title":"Oxygen Mask","slug":"Oxygen-Mask","price":"340.00","delPrice":"380.00","brand":"Tools","size":"Xl"},{"id":2,"proImg":"/images/product/2.jpg","title":"Wheelchair","slug":"Wheelchair","price":"65.00","delPrice":"85.00","brand":"Tools","size":"XXl"},{"id":3,"proImg":"/images/product/3.jpg","title":"Digital Oximeter","slug":"Digital-Oximeter","price":"285.00","delPrice":"300.00","brand":"Tools","size":"L"},{"id":4,"proImg":"/images/product/4.jpg","title":"Electric Toothbrush","slug":"Electric-Toothbrush","price":"176.00","delPrice":"178.00","brand":"Tools","size":"M"},{"id":5,"proImg":"/images/product/5.jpg","title":"Mask","slug":"Mask","price":"125.00","delPrice":"130.00","brand":"Tools","size":"XXl"},{"id":6,"proImg":"/images/product/6.jpg","title":"Brooklyn D76 Glasses","slug":"Brooklyn-D76-Glasses","price":"548.00","delPrice":"600.00","brand":"Tools","size":"Xl"},{"id":7,"proImg":"/images/product/4.jpg","title":"Electric Toothbrush","slug":"Toothbrush","price":"548.00","delPrice":"600.00","brand":"Tools","size":"Xl"}]'
        ),
        a = () => l;
    },
    9393: function (e, s, i) {
      "use strict";
      i.d(s, {
        Z: function () {
          return c;
        },
      });
      var l = i(5893),
        a = i(7294);
      let r = () => {
          let [e, s] = (0, a.useState)({ name: "", email: "", company: "" }),
            [i, r] = (0, a.useState)({ name: "", email: "", company: "" }),
            n = (i) => {
              let { name: l, value: a } = i.target;
              s({ ...e, [l]: a });
            },
            c = () => {
              let s = !0,
                i = {};
              return (
                e.name || ((s = !1), (i.name = "Name is requierd")),
                e.email
                  ? /\S+@\S+\.\S+/.test(e.email) ||
                    ((s = !1), (i.email = "Email is invalid"))
                  : ((s = !1), (i.email = "Email is requierd")),
                e.company || ((s = !1), (i.company = "Company is required")),
                r(i),
                s
              );
            },
            t = (e) => {
              e.preventDefault(),
                c() && console.log("Form submitted successfully:");
            };
          return (0, l.jsxs)("form", {
            className: "cta_form",
            onSubmit: t,
            children: [
              (0, l.jsxs)("div", {
                className: "input_filled",
                children: [
                  (0, l.jsx)("input", {
                    type: "text",
                    name: "name",
                    value: e.name,
                    onChange: n,
                    placeholder: "Your Name*",
                  }),
                  i.name &&
                    (0, l.jsx)("span", {
                      className: "error",
                      children: i.name,
                    }),
                ],
              }),
              (0, l.jsxs)("div", {
                className: "input_filled",
                children: [
                  (0, l.jsx)("input", {
                    type: "text",
                    name: "email",
                    placeholder: "Your Email*",
                    value: e.email,
                    onChange: n,
                  }),
                  i.email &&
                    (0, l.jsx)("span", {
                      className: "error",
                      children: i.email,
                    }),
                ],
              }),
              (0, l.jsxs)("div", {
                className: "input_filled",
                children: [
                  (0, l.jsx)("input", {
                    type: "text",
                    name: "company",
                    placeholder: "Your Company*",
                    value: e.company,
                    onChange: n,
                  }),
                  i.company &&
                    (0, l.jsx)("span", {
                      className: "error",
                      children: i.company,
                    }),
                ],
              }),
              (0, l.jsx)("div", {
                className: "input_filled",
                children: (0, l.jsx)("button", {
                  type: "submit",
                  children: "Free Consultancy",
                }),
              }),
            ],
          });
        },
        n = (e) =>
          (0, l.jsx)("section", {
            className: "" + e.hclass,
            children: (0, l.jsx)("div", {
              className: "container",
              children: (0, l.jsxs)("div", {
                className: "cta_wrap",
                children: [
                  (0, l.jsxs)("div", {
                    className: "content",
                    children: [
                      (0, l.jsx)("h2", { children: "Get A Free Consultation" }),
                      (0, l.jsx)("p", {
                        children:
                          "Drop us a line! We are here to answer your questions 24/7",
                      }),
                    ],
                  }),
                  (0, l.jsx)(r, {}),
                ],
              }),
            }),
          });
      var c = n;
    },
    2529: function (e, s, i) {
      "use strict";
      var l = i(5893);
      i(7294);
      var a = i(1664),
        r = i.n(a);
      let n = (e) =>
        (0, l.jsx)("div", {
          className: "wpo-breadcumb-area",
          children: (0, l.jsx)("div", {
            className: "container",
            children: (0, l.jsx)("div", {
              className: "row",
              children: (0, l.jsx)("div", {
                className: "col-12",
                children: (0, l.jsxs)("div", {
                  className: "wpo-breadcumb-wrap",
                  children: [
                    (0, l.jsx)("h2", { children: e.pageTitle }),
                    (0, l.jsxs)("ul", {
                      children: [
                        (0, l.jsx)("li", {
                          children: (0, l.jsx)(r(), {
                            href: "/home",
                            children: "Home",
                          }),
                        }),
                        (0, l.jsx)("li", { children: e.pagesub }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      s.Z = n;
    },
    2655: function (e, s, i) {
      "use strict";
      i.r(s),
        i.d(s, {
          default: function () {
            return N;
          },
        });
      var l = i(5893),
        a = i(7294),
        r = i(2664),
        n = i(2529),
        c = i(2784),
        t = i(1664),
        o = i.n(t);
      let d = (e) => {
        let { products: s, addToCartProduct: i } = e,
          a = () => {
            window.scrollTo(10, 0);
          };
        return (0, l.jsx)("section", {
          className: "wpo-shop-section",
          children: (0, l.jsx)("div", {
            className: "container",
            children: (0, l.jsx)("div", {
              className: "row",
              children: (0, l.jsx)("div", {
                className: "col col-xs-12",
                children: (0, l.jsx)("div", {
                  className: "shop-grids clearfix",
                  children:
                    s.length > 0 &&
                    s
                      .slice(0, 6)
                      .map((e, s) =>
                        (0, l.jsxs)(
                          "div",
                          {
                            className: "grid",
                            children: [
                              (0, l.jsx)("div", {
                                className: "img-holder",
                                children: (0, l.jsx)("img", {
                                  src: e.proImg,
                                  alt: "",
                                }),
                              }),
                              (0, l.jsxs)("div", {
                                className: "details",
                                children: [
                                  (0, l.jsx)("h3", {
                                    children: (0, l.jsx)(o(), {
                                      onClick: a,
                                      href: "/shop-single/[slug]",
                                      as: "/shop-single/".concat(e.slug),
                                      children: e.title,
                                    }),
                                  }),
                                  (0, l.jsxs)("del", {
                                    children: ["$", e.delPrice],
                                  }),
                                  (0, l.jsxs)("span", {
                                    children: ["$", e.price],
                                  }),
                                  (0, l.jsx)("div", {
                                    className: "theme-btn-s3",
                                    children: (0, l.jsxs)("button", {
                                      "data-bs-toggle": "tooltip",
                                      "data-bs-html": "true",
                                      title: "Add to Cart",
                                      onClick: () => i(e),
                                      children: [
                                        "Add to cart",
                                        (0, l.jsx)("i", {
                                          className: "ti-shopping-cart",
                                        }),
                                      ],
                                    }),
                                  }),
                                ],
                              }),
                            ],
                          },
                          s
                        )
                      ),
                }),
              }),
            }),
          }),
        });
      };
      var m = i(4929),
        h = i(1171),
        p = i(9393),
        u = i(4620),
        x = i(1935),
        j = i(8668);
      let g = (e) => {
        let { addToCart: s } = e,
          i = (0, m.Z)(),
          [r, c] = (0, a.useState)(1),
          t = i.length,
          o = Math.ceil(t / 6),
          g = (e) => {
            c(e);
          },
          N = i.slice((r - 1) * 6, 6 * r);
        return (0, l.jsxs)(a.Fragment, {
          children: [
            (0, l.jsx)(h.Z, {
              hclass: "wpo-site-header wpo-site-header-s2",
              Logo: j.Z,
            }),
            (0, l.jsx)(n.Z, { pageTitle: "Shop", pagesub: "Shop" }),
            (0, l.jsx)("section", {
              className: "shop_section section-padding",
              children: (0, l.jsx)("div", {
                className: "container",
                children: (0, l.jsx)("div", {
                  className: "row",
                  children: (0, l.jsxs)("div", {
                    className: "col-lg-12",
                    children: [
                      (0, l.jsx)(d, {
                        addToCartProduct: function (e) {
                          let i =
                            arguments.length > 1 && void 0 !== arguments[1]
                              ? arguments[1]
                              : 1;
                          s(e, i);
                        },
                        products: N,
                      }),
                      (0, l.jsx)("div", {
                        className:
                          "pagination-wrapper pagination-wrapper-center",
                        children: (0, l.jsxs)("ul", {
                          className: "pg-pagination",
                          children: [
                            (0, l.jsx)("li", {
                              children: (0, l.jsx)("button", {
                                onClick: () => g(r - 1),
                                disabled: 1 === r,
                                "aria-label": "Previous",
                                children: (0, l.jsx)("i", {
                                  className: "ti-angle-left",
                                }),
                              }),
                            }),
                            [...Array(o)].map((e, s) =>
                              (0, l.jsx)(
                                "li",
                                {
                                  className: r === s + 1 ? "active" : "",
                                  children: (0, l.jsx)("button", {
                                    onClick: () => g(s + 1),
                                    children: s + 1,
                                  }),
                                },
                                s
                              )
                            ),
                            (0, l.jsx)("li", {
                              children: (0, l.jsx)("button", {
                                onClick: () => g(r + 1),
                                disabled: r === o,
                                "aria-label": "Next",
                                children: (0, l.jsx)("i", {
                                  className: "ti-angle-right",
                                }),
                              }),
                            }),
                          ],
                        }),
                      }),
                    ],
                  }),
                }),
              }),
            }),
            (0, l.jsx)(p.Z, { hclass: "ctafrom_section" }),
            (0, l.jsx)(u.Z, { hclass: "wpo-site-footer" }),
            (0, l.jsx)(x.Z, {}),
          ],
        });
      };
      var N = (0, r.$j)(null, { addToCart: c.Xq })(g);
    },
  },
  function (e) {
    e.O(0, [1664, 1002, 5675, 8885, 6183, 66, 9774, 2888, 179], function () {
      return e((e.s = 3085));
    }),
      (_N_E = e.O());
  },
]);
