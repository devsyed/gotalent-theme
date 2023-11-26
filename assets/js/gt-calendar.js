document.addEventListener("DOMContentLoaded", function () {
    const calendarContainer = document.getElementById("calendar");
    if(!calendarContainer) return;
    // Example of booked dates and disabled days (you can customize these arrays)
    const bookedDates = ["2023-09-10", "2023-09-15", "2023-09-25"];
    const disabledDays = calendarContainer.dataset.blockedDays; // Sunday and Saturday

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    function generateCalendar(month, year) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayOfMonth = new Date(year, month, 1);
        const startingDay = firstDayOfMonth.getDay();

        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const calendarHTML = `
            <div class="calendar">
                <div class="calendar-header">
                    <button id="prev-month-btn"><i class="fas fa-angle-left"></i></button>
                    <h2 id="current-month-year">${monthNames[month]} ${year}</h2>
                    <button id="next-month-btn"><i class="fas fa-angle-right"></i></button>
                </div>
                <div class="calendar-grid" id="calendar-grid">
                    ${generateCalendarGrid(startingDay, daysInMonth, month, year)}
                </div>
            </div>
        `;

        calendarContainer.innerHTML = calendarHTML;

        const prevMonthBtn = document.getElementById("prev-month-btn");
        const nextMonthBtn = document.getElementById("next-month-btn");

        prevMonthBtn.addEventListener("click", () => {
            if (currentMonth > 0) {
                currentMonth--;
                generateCalendar(currentMonth, currentYear);
            }
        });

        nextMonthBtn.addEventListener("click", () => {
            if (currentMonth < 11) {
                currentMonth++;
            } else {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        addClickEventListeners(month, year);
    }

    function generateCalendarGrid(startingDay, daysInMonth, month, year) {
        let dayCounter = 1;
        const numRows = Math.ceil((daysInMonth + startingDay) / 7); // Calculate the number of rows needed
        let calendarGridHTML = "<div class='calendar-day-header'>Sun</div><div class='calendar-day-header'>Mon</div><div class='calendar-day-header'>Tue</div><div class='calendar-day-header'>Wed</div><div class='calendar-day-header'>Thu</div><div class='calendar-day-header'>Fri</div><div class='calendar-day-header'>Sat</div>";
    
        for (let i = 0; i < numRows; i++) {
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < startingDay) {
                    calendarGridHTML += "<div class='calendar-day disabled'></div>";
                } else if (dayCounter <= daysInMonth) {
                    const currentDate = new Date(year, month, dayCounter);
                    const formattedDate = formatDate(currentDate);
    
                    if (disabledDays.includes(currentDate.getDay())) {
                        calendarGridHTML += `<div class='calendar-day disabled'>${dayCounter}</div>`;
                    } else if (bookedDates.includes(formattedDate)) {
                        calendarGridHTML += `<div class='calendar-day booked'>${dayCounter}</div>`;
                    } else {
                        calendarGridHTML += `<div class='calendar-day clickable' data-date='${formattedDate}'>${dayCounter}</div>`;
                    }
    
                    dayCounter++;
                } else {
                    calendarGridHTML += "<div class='calendar-day disabled'></div>";
                }
            }
        }
    
        return calendarGridHTML;
    }
    

    function addClickEventListeners(month, year) {
        const clickableDays = document.querySelectorAll(".clickable");
        clickableDays.forEach((day) => {
            day.addEventListener("click", () => {
                const clickedDate = new Date(year, month, parseInt(day.textContent));
                const formattedClickedDate = formatDate(clickedDate);
                alert(`Clicked on ${formattedClickedDate}`);
            });
        });
    }

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const day = String(date.getDate()).padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    generateCalendar(currentMonth, currentYear);
});
