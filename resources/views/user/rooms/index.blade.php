@extends('user.layouts.app', ['page' => 'room'])

@section('title', 'الفصول')

@section('content')
<div class="x_title">
    <h2>الفصول</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.rooms.create') }}"
    >
        إضافة جديد
    </a>

    <div class="clearfix"></div>
</div>

<br>

<div class="box-body">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الإسم</th>
            <th>السعة</th>
            <th>الطابق</th>
            {{-- <th>الجامع</th> --}}
            <th>العمليات</th>
        </tr>

        @forelse ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->getFloor() }}</td>
                {{-- <td>{{ $room->mosque->name }}</td> --}}
                <td>
                    <a href="{{ route('user.rooms.edit', ['room' => $room->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    {{-- <form action="{{ route('user.rooms.destroy', ['room' => $room->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form> --}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">لاتوجد سجلات</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $rooms->links('vendor.pagination.default') }}
</div>
@endsection
