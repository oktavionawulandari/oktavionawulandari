<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portofolio | By Okta</title>
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <input type="checkbox" id="show">
    <label for="show" class="show-btn">View Form</label>

    <div class="container">
        <label for="show" class="close-btn" title="close">×</label>
        <h1>Welcome To My Portofolio</h1>
        <form action="{{ route('action_login') }}" method="post">
            @csrf

            <!-- USERNAME -->
                <label>Username</label>
                     <input type="text" name="username" id="username" class="@error('username') is-invalid
                        @enderror" autofocus required value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}    
                        </div>    
                        @enderror

            <!-- PASSWORD -->
                <label>Password</label>
                    <input type="password"  name="password" id="password" required>
                        
            <a href="/home">Back To Portofolio</a>
                <button class="submit">Let's Go</button>
        </form>
    </div>
</body>
</html>