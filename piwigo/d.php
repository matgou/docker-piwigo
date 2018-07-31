<?php
$conf = array();
include 'local/config/database.inc.php';
$img=preg_replace('/^.*galleries./', '', $_GET['img']);


// Create connection
$conn = new mysqli($conf['db_host'], $conf['db_user'], $conf['db_password'], $conf['db_base']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT swift_filename, swift_container FROM swift_file WHERE swift_filename LIKE '%$img%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $img = $row['swift_container'] . '/' . $row['swift_filename'];
    }

    $url = 'https://storage.sbg1.cloud.ovh.net/v1/AUTH_34b2151d63db4378b29ece310835e6c2/' . $img;
    header('Location: ' . $url);
} else {
    echo "0 results";
}
$conn->close();


// OR: header('Location: http://www.yoursite.com/home-page.html', true, 302);
exit;

 ?>
