@if ($message = Session::get('success'))
    <div style ="padding: 5px; background-color: #f896f0ff; color:white;">
        {{ $message }}
    </div>
@endif 
@if ($message = Session::get('danger'))
    <div style ="padding: 5px; background-color:rgb(208,9,9); color:white;">
        {{ $message }}
    </div>
@endif