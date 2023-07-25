<!DOCTYPE html>
<html>
<head>
    <title>DEMO</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
        $cookieValue = isset($_GET['cookie']) ? $_GET['cookie'] : null;
        if (!($cookieValue)) {
            $epochTime = time();
            $randomNumber = rand(100000, 999999);
            $cookieValue = $epochTime . $randomNumber;
        }
    ?>
</head>
<body>
    <div class="container">
        <h1 class="mt-3">DEMO</h1>
        <?php
        if (isset($_POST['ip'])) {
            $ip = $_POST['ip'];
            exec("ping -c 4 $ip", $output, $return_var);

            // Display the ping result
            echo '<div class="mt-4">';
            echo '<h3>Ping Result</h3>';
            echo '<pre>';
            foreach ($output as $line) {
                echo htmlspecialchars($line) . "<br>";
            }
            echo '</pre>';
            echo '</div>';
        }
        ?>
        <form class="mt-4" method="post">
            <div class="form-group">
                <label for="ip">Enter IP Address:</label>
                <input type="text" class="form-control" id="ip" name="ip" required>
            </div>
            <button type="submit" class="btn btn-primary">Ping</button>
            <input type="hidden" name="cookie" value="<?php echo $cookieValue ?>" />
        </form>
    </div>

    <!-- Bootstrap JS and jQuery (for some components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
