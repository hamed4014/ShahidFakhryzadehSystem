@extends('index')

@section('title')
    <title>ایجاد گروه</title>
@endsection

@section('private_link')
    <link href={{asset("css/register.css")}} rel="stylesheet">
@endsection

@section('main')
    <main>
    <span class="title_reg">
    ایجاد حلقه
    </span>
    {!! Form::open(['route' => 'store.group' , 'method' => 'Post' , 'class' => 'form_reg']) !!}
        <div>
            <label for="name">نام حلقه:</label>
            {!! Form::text('name' , null , ['id' => 'name' , 'maxlength' => '100', 'minlength' => '3', 'required' => '']) !!}
        </div>
        <div>
            <label for="teacher">نام سر گروه:</label>
            {!! Form::text('teacher' , null , ['id' => 'teacher' , 'maxlength' => '100', 'minlength' => '3', 'required' => '']) !!}
        </div>
        <div>
            <input type="submit" value="ایجاد" class="btn_submit">
        </div>
    {!! Form::close() !!}
    </main>
@endsection

@section('private_script')
    <script src={{asset("js/register.js")}}></script>
@endsection
