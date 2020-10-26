@extends('user.layouts.app', ['page' => 'report'])

@section('title', 'إداراة التقارير')

@section('content')
{{-- <div class="x_title">
    <h3>تقرير المساجد في منطقة</h3>
    <br/>
     <form  target="_blank" class="form-inline" style="display: inline">
       <h1> 
         <label for="mosque-id">الجامع</label> 
       </h1>
        <h1>

             <label for="mosque-id">الجامع</label> 
            <select class="form-control" style="width: 200px" name="mosque_id" required id="mosque-id">
                @foreach ($mosques as $mosque)
                <option value="{{ $mosque->id }}" {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}>
                    {{ $mosque->name }}
                </option>
                @endforeach
            </select>
            
        </h1>
        <a class="pull-right btn btn-primary" href="{{ route('admin.teachers.create') }}">
            إضافة جديد
        </a>
    </form> 
    <form  target="_blank" class="form-inline" role="form" method="POST" action="{{ route('user.report1') }}">
        
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="city" class="sr-only">ادخل اسم المنطقة</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="ادخل اسم المنطقة">
        </div>
        <button type="submit" class="btn btn-primary mb-2">عرض</button>
    </form>

    <div class="clearfix"></div>
</div> --}}
<div class="x_title">
    <h3>تقرير الطلبة  في مستوى</h3>
    <br />
    <form  target="_blank" class="form-inline" role="form" method="POST" action="{{ route('user.report2') }}">
        @csrf
        {{-- <div class="form-group mx-sm-3 mb-2">
            <label for="mosque-id">الجامع</label>
            <select class="form-control" style="width: 200px" name="mosque_id" required id="mosque-id">
                @foreach ($mosques as $mosque)
                <option value="{{ $mosque->id }}" {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}>
                    {{ $mosque->name }}
                </option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group mx-sm-3 mb-2">
            <label for="level-id">المستوى</label>
            <select class="form-control" style="width: 200px" name="level_id" required id="level-id">
                @foreach ($levels as $level)
                <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>
                    {{ $level->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">عرض</button>
    </form>
    <div class="clearfix"></div>
</div>
    <div class="x_title">
        <h3>تقرير المعلمين في مسجد</h3>
        <br /> 
        <form  target="_blank" class="form-inline" role="form" method="POST" action="{{ route('user.report3') }}">
            @csrf
            {{-- <div class="form-group mx-sm-3 mb-2">
                <label for="mosque-id">الجامع</label>
                <select class="form-control" style="width: 200px" name="mosque_id" required id="mosque-id">
                    @foreach ($mosques as $mosque)
                    <option value="{{ $mosque->id }}" {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}>
                        {{ $mosque->name }}
                    </option>
                    @endforeach
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary mb-2">عرض</button>
        </form>
    
    <div class="clearfix"></div>
</div>
<div class="x_title">
    <h3>تقرير الطلبة لجنس معين </h3>
    <br />
    <form  target="_blank" class="form-inline" role="form" method="POST" action="{{ route('user.report4') }}">
        @csrf
        {{-- <div class="form-group mx-sm-3 mb-2">
            <label for="mosque-id">الجامع</label>
            <select class="form-control" style="width: 200px" name="mosque_id" required id="mosque-id">
                @foreach ($mosques as $mosque)
                <option value="{{ $mosque->id }}" {{ old('mosque_id') == $mosque->id ? 'selected' : '' }}>
                    {{ $mosque->name }}
                </option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group mx-sm-3 mb-2">
            <label for="gender-id">الجنس</label>
            <select class="form-control" style="width: 200px" name="gender_id" required id="gender-id">
                @foreach ($genders as $gender)
                <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                    {{ $gender->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">عرض</button>
    </form>

    <div class="clearfix"></div>
</div>
{{-- 
<br>

<div class="box-body">
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>تاريخ الميلاد</th>
                <th>رقم كتيب العائلة</th>
                <th>طبيعة التكليف</th>
                <th>الجامع</th>
                <th>الحالة</th>
                <th>العمليات</th>
            </tr>
        </thead> --}}
        {{-- <tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->date_birth }}</td>
        <td>{{ $teacher->family_booklet_number }}</td>
        <td>{{ $teacher->getDesignation() }}</td>
        <td>{{ $teacher->mosque->name }}</td>
        @if ($teacher->active)
        <td><span class="badge bg-green"> غير موقوف</span></td>

        @else
        <td><span class="badge bg-red">موقوف</span></td>
        @endif
        <td>
            <a href="{{ route('user.teachers.edit', ['teacher' => $teacher->id]) }}">
                <i style="color: orange;" class="fa fa-pencil-square-o"></i>
            </a>

            <form action="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}" method="POST"
                class="inline pointer">
                @csrf
                @method('DELETE')

                <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">
                    @if ($teacher->active)
                    <i data-toggle="tooltip" title="ايقاف" class='fa fa-lock'></i>
                    @else
                    <i data-toggle="tooltip" title="تفعيل" class='fa fa-lock-open'></i>
                    @endif
                </a>
            </form>
        </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">لاتوجد سجلات</td>
        </tr>
        @endforelse
        </tbody> --}}
    {{-- </table>
</div>

<div class="box-footer clearfix">
    {{-- {{ $teachers->links('vendor.pagination.default') }} --}}
{{-- </div>  --}}
@endsection