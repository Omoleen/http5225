<?php
$connect = mysqli_connect('localhost', 'root', '', 'staff_management');

if (!$connect) {
  die("Connection Failed: " . mysqli_connect_error());
}

// Create staff table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    staff_id VARCHAR(20) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL,
    date_hired DATE NOT NULL
  )";

mysqli_query($connect, $query);

// Add sample data if table is empty
$check_empty = mysqli_query($connect, "SELECT COUNT(*) as count FROM staff");
$row = mysqli_fetch_assoc($check_empty);

if ($row['count'] == 0) {
  $sample_data = "INSERT INTO staff (first_name, last_name, staff_id, role, date_hired) VALUES
      ('John', 'Smith', 'EMP001', 'Developer', '2023-01-15'),
      ('Sarah', 'Johnson', 'EMP002', 'Designer', '2023-03-20'),
      ('Michael', 'Brown', 'EMP003', 'Manager', '2023-06-10')";

  mysqli_query($connect, $sample_data);
}
