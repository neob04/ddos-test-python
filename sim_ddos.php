<?php
// Site de test local
session_start();

// Configuration
$log_file = 'access_logs.txt';
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Pour clear les logs
if (isset($_POST['clear_logs'])) {
    file_put_contents($log_file, '');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Log plus détaillé
$log_entry = sprintf(
    "[%s] IP: %s | UA: %s | URI: %s\n",
    $date,
    $ip,
    $user_agent,
    $_SERVER['REQUEST_URI']
);

file_put_contents($log_file, $log_entry, FILE_APPEND);

// Compter le nombre de requêtes
$total_requests = count(file($log_file));

// Simuler une petite charge
usleep(100000); // 100ms de délai
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Test Local</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        // Actualisation automatique toutes les 2 secondes
        setTimeout(function() {
            window.location.reload();
        }, 2000);
    </script>
</head>
<body>
    <div class="header">
        <h1>Terminal de Test - Simulation DDoS</h1>
    </div>

    <div class="stats-container">
        <div class="stats-box">
            <h2>Statistiques Système</h2>
            <ul class="stats-list">
                <li class="stats-item total-requests">Nombre total de requêtes : <?php echo $total_requests; ?></li>
                <li class="stats-item">IP : <?php echo htmlspecialchars($ip); ?></li>
                <li class="stats-item">Date : <?php echo htmlspecialchars($date); ?></li>
                <li class="stats-item">User Agent : <?php echo htmlspecialchars($user_agent); ?></li>
            </ul>
        </div>
        
        <div class="stats-box">
            <h3>Derniers Logs Systèmes</h3>
            <div class="logs-display">
                <?php
                $logs = file($log_file);
                $last_logs = array_slice($logs, -5);
                foreach ($last_logs as $log) {
                    echo htmlspecialchars($log) . "<br>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <form method="post">
        <button type="submit" name="clear_logs" class="reset-button">
            Réinitialiser les logs système
        </button>
    </form>
</body>
</html>
