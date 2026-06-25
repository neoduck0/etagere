<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <script>
        var username = "Sample_Username";
    </script>
    <title>Dashboard</title>
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
        <div id="welcome"></div>
        <script>
            document.getElementById("welcome").innerHTML += `<h1>Welcome Back, ${username}!</h1>`
        </script>

        <div class="container_row">
            <div class="container_column" style="width: 70%;">
                <div class="container" id="continue_reading_container">
                    <div class="title">Continue Reading</div>
                    <script>
                        document.getElementById("continue_reading_container").innerHTML += `
                        <div class="container_row">
                            <div class="inner_container" onclick="window.location.href='bookdetail.php'">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                            </div>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        `
                    </script>
                </div>

                <div class="container" id="books_container">
                    <div class="title">Recommended Books</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("books_container").innerHTML += `
                                <div class="inner_container" onclick="window.location.href='bookdetail.php'">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                                </div>
                            `
                        }
                    </script>
                    <div class="title">Trending Now</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("books_container").innerHTML += `
                                <div class="inner_container" onclick="window.location.href='bookdetail.php'">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                                </div>
                            `
                        }
                    </script>
                    <div class="title">Newly Added</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("books_container").innerHTML += `
                                <div class="inner_container" onclick="window.location.href='bookdetail.php'">
                                    <img src="images/sample_book_cover.png" width="120" height="192">
                                    <p>Sample Book Name</p>
                                </div>
                            `
                        }
                    </script>
                </div>
            </div>


            <div class="container_column" style="width: 30%;">

                <div class="container" id="reminder_container">
                    <div class="title">Reminder</div>
                    <p>You have 1 book due to return on 30/06/2026.</p>
                    <button class="reminder_button" onclick="window.location.href='profile.php'">See Details</button>
                </div>

                <div class="container" id="boty_container" onclick="window.location.href='bookdetail.php'">
                    <div class="title">Book of the Year</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("boty_container").innerHTML += `
                                <div class="container_row" id="inner_boty_container" onclick="window.location.href='bookdetail.php'">
                                    <span>${i+1}</span>
                                    <span><img src="images/sample_book_cover.png" width="80" height="128"></span>
                                    <span>Sample Book Name</span>
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
</html>
