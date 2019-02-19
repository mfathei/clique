@if (count($errors) > 0)
<div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	<ul>
        @foreach($errors->all() as  $error)
                <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('success'))
    <h2 class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session()->get('success') }}
    </h2>
@endif

@if(session()->has('error'))
    <h2 class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session()->get('error') }}
    </h2>
@endif