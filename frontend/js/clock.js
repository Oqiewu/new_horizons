function updateClock() {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var seconds = now.getSeconds().toString().padStart(2, '0');

    var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    var dayOfWeek = days[now.getDay()];
    var dateString = now.toLocaleDateString();

    var timeString = `${hours}:${minutes}:${seconds} - ${dateString} - ${dayOfWeek}`;

    document.getElementById('clock').textContent = timeString;
}

setInterval(updateClock, 1000);

updateClock();
