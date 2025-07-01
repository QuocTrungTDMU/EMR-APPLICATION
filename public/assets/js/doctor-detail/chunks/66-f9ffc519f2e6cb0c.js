"use strict";
(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [66],
  {
    2640: function (e, l) {
      l.Z = {
        src: "/_next/static/media/logo.18acd6f1.svg",
        height: 60,
        width: 223,
      };
    },
    1171: function (e, l, i) {
      i.d(l, {
        Z: function () {
          return v;
        },
      });
      var s = i(5893),
        c = i(7294),
        n = i(1664),
        r = i.n(n),
        a = i(8462),
        t = i(7922);
      let d = [
          {
            id: 1,
            title: "Home",
            link: "/home",
            submenu: [
              { id: 11, title: "Home style 1", link: "/home" },
              { id: 12, title: "Home style 2", link: "/home-2" },
              { id: 13, title: "Home style 3", link: "/home-3" },
            ],
          },
          { id: 88, title: "About", link: "/about" },
          {
            id: 3,
            title: "Pages",
            link: "/",
            submenu: [
              { id: 31, title: "Doctor", link: "/team" },
              {
                id: 32,
                title: "Doctor single",
                link: "/team-single/Marlene-Henry",
              },
              { id: 33, title: "Shop", link: "/shop" },
              { id: 34, title: "Shop Single", link: "/shop-single/Wheelchair" },
              { id: 35, title: "Cart", link: "/cart" },
              { id: 36, title: "Checkout", link: "/checkout" },
              { id: 37, title: "404 Error", link: "/404" },
              { id: 38, title: "Faq", link: "/faq" },
            ],
          },
          {
            id: 7,
            title: "Service",
            link: "#",
            submenu: [
              { id: 71, title: "Services", link: "/services" },
              {
                id: 74,
                title: "Service Single",
                link: "/service-single/Dental-Care",
              },
            ],
          },
          {
            id: 44,
            title: "Portfolio",
            link: "/",
            submenu: [
              { id: 41, title: "Portfolio", link: "/project" },
              {
                id: 42,
                title: "Portfolio Single",
                link: "/project-single/Heart-Institure",
              },
            ],
          },
          {
            id: 5,
            title: "Blog",
            link: "/blog",
            submenu: [
              { id: 51, title: "Blog", link: "/blog" },
              {
                id: 52,
                title: "Blog Left sidebar",
                link: "/blog-left-sidebar",
              },
              { id: 53, title: "Blog full width", link: "/blog-fullwidth" },
              {
                id: 54,
                title: "Blog single",
                link: "/blog-single/Why-Industry-Are-A-Juicy-Target-For",
              },
              {
                id: 55,
                title: "Blog single Left sidebar",
                link: "/blog-single-left-sidebar/Why-Industry-Are-A-Juicy-Target-For",
              },
              {
                id: 56,
                title: "Blog single Left sidebar",
                link: "/blog-single-fullwidth/Why-Industry-Are-A-Juicy-Target-For",
              },
            ],
          },
          { id: 88, title: "Contact", link: "/contact" },
        ],
        o = () => {
          let [e, l] = (0, c.useState)(0),
            [i, n] = (0, c.useState)(!1),
            o = () => {
              window.scrollTo(10, 0);
            };
          return (0, s.jsxs)("div", {
            children: [
              (0, s.jsxs)("div", {
                className: "mobileMenu ".concat(i ? "show" : ""),
                children: [
                  (0, s.jsx)("div", {
                    className: "menu-close",
                    children: (0, s.jsx)("div", {
                      className: "clox",
                      onClick: () => n(!i),
                      children: (0, s.jsx)("i", { className: "ti-close" }),
                    }),
                  }),
                  (0, s.jsx)("ul", {
                    className: "responsivemenu",
                    children: d.map((i, n) =>
                      (0, s.jsx)(
                        a.Z,
                        {
                          className: i.id === e ? "active" : null,
                          children: i.submenu
                            ? (0, s.jsxs)(c.Fragment, {
                                children: [
                                  (0, s.jsxs)("p", {
                                    onClick: () => l(i.id === e ? 0 : i.id),
                                    children: [
                                      i.title,
                                      (0, s.jsx)("i", {
                                        className:
                                          i.id === e
                                            ? "fa fa-angle-up"
                                            : "fa fa-angle-down",
                                      }),
                                    ],
                                  }),
                                  (0, s.jsx)(t.Z, {
                                    in: i.id === e,
                                    timeout: "auto",
                                    unmountOnExit: !0,
                                    children: (0, s.jsx)(a.Z, {
                                      className: "subMenu",
                                      children: (0, s.jsx)(c.Fragment, {
                                        children: i.submenu.map((e, l) =>
                                          (0, s.jsx)(
                                            a.Z,
                                            {
                                              children: (0, s.jsx)(r(), {
                                                onClick: o,
                                                className: "active",
                                                href: e.link,
                                                children: e.title,
                                              }),
                                            },
                                            l
                                          )
                                        ),
                                      }),
                                    }),
                                  }),
                                ],
                              })
                            : (0, s.jsx)(r(), {
                                className: "active",
                                href: i.link,
                                children: i.title,
                              }),
                        },
                        n
                      )
                    ),
                  }),
                ],
              }),
              (0, s.jsx)("div", {
                className: "showmenu mobail-menu",
                onClick: () => n(!i),
                children: (0, s.jsxs)("button", {
                  type: "button",
                  className: "navbar-toggler open-btn",
                  children: [
                    (0, s.jsx)("span", { className: "icon-bar first-angle" }),
                    (0, s.jsx)("span", { className: "icon-bar middle-angle" }),
                    (0, s.jsx)("span", { className: "icon-bar last-angle" }),
                  ],
                }),
              }),
            ],
          });
        };
      var h = i(558),
        x = i(2664),
        m = i(2784),
        j = i(5675),
        u = i.n(j);
      let g = (e) => {
          let [l, i] = (0, c.useState)(!1),
            [n, a] = (0, c.useState)(!1),
            t = (e) => {
              e.preventDefault();
            },
            d = () => {
              window.scrollTo(10, 0);
            },
            { carts: x } = e;
          return (0, s.jsx)("header", {
            id: "header",
            children: (0, s.jsx)("div", {
              className: "" + e.hclass,
              children: (0, s.jsx)("nav", {
                className: "navigation navbar navbar-expand-lg navbar-light",
                children: (0, s.jsx)("div", {
                  className: "container-fluid",
                  children: (0, s.jsxs)("div", {
                    className: "row align-items-center",
                    children: [
                      (0, s.jsx)("div", {
                        className: "col-lg-3 col-md-3 col-3 d-lg-none dl-block",
                        children: (0, s.jsx)(o, {}),
                      }),
                      (0, s.jsx)("div", {
                        className: "col-lg-2 col-md-6 col-6",
                        children: (0, s.jsx)("div", {
                          className: "navbar-header",
                          children: (0, s.jsx)(r(), {
                            onClick: d,
                            className: "navbar-brand",
                            href: "/home",
                            children: (0, s.jsx)(u(), {
                              src: e.Logo,
                              alt: "logo",
                            }),
                          }),
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col-lg-7 col-md-1 col-1",
                        children: (0, s.jsxs)("div", {
                          id: "navbar",
                          className:
                            "collapse navbar-collapse navigation-holder",
                          children: [
                            (0, s.jsx)("button", {
                              className: "menu-close",
                              children: (0, s.jsx)("i", {
                                className: "ti-close",
                              }),
                            }),
                            (0, s.jsxs)("ul", {
                              className: "nav navbar-nav mb-2 mb-lg-0",
                              children: [
                                (0, s.jsxs)("li", {
                                  className: "menu-item-has-children",
                                  children: [
                                    (0, s.jsx)(r(), {
                                      onClick: d,
                                      href: "#",
                                      children: "Home",
                                    }),
                                    (0, s.jsxs)("ul", {
                                      className: "sub-menu",
                                      children: [
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/home",
                                            children: "Home style 1",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/home-2",
                                            children: "Home style 2",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/home-3",
                                            children: "Home style 3",
                                          }),
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(r(), {
                                    onClick: d,
                                    href: "/about",
                                    children: "About",
                                  }),
                                }),
                                (0, s.jsxs)("li", {
                                  className: "menu-item-has-children",
                                  children: [
                                    (0, s.jsx)(r(), {
                                      onClick: d,
                                      href: "#",
                                      children: "Pages",
                                    }),
                                    (0, s.jsxs)("ul", {
                                      className: "sub-menu",
                                      children: [
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/team",
                                            children: "Doctor",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/team-single/Marlene-Henry",
                                            children: "Doctor Single",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/shop",
                                            children: "Shop",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/shop-single/Wheelchair",
                                            children: "Shop Single",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/cart",
                                            children: "Cart",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/checkout",
                                            children: "Checkout",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/404",
                                            children: "404 Error",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/faq",
                                            children: "FAQ",
                                          }),
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("li", {
                                  className: "menu-item-has-children",
                                  children: [
                                    (0, s.jsx)(r(), {
                                      onClick: d,
                                      href: "/services",
                                      children: "Services",
                                    }),
                                    (0, s.jsxs)("ul", {
                                      className: "sub-menu",
                                      children: [
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/services",
                                            children: "Services",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/service-single/Dental-Care",
                                            children: "Services Single",
                                          }),
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("li", {
                                  className: "menu-item-has-children",
                                  children: [
                                    (0, s.jsx)(r(), {
                                      onClick: d,
                                      href: "/project",
                                      children: "Portfolio",
                                    }),
                                    (0, s.jsxs)("ul", {
                                      className: "sub-menu",
                                      children: [
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/project",
                                            children: "Portfolio",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/project-single/Heart-Institure",
                                            children: "Portfolio Single",
                                          }),
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("li", {
                                  className: "menu-item-has-children",
                                  children: [
                                    (0, s.jsx)(r(), {
                                      onClick: d,
                                      href: "#",
                                      children: "Blog",
                                    }),
                                    (0, s.jsxs)("ul", {
                                      className: "sub-menu",
                                      children: [
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/blog",
                                            children: "Blog right sidebar",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/blog-left-sidebar",
                                            children: "Blog left sidebar",
                                          }),
                                        }),
                                        (0, s.jsx)("li", {
                                          children: (0, s.jsx)(r(), {
                                            onClick: d,
                                            href: "/blog-fullwidth",
                                            children: "Blog fullwidth",
                                          }),
                                        }),
                                        (0, s.jsxs)("li", {
                                          className: "menu-item-has-children",
                                          children: [
                                            (0, s.jsx)(r(), {
                                              onClick: d,
                                              href: "#",
                                              children: "Blog details",
                                            }),
                                            (0, s.jsxs)("ul", {
                                              className: "sub-menu",
                                              children: [
                                                (0, s.jsx)("li", {
                                                  children: (0, s.jsx)(r(), {
                                                    onClick: d,
                                                    href: "/blog-single/Why-Industry-Are-A-Juicy-Target-For",
                                                    children:
                                                      "Blog details right sidebar",
                                                  }),
                                                }),
                                                (0, s.jsx)("li", {
                                                  children: (0, s.jsx)(r(), {
                                                    onClick: d,
                                                    href: "/blog-single-left-sidebar/Why-Industry-Are-A-Juicy-Target-For",
                                                    children:
                                                      "Blog details left sidebar",
                                                  }),
                                                }),
                                                (0, s.jsx)("li", {
                                                  children: (0, s.jsx)(r(), {
                                                    onClick: d,
                                                    href: "/blog-single-fullwidth/Why-Industry-Are-A-Juicy-Target-For",
                                                    children:
                                                      "Blog details fullwidth",
                                                  }),
                                                }),
                                              ],
                                            }),
                                          ],
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(r(), {
                                    onClick: d,
                                    href: "/contact",
                                    children: "Contact",
                                  }),
                                }),
                              ],
                            }),
                          ],
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col-lg-3 col-md-2 col-2",
                        children: (0, s.jsxs)("div", {
                          className: "header-right",
                          children: [
                            (0, s.jsxs)("div", {
                              className: "mini-cart",
                              children: [
                                (0, s.jsxs)("button", {
                                  className: "cart-toggle-btn",
                                  onClick: () => a(!n),
                                  children: [
                                    " ",
                                    (0, s.jsx)("i", {
                                      className: "flaticon-shopping-bag",
                                    }),
                                    (0, s.jsx)("span", {
                                      className: "cart-count",
                                      children: x.length,
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("div", {
                                  className: "mini-cart-content ".concat(
                                    n ? "mini-cart-content-toggle" : ""
                                  ),
                                  children: [
                                    (0, s.jsx)("button", {
                                      className: "mini-cart-close",
                                      onClick: () => a(!n),
                                      children: (0, s.jsx)("i", {
                                        className: "ti-close",
                                      }),
                                    }),
                                    (0, s.jsx)("div", {
                                      className: "mini-cart-items",
                                      children:
                                        x &&
                                        x.length > 0 &&
                                        x.map((l, i) =>
                                          (0, s.jsxs)(
                                            "div",
                                            {
                                              className:
                                                "mini-cart-item clearfix",
                                              children: [
                                                (0, s.jsx)("div", {
                                                  className:
                                                    "mini-cart-item-image",
                                                  children: (0, s.jsx)("span", {
                                                    children: (0, s.jsx)(
                                                      "img",
                                                      {
                                                        src: l.proImg,
                                                        alt: "icon",
                                                      }
                                                    ),
                                                  }),
                                                }),
                                                (0, s.jsxs)("div", {
                                                  className:
                                                    "mini-cart-item-des",
                                                  children: [
                                                    (0, s.jsxs)("p", {
                                                      children: [l.title, " "],
                                                    }),
                                                    (0, s.jsxs)("span", {
                                                      className:
                                                        "mini-cart-item-price",
                                                      children: [
                                                        "$",
                                                        l.price,
                                                        " x ",
                                                        " ",
                                                        " ",
                                                        l.qty,
                                                      ],
                                                    }),
                                                    (0, s.jsxs)("span", {
                                                      className:
                                                        "mini-cart-item-quantity",
                                                      children: [
                                                        (0, s.jsx)("button", {
                                                          onClick: () =>
                                                            e.removeFromCart(
                                                              l.id
                                                            ),
                                                          className:
                                                            "btn btn-sm btn-danger",
                                                          children: (0, s.jsx)(
                                                            "i",
                                                            {
                                                              className:
                                                                "ti-close",
                                                            }
                                                          ),
                                                        }),
                                                        " ",
                                                      ],
                                                    }),
                                                  ],
                                                }),
                                              ],
                                            },
                                            i
                                          )
                                        ),
                                    }),
                                    (0, s.jsxs)("div", {
                                      className: "mini-cart-action clearfix",
                                      children: [
                                        (0, s.jsxs)("span", {
                                          className: "mini-checkout-price",
                                          children: [
                                            "Subtotal: ",
                                            (0, s.jsxs)("span", {
                                              children: [" $", (0, h.X_)(x)],
                                            }),
                                          ],
                                        }),
                                        (0, s.jsxs)("div", {
                                          className: "mini-btn",
                                          children: [
                                            (0, s.jsx)(r(), {
                                              href: "/checkout",
                                              className: "view-cart-btn s1",
                                              children: "Checkout",
                                            }),
                                            (0, s.jsx)(r(), {
                                              href: "/cart",
                                              className: "view-cart-btn",
                                              children: "View Cart",
                                            }),
                                          ],
                                        }),
                                      ],
                                    }),
                                  ],
                                }),
                              ],
                            }),
                            (0, s.jsx)("div", {
                              className: "header-search-form-wrapper",
                              children: (0, s.jsxs)("div", {
                                className: "cart-search-contact",
                                children: [
                                  (0, s.jsx)("button", {
                                    onClick: () => i(!l),
                                    className: "search-toggle-btn",
                                    children: (0, s.jsx)("i", {
                                      className: "fi ".concat(
                                        l ? "ti-close" : "flaticon-search"
                                      ),
                                    }),
                                  }),
                                  (0, s.jsx)("div", {
                                    className: "header-search-form ".concat(
                                      l ? "header-search-content-toggle" : ""
                                    ),
                                    children: (0, s.jsx)("form", {
                                      onSubmit: t,
                                      children: (0, s.jsxs)("div", {
                                        children: [
                                          (0, s.jsx)("input", {
                                            type: "text",
                                            className: "form-control",
                                            placeholder: "Search here...",
                                          }),
                                          (0, s.jsx)("button", {
                                            type: "submit",
                                            children: (0, s.jsx)("i", {
                                              className: "fi flaticon-search",
                                            }),
                                          }),
                                        ],
                                      }),
                                    }),
                                  }),
                                ],
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
          });
        },
        f = (e) => ({ carts: e.cartList.cart });
      var k = (0, x.$j)(f, { removeFromCart: m.h2 })(g);
      function v(e) {
        let [l, i] = c.useState(0),
          n = () => i(document.documentElement.scrollTop);
        return (
          c.useEffect(
            () => (
              window.addEventListener("scroll", n),
              () => window.removeEventListener("scroll", n)
            ),
            []
          ),
          (0, s.jsx)("div", {
            className: l > 80 ? "fixed-navbar active" : "fixed-navbar",
            children: (0, s.jsx)(k, {
              hclass: e.hclass,
              Logo: e.Logo,
              topbarClass: e.topbarClass,
            }),
          })
        );
      }
    },
    4620: function (e, l, i) {
      var s = i(5893);
      i(7294);
      var c = i(1664),
        n = i.n(c),
        r = i(2640),
        a = i(5675),
        t = i.n(a);
      let d = () => {
          window.scrollTo(10, 0);
        },
        o = (e) =>
          (0, s.jsxs)("footer", {
            className: "" + e.hclass,
            children: [
              (0, s.jsx)("div", {
                className: "wpo-upper-footer",
                children: (0, s.jsx)("div", {
                  className: "container",
                  children: (0, s.jsxs)("div", {
                    className: "row",
                    children: [
                      (0, s.jsx)("div", {
                        className: "col col-lg-3 col-md-6 col-sm-12 col-12",
                        children: (0, s.jsxs)("div", {
                          className: "widget about-widget",
                          children: [
                            (0, s.jsx)("div", {
                              className: "logo widget-title",
                              children: (0, s.jsx)(t(), {
                                src: r.Z,
                                alt: "blog",
                              }),
                            }),
                            (0, s.jsx)("p", {
                              children:
                                "Mattis inelit neque quis donec eleifnd amet. Amet sed et cursus eu euismod. Egestas in morbi tristique.",
                            }),
                            (0, s.jsx)("div", {
                              className: "social-widget",
                              children: (0, s.jsxs)("ul", {
                                children: [
                                  (0, s.jsx)("li", {
                                    children: (0, s.jsx)(n(), {
                                      onClick: d,
                                      href: "#",
                                      children: (0, s.jsx)("i", {
                                        className:
                                          "flaticon-facebook-app-symbol",
                                      }),
                                    }),
                                  }),
                                  (0, s.jsx)("li", {
                                    children: (0, s.jsx)(n(), {
                                      onClick: d,
                                      href: "#",
                                      children: (0, s.jsx)("i", {
                                        className: "flaticon-twitter",
                                      }),
                                    }),
                                  }),
                                  (0, s.jsx)("li", {
                                    children: (0, s.jsx)(n(), {
                                      onClick: d,
                                      href: "#",
                                      children: (0, s.jsx)("i", {
                                        className: "flaticon-linkedin",
                                      }),
                                    }),
                                  }),
                                  (0, s.jsx)("li", {
                                    children: (0, s.jsx)(n(), {
                                      onClick: d,
                                      href: "#",
                                      children: (0, s.jsx)("i", {
                                        className: "flaticon-instagram",
                                      }),
                                    }),
                                  }),
                                ],
                              }),
                            }),
                          ],
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col col-lg-3 col-md-6 col-sm-12 col-12",
                        children: (0, s.jsxs)("div", {
                          className: "widget link-widget",
                          children: [
                            (0, s.jsx)("div", {
                              className: "widget-title",
                              children: (0, s.jsx)("h3", {
                                children: "Quick Links",
                              }),
                            }),
                            (0, s.jsxs)("ul", {
                              children: [
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/home",
                                    children: "Home",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/about",
                                    children: "About Us",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/services",
                                    children: "Services",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/blog",
                                    children: "Latest News",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/doctor",
                                    children: "Team",
                                  }),
                                }),
                              ],
                            }),
                          ],
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col col-lg-3 col-md-6 col-sm-12 col-12",
                        children: (0, s.jsxs)("div", {
                          className: "widget link-widget s2",
                          children: [
                            (0, s.jsx)("div", {
                              className: "widget-title",
                              children: (0, s.jsx)("h3", {
                                children: "Useful Links",
                              }),
                            }),
                            (0, s.jsxs)("ul", {
                              children: [
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/project",
                                    children: "Projects",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/shop",
                                    children: "Shop",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/cart",
                                    children: "Cart",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/contact",
                                    children: "Contact us",
                                  }),
                                }),
                                (0, s.jsx)("li", {
                                  children: (0, s.jsx)(n(), {
                                    onClick: d,
                                    href: "/faq",
                                    children: "Faq",
                                  }),
                                }),
                              ],
                            }),
                          ],
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col col-lg-3 col-md-6 col-sm-12 col-12",
                        children: (0, s.jsxs)("div", {
                          className: "widget contact-widget",
                          children: [
                            (0, s.jsx)("div", {
                              className: "widget-title",
                              children: (0, s.jsx)("h3", {
                                children: "Contact Us",
                              }),
                            }),
                            (0, s.jsxs)("ul", {
                              children: [
                                (0, s.jsxs)("li", {
                                  children: [
                                    (0, s.jsx)("i", {
                                      className: "flaticon-email",
                                    }),
                                    (0, s.jsx)("span", {
                                      children: "medically@gmail.com",
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("li", {
                                  children: [
                                    " ",
                                    (0, s.jsx)("i", {
                                      className: "flaticon-telephone",
                                    }),
                                    (0, s.jsxs)("span", {
                                      children: [
                                        "(704) 555-0127",
                                        (0, s.jsx)("br", {}),
                                        "(208) 555-0112",
                                      ],
                                    }),
                                  ],
                                }),
                                (0, s.jsxs)("li", {
                                  children: [
                                    (0, s.jsx)("i", {
                                      className: "flaticon-location-1",
                                    }),
                                    (0, s.jsxs)("span", {
                                      children: [
                                        "4517 Washington Ave. ",
                                        (0, s.jsx)("br", {}),
                                        "Manchter, Kentucky 495",
                                      ],
                                    }),
                                  ],
                                }),
                              ],
                            }),
                          ],
                        }),
                      }),
                    ],
                  }),
                }),
              }),
              (0, s.jsx)("div", {
                className: "wpo-lower-footer",
                children: (0, s.jsx)("div", {
                  className: "container",
                  children: (0, s.jsxs)("div", {
                    className: "row g-0",
                    children: [
                      (0, s.jsx)("div", {
                        className: "col col-lg-6 col-12",
                        children: (0, s.jsxs)("p", {
                          className: "copyright",
                          children: [
                            " Copyright \xa9 2025 Medically by ",
                            (0, s.jsx)(n(), {
                              onClick: d,
                              href: "/",
                              children: "wpOceans",
                            }),
                            ". All Rights Reserved.",
                          ],
                        }),
                      }),
                      (0, s.jsx)("div", {
                        className: "col col-lg-6 col-12",
                        children: (0, s.jsxs)("ul", {
                          children: [
                            (0, s.jsx)("li", {
                              children: (0, s.jsx)(n(), {
                                onClick: d,
                                href: "/privace",
                                children: "Privace & Policy",
                              }),
                            }),
                            (0, s.jsx)("li", {
                              children: (0, s.jsx)(n(), {
                                onClick: d,
                                href: "/terms",
                                children: "Terms",
                              }),
                            }),
                            (0, s.jsx)("li", {
                              children: (0, s.jsx)(n(), {
                                onClick: d,
                                href: "/about",
                                children: "About us",
                              }),
                            }),
                            (0, s.jsx)("li", {
                              children: (0, s.jsx)(n(), {
                                onClick: d,
                                href: "/faq",
                                children: "FAQ",
                              }),
                            }),
                          ],
                        }),
                      }),
                    ],
                  }),
                }),
              }),
            ],
          });
      l.Z = o;
    },
    1935: function (e, l, i) {
      var s = i(5893);
      i(7294);
      var c = i(4925),
        n = i.n(c);
      let r = () =>
        (0, s.jsx)("div", {
          className: "col-lg-12",
          children: (0, s.jsx)("div", {
            className: "header-menu",
            children: (0, s.jsx)("ul", {
              className: "smothscroll",
              children: (0, s.jsx)("li", {
                children: (0, s.jsx)(n(), {
                  href: "#__next",
                  children: (0, s.jsx)("i", { className: "ti-arrow-up" }),
                }),
              }),
            }),
          }),
        });
      l.Z = r;
    },
    2784: function (e, l, i) {
      i.d(l, {
        X1: function () {
          return t;
        },
        Xq: function () {
          return n;
        },
        g1: function () {
          return a;
        },
        h2: function () {
          return r;
        },
      });
      var s = i(8805),
        c = i(5678);
      i(9681);
      let n = (e, l, i, n) => (r) => {
          c.Am.success("Item Added to Cart"),
            r({ type: s.G2, product: e, qty: l, color: i, size: n });
        },
        r = (e) => (l) => {
          c.Am.success("Item Removed from Cart"),
            l({ type: s.OZ, product_id: e });
        },
        a = (e) => (l) => {
          l({ type: s.p_, product_id: e });
        },
        t = (e) => (l) => {
          l({ type: s.y2, product_id: e });
        };
    },
  },
]);
