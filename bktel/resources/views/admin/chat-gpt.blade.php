@extends('layouts.dashboard')

@section('content')
<div >
    <chat-gpt-component
    :send-message-gpt = "'{{ route('sendMessageToGPT') }}'" 
    :name= "{{json_encode($name)}}"
    :disease= "{{json_encode($disease)}}"
    ></chat-gpt-component>
</div>
@endsection