<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
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
            <input type="text" placeholder="Search books titles, genres, authors..." class="search_bar">
            <button class="search_button">Search</button>
        </div>
        <div class="container" id="books_container">
            <div class="title">Browse Books</div>
            <br>
            <script>
                for (var i=0; i < 48; i++) {
                    document.getElementById("books_container").innerHTML += `
                        <div class="inner_container" onclick="window.location.href='bookdetail.php'">
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