@extends('index')

@section('title')
    <title>ثبت حضور و غیاب</title>
@endsection

@section('private_link')
    <link type="text/css" rel="stylesheet" href="{{asset("date/jalalidatepicker.min.css")}}" />
    <script type="text/javascript" src="{{asset("date/jalalidatepicker.min.js")}}"></script>
    <link href={{asset("css/register.css")}} rel="stylesheet">
@endsection

@section('main')
    <main>
    <span class="title_reg">
    ثبت حضور افراد
    </span>
        {!! Form::open(['route' => 'store.present' , 'method' => 'Post' , 'class' => 'form_reg']) !!}
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
        <datalist id="names">
            @foreach($users as $user)
                @php
                    $name = "$user->fname"." "."$user->lname";
                    $national_code = $user->national_code;
                @endphp
                <option value="{{$national_code}}">{{$name}}</option>
            @endforeach
        </datalist>
        <datalist id="groups">
            @foreach($groups as $group)
                @php
                    $name = "$group->name";
                @endphp
                <option value="{{$name}}"></option>
            @endforeach
        </datalist>
        <div>
            <label for="names">کد ملی:</label>
            {!! Form::text('national_code' , null , ['id' => 'national_code' , 'required' => '' , 'list' => 'names']) !!}
        </div>
        <div>
            <label for="date">حلقه صالحین:</label>
            {!! Form::text('group' , null , ['id' => 'group' , 'list' => 'groups' , 'required' => '']) !!}
        </div>
        <div>
            <label for="date">تاریخ جلسه:</label>
            {!! Form::text('date' , null , ['id' => 'date' , 'data-jdp' => ''  , 'onclick' => 'jalaliDatepicker.show(this);'
            , 'required' => '']) !!}
        </div>
        <div>
            <input type="submit" value="ثبت" class="btn_submit">
        </div>
        {!! Form::close() !!}
    </main>
@endsection

@section('private_script')
    <script>
        const defaultDate = { year: 1402, month: 11, day: 20 };
        jalaliDatepicker.startWatch();
        jalaliDatepicker.hide();
        document.getElementById("date").defaultValue = "{{$date}}";
    </script>
    <script src={{asset("js/register.js")}}></script>
@endsection


