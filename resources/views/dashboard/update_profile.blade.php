<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

@include('components.admin_header')

<section class="form-container">

    <form action="/edit_profile" method="post">
        @csrf
        <h3>Update Profile</h3>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <input type="text" name="name" value="{{ old('name', $admin->name) }}" required placeholder="Enter your username" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="password" name="old_password" placeholder="Enter old password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="password" name="new_password" placeholder="Enter new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="password" name="new_password_confirmation" placeholder="Confirm new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="submit" value="Update Now" class="btn">
    </form>

</section>

<script src="{{ asset('js/admin_script.js') }}"></script>

</body>
</html>
