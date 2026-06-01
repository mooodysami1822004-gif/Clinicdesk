public function hasConflict($doctor_id, $date, $time)
{
    $sql = "SELECT id FROM appointments 
            WHERE doctor_id=? AND appt_date=? AND appt_time=?";

    $stmt = mysqli_prepare($this->conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $doctor_id, $date, $time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    return mysqli_stmt_num_rows($stmt) > 0;
}