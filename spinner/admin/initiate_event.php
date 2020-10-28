<?php

$event_name = $_POST['event_name'];
$total_clicks = $_POST['total_clicks'];
$winner_at_clicks = $_POST['winner_at_clicks'];
// find the winner no
// we are defining initial winner at the time of initializing the event
$selected_winners = [];
$total_prices = 0;
$prices_ids = [];
// $selected_winner = mt_rand(0, $total_clicks); // 400 : whoever cliks the 400th time will win
$current_click = 0;

// Create connection
$conn = new mysqli("localhost", "root", "", "random");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `events`(`eventname`, `total_clicks`, `current_clicks`, `winner_at_clicks`) VALUES ('".$event_name."','".$total_clicks."','".$current_click."', '".$winner_at_clicks."')";

if ($conn->query($sql) === TRUE) {

//     echo "<script>
// alert('Login Successfully');
// window.location.href='dashboard.php';
// </script>";

echo "<script>
alert('Event added successfully');
window.location.href='details.php';
</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// select event id
$event_id = 0;
$sql = "SELECT `id` FROM `events` WHERE `eventname` = '".$event_name."' AND `total_clicks` = '".$total_clicks."' AND `current_clicks` = '".$current_click."' AND `winner_at_clicks` = '".$winner_at_clicks."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $event_id = $row['id'];
    }
}

// get total price count
$sql = "SELECT `id` FROM `prices`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($prices_ids, $row['id']);
    }
}

for ($i=0; $i < $total_clicks/$winner_at_clicks; $i++) {
    if( $i == 0 )
        array_push($selected_winners, mt_rand( $winner_at_clicks * $i, $winner_at_clicks * ($i + 1) ));
    else
        array_push($selected_winners, mt_rand( ($winner_at_clicks * $i)+1, $winner_at_clicks * ($i + 1) ));
}


for ($i=0; $i < $total_clicks/$winner_at_clicks; $i++) {
    $sql = "INSERT INTO `event_winners`(`event_id`, `user_id`, `winning_click`, `price_id`) VALUES ('".$event_id."','','".$selected_winners[$i]."', '".$prices_ids[ $i % count($prices_ids) ]."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
