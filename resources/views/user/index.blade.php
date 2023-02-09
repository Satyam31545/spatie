@extends('layouts.main')

@push('title')
    <title>EMS | Create</title>
    <style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
@endpush
@section('main-section')

@can('user-create')
  <a href="user/create"><button>create</button></a>
@endcan

<table id="customers">
    <tr>
      <th>user</th>
      <th>email</th>
      <th>role</th>
      <th>Authority</th>
    </tr>
    @foreach ($users as $user)

 <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
      <td>{{$user->getRoleNames()[0]}}</td>
      <td>        

            @can('user-edit')
      <a href="user/{{$user->id}}/edit"><button>edit</button></a>
@endcan
@can('user-delete')
          <form action="{{ url('user/'.$user->id)}}" method="POST">
            @csrf 
            @method('DELETE')
            <button>delete</button>
            </form> 
@endcan
    
         </td>
 </tr>
    @endforeach
   

   
   
  </table>
  
@endsection
