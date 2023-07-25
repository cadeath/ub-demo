<!DOCTYPE html>
<html>
<head>
    <title>DEMO</title>
    <?php
        $cookieValue = isset($_GET['cookie']) ? $_GET['cookie'] : null;
        if(!($cookieValue)) {
            $epochTime = time();
            $randomNumber = rand(100000, 999999);
            $cookieValue = $epochTime . $randomNumber;
        }
    ?>
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
        <input type="hidden" name="cookie" value="<?php echo $cookieValue ?>" />
    </form>
</body>
</html>
