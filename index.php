<?php include('sqlConnect.php'); ?>
<?php include('Parser.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parser weatherdata</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Parser weatherdata <small>clientraw.txt</small></h1>
            </div>
            
            <?php
            $parser = new Parser();
            $datas = $parser->getContent();
            foreach ($datas as $data) {
                echo $data."<br />";
            }
            if($db) {
                echo 'connexion ok';
            }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>

