<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @include('layouts.status')
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{url('/users')}}">New Users</a></li>
                    <li class="list-group-item"><a href="{{url('/food-items/create')}}">Add Food Item</a></li>
                    <li class="list-group-item"><a href="{{url('/order-list')}}">See Order List</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
