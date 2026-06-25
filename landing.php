<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <title>Landing Page</title>
</head>
<body>
    <header>
        <h1 class="logo" onclick="window.location.href='index.php'">Etagere</h1>
        <nav>
            <a href="auth.php">Log In/Sign Up</a>
        </nav>
    </header>
    <main>
        <div class="container" id="introduction_container">
            <h1>Why Choose Us</h1>
            <p class="introduction_text">
                Etagere is a comprehensive library companion designed to bring the entire book collection right to your screen.
                Combining a classic, scholarly aesthetic with modern tools, our platform makes managing your reading list effortless
                and intuitive. As a guest or returning member, you can instantly search the library stacks by title, author,
                or genre to discover your next great read. Once logged in, your personalized dashboard gives you complete control over
                your library account: check your current reading progress, monitor live return deadlines with helpful countdown reminders,
                and view active fine balances. If a high-demand book is currently checked out, Etagere allows you to place an instant
                hold on it under your reservations list and tracks your place in the queue so you can pick it up the moment it returns
                to the shelves. Whether you are a student managing academic research or a casual reader tracking your personal bookshelf,
                Etagere streamlines your library experience from discovery to return.
            </p>
            <div class="inner_container">
                <img src="images/booksymbol.png" width="50" height="50">
                <span>More than 500+ books</span>
            </div>

            <div class="inner_container">
                <img src="images/freeofchargesymbol.png" width="50" height="50">
                <span>Free of Charge</span>
            </div>

            <div class="inner_container">
                <img src="images/safesymbol.png" width="50" height="50">
                <span>Safe to Use</span>
            </div>
        </div>

        <br>

        <div class="container" id="books_container">
            <div class="title">Discover our Books</div>
            <script>
                for (var i=0; i < 24; i++) {
                    document.getElementById("books_container").innerHTML += `
                        <div class="inner_container" onclick="window.location.href='auth.php'">
                            <img src="images/sample_book_cover.png" width="120" height="192">
                            <p>Sample Book Name</p>
                        </div>
                    `
                }
            </script>
        </div>
    </main>
    <footer>
        <p>&copy; 2026 Etagere Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
