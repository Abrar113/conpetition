<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tournament_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

function clean_input($data) {
    global $conn;
    return htmlspecialchars($conn->real_escape_string($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clean_input($_POST['name']);
    $type = clean_input($_POST['type']);
    $password = isset($_POST['password']) ? clean_input($_POST['password']) : '';
    $members = [];

    if ($type === 'team') {
        $team_name = $name;
        for ($i = 1; $i <= 5; $i++) {
            if (!empty($_POST["member$i"])) {
                $members[] = clean_input($_POST["member$i"]);
            }
        }
        $members_string = implode(',', $members);
    }

    if (empty($name) || ($type === 'team' && count($members) < 1) || ($type === 'individual' && empty($password))) {
        echo "<div class='alert alert-danger'>Please fill out all required fields.</div>";
        echo "it is done";
    } else {
        if ($type === 'individual') {
            $sql = "INSERT INTO participants (name, type, password) VALUES ('$name', '$type', '$password')";
        } else {
            $sql = "INSERT INTO participants (name, type, members) VALUES ('$team_name', '$type', '$members_string')";
        }

        if ($conn->query($sql) === TRUE) {
           
            header("Location: home.html");
            exit;
        } else {
            // عرض رسالة خطأ إذا فشل الاستعلام
            echo "<div class='alert alert-danger'>Error during registration: " . $conn->error . "</div>";
            echo "<div>SQL Query: $sql</div>";
        }
    }        
}
?>

