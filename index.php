<?php

require_once("connection/config.php");
$data = new Config();

$records = $data->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI | RMF</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Body Mass Index (BMI) and Relative Fat Mass (RFM) Category Calculator</h1>

    <a href="create.php">Insert Data</a>

    <br><br>

    <table style="width:100%;">
        <thead>
            <tr>
               <th>No.</th>
               <th>Name</th>
               <th>Age</th>
               <th>Gender</th>
               <th>Height (cm)</th>
               <th>Weight (kg)</th>
               <th>Waist Size (cm)</th>
               <th>BMI Score</th>
               <th>BMI Category</th>
               <th>RFM Score</th>
               <th>RFM Category</th>
               <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($records as $record => $value) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["age"]; ?></td>
                    <td><?php echo $value["gender"]; ?></td>
                    <td><?php echo $value["height"]; ?></td>
                    <td><?php echo $value["weight"]; ?></td>
                    <td><?php echo $value["waist_size"]; ?></td>
                    <td><?php echo $value["bmi_score"]; ?></td>
                    <td><?php echo $value["bmi_category"]; ?></td>
                    <td><?php echo $value["rfm_score"]; ?></td>
                    <td><?php echo $value["rfm_category"]; ?></td>
                    <td>
                        <a href="#">Edit</a>
                        |
                        <a href="#">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>