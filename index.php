<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "connection/connection.php";

$config = [
    'host' => 'localhost',
    'database' => 'medical_records',
    'user' => 'root',
    'password' => ''
];

$mysqlConnection = new mysqlConnection(
    $config['host'],
    $config['database'],
    $config['user'],
    $config['password'],
);

$connection = $mysqlConnection->getConnection();

$query = $connection->query("SELECT * FROM medical_records");

$products = $query->fetchAll();


// $delete = $connection->prepare("DELETE FROM medical_records WHERE ID=4");

// $delete->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
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
            <?php
            $no = 1;
            ?>
            <?php foreach ($products as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["Age"]; ?></td>
                    <td><?php echo $row["Gender"]; ?></td>
                    <td><?php echo $row["Height(cm)"]; ?></td>
                    <td><?php echo $row["Weight(kg)"]; ?></td>
                    <td><?php echo $row["Waist_Size(cm)"]; ?></td>
                    <td><?php echo $row["BMI_Score"]; ?></td>
                    <td><?php echo $row["BMI_Category"]; ?></td>
                    <td><?php echo $row["RFM_Score"]; ?></td>
                    <td><?php echo $row["RFM_Category"]; ?></td>
                    <td>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>