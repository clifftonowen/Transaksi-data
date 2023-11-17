<?php

    if (isset($_POST['save'])) {
        require_once("connection/config.php");

        $sc = new Config();

        $sc->setName($_POST['name']);
        $sc->setAge($_POST['age']);
        $sc->setGender($_POST['gender']);
        $sc->setHeight($_POST['height']);
        $sc->setWeight($_POST['weight']);
        $sc->setWaistSize($_POST['waist_size']);

        $sc->insertData();

        echo "<script>alert('Data has been saved!'); document.location='index.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Input New Data</h1>

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <br>
        
        <label>Select Gender</label>
        <br>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <br>

        <label for="height">Height (cm)</label>
        <input type="number" name="height" id="height">
        <br>

        <label for="weight">Weight (kg)</label>
        <input type="number" name="weight" id="weight">
        <br>

        <label for="waist_size">Waist Size (cm)</label>
        <input type="number" name="waist_size" id="waist_size">
        <br>

        <button type="submit" name="save">Save</button>
    </form>
</body>
</html>