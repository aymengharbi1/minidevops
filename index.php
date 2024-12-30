<?php
// Function to get the current year
function getCurrentYear() {
    return date('Y');
}

// Function to get the full current date and time
function getFullDate() {
    return date('Y-m-d H:i:s');
}

// Function to calculate the number of days between two dates
function daysBetweenDates($startDate, $endDate) {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = $start->diff($end);
    return $interval->days;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Date & Time Functions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .date-time-container {
            margin: 20px 0;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .date-time-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .date-time-container p {
            font-size: 18px;
            margin: 5px 0;
        }

        .calculator-container {
            margin-top: 30px;
            padding: 15px;
            background-color: #fff;
            width: 100%;
            max-width: 600px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .calculator-container input,
        .calculator-container button {
            padding: 10px;
            font-size: 16px;
            margin: 5px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

        .calculator-container input {
            width: 45%;
        }

        .calculator-container button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .calculator-container button:hover {
            background-color: #45a049;
        }

        footer {
            margin-top: 40px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }

        footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <header>
        <h1>Dynamic Date & Time Functions</h1>
        <p>PHP Functions for Date & Time Calculations</p>
    </header>

    <main>
        <div class="date-time-container">
            <h2>Current Year: <span id="current-year"><?php echo getCurrentYear(); ?></span></h2>
            <p>Full Current Date and Time: <span id="full-date"><?php echo getFullDate(); ?></span></p>
        </div>

        <div class="calculator-container">
            <h2>Days Between Two Dates</h2>
            <input type="date" id="start-date" />
            <input type="date" id="end-date" />
            <button id="calculate-days">Calculate Days</button>
            <p id="days-result"></p>
        </div>
    </main>

    <footer>
        <p>Created by <strong>AYMEN GHARBI</strong> and <strong>CHIFA BELHAJ</strong> - <span id="footer-year"><?php echo getCurrentYear(); ?></span></p>
    </footer>

    <script>
        // Get elements for the date calculator
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const calculateButton = document.getElementById('calculate-days');
        const daysResult = document.getElementById('days-result');

        // Function to calculate the number of days between two dates
        function calculateDaysBetween() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                daysResult.textContent = 'Please select valid start and end dates.';
                return;
            }

            const timeDifference = endDate - startDate;
            const daysDifference = timeDifference / (1000 * 3600 * 24);

            daysResult.textContent = `The number of days between the selected dates is: ${Math.abs(daysDifference)} days.`;
        }

        // Attach event listener to the button to calculate the days
        calculateButton.addEventListener('click', calculateDaysBetween);
    </script>

</body>

</html>
