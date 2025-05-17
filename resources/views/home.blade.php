<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            color: #333;
        }

        .btn {
            display: inline-block;
            background-color: #3490dc;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #2779bd;
        }

        .nav {
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
        }

        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .nav a:hover {
            color: #3490dc;
        }

        .content {
            padding-top: 80px;
        }

    </style>
</head>
<body>

    <div class="nav">
        <a href="{{ url('/homepage') }}">Home</a>
        <a href="{{ url('/') }}">Available Packages</a>
    </div>

    <div class="content">
        <h1>Welcome to Travel Booking Home Page!</h1>

        <a href="{{ url('/') }}" class="btn">Browse Packages</a>
    </div>

</body>
</html>
