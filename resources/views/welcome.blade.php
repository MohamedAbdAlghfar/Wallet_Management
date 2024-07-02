<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wallet Management</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet"> <!-- Include Tailwind CSS -->
<style>
    body {
    background-image: url('/images/welcome.jpg'); /* Replace '/images/welcome.jpg' with the path to your image */
    background-size: cover; /* Cover the entire page */
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 100vh; /* Ensure the body takes up the full viewport height */
}


    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 40px 20px;
        text-align: center;
    }

    .button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
    }

    .button-green {
        background-color: #4caf50; /* Green color */
        color: #ffffff; /* White text */
    }

    .button-green:hover {
        background-color: #45a049; /* Darker green on hover */
    }
    h1{
        color: white;
    }
    .logo { position: absolute;
        top: 10px;
        left: 10px;
        width: 150px;
        height: 150px; 
      }
</style>
</head>
<body background = "/images/welcome.jpg"> 

<div class="container">
<img src="/images/download.png" alt="Logo" class="logo">
    <h1 class="text-3xl font-semibold mb-8">WALLET MANAGEMENT</h1>

    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="button button-green">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button button-green">Log in</a>
            @endauth
        </div>
    @endif
</div>

</body>
</html>
