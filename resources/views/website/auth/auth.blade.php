<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Login</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f0f2f5;
            color: #333;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group input,
        .input-group select {
            width: 100%;
            padding: 15px 20px;
            padding-left: 50px;
            border: 1px solid #ddd;
            border-radius: 50px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .input-group input:focus,
        .input-group select:focus {
            border-color: #6c5ce7;
            outline: none;
            box-shadow: 0 0 8px rgba(108, 92, 231, 0.5);
        }
        .input-group .icon {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            border: none;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.3);
        }
        .login-container input[type="submit"]:hover {
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
        }
        .login-container a {
            display: block;
            margin-top: 15px;
            color: #6c5ce7;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <h1>Selamat Datang di Portal Berita</h1>
        <form>
            <div class="input-group">
                <i class="fas fa-envelope icon"></i>
                <input type="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock icon"></i>
                <input type="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user icon"></i>
                <select required>
                    <option value="">Login Sebagai</option>
                    <option value="jurnalis">Jurnalis</option>
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="submit" value="Login">
            <a href="#">Lupa Password?</a>
        </form>
    </div>
</body>
</html>
