@extends('index')

@section('title')
    <title>ثبت نام</title>
@endsection

@section('private_link')
    <link type="text/css" rel="stylesheet" href="{{asset("date/jalalidatepicker.min.css")}}" />
    <script type="text/javascript" src="{{asset("date/jalalidatepicker.min.js")}}"></script>
    <link href={{asset("css/register.css")}} rel="stylesheet">
@endsection

@section('main')
    <main>

    <span class="title_reg">
    فرم ثبت نام
    </span>
    {!! Form::open(['route' => 'store.user' , 'method' => 'Post' , 'class' => 'form_reg']) !!}
        @if ($errors->any())
            <span class="error">
            @foreach($errors->all() as $error)
                <i class="fa-solid fa-triangle-exclamation"></i>
                {{$error}}
                <br>
            @endforeach
            </span>
        @endif
        @if (!empty(session('error')))
            <span class="error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                {{session('error')}}
            </span>
        @endif
        <div>
            <label for="national_code">کد ملی:</label>
            {!! Form::text('national_code' , null , ['id' => 'national_code' , 'maxlength' => '10', 'minlength' => '10',
            'required' => '' , 'pattern' => '[0-9]{10}']) !!}
        </div>
        <div>
            <label for="fname">نام:</label>
            {!! Form::text('fname' , null , ['id' => 'fname' , 'maxlength' => '50', 'minlength' => '3', 'required' => '']) !!}
        </div>
        <div>
            <label for="lname">نام خانوادگی:</label>
            {!! Form::text('lname' , null , ['id' => 'lname' , 'maxlength' => '50', 'minlength' => '3', 'required' => '']) !!}
        </div>
        <div>
            <label for="father">نام پدر:</label>
            {!! Form::text('father' , null , ['id' => 'father' , 'maxlength' => '50', 'minlength' => '3', 'required' => '']) !!}
        </div>
        <div>
            <label for="birthday">تاریخ تولد:</label>
            {!! Form::text('birthday' , null , ['id' => 'birthday' , 'data-jdp' => '', 'required' => '' ,
            'onclick' => 'jalaliDatepicker.show(this);']) !!}
        </div>
        <div>
            <label for="case_status">وضعیت پرونده:</label>
            {!! Form::text('case_status' , null , ['id' => 'case_status' , 'maxlength' => '100', 'minlength' => '3']) !!}
        </div>
        <div>
            <label for="group">نام گروه:</label>
            {!! Form::select('group', $groups , null, ['placeholder' => 'یکی از حلقه ها را انتخب کنید...']) !!}
        </div>
        <div>
            <input type="submit" value="ثبت نام" class="btn_submit">
        </div>
    {!! Form::close() !!}
    </main>
@endsection

@section('private_script')
    <script>
        jalaliDatepicker.startWatch();
        jalaliDatepicker.hide();
        jalaliDatepicker.updateOptions(options);
    </script>
    <script src={{asset("js/register.js")}}></script>
@endsection
