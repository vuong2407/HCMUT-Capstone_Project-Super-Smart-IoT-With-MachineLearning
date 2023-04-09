@extends('layouts.dashboard')

@section('content')
<div >
    <register-receive-mail-component
    :all-farms = "{{json_encode($farm)}}"
    ></register-receive-mail-component>
</div>
@endsection