<div class="sidebar">
    <!--
  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="../index.php" class="simple-text logo-mini">
                ASR
            </a>
            <a href="../index.php" class="simple-text logo-normal">
                Aspire Recovery
            </a>
        </div>
        <ul class="nav">
            <li class="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'index') !== false) {
                echo "active";
            }?>">
                <a href="index.php">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
           
            <li class="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'psyprofile') !== false) {
                echo "active";
            }?>">
                <a href="psyprofile.php">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Your Profile</p>
                </a>
            </li>
            <li class="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'doctor_') !== false) {
                echo "active";
            }?>">
                <a href="doctor_schedule.php">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Doctor Schedule</p>
                </a>
            </li>
            <li class="<?php if (strpos($_SERVER['SCRIPT_FILENAME'], 'appointment') !== false) {
                echo "active";
            }?>">
                <a href="appointment.php">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>Appointment</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>