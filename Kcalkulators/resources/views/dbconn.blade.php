<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel & MySQL DB Connection</title>
</head>
<body>
    <div>
        <?php
            if(DB::connection()->getPdo()){
                echo "Savienots ar datu bāzi - ".DB::connection()->getDatabaseName(); 
            }
        ?>
    </div>
</body>
</html>