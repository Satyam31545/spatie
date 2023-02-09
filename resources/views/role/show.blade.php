@extends('layouts.main')

@push('title')
    <title>EMS | Create</title>
    <style>

#login_h{
    color: red;
}
#Permissions{
    font-size: 30px;
}
</style>
@endpush
@section('main-section')

<div id="login_box">

<div>
    <a href="/role"><button>return</button></a>
<div id="login_h">Role name "{{$role->name}}"</div>
<div id="Permissions">Permissions</div>
@foreach ($rolePermissions as $item)
   <p> {{$item->name}}</p>
@endforeach
</div>
</div>
  
@endsection
