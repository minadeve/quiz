<?php
//connect to dbiZZ full Tubee
$servername = "localhost";
$username = "rootSS";
$password = "";
$dbname = "blsp";
//open connection for doing somthings in code
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//check post method
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'save') {
    $soal = $_POST['soal'];
    $gozine1 = $_POST['gozine1'];
    $gozine2 = $_POST['g1'];
    $gozine3 = $_POST['g3'];
    $gozine4 = $_POST['gozine4'];
    $correctOption = $_POST['correctOption1'];
    echo $correctOption;
    $classi = $_POST['classi'];
    $sakhti = $_POST['sakhti'];

    $sql = "INSERT INTO soalat (soal, g1, g2, g3, g4, sahih, class, darajesakhti)
            VALUES ('$soal', '$gozine1', '$gozine2', '$gozine3', '$gozine4', '$correctOption', '$classi', '$sakhti')";

    if ($conn->query($sql) === TRUE) {
        echo "سوال ذخیره شود";
    } else {
        echo "error: " . $sql . "<br>" . $conn->error;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'random') {
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;

    $sql = "SELECT * FROM soalat ORDER BY RAND() LIMIT $limit";
    $result = $conn->query($sql);

    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }

    echo json_encode($questions);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'load') {
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM soalat LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }

    $countResult = $conn->query("SELECT COUNT(*) AS total FROM soalat");
    $total = $countResult->fetch_assoc()['total'];
    $total_pages = ceil($total / $limit);

    echo json_encode([
        "questions" => $questions,
        "total_pages" => $total_pages
    ]);
}
?>
