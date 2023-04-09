@extends('layouts.dashboard')

@section('content')
<div >
    <input-device-component
    :save-input-device-url = "'{{ route('addInput') }}'" 
    :get-all-input-device = "'{{ route('getDataInput') }}'" 
    :delete-device-url =  "'{{ route('deleteInput') }}'" 
    ></input-device-component>
</div>
@endsection