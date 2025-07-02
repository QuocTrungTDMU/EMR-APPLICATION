(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [9125],
  {
    9970: function (s, e, i) {
      (window.__NEXT_P = window.__NEXT_P || []).push([
        "/shop-single/[slug]",
        function () {
          return i(3346);
        },
      ]);
    },
    8668: function (s, e) {
      "use strict";
      e.Z = {
        src: "/_next/static/media/logo-2.96e6f6f4.svg",
        height: 60,
        width: 223,
      };
    },
    4929: function (s, e, i) {
      "use strict";
      i.d(e, {
        Z: function () {
          return l;
        },
      });
      var r = JSON.parse(
          '[{"id":1,"proImg":"/images/product/1.jpg","title":"Oxygen Mask","slug":"Oxygen-Mask","price":"340.00","delPrice":"380.00","brand":"Tools","size":"Xl"},{"id":2,"proImg":"/images/product/2.jpg","title":"Wheelchair","slug":"Wheelchair","price":"65.00","delPrice":"85.00","brand":"Tools","size":"XXl"},{"id":3,"proImg":"/images/product/3.jpg","title":"Digital Oximeter","slug":"Digital-Oximeter","price":"285.00","delPrice":"300.00","brand":"Tools","size":"L"},{"id":4,"proImg":"/images/product/4.jpg","title":"Electric Toothbrush","slug":"Electric-Toothbrush","price":"176.00","delPrice":"178.00","brand":"Tools","size":"M"},{"id":5,"proImg":"/images/product/5.jpg","title":"Mask","slug":"Mask","price":"125.00","delPrice":"130.00","brand":"Tools","size":"XXl"},{"id":6,"proImg":"/images/product/6.jpg","title":"Brooklyn D76 Glasses","slug":"Brooklyn-D76-Glasses","price":"548.00","delPrice":"600.00","brand":"Tools","size":"Xl"},{"id":7,"proImg":"/images/product/4.jpg","title":"Electric Toothbrush","slug":"Toothbrush","price":"548.00","delPrice":"600.00","brand":"Tools","size":"Xl"}]'
        ),
        l = () => r;
    },
    2529: function (s, e, i) {
      "use strict";
      var r = i(5893);
      i(7294);
      var l = i(1664),
        a = i.n(l);
      let c = (s) =>
        (0, r.jsx)("div", {
          className: "wpo-breadcumb-area",
          children: (0, r.jsx)("div", {
            className: "container",
            children: (0, r.jsx)("div", {
              className: "row",
              children: (0, r.jsx)("div", {
                className: "col-12",
                children: (0, r.jsxs)("div", {
                  className: "wpo-breadcumb-wrap",
                  children: [
                    (0, r.jsx)("h2", { children: s.pageTitle }),
                    (0, r.jsxs)("ul", {
                      children: [
                        (0, r.jsx)("li", {
                          children: (0, r.jsx)(a(), {
                            href: "/home",
                            children: "Home",
                          }),
                        }),
                        (0, r.jsx)("li", { children: s.pagesub }),
                      ],
                    }),
                  ],
                }),
              }),
            }),
          }),
        });
      e.Z = c;
    },
    3346: function (s, e, i) {
      "use strict";
      i.r(e);
      var r = i(5893),
        l = i(7294),
        a = i(1163),
        c = i(2664),
        t = i(1171),
        d = i(2529),
        o = i(1935),
        n = i(2784),
        h = i(4223),
        u = i(4929),
        p = i(3131),
        g = i(4620),
        m = i(8668);
      let j = (s) => {
          let e = (0, a.useRouter)(),
            i = (0, u.Z)(),
            { addToCart: c } = s,
            n = i.filter((s) => s.slug === e.query.slug),
            [j, x] = (0, l.useState)(n);
          (0, l.useEffect)(() => {
            x(i.filter((s) => s.slug === e.query.slug));
          }, [i, e.query.slug]);
          let f = j[0];
          return (0, r.jsxs)(l.Fragment, {
            children: [
              (0, r.jsx)(t.Z, {
                hclass: "wpo-site-header wpo-site-header-s2",
                Logo: m.Z,
              }),
              (0, r.jsx)(d.Z, {
                pageTitle: "Shop Single",
                pagesub: "Shop Single",
              }),
              (0, r.jsx)("section", {
                className: "shop_single section-padding",
                children: (0, r.jsxs)("div", {
                  className: "container",
                  children: [
                    f ? (0, r.jsx)(h.default, { item: f, addToCart: c }) : null,
                    (0, r.jsx)(p.default, {}),
                  ],
                }),
              }),
              (0, r.jsx)(g.Z, { hclass: "wpo-site-footer_s2" }),
              (0, r.jsx)(o.Z, {}),
            ],
          });
        },
        x = (s) => ({ products: s.data.products });
      e.default = (0, c.$j)(x, { addToCart: n.Xq })(j);
    },
    4223: function (s, e, i) {
      "use strict";
      i.r(e);
      var r = i(5893);
      i(7294);
      var l = i(7282);
      i(8411);
      let a = (s) => {
        let { item: e, addToCart: i } = s;
        return (0, r.jsxs)("div", {
          className: "row",
          children: [
            (0, r.jsx)("div", {
              className: "col col-lg-5 col-12",
              children: (0, r.jsx)("div", {
                className: "shop-single-slider",
                children: (0, r.jsx)("div", {
                  className: "slider-nav",
                  children: (0, r.jsx)("div", {
                    children: (0, r.jsx)(l.Z, {
                      children: (0, r.jsx)("img", {
                        src: e.proImg ? e.proImg : "",
                        alt: "products",
                      }),
                    }),
                  }),
                }),
              }),
            }),
            (0, r.jsx)("div", {
              className: "col col-lg-7 col-12",
              children: (0, r.jsxs)("div", {
                className: "product-details",
                children: [
                  (0, r.jsx)("h2", { children: e.title }),
                  (0, r.jsxs)("div", {
                    className: "product-rt",
                    children: [
                      (0, r.jsxs)("div", {
                        className: "rating",
                        children: [
                          (0, r.jsx)("i", { className: "fa fa-star" }),
                          (0, r.jsx)("i", { className: "fa fa-star" }),
                          (0, r.jsx)("i", { className: "fa fa-star" }),
                          (0, r.jsx)("i", { className: "fa fa-star" }),
                          (0, r.jsx)("i", { className: "fa fa-star-o" }),
                        ],
                      }),
                      (0, r.jsx)("span", { children: "(25 customer reviews)" }),
                    ],
                  }),
                  (0, r.jsxs)("div", {
                    className: "price",
                    children: [
                      (0, r.jsxs)("span", {
                        className: "current",
                        children: ["$", e.price],
                      }),
                      (0, r.jsxs)("span", {
                        className: "old",
                        children: ["$", e.delPrice],
                      }),
                    ],
                  }),
                  (0, r.jsx)("p", {
                    children:
                      "There are many variations of passages of Lorem Ipsum and available, but the majority have suffered alteration in somey form.",
                  }),
                  (0, r.jsxs)("ul", {
                    children: [
                      (0, r.jsx)("li", {
                        children:
                          "Going through the cites of the word in classNameical.",
                      }),
                      (0, r.jsx)("li", {
                        children: "There are many variations of passages.",
                      }),
                      (0, r.jsx)("li", {
                        children:
                          "Making it look like readable and spoken English.",
                      }),
                    ],
                  }),
                  (0, r.jsx)("div", {
                    className: "product-option",
                    children: (0, r.jsxs)("div", {
                      className: "product-row",
                      children: [
                        (0, r.jsx)("button", {
                          className: "theme-btn",
                          onClick: () => i(e),
                          children: "Add to cart",
                        }),
                        (0, r.jsx)("div", {}),
                      ],
                    }),
                  }),
                  (0, r.jsxs)("div", {
                    className: "tg-btm",
                    children: [
                      (0, r.jsxs)("p", {
                        children: [
                          (0, r.jsx)("span", { children: "Categories:" }),
                          " Medical",
                        ],
                      }),
                      (0, r.jsxs)("p", {
                        children: [
                          (0, r.jsx)("span", { children: "Tags:" }),
                          "Medical, Doctor",
                        ],
                      }),
                    ],
                  }),
                ],
              }),
            }),
          ],
        });
      };
      e.default = a;
    },
    1163: function (s, e, i) {
      s.exports = i(880);
    },
  },
  function (s) {
    s.O(
      0,
      [
        260, 1664, 1002, 5675, 8885, 6183, 8627, 5020, 66, 3131, 9774, 2888,
        179,
      ],
      function () {
        return s((s.s = 9970));
      }
    ),
      (_N_E = s.O());
  },
]);
