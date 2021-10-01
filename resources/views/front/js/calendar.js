let calendar = document.querySelector(".calendar");
const month_names = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
(isLeapYear = (e) =>
  (e % 4 == 0 && e % 100 != 0 && e % 400 != 0) ||
  (e % 100 == 0 && e % 400 == 0)),
  (getFebDays = (e) => (isLeapYear(e) ? 29 : 28)),
  (generateCalendar = (e, r) => {
    let a = calendar.querySelector(".calendar-days"),
      t = calendar.querySelector("#year"),
      n = [31, getFebDays(r), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    a.innerHTML = "";
    let l = new Date();
    e || (e = l.getMonth()), r || (r = l.getFullYear());
    let c = `${month_names[e]}`;
    (month_picker.innerHTML = c), (t.innerHTML = r);
    let o = new Date(r, e, 1);
    for (let t = 0; t <= n[e] + o.getDay() - 1; t++) {
      let n = document.createElement("div");
      t >= o.getDay() &&
        (n.classList.add("calendar-day-hover"),
        (n.innerHTML = t - o.getDay() + 1),
        (n.innerHTML +=
          "<span></span>\n                            <span></span>\n                            <span></span>\n                            <span></span>"),
        t - o.getDay() + 1 === l.getDate() &&
          r === l.getFullYear() &&
          e === l.getMonth() &&
          n.classList.add("curr-date")),
        a.appendChild(n);
    }
  });
let month_list = calendar.querySelector(".month-list");
month_names.forEach((e, r) => {
  let a = document.createElement("div");
  (a.innerHTML = `<div data-month="${r}">${e}</div>`),
    (a.querySelector("div").onclick = () => {
      month_list.classList.remove("show"),
        (curr_month.value = r),
        generateCalendar(r, curr_year.value);
    }),
    month_list.appendChild(a);
});
let month_picker = calendar.querySelector("#month-picker");
month_picker.onclick = () => {
  month_list.classList.add("show");
};
let currDate = new Date(),
  curr_month = { value: currDate.getMonth() },
  curr_year = { value: currDate.getFullYear() };
generateCalendar(curr_month.value, curr_year.value),
  (document.querySelector("#prev-year").onclick = () => {
    --curr_year.value, generateCalendar(curr_month.value, curr_year.value);
  }),
  (document.querySelector("#next-year").onclick = () => {
    ++curr_year.value, generateCalendar(curr_month.value, curr_year.value);
  });
