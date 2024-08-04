@extends('Components.layout')

@section('title', 'Edit Profile')
@section('dashboard_bar')
    Customer Messages
@endsection

@section('content')    
        <!--**********************************
            Content body start
        ***********************************-->
        

		<section class="messages">
        @if($messages->isEmpty())
            <p>No messages for today.</p>
        @else
            @foreach($messages as $message)
                <div>
                    <p class="mb-2">{{ $message->message }}</p>
                <!--    <div class="dz-media">
                        <img src="{{ asset('assets/images/avatar/4.jpg') }}" alt="">
                    </div>
-->
                    <span class="fs-14">{{ $message->created_at->format('h:i A') }}</span>
                </div>
            @endforeach
        @endif
							
@endsection
        
