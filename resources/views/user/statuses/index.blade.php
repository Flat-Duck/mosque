@extends('user.layouts.app', ['page' => 'status'])

@section('title', 'Statuses')

@section('content')
<div class="x_title">
    <h2>Statuses</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.statuses.create') }}"
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
            <th>العمليات</th>
        </tr>

        @forelse ($statuses as $status)
            <tr>
                <td>{{ $status->id }}</td>
                <td>{{ $status->name }}</td>
                <td>
                    <a href="{{ route('user.statuses.edit', ['status' => $status->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('user.statuses.destroy', ['status' => $status->id]) }}"
                        method="POST"
                        class="inline pointer"
                    >
                        @csrf
                        @method('DELETE')

                        <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">لاتوجد سجلات</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $statuses->links('vendor.pagination.default') }}
</div>
@endsection
