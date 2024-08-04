@extends('Components.layout')
@section('dashboard_bar')
    Dashboard
@endsection
@section('content')
 
	<!--**********************************
		Content body start
	***********************************-->
				<style>
					.box-container {
						display: flex;
						flex-wrap: wrap; /* Allows wrapping for responsiveness */
						gap: 20px; /* Space between the boxes */
						justify-content: space-between; /* Evenly distributes space between items */
						margin-top: 2px;
						margin-bottom: 20px;
					}

					.box {
						background-color: #f9f9f9; /* Light background color */
						border: 1px solid #ddd; /* Border color */
						border-radius: 8px; /* Rounded corners */
						padding: 20px; /* Padding inside the boxes */
						flex: 1 1 calc(25% - 40px); /* Flexible width, considering the gap */
						box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Light shadow for depth */
						text-align: center; /* Center-align text */
						min-width: 250px; /* Minimum width to maintain box size */
					}

					.box h3 {
						font-size: 24px; /* Font size for headings */
						margin-bottom: 10px; /* Space below headings */
						color: #333; /* Text color */
					}

					.box p {
						font-size: 16px; /* Font size for paragraphs */
						margin-bottom: 20px; /* Space below paragraphs */
						color: #666; /* Text color */
					}

					.box .btn {
						display: inline-block; /* Makes the button inline-block */
						padding: 10px 20px; /* Padding inside the button */
						background-color: #007bff; /* Button background color */
						color: #fff; /* Button text color */
						border-radius: 5px; /* Rounded corners */
						text-decoration: none; /* Removes underline from links */
						transition: background-color 0.3s; /* Smooth transition for hover effect */
					}

					.box .btn:hover {
						background-color: #0056b3; /* Darker background on hover */
					}

					/* Media query for smaller screens */
					@media (max-width: 768px) {
						.box {
							flex: 1 1 calc(50% - 20px); /* Two columns on medium screens */
						}
					}

					/* Media query for very small screens */
					@media (max-width: 480px) {
						.box {
							flex: 1 1 100%; /* Full width on small screens */
						}
					}
				</style>

				<div class="box-container">
					<div class="box">
						<h3>Welcome!</h3>
						<p>{{$admin->first_name }}</p>
						<a href="/profile" class="btn">View Profile</a>
					</div>

					<div class="box">
						<h3><span>UGX </span>{{ $total_pendings }}<span>/-</span></h3>
						<p>Total Pendings</p>
						<a href="/pending" class="btn">See Orders</a>
					</div>

					<div class="box">
						<h3><span>UGX </span>{{ $total_completes }}<span>/-</span></h3>
						<p>Completed Orders</p>
						<a href="/completed" class="btn">See Orders</a>
					</div>

					<div class="box">
						<h3>{{ $number_of_orders }}</h3>
						<p>All Orders</p>
						<a href="/all_orders" class="btn">See Orders</a>
					</div>

					<div class="box">
						<h3>{{ $number_of_products }}</h3>
						<p>Products Added</p>
						<a href='/products' class="btn">See Products</a>
					</div>

					<div class="box">
						<h3>{{ $number_of_users }}</h3>
						<p>Normal Users</p>
						<a href="/users" class="btn">See Users</a>
					</div>

					<div class="box">
						<h3>{{ $number_of_admins }}</h3>
						<p>Admin Users</p>
						<a href="/admin-list" class="btn">See Admins</a>
					</div>

					<div class="box">
						<h3>{{ $number_of_messages }}</h3>
						<p>New Messages</p>
						<a href="/messages" class="btn">See Messages</a>
					</div>

	<!--**********************************
		Content body end
	***********************************-->

@endsection