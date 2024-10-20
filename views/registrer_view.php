<!-- views/registrer_view.php -->
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer ny bruker</title>
    <link rel="stylesheet" href="../style/style.css">

    <style>
        body {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 150px;
            font-weight: bold;
            font-family: Arial, sans-serif;
            font-size: 1rem;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin: 5px;
        }

        input[type="text"] {
            display: block;
            padding: 5px;
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 20%;
            height: 25px;
            font-size: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php include '../templates/navbar.php'; ?>

<main>
<h2>Registrer ny bruker</h2>

<?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <h2 style="color: green;">Bruker registrert!</h2>
<?php endif; ?>

<form method="post" action="registrer.php">
    Navn: <input type="text" name="navn" value="<?php echo htmlspecialchars($navn ?? ''); ?>">
    <span style="color: red;"><?php echo $errors['navn'] ?? ''; ?></span>
    <br><br>

    Mobilnummer: <input type="text" name="mobil" value="<?php echo htmlspecialchars($mobil ?? ''); ?>">
    <span style="color: red;"><?php echo $errors['mobil'] ?? ''; ?></span>
    <br><br>

    E-post: <input type="text" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
    <span style="color: red;"><?php echo $errors['email'] ?? ''; ?></span>
    <br><br>

    <input type="submit" value="Registrer">
</form>
</main>
<?php include '../templates/footer.php'; ?>
</body>
</html>
