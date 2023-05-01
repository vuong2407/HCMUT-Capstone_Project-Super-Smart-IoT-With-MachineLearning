@extends('layouts.dashboard')

@section('content')
<div >
    <chat-gpt-component
    :send-message-gpt = "'{{ route('sendMessageToGPT') }}'" 
    ></chat-gpt-component>
</div>
@endsection