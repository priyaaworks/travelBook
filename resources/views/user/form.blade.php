<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            margin-top: 20px;
            border: none;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success {
            color: green;
            text-align: center;
            margin-top: 15px;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Your Details</h2>

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form name="userForm" action="{{ route('save.user.data') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Your name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Your email" required>

            <button type="submit">Save</button>
        </form>
    </div>

    <script>
        function validateForm() {
            let name = document.forms["userForm"]["name"].value.trim();
            let email = document.forms["userForm"]["email"].value.trim();

            if (name === "" || email === "") {
                alert("Both name and email must be filled out!");
                return false;
            }
    document.querySelector("button[type='submit']").disabled = true;
            return true;
        }
    </script>
</body>
</html>
