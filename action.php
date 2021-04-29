<?php

//action.php

include('psychatrist/class/Appointment.php');

$object = new Appointment;

if (isset($_POST["action"])) {
    if ($_POST["action"] == 'check_login') {
        if (isset($_SESSION['loggedin'])) {
            echo 'dashboard.php';
        } else {
            echo 'login.php';
        }
    }
    if (isset($_POST['id']))
        $id = $_POST['id'];


    if ($_POST['action'] == 'fetch_schedule') {
        $output = array();

        $order_column = array('physcho.psy_name', 'physcho.psy_qualification', 'doctor_schedule_table.doctor_schedule_date', 'doctor_schedule_table.doctor_schedule_day', 'doctor_schedule_table.doctor_schedule_start_time');

        $main_query = "SELECT * FROM doctor_schedule_table INNER JOIN physcho ON physcho.psy_id = doctor_schedule_table.doctor_id ";

        $search_query = 'WHERE doctor_schedule_table.doctor_schedule_date >= "' . date('Y-m-d') . '" AND doctor_schedule_table.doctor_schedule_status = "Active" AND doctor_schedule_table.doctor_id ="' . $id . '"';

        if (isset($_POST["search"]["value"])) {
            $search_query .= 'AND ( physcho.psy_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR physcho.psy_qualification LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR doctor_schedule_table.doctor_schedule_date LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR doctor_schedule_table.doctor_schedule_day LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR doctor_schedule_table.doctor_schedule_start_time LIKE "%' . $_POST["search"]["value"] . '%") ';
        }

        if (isset($_POST["order"])) {
            $order_query = 'ORDER BY ' . $order_column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $order_query = 'ORDER BY doctor_schedule_table.doctor_schedule_date ASC ';
        }

        $limit_query = '';

        if ($_POST["length"] != -1) {
            $limit_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $object->query = $main_query . $search_query . $order_query;

        $object->execute();

        $filtered_rows = $object->row_count();

        $object->query .= $limit_query;

        $result = $object->get_result();

        $object->query = $main_query . $search_query;

        $object->execute();

        $total_rows = $object->row_count();

        $data = array();

        foreach ($result as $row) {
            $sub_array = array();

            $sub_array[] = $row["psy_name"];

            $sub_array[] = $row["psy_qualification"];
            $sub_array[] = null;

            $sub_array[] = $row["doctor_schedule_date"];

            $sub_array[] = $row["doctor_schedule_day"];

            $sub_array[] = $row["doctor_schedule_start_time"];

            $sub_array[] = '
			<div align="center">
			<button type="button" name="get_appointment" class="btn btn-primary btn-sm get_appointment" data-doctor_id="' . $row["doctor_id"] . '" data-doctor_schedule_id="' . $row["doctor_schedule_id"] . '">Get Appointment</button>
			</div>
			';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"      =>  $total_rows,
            "recordsFiltered"     =>     $filtered_rows,
            "data"                =>     $data
        );

        echo json_encode($output);
    }


    if ($_POST['action'] == 'make_appointment') {
        $object->query = "SELECT * FROM user WHERE u_id = '" . $_SESSION['u_id'] . "'";

        $patient_data = $object->get_result();

        $object->query = "
		SELECT * FROM doctor_schedule_table INNER JOIN physcho ON physcho.psy_id = doctor_schedule_table.doctor_id WHERE doctor_schedule_table.doctor_schedule_id = '" . $_POST["doctor_schedule_id"] . "'";

        $doctor_schedule_data = $object->get_result();

        $html = '
		<h4 class="text-center">Patient Details</h4>
		<table class="table">
		';

        foreach ($patient_data as $patient_row) {
            $html .= '
			<tr>
				<th width="40%" class="text-right">Patient Name</th>
				<td>' . $patient_row["u_name"] .  '</td>
			</tr>
			<tr>
				<th width="40%" class="text-right">Contact No.</th>
				<td>' . $patient_row["u_contact"] . '</td>
			</tr>
			<tr>
				<th width="40%" class="text-right">Email</th>
				<td>' . $patient_row["u_email"] . '</td>
			</tr>
			';
        }

        $html .= '
		</table>
		<hr />
		<h4 class="text-center">Appointment Details</h4>
		<table class="table">
		';
        foreach ($doctor_schedule_data as $doctor_schedule_row) {
            $html .= '
			<tr>
				<th width="40%" class="text-right">Doctor Name</th>
				<td>' . $doctor_schedule_row["psy_name"] . '</td>
			</tr>
			<tr>
				<th width="40%" class="text-right">Appointment Date</th>
				<td>' . $doctor_schedule_row["doctor_schedule_date"] . '</td>
			</tr>
			<tr>
				<th width="40%" class="text-right">Appointment Day</th>
				<td>' . $doctor_schedule_row["doctor_schedule_day"] . '</td>
			</tr>
			<tr>
				<th width="40%" class="text-right">Available Time</th>
				<td>' . $doctor_schedule_row["doctor_schedule_start_time"] . ' - ' . $doctor_schedule_row["doctor_schedule_end_time"] . '</td>
			</tr>
			';
        }

        $html .= '
		</table>';
        echo $html;
    }

    if ($_POST['action'] == 'book_appointment') {
        $error = '';
        $data = array(
            ':patient_id'            =>    $_SESSION['u_id'],
            ':doctor_schedule_id'    =>    $_POST['hidden_doctor_schedule_id']
        );

        $object->query = "
		SELECT * FROM appointment_table 
		WHERE patient_id = :patient_id 
		AND doctor_schedule_id = :doctor_schedule_id
		";

        $object->execute($data);

        if ($object->row_count() > 0) {
            $error = '<div class="alert alert-danger">You have already applied for appointment for this day, try for other day.</div>';
        } else {
            $object->query = "
			SELECT * FROM doctor_schedule_table 
			WHERE doctor_schedule_id = '" . $_POST['hidden_doctor_schedule_id'] . "'
			";

            $schedule_data = $object->get_result();

            $object->query = "
			SELECT COUNT(appointment_id) AS total FROM appointment_table 
			WHERE doctor_schedule_id = '" . $_POST['hidden_doctor_schedule_id'] . "' 
			";

            $appointment_data = $object->get_result();

            $total_doctor_available_minute = 0;
            $average_consulting_time = 0;
            $total_appointment = 0;

            foreach ($schedule_data as $schedule_row) {
                $end_time = strtotime($schedule_row["doctor_schedule_end_time"] . ':00');

                $start_time = strtotime($schedule_row["doctor_schedule_start_time"] . ':00');

                $total_doctor_available_minute = ($end_time - $start_time) / 60;

                $average_consulting_time = $schedule_row["average_consulting_time"];
            }

            foreach ($appointment_data as $appointment_row) {
                $total_appointment = $appointment_row["total"];
            }

            $total_appointment_minute_use = $total_appointment * $average_consulting_time;

            $appointment_time = date("H:i", strtotime('+' . $total_appointment_minute_use . ' minutes', $start_time));

            $status = '';

            $appointment_number = $object->Generate_appointment_no();

            if (strtotime($end_time) > strtotime($appointment_time . ':00')) {
                $status = 'Booked';
            } else {
                $status = 'Waiting';
            }

            $data = array(
                ':doctor_id'                =>    $_POST['hidden_doctor_id'],
                ':patient_id'                =>    $_SESSION['u_id'],
                ':doctor_schedule_id'        =>    $_POST['hidden_doctor_schedule_id'],
                ':appointment_number'        =>    $appointment_number,
                ':reason_for_appointment'    =>    $_POST['reason_for_appointment'],
                ':appointment_time'            =>    $appointment_time,
                ':status'                    =>    'Booked'
            );

            $object->query = "
			INSERT INTO appointment_table 
			(doctor_id, patient_id, doctor_schedule_id, appointment_number, reason_for_appointment, appointment_time, status) 
			VALUES (:doctor_id, :patient_id, :doctor_schedule_id, :appointment_number, :reason_for_appointment, :appointment_time, :status)
			";

            $object->execute($data);

            $_SESSION['appointment_message'] = '<div class="alert alert-success">Your Appointment has been <b>' . $status . '</b> with Appointment No. <b>' . $appointment_number . '</b></div>';
        }
        echo json_encode(['error' => $error]);
    }

    if ($_POST['action'] == 'fetch_appointment') {
        $output = array();

        $order_column = array('appointment_table.appointment_number', 'physcho.psy_name', 'doctor_schedule_table.doctor_schedule_date', 'appointment_table.appointment_time', 'doctor_schedule_table.doctor_schedule_day', 'appointment_table.status');

        $main_query = "
		SELECT * FROM appointment_table  
		INNER JOIN physcho 
		ON physcho.psy_id = appointment_table.doctor_id 
		INNER JOIN doctor_schedule_table 
		ON doctor_schedule_table.doctor_schedule_id = appointment_table.doctor_schedule_id 
		
		";

        $search_query = '
		WHERE appointment_table.patient_id = "' . $_SESSION["u_id"] . '" 
		';

        if (isset($_POST["search"]["value"])) {
            $search_query .= 'AND ( appointment_table.appointment_number LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR physcho.psy_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR doctor_schedule_table.doctor_schedule_date LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR appointment_table.appointment_time LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR doctor_schedule_table.doctor_schedule_day LIKE "%' . $_POST["search"]["value"] . '%" ';
            $search_query .= 'OR appointment_table.status LIKE "%' . $_POST["search"]["value"] . '%") ';
        }

        if (isset($_POST["order"])) {
            $order_query = 'ORDER BY ' . $order_column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $order_query = 'ORDER BY appointment_table.appointment_id ASC ';
        }

        $limit_query = '';

        if ($_POST["length"] != -1) {
            $limit_query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $object->query = $main_query . $search_query . $order_query;

        $object->execute();

        $filtered_rows = $object->row_count();

        $object->query .= $limit_query;

        $result = $object->get_result();

        $object->query = $main_query . $search_query;

        $object->execute();

        $total_rows = $object->row_count();

        $data = array();

        foreach ($result as $row) {
            $sub_array = array();

            $sub_array[] = $row["appointment_number"];

            $sub_array[] = $row["psy_name"];

            $sub_array[] = $row["doctor_schedule_date"];

            $sub_array[] = $row["appointment_time"];

            $sub_array[] = $row["doctor_schedule_day"];

            $status = '';

            if ($row["status"] == 'Booked') {
                $status = '<span class="badge badge-warning">' . $row["status"] . '</span>';
            }

            if ($row["status"] == 'In Process') {
                $status = '<span class="badge badge-primary">' . $row["status"] . '</span>';
            }

            if ($row["status"] == 'Completed') {
                $status = '<span class="badge badge-success">' . $row["status"] . '</span>';
            }

            if ($row["status"] == 'Cancel') {
                $status = '<span class="badge badge-danger">' . $row["status"] . '</span>';
            }

            $sub_array[] = $status;

            $sub_array[] = '<a href="download.php?id=' . $row["appointment_id"] . '" class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-file-pdf"></i> PDF</a>';

            $sub_array[] = '<button type="button" name="cancel_appointment" class="btn btn-danger btn-sm cancel_appointment" data-id="' . $row["appointment_id"] . '"><i class="fas fa-times"></i></button>';

            $data[] = $sub_array;
        }

        $output = array(
            "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"      =>  $total_rows,
            "recordsFiltered"     =>     $filtered_rows,
            "data"                =>     $data
        );

        echo json_encode($output);
    }

    if ($_POST['action'] == 'cancel_appointment') {
        $data = array(
            ':status'            =>    'Cancel',
            ':appointment_id'    =>    $_POST['appointment_id']
        );
        $object->query = "
		UPDATE appointment_table 
		SET status = :status 
		WHERE appointment_id = :appointment_id
		";
        $object->execute($data);
        echo '<div class="alert alert-success">Your Appointment has been Cancel</div>';
    }
}