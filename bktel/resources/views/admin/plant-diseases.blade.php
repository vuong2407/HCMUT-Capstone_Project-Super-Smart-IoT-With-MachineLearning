@extends('layouts.dashboard')

@section('content')
<div >
    <plant-diseases-component
    :predict-disease-url =  "'{{ route('predictDisease') }}'" 
    :redirect-to-chat-gpt = "'{{ route('chatGPT') }}'" 
    ></plant-diseases-component>
</div>
@endsection