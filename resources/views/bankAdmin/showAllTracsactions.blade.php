<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Transactions</title>
    <style>
        /* Add your CSS styles here */
        /* For example: */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-button {
            background-color: red;
            color: white;
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
            position: fixed; /* Position the button relative to the viewport */
            bottom: 20px; /* Distance from the bottom of the viewport */
            right: 20px; /* Distance from the right of the viewport */
        }
        .logo { 
            position: absolute;
            top: 10px;
            left: 10px;
            width: 150px;
            height: 150px; 
        }
        .green-button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            position: absolute;
            top: 20px; /* Adjust the distance from the top */
            right: 20px; /* Adjust the distance from the right */
            z-index: 1; /* Ensure it appears above other elements */
        }
        .edit-button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: #007bff; /* Primary blue color */
  border: none;
  border-radius: 4px;
  text-decoration: none;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.edit-button:hover {
  background-color: #0056b3; /* Darker blue on hover */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Slight shadow on hover */
}

.edit-button:active {
  background-color: #004085; /* Even darker blue when clicked */
}

.edit-button:focus {
  outline: none; /* Remove default outline */
  box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5); /* Custom focus outline */
}

    </style>
</head>
<body>
<img src="/images/download.png" alt="Logo" class="logo"> 

<br><br><br><br><br><br><br>
<h2>List of Transactions</h2>
<table>
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Date</th>
            <th>Transaction Type</th>
            <th>Transaction Amount</th>
            <th>Transaction Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Transactions as $transactions)
        <tr>
            <td>{{ $transactions->Company->name }}</td>
            <td>{{ $transactions->created_at }}</td>
            <td>
            @php
            $typeText = '';
            switch ($transactions->type) {
                case 1:
                    $typeText = 'Cash In';
                    break;
                case 2:
                    $typeText = 'Cash Out';
                    break;
                case 3:
                    $typeText = 'Deposit';
                    break;
                default:
                    $typeText = 'Unknown';
                    break;
            }
        @endphp
        {{ $typeText }}
    </td>
            <td>{{ $transactions->amount }} $</td> 
            <td>
            @php
            $typeText = '';
            switch ($transactions->status) {
                case 0:
                    $typeText = 'Rejected'; 
                    break;
                case 1:
                    $typeText = 'Accept';
                    break;
                case 2:
                    $typeText = 'Waiting';
                    break;
            }
        @endphp
        {{ $typeText }} 
     </td>  
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/dashboard" class="back-button">Back</a>
</body>
</html>







