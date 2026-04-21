<?php
$conn = mysqli_connect("localhost", "root", "", "smart_farm");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$plot_id = "P1";
$temp = rand(20, 30);
$hum = rand(50, 80);
$soil = rand(30, 60);

$insert_sql = "INSERT INTO sensor_data (plot_id, temperature, humidity, soil_moisture)
               VALUES ('$plot_id', $temp, $hum, $soil)";

mysqli_query($conn, $insert_sql);

$result = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY created_at DESC LIMIT 10");

echo "<h2>Latest Sensor Readings (Procedural)</h2>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Plot</th>
<th>Temperature</th>
<th>Humidity</th>
<th>Soil Moisture</th>
<th>Time</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['plot_id']}</td>
    <td>{$row['temperature']}</td>
    <td>{$row['humidity']}</td>
    <td>{$row['soil_moisture']}</td>
    <td>{$row['created_at']}</td>
    </tr>";
}

echo "</table>";

mysqli_close($conn);
?>