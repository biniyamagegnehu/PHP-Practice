<?php
class SmartFarm {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "smart_farm");

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertData($plot, $temp, $hum, $soil) {
        $stmt = $this->conn->prepare(
            "INSERT INTO sensor_data (plot_id, temperature, humidity, soil_moisture)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sddd", $plot, $temp, $hum, $soil);
        $stmt->execute();
        $stmt->close();
    }

    public function showLatest() {
        $result = $this->conn->query(
            "SELECT * FROM sensor_data ORDER BY created_at DESC LIMIT 10"
        );

        echo "<h2>Latest Sensor Readings (OOP)</h2>";
        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Plot</th>
        <th>Temperature</th>
        <th>Humidity</th>
        <th>Soil Moisture</th>
        <th>Time</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
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
    }

    public function showAverages() {
        $result = $this->conn->query(
            "SELECT plot_id,
             AVG(temperature) AS avg_temp,
             AVG(humidity) AS avg_hum,
             AVG(soil_moisture) AS avg_soil
             FROM sensor_data
             GROUP BY plot_id"
        );

        echo "<h2>Average Data Per Plot</h2>";
        echo "<table border='1'>
        <tr>
        <th>Plot</th>
        <th>Avg Temp</th>
        <th>Avg Humidity</th>
        <th>Avg Soil</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['plot_id']}</td>
            <td>" . round($row['avg_temp'], 2) . "</td>
            <td>" . round($row['avg_hum'], 2) . "</td>
            <td>" . round($row['avg_soil'], 2) . "</td>
            </tr>";
        }

        echo "</table>";
    }

    public function close() {
        $this->conn->close();
    }
}

$farm = new SmartFarm();

$farm->insertData("P2", rand(20,30), rand(50,80), rand(30,60));

$farm->showLatest();
$farm->showAverages();

$farm->close();
?>