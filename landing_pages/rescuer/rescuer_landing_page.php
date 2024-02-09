<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="load_management/stock_management.js"></script>
    <script src="task_management/task_management.js"></script>
    <script src="view_map/rescuer_map.js"></script>
    
    <link rel="stylesheet" type="text/css" href="rescuer.css" />
</head>

<body>
    <script type="text/javascript">
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    function changePanel(panelId) {
        // Hide all panels
        var panels = document.getElementsByClassName("panel");
        for (var i = 0; i < panels.length; i++) {
            panels[i].style.display = "none";
        }

        // Show the selected panel
        document.getElementById(panelId).style.display = "block";
    }
    </script>
    <header>
        <h2>Rescuer Dashboard</h2>
        <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
        <a class="logout-btn" href="#">Logout</a>
    </header>
    <div id="mySidebar" class="sidebar">
        <nav>
            <ul>
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
                <li><a href="javascript:void(0)" onclick="changePanel('vehicle-load-management')">Stock Management</a></li>
                <li><a href="javascript:void(0)" onclick="changePanel('view-map')">View Map</a></li>
                <li><a href="javascript:void(0)" onclick="changePanel('task-management')">Stock View</a></li>
            </ul>
        </nav>
    </div>
    <div id="main">
        <!-- Panels -->
        <div id="stock-management" class="panel">
            <div id="productList"></div>
            <button onclick="showProductsInVehicle()">προιόντα στο όχημα</button>
            <!-- Button to Fetch and Display Products -->
            <button onclick="showProducts()">προιόντα στην βάση</button>
            <!-- Button to Execute SQL Query on Selected Products -->
            <button id="myButton" onclick="executeQuery()">φόρτωση</button>
            <button id="myButton1" onclick="unload()">εκφόρτωση</button>
            <script src="load_management/stock_management.js"></script>
        </div>
        <div id="view-map" class="panel">
            <div id="map"></div>
            <form id="updateForm" action="rescuer_update_coordinates.php" method="post">
                <input type="hidden" id="latInput" name="lat" value="">
                <input type="hidden" id="lngInput" name="lng" value="">
            </form>
            <script type="text/javascript" src="view_map/rescuer_map.js"></script>
        </div>
        <div id="task-management" class="panel">
            <!-- Stock View Panel Content -->
        </div>
    </div>
</body>

</html>
