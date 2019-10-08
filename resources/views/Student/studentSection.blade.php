@include('layouts.status')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item"> <a href="{{url('/show-order-history/'.Auth::user()->id)}}">Show Order History</a></li>
    </ul>
</div>