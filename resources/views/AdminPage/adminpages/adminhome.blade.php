@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="admin-dashboard">
        <div class="card">
            <h1>Restaurant</h1>
            <span>numbers of registered restaurants</span>
            <p>{{ $count_restaurant }}</p>
            <a href="{{ route('uploader.restaurant') }}"><button>Open Card</button></a>
        </div>
        <div class="card">
            <h1>Menus</h1>
            <span>numbers of registered menus</span>
            <p>{{ $count_menu }}</p>
            <a href="{{ route('uploader.menu') }}"><button>Open Card</button></a>
        </div>
        <div class="card">
            <h1>Users</h1>
            <span>numbers of registered users</span>
            <p>{{ $count_user }}</p>
            <a href="{{ route('view.user') }}"><button>Open Card</button></a>
        </div>
    </div>
    <div class="table-user">
        <table>
            <thead>
                <tr>
                    <th>Account ID.</th>
                    <th>Created By</th>
                    <th>menu name</th>
                    <th>restaurant name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total amount</th>
                    <th>address</th>
                    <th>status</th>
                    <th>Date of Registration</th>
                    <th>Date Updated</th>
                    <th>Image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dlvry as $rows)
                    <tr>
                        <td>{{ $rows->id }}</td>
                        <td>{{ $rows->first_name }} {{ $rows->last_name }}</td>
                        <td>{{ $rows->menu_name }}</td>
                        <td>{{ $rows->restaurant_name }}</td>
                        <td>{{ $rows->price }}</td>
                        <td>{{ $rows->quantity }}</td>
                        <td>{{ $rows->total_amount }}</td>
                        <td>{{ $rows->address }}</td>
                        @if ($rows->status == 0)
                            <td>delevering</td>
                        @else
                            <td>delevered</td>
                        @endif
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ $rows->updated_at }}</td>
                        <td><img src="{{ asset('images/menu/' . $rows->image) }}" width="70px" height="70px"
                                alt="image">
                        </td>
                        <td>
                            <a
                                href="{{ route('change.status', ['id' => encrypt($rows->id)]) }}"><button>delivered</button></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
