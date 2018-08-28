</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Routine Notes</h3>
            <strong>RN</strong>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                <a href="#">
                    <i class="fas fa-calendar-alt"></i>
                    Calendar
                </a>
                <a href="#exercisesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-bookmark"></i>
                    All Exercises
                </a>
                <ul class="collapse list-unstyled" id="exercisesSubmenu">
                    <li>
                        <a href="#">Shoulders</a>
                    </li>
                    <li>
                        <a href="#">Triceps</a>
                    </li>
                    <li>
                        <a href="#">Biceps</a>
                    </li>
                    <li>
                        <a href="#">Chest</a>
                    </li>
                    <li>
                        <a href="#">Back</a>
                    </li>
                    <li>
                        <a href="#">Legs</a>
                    </li>
                    <li>
                        <a href="#">Abd</a>
                    </li>
                    <li>
                        <a href="#">Cardio</a>
                    </li>
                </ul>
                <a href="#workoutsSubmenu"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-dumbbell"></i>
                    Workouts
                </a>
                <ul id="workoutsSubmenu" class="collapse list-unstyled">
                    <li>
                        <a href="#">View Workouts</a>
                    </li>
                    <li>
                        <a href="#">Create Workout</a>
                    </li>
                </ul>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    About
                </a>
                <a href="#">
                    <i class="fas fa-paper-plane"></i>
                    Contact
                </a>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-in-alt"></i>
                                Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-alt"></i>
                                Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>