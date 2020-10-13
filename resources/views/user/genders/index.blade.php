@extends('user.layouts.app', ['page' => 'gender'])

@section('title', 'الجنسs')

@section('content')
<div class="x_title">
    <h2>الجنسs</h2>

    <a class="pull-right btn btn-primary"
        href="{{ route('user.genders.create') }}"
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

        @forelse ($genders as $gender)
            <tr>
                <td>{{ $gender->id }}</td>
                <td>{{ $gender->name }}</td>
                <td>
                    <a href="{{ route('user.genders.edit', ['gender' => $gender->id]) }}">
                        <i  style="color: orange;" class="fa fa-pencil-square-o"></i>
                    </a>

                    <form action="{{ route('user.genders.destroy', ['gender' => $gender->id]) }}"
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
    {{ $genders->links('vendor.pagination.default') }}
</div>
@endsection
