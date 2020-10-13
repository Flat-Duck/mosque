@extends('user.layouts.app', ['page' => 'nationality'])

@section('title', 'Nationalities')

@section('content')
<div class="x_title">
    <h2>Nationalities</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.nationalities.create') }}"
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

        @forelse ($nationalities as $nationality)
            <tr>
                <td>{{ $nationality->id }}</td>
                <td>{{ $nationality->name }}</td>
                <td>
                    <a href="{{ route('user.nationalities.edit', ['nationality' => $nationality->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('user.nationalities.destroy', ['nationality' => $nationality->id]) }}"
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
    {{ $nationalities->links('vendor.pagination.default') }}
</div>
@endsection
