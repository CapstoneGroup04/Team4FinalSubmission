var today = moment(); // get today's date using Moment.js library
var firstDay = moment().startOf('month'); // get the first day of the current month
var lastDay = moment().endOf('month'); // get the last day of the current month

var calendar = document.getElementById('calendar');

// create a table element to hold the calendar
var table = document.createElement('table');

// create the header row with the days of the week
var headerRow = document.createElement('tr');
var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
for (var i = 0; i < 7; i++) {
  var headerCell = document.createElement('th');
  headerCell.textContent = daysOfWeek[i];
  headerRow.appendChild(headerCell);
}
table.appendChild(headerRow);

// create the calendar rows and cells
var row = document.createElement('tr');
for (var i = firstDay.day(); i > 0; i--) {
  var cell = document.createElement('td');
  cell.textContent = '';
  row.appendChild(cell);
}
for (var day = moment(firstDay); day <= lastDay; day.add(1, 'days')) {
  var cell = document.createElement('td');
  cell.textContent = day.date();
  row.appendChild(cell);
  if (day.day() === 6) {
    table.appendChild(row);
    row = document.createElement('tr');
  }
}
for (var i = lastDay.day(); i < 6; i++) {
  var cell = document.createElement('td');
  cell.textContent = '';
  row.appendChild(cell);
}
table.appendChild(row);

calendar.appendChild(table);

//adding event listeners
// Get all date elements from the calendar
var dates = document.querySelectorAll("#calendar .date");

// Add a click event listener to each date element
dates.forEach(function(date) {
  date.addEventListener("click", function() {
    // This function will be called when the user clicks on a date
    console.log("Clicked on date:", date.textContent);
  });
});
