@extends('Components.layout')
@section('title', 'Admins')
@section('dashboard_bar')
    Admin List
@endsection
@section('content')

<section class="orders">


    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @elseif ($admins->isEmpty())
        <p class="alert alert-warning">No admins found!</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Specialty</th>
                        <th>Skills</th>
                        <th>Gender</th>
                        <th>Birth Date</th>
                        <th>Profile Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->first_name }}</td>
                            <td>{{ $admin->surname }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{ $admin->country }}</td>
                            <td>{{ $admin->city }}</td>
                            <td>{{ $admin->specialty }}</td>
                            <td>{{ $admin->skills }}</td>
                            <td>{{ $admin->gender }}</td>
                            <td>{{ $admin->birth_date }}</td>
                            <td><img src="{{ asset('assets/admin_pics/' . $admin->profile_pic) }}" alt="Profile Picture" width="50"></td>
                            <td>
                                <form action="{{ route('user.delete', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this admin?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</section>

@endsection
