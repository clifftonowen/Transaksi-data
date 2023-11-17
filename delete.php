<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('connection/config.php');

$record = new Config();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req'] == 'delete') {
        $record->setId($_GET['id']);
        $result = $record->delete();

        echo "
            <script>alert('Data has been deleted!');
            document.location='index.php'</script>
            ";
    }
}

?>