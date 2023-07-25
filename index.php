<!DOCTYPE html>
<html>
<head>
    <title>DEMO</title>
</head>
<body>
    <h1>DEMO</h1>
    <?php
    if (isset($_POST['ip'])) {
        $ip = $_POST['ip'];
        exec("ping -c 4 $ip", $output, $return_var);

        // Display the ping result
        echo "<pre>";
        foreach ($output as $line) {
            echo htmlspecialchars($line) . "<br>";
        }
        echo "</pre>";
    }
    ?>
    <form method="post">
        <label for="ip">Enter IP Address:</label>
        <input type="text" id="ip" name="ip" required>
        <button type="submit">Ping</button>
    </form>
</body>
</html>
