@if(Auth::user()->role == 1)
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Six Buttons</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }
    .container {
        text-align: center;
    }
    .row {
        margin-bottom: 20px;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        margin-bottom: 10px;
        transition: background-color 0.3s;
    }
    .button-green {
        background-color: green;
        color: #fff;
    }
    .button-green:hover {
        background-color: darkgreen;
    }
    .button-red {
        background-color: red;
        color: #fff;
    }
    .button-red:hover {
        background-color: darkred;
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
    <div class="row">
    <a href="superAdmin/createBank">
        <button class="button button-green">CREATE BANK</button>
    </a>    
    <a href="superAdmin/createCompany">
        <button class="button button-green">CREATE COMPANY</button>
    </a>
    <a href="superAdmin/createB_Admin">
        <button class="button button-green">CREATE B.ADMIN</button>
    </a>
    <a href="superAdmin/createC_Admin">    
        <button class="button button-green">CREATE C.ADMIN</button>
    </a>    
    </div>
    <div class="row">
    <a href="superAdmin/deleteBank">
        <button class="button button-red">DELETE BANK</button>
    </a>
    <a href="superAdmin/deleteCompany">
        <button class="button button-red">DELETE COMPANY</button> 
    </a>   
    <a href="superAdmin/deleteB_Admin">    
        <button class="button button-red">DELETE B.ADMIN</button>
    </a>
    <a href="superAdmin/deleteC_Admin">    
        <button class="button button-red">DELETE C.ADMIN</button>
    </a>
    </div>
</div>
</body>
</html>
@endif

@if(Auth::user()->role == 3)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .navbar {
            background-color: #f2f2f2;
            overflow: hidden;
            position: relative;
            top: 150px; /* Adjust as needed based on logo height */
        }

        .navbar a {
            position: relative;
            float: left;
            display: block;
            color: #555; /* Gray */
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #333; /* Dark gray on hover */
        }

        .active {
            color: #2E8B57; /* Dark green */
        }

        .active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #2E8B57; /* Green line */
        }

        /* Icons */
        .navbar a i {
            margin-right: 5px;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 150px;
            height: 150px;    
        }
    </style>
</head>
<body>
    <img src="/images/download.png" alt="Logo" class="logo">
    <div class="navbar">
        <a href="#" class="active" id="balance"><i class="fas fa-balance-scale"></i> Balance</a>
        <a href="companyAdmin/showTransaction" id="transaction"><i class="fas fa-exchange-alt"></i> Transaction</a>
        <br><br><br>
        <h3> YOUR CURRENT BALANCE IS ::  {{ auth()->user()->company->balance }} $ </h3>
    </div>
  
    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        // Get the navbar links
        var navbarItems = document.getElementsByClassName("navbar")[0].getElementsByTagName("a");

        // Loop through the navbar links
        for (var i = 0; i < navbarItems.length; i++) {
            navbarItems[i].addEventListener("click", function() {
                // Remove the 'active' class from all links
                for (var j = 0; j < navbarItems.length; j++) {
                    navbarItems[j].classList.remove("active");
                    navbarItems[j].style.color = "#555"; // Set color to gray
                    navbarItems[j].style.borderBottom = "none"; // Remove underline
                }
                // Add the 'active' class to the clicked link
                this.classList.add("active");
                this.style.color = "#2E8B57"; // Set color to green
                this.style.borderBottom = "2px solid #2E8B57"; // Add underline
            });
        }
    </script>
   

</body>
</html>



@endif


@if(Auth::user()->role == 2)


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Buttons Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .button-container {
            text-align: center;
        }

        .styled-button {
            background-color: #28a745; /* Green color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .styled-button:hover {
            background-color: #218838; /* Darker green */
            transform: translateY(-2px);
        }

        .styled-button:active {
            background-color: #1e7e34; /* Even darker green */
            transform: translateY(0);
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
<img src="/images/download.png" alt="Logo" class="logo"> 
    <div class="button-container">
    <a href="bankAdmin/viewTransactions">      
    <button class="styled-button" id="showTransactionsButton">Show Transactions</button>
    </a>
    <a href="bankAdmin/AddCashin">      
    <button class="styled-button" id="cashInButton">Cash In</button>
    </a>
    <a href="bankAdmin/AddCashout">      
    <button class="styled-button" id="cashOutButton">Cash Out</button>
    </a>
    <a href="bankAdmin/viewDeposits">      
    <button class="styled-button" id="showDepositsButton">Show Deposit</button>
    </a>
    </div>
</body> 
</html> 



@endif

<style>
    .button1 {
        padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    position: fixed;
    bottom: 20px; /* Adjust as needed */
    right: 20px; /* Adjust as needed */
    }
    
    .button-red1 {
        background-color: #ff0000; /* Red color */
        color: #ffffff; /* White text */
    }
</style>






<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="button1 button-red1">Logout</button>
</form>









