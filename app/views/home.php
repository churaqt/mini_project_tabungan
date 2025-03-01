<!DOCTYPE html>
<html>

<head>
    <title>Home - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <h1>Mini Tabungan</h1>
    <ul>
        <?php foreach ($savings as $saving): ?>
            <li>
                <?php echo $saving['amount'] . $saving['message']?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>