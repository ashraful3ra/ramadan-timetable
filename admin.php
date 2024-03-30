<!DOCTYPE html>
<html>
<head>
    <title>Ramadan Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #005A4A;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Ramadan Form</h2>
    <form action="submit.php" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br>

        <label for="day">Day:</label>
        <select id="day" name="day">
            <?php
            // Calculate the options for days (Saturday-Friday)
            $days = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            foreach ($days as $day) {
                echo "<option value='$day'>$day</option>";
            }
            ?>
        </select><br>

        <label for="sehri_time">Sehri Time:</label>
        <input type="time" id="sehri_time" name="sehri_time"><br>

        <label for="iftar_time">Iftar Time:</label>
        <input type="time" id="iftar_time" name="iftar_time"><br>

        <label for="ramadan_no">Ramadan No:</label>
        <select id="ramadan_no" name="ramadan_no">
            <?php
            // Generate dropdown options for Ramadan number
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
