"use strict";
(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
  [3939],
  {
    1651: function (e, s, l) {
      l.d(s, {
        Z: function () {
          return r;
        },
      });
      var c = l(5893),
        a = l(7294);
      let i = () => {
          let [e, s] = (0, a.useState)({
              name: "",
              email: "",
              department: "",
              doctor: "",
            }),
            [l, i] = (0, a.useState)({}),
            [n, r] = (0, a.useState)(!1),
            [t, o] = (0, a.useState)(!1),
            [d, m] = (0, a.useState)(null),
            j = (e) => {
              let { name: l, value: c } = e.target;
              s((e) => ({ ...e, [l]: c })), h({ [l]: c });
            },
            h = function () {
              let s =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : e,
                c = { ...l };
              if (
                ("name" in s && (c.name = s.name ? "" : "Name is required"),
                "email" in s &&
                  ((c.email = s.email ? "" : "Email is required"),
                  s.email &&
                    (c.email = /\S+@\S+\.\S+/.test(s.email)
                      ? ""
                      : "Email address is invalid")),
                "department" in s &&
                  (c.department = s.department ? "" : "Department is required"),
                "doctor" in s &&
                  (c.doctor = s.doctor ? "" : "Doctor is required"),
                i(c),
                s === e)
              )
                return Object.values(c).every((e) => "" === e);
            },
            x = (e) => {
              e.preventDefault(),
                r(!1),
                m(null),
                h() &&
                  (o(!0),
                  setTimeout(() => {
                    Math.random() > 0.5
                      ? (r(!0), o(!1), u())
                      : (m("Submission failed. Please try again."), o(!1));
                  }, 2e3));
            },
            u = () => {
              s({ name: "", email: "", department: "", doctor: "" }),
                i({}),
                r(!1),
                m(null);
            };
          return (0, c.jsx)("form", {
            onSubmit: x,
            children: (0, c.jsxs)("div", {
              className: "wrapper",
              children: [
                (0, c.jsxs)("div", {
                  className: "form_item",
                  children: [
                    (0, c.jsx)("label", { children: "Your Name" }),
                    (0, c.jsx)("input", {
                      type: "text",
                      name: "name",
                      placeholder: "Name",
                      className: "form_control",
                      value: e.name,
                      onChange: j,
                      onBlur: () => h({ name: e.name }),
                    }),
                    l.name &&
                      (0, c.jsx)("p", { className: "error", children: l.name }),
                  ],
                }),
                (0, c.jsxs)("div", {
                  className: "form_item",
                  children: [
                    (0, c.jsx)("label", { children: "Your Email" }),
                    (0, c.jsx)("input", {
                      type: "email",
                      name: "email",
                      placeholder: "Email",
                      className: "form_control",
                      value: e.email,
                      onChange: j,
                      onBlur: () => h({ email: e.email }),
                    }),
                    l.email &&
                      (0, c.jsx)("p", {
                        className: "error",
                        children: l.email,
                      }),
                  ],
                }),
                (0, c.jsxs)("div", {
                  className: "form_item",
                  children: [
                    (0, c.jsx)("label", { children: "Select Department" }),
                    (0, c.jsxs)("select", {
                      name: "department",
                      className: "form_control",
                      value: e.department,
                      onChange: j,
                      onBlur: () => h({ department: e.department }),
                      children: [
                        (0, c.jsx)("option", {
                          value: "",
                          children: "Department",
                        }),
                        (0, c.jsx)("option", {
                          value: "subject1",
                          children: "Subject 1",
                        }),
                        (0, c.jsx)("option", {
                          value: "subject2",
                          children: "Subject 2",
                        }),
                        (0, c.jsx)("option", {
                          value: "subject3",
                          children: "Subject 3",
                        }),
                      ],
                    }),
                    l.department &&
                      (0, c.jsx)("p", {
                        className: "error",
                        children: l.department,
                      }),
                  ],
                }),
                (0, c.jsxs)("div", {
                  className: "form_item",
                  children: [
                    (0, c.jsx)("label", { children: "Choose Doctor" }),
                    (0, c.jsxs)("select", {
                      name: "doctor",
                      className: "form_control",
                      value: e.doctor,
                      onChange: j,
                      onBlur: () => h({ doctor: e.doctor }),
                      children: [
                        (0, c.jsx)("option", { value: "", children: "Doctor" }),
                        (0, c.jsx)("option", {
                          value: "subject1",
                          children: "Subject 1",
                        }),
                        (0, c.jsx)("option", {
                          value: "subject2",
                          children: "Subject 2",
                        }),
                        (0, c.jsx)("option", {
                          value: "subject3",
                          children: "Subject 3",
                        }),
                      ],
                    }),
                    l.doctor &&
                      (0, c.jsx)("p", {
                        className: "error",
                        children: l.doctor,
                      }),
                  ],
                }),
                (0, c.jsx)("div", {
                  className: "form_item",
                  children: (0, c.jsx)("input", {
                    className: "form_btn",
                    type: "submit",
                    value: "Send",
                    disabled: t,
                  }),
                }),
                t &&
                  (0, c.jsx)("div", {
                    className: "loading_message",
                    children: "Submitting...",
                  }),
                n &&
                  (0, c.jsx)("div", {
                    className: "success_message",
                    children: "Form submitted successfully!",
                  }),
                d &&
                  (0, c.jsx)("div", {
                    className: "error_message",
                    children: d,
                  }),
              ],
            }),
          });
        },
        n = (e) =>
          (0, c.jsxs)("section", {
            className: "" + e.hclass,
            children: [
              (0, c.jsx)("h1", { className: "d-none", children: "title" }),
              (0, c.jsx)("div", {
                className: "container",
                children: (0, c.jsx)(i, {}),
              }),
            ],
          });
      var r = n;
    },
    3694: function (e, s, l) {
      var c = l(5893);
      l(7294);
      var a = l(7857);
      let i = (e) =>
        (0, c.jsx)("section", {
          className: "" + e.hclass,
          children: (0, c.jsx)("div", {
            className: "container",
            children: (0, c.jsxs)("div", {
              className: "row",
              children: [
                (0, c.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, c.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, c.jsx)("i", { className: "flaticon-doctor" }),
                      (0, c.jsxs)("h3", {
                        children: [
                          (0, c.jsx)(a.ZP, { end: 250, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, c.jsx)("p", { children: "Qualified Doctors" }),
                    ],
                  }),
                }),
                (0, c.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, c.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, c.jsx)("i", { className: "flaticon-businesswoman" }),
                      (0, c.jsxs)("h3", {
                        children: [
                          (0, c.jsx)(a.ZP, { end: 3020, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, c.jsx)("p", { children: " Satisfied Clients" }),
                    ],
                  }),
                }),
                (0, c.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, c.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, c.jsx)("i", { className: "flaticon-award" }),
                      (0, c.jsxs)("h3", {
                        children: [
                          (0, c.jsx)(a.ZP, { end: 25, enableScrollSpy: !0 }),
                          "+",
                        ],
                      }),
                      (0, c.jsx)("p", { children: "Award Winning" }),
                    ],
                  }),
                }),
                (0, c.jsx)("div", {
                  className: "col col-lg-3 col-md-6 col-sm-6 col-12",
                  children: (0, c.jsxs)("div", {
                    className: "item",
                    children: [
                      (0, c.jsx)("i", { className: "flaticon-customer-care" }),
                      (0, c.jsxs)("h3", {
                        children: [
                          (0, c.jsx)(a.ZP, { end: 24, enableScrollSpy: !0 }),
                          "/",
                          (0, c.jsx)(a.ZP, { end: 7, enableScrollSpy: !0 }),
                        ],
                      }),
                      (0, c.jsx)("p", { children: "Client Support" }),
                    ],
                  }),
                }),
              ],
            }),
          }),
        });
      s.Z = i;
    },
    2654: function (e, s, l) {
      var c = l(5893),
        a = l(7294),
        i = l(1239);
      let n = () => {
        let [e, s] = (0, a.useState)(!1);
        return (0, c.jsxs)(a.Fragment, {
          children: [
            (0, c.jsx)(i.Z, {
              channel: "youtube",
              autoplay: !0,
              isOpen: e,
              videoId: "74DWwSxsVSs?si=qaPBPdX-wN9e8VH0",
              onClose: () => s(!1),
            }),
            (0, c.jsx)("div", {
              className: "video-btn",
              onClick: () => s(!0),
              children: (0, c.jsx)("i", { className: "flaticon-play" }),
            }),
          ],
        });
      };
      s.Z = n;
    },
    1224: function (e, s, l) {
      var c = l(5893);
      l(7294);
      var a = l(1664),
        i = l.n(a),
        n = l(5452),
        r = l(4176),
        t = l(5675),
        o = l.n(t);
      let d = () => {
          window.scrollTo(10, 0);
        },
        m = (e) => {
          let {
            hclass: s,
            ShowSectionTitle: l = !0,
            sliceStart: a = 0,
            sliceEnd: t = 3,
          } = e;
          return (0, c.jsx)("section", {
            className: s,
            children: (0, c.jsxs)("div", {
              className: "container",
              children: [
                l &&
                  (0, c.jsxs)("div", {
                    className: "row align-items-center",
                    children: [
                      (0, c.jsx)("div", {
                        className: "col-lg-6 col-12",
                        children: (0, c.jsx)(r.Z, {
                          title: "Our Portfolio",
                          subtitle: "All The Great Work That We Done",
                        }),
                      }),
                      (0, c.jsx)("div", {
                        className: "col-lg-6 col-12",
                        children: (0, c.jsx)("div", {
                          className: "project_btn",
                          children: (0, c.jsx)(i(), {
                            href: "/project",
                            className: "theme-btn",
                            children: "See All Cases ",
                          }),
                        }),
                      }),
                    ],
                  }),
                (0, c.jsx)("div", {
                  className: "project_wrapper",
                  children: (0, c.jsx)("div", {
                    className: "row",
                    children: n.Z.slice(a, t).map((e, s) =>
                      (0, c.jsx)(
                        "div",
                        {
                          className: "col-lg-4 col-md-6 col-12",
                          children: (0, c.jsxs)("div", {
                            className: "project_card",
                            children: [
                              (0, c.jsx)(o(), { src: e.pimg1, alt: "" }),
                              (0, c.jsxs)("div", {
                                className: "text",
                                children: [
                                  (0, c.jsx)("h2", {
                                    children: (0, c.jsx)(i(), {
                                      onClick: d,
                                      href: "/project-single/[slug]",
                                      as: "/project-single/".concat(e.slug),
                                      children: e.title,
                                    }),
                                  }),
                                  (0, c.jsx)("span", { children: e.subtitle }),
                                ],
                              }),
                            ],
                          }),
                        },
                        s
                      )
                    ),
                  }),
                }),
              ],
            }),
          });
        };
      s.Z = m;
    },
    8289: function (e, s, l) {
      var c = l(5893);
      l(7294);
      var a = l(1664),
        i = l.n(a),
        n = l(4176),
        r = l(4897);
      let t = (e) => {
        let s = () => {
            window.scrollTo(10, 0);
          },
          {
            hclass: l,
            sliceStart: a = 0,
            sliceEnd: t = 3,
            showSectionTitle: o = !0,
            AllServices: d = !0,
          } = e;
        return (0, c.jsx)("section", {
          className: l,
          children: (0, c.jsxs)("div", {
            className: "container",
            children: [
              o &&
                (0, c.jsx)("div", {
                  className: "row justify-content-center",
                  children: (0, c.jsx)("div", {
                    className: "col-lg-9 col-12",
                    children: (0, c.jsx)(n.Z, {
                      title: "Departmental Services",
                      subtitle: "Our Medical Services",
                    }),
                  }),
                }),
              (0, c.jsxs)("div", {
                className: "row",
                children: [
                  r.Z.slice(a, t).map((e, l) =>
                    (0, c.jsx)(
                      "div",
                      {
                        className: "col-lg-4 col-md-6 col-12",
                        children: (0, c.jsxs)("div", {
                          className: "service_card",
                          children: [
                            (0, c.jsx)("div", {
                              className: "icon",
                              children: (0, c.jsx)("i", { className: e.icon }),
                            }),
                            (0, c.jsxs)("div", {
                              className: "content",
                              children: [
                                (0, c.jsx)("h2", { children: e.title }),
                                (0, c.jsx)("p", { children: e.description }),
                                (0, c.jsx)(i(), {
                                  onClick: s,
                                  href: "/service-single/[slug]",
                                  as: "/service-single/".concat(e.slug),
                                  children: (0, c.jsx)("i", {
                                    className: "flaticon-right-arrow",
                                  }),
                                }),
                              ],
                            }),
                          ],
                        }),
                      },
                      l
                    )
                  ),
                  d &&
                    (0, c.jsx)("div", {
                      className: "col-12",
                      children: (0, c.jsx)("div", {
                        className: "btn",
                        children: (0, c.jsx)(i(), {
                          onClick: s,
                          href: "/services",
                          className: "theme-btn",
                          children: "See All Services",
                        }),
                      }),
                    }),
                ],
              }),
            ],
          }),
        });
      };
      s.Z = t;
    },
  },
]);
