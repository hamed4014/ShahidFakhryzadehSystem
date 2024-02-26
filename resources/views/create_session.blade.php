@extends('index')

@section('title')
    <title>ایجاد گروه</title>
@endsection

@section('private_link')
    <link type="text/css" rel="stylesheet" href="{{asset("date/jalalidatepicker.min.css")}}" />
    <script type="text/javascript" src="{{asset("date/jalalidatepicker.min.js")}}"></script>
    <link href={{asset("css/register.css")}} rel="stylesheet">
@endsection

@section('main')
    <main>
    <span class="title_reg">
    ثبت جلسه جدید
    </span>
        {!! Form::open(['route' => 'store.session' , 'method' => 'Post' , 'class' => 'form_reg']) !!}
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
            <label for="date">تاریخ:</label>
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
        jalaliDatepicker.startWatch();
        jalaliDatepicker.hide();
        jalaliDatepicker.updateOptions(options);
    </script>
    <script src={{asset("js/register.js")}}></script>
@endsection

