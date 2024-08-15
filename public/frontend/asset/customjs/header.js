// date.js

function updateDateTime() {
    // Get user's time zone
    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    // Create a new Date object
    const now = new Date();

    // Format date and time
    const optionsDate = { timeZone: timeZone, year: 'numeric', month: 'long', day: 'numeric' };
    const optionsTime = { timeZone: timeZone, hour: '2-digit', minute: '2-digit', second: '2-digit' };

    const dateFormatter = new Intl.DateTimeFormat('en-US', optionsDate);
    const timeFormatter = new Intl.DateTimeFormat('en-US', optionsTime);

    const date = dateFormatter.format(now);
    const time = timeFormatter.format(now);

    // Display the current date and time
    document.getElementById('current-date-time').textContent = `${date}, ${time}`;
}

// Update the date and time immediately and then every second
updateDateTime();
setInterval(updateDateTime, 1000);
