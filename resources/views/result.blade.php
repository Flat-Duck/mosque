@extends('layouts.guest')

@section('title', 'النتيجة')

@section('content')
<h1> نتيجة الطالب</h1>

<form method="post" action="/result">
    @csrf
    <div><input type="text" name="enrolment_number" class="form-control" placeholder="رقم القيد" required></div>
    <div><button type="submit" class="btn btn-default submit">عرض</button></div>
    <div class="clearfix"></div>
</form>
@if (!is_null($exams))

<h1 class="text-center">
{{$exams->first()->student->mosque->name}}
</h1>
<br>
<br>
<br>
<div class="x_title">

  <h3>الاسم: {{$exams->first()->student->name}}    رقم القيد: {{$exams->first()->student->enrolment_number}}  </h3>   
    <div class="clearfix"></div>
</div>

<br>
<div class="box-body">
    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                
                <th>تاريخ الامتجان</th>
                <th>المستوى</th>
                <th>المعلم</th>
                <th>درجة الحفظ</th>
                <th> درجة الاحكام التطبيقية</th>
                <th>درجة الرسم القرأني</th>
                <th>درجة التجويد</th>
                <th>المجموع</th>
                <th>التقدير</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($exams as $exam)
            <tr>
                <td>{{ $exam->date }}</td>
                <td>{{ $exam->level->name }}</td>
                <td>{{ $exam->teacher->name }}</td>
                <td>{{ $exam->save }}</td>
                
                <td>{{ $exam->applied_rules }}</td>
                <td>{{ $exam->drawing }}</td>
                
                <td>{{ $exam->pronunciation }}</td>
                
                @php
                    $total =
                    $exam->save +
                    $exam->applied_rules +
                    $exam->pronunciation +
                    $exam->drawing;
                    @endphp
                 
                 <td>{{ $total }}</td>
                 @switch($total)
                     @case($total<50)
                         <td>راسب</td>
                         @break
                     @case($total>50&& $total<75)
                         <td>جيد</td>
                         @break
                     @case($total>75&& $total<100)
                         <td>ممتاز</td>
                         @break
                     @default
                         <td>شن حالك</td>
                 @endswitch
            </tr>
            @empty
            <tr>
                <td colspan="7">لاتوجد سجلات</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endif

@endsection