@extends('index')

@section('title')
    <title>گزارش حضور و غیاب</title>
@endsection

@section('private_link')
    <link type="text/css" rel="stylesheet" href="{{asset("date/jalalidatepicker.min.css")}}" />
    <script type="text/javascript" src="{{asset("date/jalalidatepicker.min.js")}}"></script>
    <link href={{asset("css/register.css")}} rel="stylesheet">
@endsection

@section('main')
    <main>
    <span class="title_reg">
    انتخاب حلقه صالحین
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
        @if (!empty(session('user_error')) || !empty(session('group_error')) || !empty(session('date_error')))
            <span class="error">
                @if(!empty(session('user_error')))
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{session('user_error')}}
                    <br>
                @endif
                @if(!empty(session('group_error')))
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{session('group_error')}}
                    <br>
                @endif
                @if(!empty(session('date_error')))
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    {{session('date_error')}}
                    <br>
                @endif
            </span>
        @endif
        <datalist id="groups">
            @foreach($groups as $group)
                @php
                    $name = "$group->name";
                @endphp
                <option value="{{$name}}"></option>
            @endforeach
        </datalist>
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
            <input type="submit" value="نمایش گزارش" class="btn_submit">
        </div>
        {!! Form::close() !!}
    </main>
@endsection

@section('private_script')
    <script>
        jalaliDatepicker.startWatch();
        jalaliDatepicker.hide();
    </script>
    <script src={{asset("js/register.js")}}></script>
@endsection



