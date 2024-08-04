@extends('Components.layoutU')
@section('content')
<section class="form-container">
   @if ($errors->any())
      <div>
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   @if (session('message'))
      <div>
         {{ session('message') }}
      </div>
   @endif

   <form action='/profile/update' method="post">
      @csrf
      <h3>Update Now</h3>
      <input type="text" name="name" required placeholder="Enter your username" maxlength="20" class="box" value="{{ old('name', $user->name) }}">
      <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" value="{{ old('email', $user->email) }}" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="old_pass" placeholder="Enter your old password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="Enter your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass_confirmation" placeholder="Confirm your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Update Now" class="btn">
   </form>
</section>
@endsection
