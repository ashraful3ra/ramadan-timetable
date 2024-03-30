<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramadan Timetable</title>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Hind Siliguri', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        h2 {
            text-align: center;
            color: #005A4A;
            margin-bottom: 30px;
            font-size: 1.5em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto; /* Horizontal scrolling on small screens */
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #000000;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .countdown {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #ad125b;
        }
        .countdown p {
            margin: 10px 0;
        }
        .current-date {
            font-weight: bold;
            color: blue;
        }
        @media (max-width: 600px) {
            table {
                overflow-x: scroll;
            }
            td:before {
                top: 0;
                left: 0;
                width: 100%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: 600;
            }
        }
        /* Add new CSS for the copyright notice */
        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            color: #777;
        }
    </style>
</head>
<body>
    <h2>পবিত্র মাহে রমজান -  ২০২৪</h2>
   <center><b><font color="BLUE"> <?php
    // Get current date
    $currentDate = date('d'); // Current date
    $currentMonth = date('F'); // Current month in English
    $currentYear = date('Y'); // Current year
    
    // Bangla month names
    $banglaMonthNames = array(
        'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
        'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
    );
    
    // Bangla equivalent of English month
    $currentBanglaMonth = $banglaMonthNames[date('n') - 1];
    
    // Display today's date in Bangla and English
    echo "আজ: " . $currentDate . " " . $currentBanglaMonth . " - " . $currentYear . "<br>";
    ?></b></font></center>

    <div class="countdown">
        <p id="iftar_countdown">Iftar Time Left: calculating...</p>
        <p id="sehri_countdown">Sehri Time Left: calculating...</p>
    </div>

    <div class="responsive-table">
        <table>
            <thead>
            <tr>
                <th>রমজান</th>
                <th>তারিখ</th>
                <th>বার</th>
                <th>সেহরির শেষ সময়</th>
                <th>ইফতার</th>
            </tr>
            </thead>
            <?php
            // Connect to your database (replace with your database credentials)
            $servername = "localhost";
            $username = "mrashraf_time";
            $password = "48Z2?rNNJHM*";
            $dbname = "mrashraf_time";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from the database
            $sql = "SELECT * FROM ramadan_forms";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tbody>";
                    echo "<tr";
                    // Check if the date matches the current date
                    if ($row["date"] == date('Y-m-d')) {
                        echo " class='current-date'";
                    }
                    echo ">";
                    // Convert the date to Bangla
                    $date_bangla = convertToBanglaDate($row["date"]);
                    echo "<td>" . convertToBanglaNumber($row["ramadan_no"]) . "</td>";
                    echo "<td>" . $date_bangla . "</td>";
                    // Convert the day to Bangla
                    $day_bangla = convertToBanglaDay($row["day"]);
                    echo "<td>" . $day_bangla . "</td>";
                    echo "<td>" . date("h:i A", strtotime($row["sehri_time"])) . "</td>";
                    echo "<td>" . date("h:i A", strtotime($row["iftar_time"])) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
                    echo "</tbody>";
                    echo "</div>";
            }
            $conn->close();

            // Function to convert numbers to Bangla
            function convertToBanglaNumber($number) {
                $bangla_number = str_replace(
                    ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                    ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                    $number
                );
                return $bangla_number;
            }

            // Function to convert date to Bangla
            function convertToBanglaDate($date) {
                $eng_number = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                $bang_number = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                $eng_month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                $bang_month = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                $date_bangla = str_replace($eng_number, $bang_number, date("j F, Y", strtotime($date)));
                $date_bangla = str_replace($eng_month, $bang_month, $date_bangla);
                return $date_bangla;
            }

            // Function to convert day to Bangla
            function convertToBanglaDay($day) {
                $eng_day = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $bang_day = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];

                $day_bangla = str_replace($eng_day, $bang_day, $day);
                return $day_bangla;
            }
            ?>
        </table>
    </div>
    
     <footer>
        &copy; 2024 DigiLearner. All Rights Reserved.
    </footer>

    <audio id="adhanAudio">
        <source src="adhan.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        // Function to update countdown timers
        function updateCountdown(sehriTime, iftarTime) {
            var now = new Date();
        
            // Convert fetched times to Date objects using a more robust method if necessary
            sehriTime = new Date(sehriTime);
            iftarTime = new Date(iftarTime);
        
            // Check if the date objects are valid
            if (isNaN(sehriTime.getTime()) || isNaN(iftarTime.getTime())) {
                console.error("Invalid sehri or iftar time");
                return; // Exit the function if times are invalid
            }
        
            // Calculate countdown durations
            var sehriCountdown = sehriTime - now;
            var iftarCountdown = iftarTime - now;

            // Calculate hours, minutes, and seconds for sehri countdown
            var sehriHours = Math.floor(sehriCountdown / (1000 * 60 * 60));
            var sehriMinutes = Math.floor((sehriCountdown % (1000 * 60 * 60)) / (1000 * 60));
            var sehriSeconds = Math.floor((sehriCountdown % (1000 * 60)) / 1000);

            // Calculate hours, minutes, and seconds for iftar countdown
            var iftarHours = Math.floor(iftarCountdown / (1000 * 60 * 60));
            var iftarMinutes = Math.floor((iftarCountdown % (1000 * 60 * 60)) / (1000 * 60));
            var iftarSeconds = Math.floor((iftarCountdown % (1000 * 60)) / 1000);

            // Update countdown elements with fetched times
            document.getElementById("sehri_countdown").innerHTML = "Sehri Time Left: " + sehriHours + " hr " + sehriMinutes + " min " + sehriSeconds + " sec";
            document.getElementById("iftar_countdown").innerHTML = "Iftar Time Left: " + iftarHours + " hr " + iftarMinutes + " min " + iftarSeconds + " sec";
        }

        // Fetch sehri and iftar times from the server
        function fetchTimes() {
            // Make an AJAX request to get sehri and iftar times
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parse JSON response
                        var response = JSON.parse(xhr.responseText);
                        if (response.sehri_time && response.iftar_time) {
                            // If sehri and iftar times are fetched successfully, update countdown
                            updateCountdown(response.sehri_time, response.iftar_time);
                        } else {
                            // If there's an error in fetching times
                            console.error(response.error);
                        }
                    } else {
                        console.error('Error fetching sehri and iftar times.');
                    }
                }
            };
            xhr.open("GET", "get_times.php", true);
            xhr.send();
        }

        // Update countdown every second
        setInterval(fetchTimes, 1000);

        // Initial fetch and update
        fetchTimes();
    </script>
</body>
</html>
