<?php require 'app/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Script Recorder Weather Datas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Script Recorder Weather Datas <small>clientraw.txt</small></h1>
            </div>

            <?php
            if (isset($_GET['send_data']) == true) {
                include('script_generate_json.php');
                sleep(1);
                include('script_record_datas.php');
                $flashbag = Array('label' => 'success', 'flash' => 'Données bien enregistrées.');
            } else {
                $flashbag = Array('label' => 'warning', 'flash' => 'Aucunes données envoyées!');
            }
            ?>

            <div class="alert alert-<?= $flashbag['label']; ?>" role="alert"><?= $flashbag['flash']; ?></div>

            <div class="page-header">
                <h4>Informations</h4>
            </div>
            <?php
            if($db) {
                $MysqlConnect = 'Ok';
            } else {
                $MysqlConnect = 'Problème de connexion...';
            }
            $pdo = new PDOFactory($db);
            $data = $pdo->findLast();
            $datetime = $data['date'] . ' à ' . $data['time'];
            ?>
            <p>Connexion à la BDD :  <?= $MysqlConnect; ?></p>
            <p>Dernier enregistrement fait le : <?= $datetime; ?></p>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>

