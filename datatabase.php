<?php
include 'koneksi.php';

$query = "SELECT * FROM rooms";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Database Kamar</title>
    <link rel="stylesheet" href="styledb.css">
</head>
<body>
    <header>
        <h1>Database Kamar Hotel</h1>
    </header>
    <nav>
        <ul>
            <li><div class="home">
                    <a href="menu.html">
                        <span class="description">Home</span>
                    </a>
                </div>
            </li>
            <li><div class="tentangHotel">
                    <a href="tentangHotel.html">
                        <span class="description">About</span>
                    </a>
                </div>
            </li><li><div class="infoHarga">
                    <a href="infoHarga.html">
                        <span class="description">Cost</span>
                    </a>
                </div>
            </li><li><div class="reservasi">
                    <a href="reservasi.html">
                        <span class="description">Reservation</span>
                    </a>
                </div>
            </li><li><div class="database">
                    <a href="database.php">
                        <span class="description">Database</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h2>Informasi Kamar dan Status</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No Kamar</th>
                        <th>Jenis Kamar</th>
                        <th>Availability</th>
                        <th>Nama Tamu</th>
                        <th>Tanggal Check Out</th>
                        <th>Status Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['room_number'] . "</td>";
                            echo "<td>" . $row['room_type'] . "</td>";
                            echo "<td>" . $row['availability'] . "</td>";
                            echo "<td>" . $row['guest_name'] . "</td>";
                            echo "<td>" . $row['check_out_date'] . "</td>";
                            echo "<td>" . $row['payment_status'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data yang ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Tutup koneksi ke database
mysqli_close($conn);
?>
