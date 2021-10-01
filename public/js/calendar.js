const months = [
  "Tháng 1",
  "Tháng 2",
  "Tháng 3",
  "Tháng 4",
  "Tháng 5",
  "Tháng 6",
  "Tháng 7",
  "Tháng 8",
  "Tháng 9",
  "Tháng 10",
  "Tháng 11",
  "Tháng 12",
];

const weekdays = ["CN", "T2", "T3", "T4", "T5", "T6", "T7"];

// Váriavel principal
let date = new Date();

// Função que retorna a data atual do calendário
function getCurrentDate(element, asString) {
  if (element) {
    if (asString) {
      return (element.textContent =
        weekdays[date.getDay()] +
        ", " +
        date.getDate() +
        " de " +
        months[date.getMonth()] +
        " de " +
        date.getFullYear());
    }
    return (element.value = date.toISOString().substr(0, 10));
  }
  return date;
}
function generateCalendar() {
  // Pega um calendário e se já existir o remove
  const calendar = document.getElementById("calendar");
  if (calendar) {
    calendar.remove();
  }

  const table = document.createElement("table");
  table.id = "calendar";

  const trHeader = document.createElement("tr");
  trHeader.className = "weekends";
  weekdays.map((week) => {
    const th = document.createElement("th");
    const w = document.createTextNode(week.substring(0, 3));
    th.appendChild(w);
    trHeader.appendChild(th);
  });

  table.appendChild(trHeader);

  const weekDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();

  //Pega o ultimo dia do mês
  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  let tr = document.createElement("tr");
  let td = "";
  let empty = "";
  let btn = document.createElement("button");
  let week = 0;

  while (week < weekDay) {
    td = document.createElement("td");
    empty = document.createTextNode(" ");
    td.appendChild(empty);
    tr.appendChild(td);
    week++;
  }

  for (let i = 1; i <= lastDay; ) {
    while (week < 7) {
      td = document.createElement("td");
      let text = document.createTextNode(i);
      btn = document.createElement("button");
      btn.className = "btn-day";
      btn.addEventListener("click", function () {
        changeDate(this);
      });
      week++;

      if (i <= lastDay) {
        i++;
        btn.appendChild(text);
        td.appendChild(btn);
      } else {
        text = document.createTextNode(" ");
        td.appendChild(text);
      }
      tr.appendChild(td);
    }
    table.appendChild(tr);

    tr = document.createElement("tr");

    week = 0;
  }
  const content = document.getElementById("table");
  content.appendChild(table);
  changeActive();
  getCurrentDate(document.getElementById("currentDate"), true);
  getCurrentDate(document.getElementById("date"), false);
}

function setDate(form) {
  let newDate = new Date(form.date.value);
  date = new Date(
    newDate.getFullYear(),
    newDate.getMonth(),
    newDate.getDate() + 1
  );
  generateCalendar();
  return false;
}

function changeActive() {
  let btnList = document.querySelectorAll("button.active");
  btnList.forEach((btn) => {
    btn.classList.remove("active");
  });
  btnList = document.getElementsByClassName("btn-day");
  for (let i = 0; i < btnList.length; i++) {
    const btn = btnList[i];
    if (btn.textContent === date.getDate().toString()) {
      btn.classList.add("active");
    }
  }
}

document.onload = generateCalendar(date);
