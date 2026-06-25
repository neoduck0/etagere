<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <script>
    </script>
    <title>Landing Page</title>
</head>
<body>
    <header>
        <h1 class="logo">Etagere</h1>
    </header>
    <main>
        <div class="container" id="login_container" style="width: 40%;">
            <div class="title">Log In</div>
            <div>
                <table>
                    <tr>
                        <th>Username: </th>
                        <td><input type="text" placeholder="Enter username" class="textbox"></td>
                    </tr>
                    <tr>
                        <th><br></th>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th>Password: </th>
                        <td><input type="text" placeholder="Enter password" class="textbox"></td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="form_actions">
                <div>
                    <a class="small_nav">Forgot Password</a>
                    <a class="small_nav">Sign Up</a>
                </div>
                <span><button type="submit" class="login_button" onclick="window.location.href='index.php'">Login</button></span>
            </div>
        </div>

    </main>
    <footer>
        <p>&copy; 2026 Etagere Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
