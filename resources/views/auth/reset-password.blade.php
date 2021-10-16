<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="container">
    <form action="auth/password/reset" method="POST">
        <h2>Reset Password</h2>

        <input name="email" type="email" placeholder="example@example.com" value="{{ request()->get('email') }}">
        <input name="password" type="password" placeholder="New Password">
        <input name="password_confirmation" type="password" placeholder="Confirm New Password">
        <input name="token" type="hidden" value="{{ request()->get('token') }}">

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
