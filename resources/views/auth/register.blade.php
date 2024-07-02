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

input[type="text"],
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
        height: 150px; }
  </style>  



</head>
<body>
  <div class="container">
  <img src="/images/download.png" alt="Logo" class="logo">
  <form method="POST" action="{{ route('register') }}">
        @csrf
      <h1>Create an Account</h1>
      <h5>Enter your details to register</h5>

      <x-input-label for="name" :value="__('Name')" />
      <br>
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
      <br>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />

      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />

      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required />
      
     <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

      <x-primary-button class="ms-3">
        {{ __('REGISTER') }}
      </x-primary-button>     
    </form>
  </div>
</body>
</html>