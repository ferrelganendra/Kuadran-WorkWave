<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Recommendation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Job Trend Recommendation</h1>
    <form action="groq.php" method="post">
        <label for="category">Choose Category:</label>
        <select name="category" id="category" required>
            <option value="IT">IT</option>
            <option value="Marketing">Marketing</option>
            <option value="Finance">Finance</option>
            <option value="Education">Education</option>
        </select>
        <br>
        <label for="datepicker">Choose Date:</label>
        <input type="date" id="datepicker" name="date" required>
        <br>
        <input type="submit" value="Lihat Rekomendasi">
    </form>
</body>
</html>
