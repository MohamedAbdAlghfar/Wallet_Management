<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Bank Account</title>
<style>
    body {
        font-family: Arial, sans-serif; 
        background-color: #f3f3f3;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #ffffff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    h2 {
        color:green;
    }

    .back-button {
  background-color: red;
  color: white;
  border: 1px solid black; 
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
}

.logo { position: absolute;
        top: 10px;
        left: 10px;
        width: 150px;
        height: 150px; 
      }
</style>
</head>
<body>

<div class="container">
<img src="/images/download.png" alt="Logo" class="logo">
    <h2>Create Bank</h2>
    <form  method="post" action="{{ route('Bank.store') }}" enctype="multipart/form-data" autocomplete="off">
      @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Create">
        </div>
        <br>
        <a href="/dashboard" class="back-button">Back</a>
    </form>
</div>

</body>
</html>











