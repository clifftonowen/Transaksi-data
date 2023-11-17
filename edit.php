<?php
require_once("connection/config.php");

$data = new Config();
$id = $_GET['id'];
$data->setId($id);

if (isset($_POST['edit'])) {
    $data->setName($_POST['name']);
    $data->setAge($_POST['age']);
    $data->setGender($_POST['gender']);
    $data->setHeight($_POST['height']);
    $data->setWeight($_POST['weight']);
    $data->setWaistSize($_POST['waist_size']);

    $data->update();

    echo "<script>alert('Data has been saved!');
        document.location='index.php' </script>
        ";
}

$record = $data->fetchOne();

$val = $record[0];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Input New Data</h1>

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $val['name']; ?>">
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="<?= $val['age']; ?>">
        <br>
        
        <label>Select Gender</label>
        <br>
        <input type="radio" name="gender" id="male" value="male" <?= $val['gender'] === 'male' ? 'checked' : '' ?>>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="female" <?= $val['gender'] === 'female' ? 'checked' : '' ?>>
        <label for="female">Female</label>
        <br>

        <label for="height">Height (cm)</label>
        <input type="number" name="height" id="height" value="<?= $val['height']; ?>">
        <br>

        <label for="weight">Weight (kg)</label>
        <input type="number" name="weight" id="weight" value="<?= $val['weight']; ?>">
        <br>

        <label for="waist_size">Waist Size (cm)</label>
        <input type="number" name="waist_size" id="waist_size" value="<?= $val['waist_size']; ?>">
        <br>

        <button type="submit" name="edit">Update</button>
    </form>
</body>
</html>