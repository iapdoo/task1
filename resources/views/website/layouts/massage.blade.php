@if(count($errors->all())>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h2>
            {{session('success')}}
        </h2>
    </div>
@endif
