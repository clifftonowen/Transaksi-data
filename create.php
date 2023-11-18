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

    <?php include "layout/header.php"; ?>

<div class="container">
    <h1>Input New Data</h1>

    <form action="" method="post">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="mb-3">
        <br>
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" id="age" min="0" class="form-control">
        <br>
    </div>
        
    <div class="mb-3">
    <label>Select Gender</label>
    <br>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="male" id="male">
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
        <label class="form-check-label" for="female">
            Female
        </label>
        </div>
    </div>
        
     

    <div class="mb-3">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" name="height" id="height" min="0" class="form-control">
        <br>
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" name="weight" id="weight" min="0" class="form-control">
        <br>
    </div>

    <div class="mb-3">
        <label for="waist_size" class="form-label">Waist Size (cm)</label>
        <input type="number" name="waist_size" id="waist_size" min="0" class="form-control">
        <br>
    </div>

        <button type="submit" name="save" class="btn btn-success">Save</button>

    
    </form>
    </div>
    <?php include "layout/footer.php"; ?>