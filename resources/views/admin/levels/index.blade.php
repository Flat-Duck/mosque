@extends('admin.layouts.app', ['page' => 'level'])

@section('title', 'المستويات')

@section('content')
<div class="x_title">
    <h2>المستويات</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('admin.levels.create') }}"
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

        @forelse ($levels as $level)
            <tr>
                <td>{{ $level->id }}</td>
                <td>{{ $level->name }}</td>
                <td>
                    <a href="{{ route('admin.levels.edit', ['level' => $level->id]) }}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('admin.levels.destroy', ['level' => $level->id]) }}"
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
                <td colspan="3">No records found</td>
            </tr>
        @endforelse
    </table>
</div>

<div class="box-footer clearfix">
    {{ $levels->links('vendor.pagination.default') }}
</div>
@endsection
