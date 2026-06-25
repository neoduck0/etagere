<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <script>
        var book_name = "Sample_Book_Name";
        var book_isbn = "Sample_Book_ISBN";
        var book_genre = "Sample_Book_Genre";
        var book_author = "Sample_Book_Author";
    </script>
    <title>Document</title>
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
            <div class="container_column" style="width: 80%;">
                <div class="container" id="book_container">
                    <img src="images/sample_book_cover.png" width="360" height="576">
                    <script>
                        document.getElementById("book_container").innerHTML += `
                            <div class="inner_container" id="inner_book_detail">
                                <h1>${book_name}</h1>
                                <p><strong>ISBN: </strong>${book_isbn}</p>
                                <p><strong>Genre: </strong>${book_genre}</p>
                                <p><strong>Author: </strong>${book_author}</p>
                                <button class="reserve_button">Reserve Book</button>
                                <button class="wishlist_button">Add to Wishlist</button>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                                </p>
                            </div>
                        `
                    </script>
                </div>
            </div>

            <div class="container_column" style="width: 20%;">
                <div class="container" id="more_books_container">
                    <div class="title">Similar Books</div>
                    <script>
                        for (var i=0; i < 5; i++) {
                            document.getElementById("more_books_container").innerHTML += `
                                <div class="container_row" id="inner_more_books_container" onclick="window.location.href='bookdetail.php'">
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