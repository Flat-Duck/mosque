@extends('admin.layouts.app', ['page' => 'room'])

@section('title', 'Rooms')

@section('content')
<div class="x_title">
    <h2>Rooms</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.rooms.create') }}"
    >
        Add New
    </a>

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Floor</th>
            <th>Mosque</th>
            <th>Action</th>
        </tr>

        @forelse ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->getFloor() }}</td>
                <td>{{ $room->mosque->name }}</td>
                <td>
                    <a href="{{ route('admin.rooms.edit', ['room' => $room->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.rooms.destroy', ['room' => $room->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No records found</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $rooms->links('vendor.pagination.default') }}
</div>
@endsection