@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>KLEDO PAYMENT</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ url('create') }}"> Create Post</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('payment.delete') }}" method="POST">
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Name</th>
            <th width="280px" class="text-center">Delete</th>
        </tr>
        @php
        $i=0;
        @endphp
        @foreach ($payments['data'] as $payment)
        <tr>

            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $payment['payment_name'] }}</td>
            <td class="text-center">
                <input type="checkbox" id="checkbox" name="checkbox_del[]" value="{{ $payment['id'] }}">

            </td>
        </tr>
        @endforeach
    </table>


    @csrf

    <button type="submit" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure want to delete this item?')">Delete</button>
</form>
@php
$disable = '';
$disNext = '';
if ($payments['current_page'] == '1') {
$disable = 'disabled';
$page = 1;
} else {
$page = $payments['current_page']-1;
}

if ($payments['current_page'] == $payments['last_page']) {
$disNext = 'disabled';
$next = $payments['last_page'];
} else {
$next = $payments['current_page'] + 1;
}
@endphp
<nav aria-label="...">
    <ul class="pagination">
        <li class="page-item {{ $disable }}">
            <a class="page-link" href="{{ url('/'.$page ) }}">Previous</a>
        </li>
        @for($i=1; $i<=$payments['last_page']; $i++) @if ($i==$payments['current_page']) <li class="page-item active"><a class="page-link" href="{{ url('/'.$i) }}">{{ $i }}</a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ url('/'.$i) }}">{{ $i }}</a></li>
            @endif
            @endfor

            <li class="page-item {{ $disNext }}">
                <a class="page-link" href="{{ url('/'.$next ) }}">Next</a>
            </li>
    </ul>
</nav>
@endsection
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('4332a205abc40feffa25', {
        cluster: 'ap1',
        forceTLS: true
    });
    var channel = pusher.subscribe('delete-payment-channel');
    channel.bind('delete-payment-event', function(data) {
        alert(JSON.stringify(data));
    });


</script>