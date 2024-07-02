<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  
  <style type="text/css">
body {
  background-color: lightgray;
  font-family: Arial, sans-serif;
}

.container {
  width: 500px;
  margin: 0 auto;
  padding-top: 100px;  
}

form {
  background-color: #ffffff;
  padding: 30px;
  border: 1px solid #dddddd;
  border-radius: 5px;
  height: 500px;
}

h1 {
  text-align: center;
  color:green;
}

h5 {
  text-align: center;
  color:grey;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #dddddd;
  border-radius: 5px;
}

a {
  display: block;
  text-align: right;
  margin-bottom: 10px;
  color: orange;
  text-decoration: none;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
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
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <h1>Welcome Back</h1>
      <h5>Enter your email and password to sign in</h5>
     
     <x-input-label for="email" :value="__('Email')" />
     <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="emain" />
     <x-input-error :messages="$errors->get('email')" class="mt-2" />
    
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
      @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                {{ __('SIGN IN') }}
            </x-primary-button>      
           
    </form>

  </div>
  <a href="/" class="back-button">Back</a>
</body>
</html>