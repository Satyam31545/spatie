@extends('layouts.main')

@push('title')
    <title>EMS | Create</title>
    <style>
        body {
            background-color: #df9ef5;
            margin: 0px;

        }


        #login {
            height: 550px;
            width: 400px;
            box-shadow: 0.5px 0.5px 3px 3px #888888;
            background-color: #ffffff;
        }

        select {
            height: 30px;
            border: 0px solid black;
            font-size: 15px;
            box-shadow: 0.5px 3px 3px #888888;
            width: 220px;

        }
        .lock{
            display: block;
        }
        .lock>input{
            box-shadow: 0px 0px 0px #ffffff;
            height: 15px;
            width:  20px;
        }
    </style>
@endpush
@section('main-section')
    <div id="login_box">

        <div id="login">
            <div id="login_h">
                Create Role
            </div>

            <div id="form_container">
                <div id="forms">
                    <form id="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">

                            <input type="text" name="name" id="name" aria-describedby="helpId"
                                placeholder="     Name">
                            <span id="ename"></span>
                        </div>

                        <div class="form-group">
                            <span>permission</span>
                            @foreach ($permissions as $permission)
                                   <div class="lock">{{$permission->name}}<input type="checkbox" name="permission[]" value="{{$permission->name}}"></div> 

                            @endforeach


                        </div>
                
                        <div class="form-group">
                            <input type="submit" name="submit" id="send" value="REGISTER">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="http://127.0.0.1:8000/jquary.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  --}}
    <script>
        jQuery('#form').submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: "{{ url('/role') }}",
                type: "POST",
                data: jQuery('#form').serialize(),
                error: function(request, status, error) {
                    var go = request.responseText;
                    var goo = JSON.parse(go);
                    goo = goo.errors;
                    if (goo) {
                        document.getElementById("login").style.height = "700px";
                    }

                    document.getElementById("ename").innerHTML = goo.name[0];


                },
                success: function(result) {
                    if (result =="") {
                         window.location = '/role';
                    }else{
                        console.log(result);
                    }
                   
                }
            });
        });
    </script>
@endsection
