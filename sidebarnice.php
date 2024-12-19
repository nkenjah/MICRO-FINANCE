<?php
include("linknice.php");
?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="Admin_dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Admin Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#staff-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Staff Member</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="staff-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="all_member.php">
          <i class="bi bi-circle"></i><span>Add Staff Member</span>
        </a>
      </li>
      <li>
        <a href="manage_staff.php">
          <i class="bi bi-circle"></i><span>Manage Staff Member</span>
        </a>
      </li>
      <li>
        <a href="view_staff.php">
          <i class="bi bi-circle"></i><span>View All Staff Member</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#clients-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clients-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="client.php">
          <i class="bi bi-circle"></i><span>Add Client</span>
        </a>
      </li>
      <li>
        <a href="client_manage.php">
          <i class="bi bi-circle"></i><span>Manage Clients</span>
        </a>
      </li>
      <li>
        <a href="view_staff.php">
          <i class="bi bi-circle"></i><span>View All Clients</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Staff Member</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="transaction-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="all_member.php">
          <i class="bi bi-circle"></i><span>Add Staff Member</span>
        </a>
      </li>
      <li>
        <a href="manage_staff.php">
          <i class="bi bi-circle"></i><span>Manage Staff Member</span>
        </a>
      </li>
      <li>
        <a href="view_staff.php">
          <i class="bi bi-circle"></i><span>View All Staff Member</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>transaction</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="member-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="transaction_record.php">
          <i class="bi bi-circle"></i><span>record transaction</span>
        </a>
      </li>
      <li>
        <a href="manage_staff.php">
          <i class="bi bi-circle"></i><span>Manage Clients</span>
        </a>
      </li>
      <li>
        <a href="view_staff.php">
          <i class="bi bi-circle"></i><span>View All Clients</span>
        </a>
      </li>
    </ul>
  </li>

</ul>
</aside><!-- End Sidebar -->

