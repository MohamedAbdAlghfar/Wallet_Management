<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>List of Banks</title>
<link rel="stylesheet" href="styles.css"> <!-- Link your CSS file -->

<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.bank-table {
    width: 100%;
    border-collapse: collapse;
}

.bank-table th, .bank-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.bank-table th {
    background-color: #f2f2f2;
}

.delete-button {
    background-color: #f44336; /* Red color */
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 14px;
}

.delete-button:hover {
    background-color: #d32f2f; /* Darker red on hover */
}

.logo { position: absolute;
        top: 10px;
        left: 10px;
        width: 150px;
        height: 150px; 
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

</style>




</head>
<body>

<div class="container">
<img src="/images/download.png" alt="Logo" class="logo">
    <h2>List of Companies</h2>
    <table class="bank-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->balance }}</td>
                <td>
                    <form action="{{ route('Company.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="/dashboard" class="back-button">Back</a>
</body>
</html>
  