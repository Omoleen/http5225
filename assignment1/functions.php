<?php
function get_staff($connect)
{
    $query = "SELECT * FROM staff ORDER BY last_name ASC";
    $result = mysqli_query($connect, $query);
    return $result;
}

function get_staff_by_id($connect, $id)
{
    $query = "SELECT * FROM staff WHERE id = {$id} LIMIT 1";
    $result = mysqli_query($connect, $query);
    return mysqli_fetch_assoc($result);
}

function format_date($date)
{
    return date('F d, Y', strtotime($date));
}

// Validate staff data
function validate_staff_data($data)
{
    $errors = [];

    if (empty($data['first_name'])) {
        $errors[] = "First name is required";
    }

    if (empty($data['last_name'])) {
        $errors[] = "Last name is required";
    }

    if (empty($data['staff_id'])) {
        $errors[] = "Staff ID is required";
    }

    if (empty($data['role'])) {
        $errors[] = "Role is required";
    }

    if (empty($data['date_hired'])) {
        $errors[] = "Date hired is required";
    }

    return $errors;
}
