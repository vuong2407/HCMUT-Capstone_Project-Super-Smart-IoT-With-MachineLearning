@extends('layouts.dashboard')

@section('content')
<div >
    <output-device-component
    :save-output-device-url = "'{{ route('addOutput') }}'" 
    :get-all-output-device = "'{{ route('getDataOutput') }}'" 
    :delete-device-url =  "'{{ route('deleteOutput') }}'" 
    ></output-device-component>
</div>
@endsection