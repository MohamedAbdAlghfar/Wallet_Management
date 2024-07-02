<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Deposit Details</title>
  <style>
body {
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f4f4f4;
  margin: 0;
}

.deposit-details {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  text-align: center;
}

.deposit-photo {
  width: 400px;  /* Increased width */
  height: 400px; /* Increased height */

}

.deposit-info {
  margin-bottom: 20px;
}

.company-name {
  margin: 0;
  font-size: 24px;
  color: #333;
}

.deposit-amount {
  font-size: 18px;
  color: #777;
}

.buttons {
  display: flex;
  justify-content: space-between;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  text-decoration: none;
  color: #fff;
  border-radius: 4px;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.btn.back {
  background-color: #6c757d;
}

.btn.back:hover {
  background-color: #5a6268;
}

.btn.approve {
  background-color: #28a745;
}

.btn.approve:hover {
  background-color: #218838;
}

.btn.reject {
  background-color: #dc3545;
}

.btn.reject:hover {
  background-color: #c82333;
}

  </style>
</head>
<body>
  <div class="deposit-details">
    <img class="deposit-photo" src="/images/{{$deposit->photo}}" alt="Deposit Image">
    <div class="deposit-info">
      <h2 class="company-name">{{ $deposit->company_name }}</h2>
      <p class="deposit-amount">Deposit Amount: ${{ $deposit->amount }}</p>
      <p class="deposit-amount">Deposit Date: {{ $deposit->created_at }}</p> 
    </div>
    <div class="buttons">
      <a class="btn back" href="{{ route('viewDeposit.show') }}">Back</a>
      <form action="{{ route('EditDeposit.Approve', $deposit) }}" method="POST" class="btn-form">
        @csrf
        <button type="submit" class="btn approve">Approve</button>
      </form>

      <form action="{{ route('EditDeposit.Reject', $deposit) }}" method="POST" class="btn-form">
        @csrf
        <button type="submit" class="btn reject">Reject</button>
      </form>

    </div>
  </div>
</body>
</html>
