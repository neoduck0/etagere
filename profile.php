<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <script>
        var username = "Sample_Username";
        var email = "sample_email@gmail.com";
        var acc_id = "123456789";
    </script>
    <title>Catalog</title>
</head>
<body>
    <header>
        <h1 class="logo" onclick="window.location.href='index.php'">Etagere</h1>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="catalog.php">Browse Books</a>
            <a href="profile.php">My Profile</a>
        </nav>
    </header>
    <main>
        <div class="container_row">
            <div class="container_column" style="width: 25%;">
                <div class="container" id="userdetail_container">    
                    <div class="container_row">
                        <span class="title" style="width: 60%;">User Details</span>
                        <span><a class="small_nav" href="landing.php">Log Out</a></span>
                    </div>
                    <script>
                        document.getElementById("userdetail_container").innerHTML += `
                            <div class="userdetail_text">
                                <p><strong>Username: </strong>${username}</p>
                                <p><strong>Email: </strong>${email}</p>
                                <p><strong>Account ID: </strong>${acc_id}</p>
                                <p><strong>Account Status: </strong>Active</p>
                            </div>
                        `
                    </script>
                </div>

                <div class="container">
                    <div class="title">Settings</div>
                    <div><button class="settings_button">Account Settings</button></div>
                    <div><button class="settings_button">Help and Support</button></div>
                    <div><button class="settings_button">Notification Preferences</button></div>
                    <div><button class="settings_button">Display & Accessibility</button></div>
                    <div><button class="settings_button">Manage Devices</button></div>
                </div>
            </div>

            <div class="container_column" style="width: 75%">

                <div class="container">
                    <div class="title">Urgent Reminder</div>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>

                <div class="container" id="reservations_container" onclick="window.location.href='bookdetail.php'">
                    <div class="title">Reservations</div>
                    <script>
                        for (var i=0; i < 3; i++) {
                            document.getElementById("reservations_container").innerHTML += `
                                <div class="inner_container">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                                </div>
                            `
                        }
                    </script>
                </div>

                <div class="container" id="wishlist_container" onclick="window.location.href='bookdetail.php'">
                    <div class="title">Wishlist</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("wishlist_container").innerHTML += `
                                <div class="inner_container">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                                </div>
                            `
                        }
                    </script>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2026 Etagere Library Management System. All rights reserved.</p>
    </footer>
</body>