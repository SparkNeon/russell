<?php
$servername = "127.0.0.1";
$username = "root";
$password = "admin123";
$database = "test2";

// Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Filter input (variable and category)
if (!isset($_GET['keyword'])) {
   echo 'no such a value you input';
  }
  else {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
  }

if (!isset($_GET['cat'])) {
    echo 'no such a category';
  }
  else {
    $category = $_GET['cat'];
  }

//Sort order
$sortCriteria = $_GET['sort'];

if (!isset($_GET['order_by'])) {
    echo "no such a sort order";
    $ordering = 'ASC';
  }
  else {
    $ordering = $_GET['order_by'] ?? 'ASC';
  }



$sql = "SELECT * FROM auction WHERE '%$category%' = '%$keyword%' ORDER BY $sortCriteria $ordering";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>auction_id</th>
                <th>itemname</th>
                <th>ItemDescription</th>
                <th>startingprice</th>
                <th>enddate</th>
            </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["auction_idd"]."</td>
                <td>".$row["itemname"]."</td>
                <td>".$row["ItemDescription"]."</td>
                <td>".$row["startingprice"]."</td>
                <td>".$row["enddate-"]."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>