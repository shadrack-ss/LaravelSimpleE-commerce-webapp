@extends('Components.layout')

@section('title', 'Edit Profile')
@section('dashboard_bar')
    Your Profile
@endsection

@section('content')   
    <!--**********************************
        Content body start
    ***********************************-->

    <!-- row -->
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="clearfix">
                <div class="card card-bx author-profile m-b30">
                    <div class="card-body">
                        <div class="p-5">
                            <div class="author-profile">
                                <div class="author-media">
                                    <img src="{{ asset('assets/admin_pics/' . $admin->profile_pic) }}" alt="Profile Picture"
                                    style="
                                    width: 200px;
                                    height: 200px;
                                    overflow:hidden;
                                    ">
                                </div>
                                <div class="author-info">
                                    <h6 class="title">{{ $admin->first_name }}</h6>
                                    <span>{{ $admin->specialty }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="card card-bx m-b30">
                <div class="card-header">
                    <h4 class="card-title">Account Details</h4>
                </div>
                <form class="profile-form" method="GET" action="{{ route('edit.profile') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Method should be PUT or PATCH if updating -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ $admin->first_name }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname" value="{{ $admin->surname }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Specialty</label>
                                <input type="text" class="form-control" name="specialty" value="{{ $admin->specialty }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Skills</label>
                                <input type="text" class="form-control" name="skills" value="{{ $admin->skills }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" name="gender" value="{{ $admin->gender }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <div class="example">
                                    <label class="form-label">Birth</label>
                                    <input class="form-control" type="text" name="birth_date" placeholder="2017-06-04" value="{{ $admin->birth_date }}" id="mdate" readonly>
                                </div>    
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Email address</label>
                                <input type="text" class="form-control" name="email" value="{{ $admin->email }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" value="{{ $admin->country }}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{ $admin->city }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">EDIT PROFILE</button>
                        <a href="{{ route('dashboard.home') }}" class="text-primary btn-link">DASHBOARD</a>
                    </div>
                </form>
            </div>
        </div>
    </div>    

    <!--**********************************
        Content body end
    ***********************************-->
@endsection
