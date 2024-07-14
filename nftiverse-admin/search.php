<?php include "../config.php";
// Ensure form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    // Retrieve form data
    $earning_type = $_GET['earning_type'] ?? '';
    $category = $_GET['category'] ?? '';
    $collection = $_GET['collection'] ?? '';
    $customer = $_GET['customer'] ?? '';
    
    
    // Construct base SQL query
    $sql = "SELECT * FROM NFT_info WHERE 1=1";
    
    // Append conditions based on form inputs
    if (!empty($earning_type)) {
        $sql .= " AND earning_type = '$earning_type'";
    }
    
    if (!empty($category)) {
        $sql .= " AND category = '$category'";
    }
    
    if (!empty($collection)) {
        $sql .= " AND collection = '$collection'";
    }
    
    if (!empty($customer)) {
        $sql .= " AND customer = '$customer'";
    }
    
    // Execute query
    $result = $link->query($sql);
    
    if ($result === false) {
        echo "Error: " . $sql . "<br>" . $link->error;
    } else {
        // Check if results exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Output your results in table rows
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nfts_title'] . "</td>";
                echo "<td>" . $row['token_id'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['collection'] . "</td>";
                echo "<td>" . $row['customer'] . "</td>";
                echo "<td>" . $row['earned_fee'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No results found.";
        }
    }
    
}
?>
