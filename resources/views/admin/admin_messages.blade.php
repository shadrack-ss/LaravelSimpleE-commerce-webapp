@extends('admin.layout')

@section('content')
    @if(session('message'))
        <div class="message">
            <span>{{ session('message') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif

    <section class="contacts">
        <h1 class="heading">Messages</h1>

        <div class="box-container">
            @if($messages->count() > 0)
                @foreach($messages as $message)
                    <div class="box">
                        <p> user id : <span>{{ $message->user_id }}</span></p>
                        <p> name : <span>{{ $message->name }}</span></p>
                        <p> email : <span>{{ $message->email }}</span></p>
                        <p> number : <span>{{ $message->number }}</span></p>
                        <p> message : <span>{{ $message->message }}</span></p>
                        <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="empty">You have no messages</p>
            @endif
        </div>
    </section>
@endsection
