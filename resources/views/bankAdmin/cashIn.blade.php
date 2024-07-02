<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; 
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            margin-top: 5px;
        }
        .btn-submit {
            background-color: green;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-cancel {
            background-color: #ccc;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-cancel:hover {
            background-color: #999;
        }
        .btn-container {
            text-align: center;
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
    <div class="container">
    <img src="/images/download.png" alt="Logo" class="logo"> 
        <h2>Create New Transaction</h2>
        <form action="{{ route('AddCashin.storeCashin') }}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="form-group">
        <label for="bank">COMPANY NAME:</label>
        <select name="company_id" id="company" required class="form-control">
             @foreach(\App\Models\Company::orderBy('id', 'desc')->get() as $Company)
             <option value="{{ $Company->id }}">{{ $Company->name}}</option>
             @endforeach
        </select> 
        </div>
            <div class="form-group">
                <label for="account_number">Account Number:</label>
                <input type="text" id="account_number" name="account_number" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" required> 
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-submit">Submit</button>
                
                <a href="/dashboard"><button type="button" class="btn-cancel">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>
