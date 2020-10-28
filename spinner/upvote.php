<?php

session_start();

$eventName = '';

// Create connection
$conn = new mysqli("localhost", "root", "", "random");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// select event name 
$sql = "SELECT `eventname` FROM `events` ORDER BY `eventname` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $eventName = $row['eventname'];
    }
}

// upvote work


$sql9 = "SELECT `played` FROM `inquiry` WHERE `email` = '".$_SESSION['useremail']."'";
$result9 = $conn->query($sql9);

if($result9->num_rows > 0) {
    while($row9 = $result9->fetch_assoc()) {
        if($row9['played'] == 'No') {

            $sql = "SELECT `id`, `current_clicks` FROM `events` WHERE `eventname` = '".$eventName."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $current_click = $row['current_clicks'];
                    $selected_winners_clicks = [];
                    $selected_winners_prices = [];

                    $sql4 = "SELECT `winning_click`, `price_id` FROM `event_winners` WHERE `event_id` = '".$row['id']."'";
                    $result4 = $conn->query($sql4);

                    if( $result4->num_rows > 0 ) {
                        while($row4 = $result4->fetch_assoc()) {
                            array_push($selected_winners_clicks, $row4['winning_click']);

                            $sql5 = "SELECT `pricename` FROM `prices` WHERE `id` = '".$row4['price_id']."'";
                            $result5 = $conn->query($sql5);

                            if( $result5->num_rows > 0 ) {
                                while($row5 = $result5->fetch_assoc()) {
                                    array_push($selected_winners_prices, $row5['pricename']);
                                }
                            }        
                        }
                    } 

                    $current_click = $current_click + 1;

                    $sql2 = "UPDATE `events` SET `current_clicks`='".$current_click."' WHERE `eventname` = '".$eventName."'";

                    if ($conn->query($sql2) === TRUE) {
                        if ( in_array( $current_click-1, $selected_winners_clicks ) ) {

                            echo $selected_winners_prices[ array_search( $current_click-1, $selected_winners_clicks ) ];

                            $sql8 = "SELECT `id` FROM `inquiry` WHERE `email` = '".$_SESSION['useremail']."'";
                            $result8 = $conn->query($sql8);

                            if( $result8->num_rows > 0 ) {
                                while($row8 = $result8->fetch_assoc()) {

                                    $sql7 = "UPDATE `event_winners` SET `user_id`='".$row8['id']."' WHERE `winning_click` = '".($current_click-1)."'";
                                    $conn->query($sql7);

                                }
                            }        

                        } else {
                            echo "Try Again";
                        }
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }

                    if(isset($_SESSION['useremail'])) {
                        $sql2 = "UPDATE `inquiry` SET `played`='Yes' WHERE `email` = '".$_SESSION['useremail']."'";

                        if ($conn->query($sql2) === TRUE) {
                            // if (in_array( $current_click-1, $selected_winners_clicks )) {

                                

                            // } else {
                                
                            // }
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                }
            } else {
                echo "Event not found";
            }

        } else {
            echo "alreadyPlayed";
        }
    }
}


$conn->close();

?>
