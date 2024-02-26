<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>سامانه شهید فخری زاده</title>
    <link rel="stylesheet" type="text/css" href={{asset("css/login.css")}}>
</head>

<body>

<header>
    سامانه
    <span style="color: rgb(240,70,70)">شهید فخری زاده</span>
</header>

@php
    $error[0] = "";
    $opacity = '0';
@endphp

<div class="login">
    <div class="photo">
    </div>
        {!! Form::open(['route' => 'login.check' , 'method' => 'post' , 'id' => 'login-form']) !!}
        <div id="u" class="form-group">
            {!! Form::text('username' , null , ['id' => 'username' , 'size' => '18' , 'alt' => 'login' ,
            'required' => '' , 'class' => 'form-control' , 'spellcheck' => 'false']) !!}
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="username" class="float-label">نام کاربری</label>
            @error('username')
            @php
                $error = $errors -> get('username');
                $opacity = '1';
            @endphp
            @enderror
            <erroru style="opacity: {{$opacity}}">
                {{$error[0]}}
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </erroru>
        </div>
        <div id="p" class="form-group">
            {!! Form::password('password' , ['id' => 'password' , 'size' => '18' , 'alt' => 'login' ,
            'required' => '' , 'class' => 'form-control' , 'spellcheck' => 'false']) !!}
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="password" class="float-label">رمز عبور</label>
            @php
            $opacity = 0
            @endphp
            @error('password')
            @php
                $error = $errors -> get('password');
                $opacity = '1';
            @endphp
            @enderror
            <errorp style="opacity: {{$opacity}}">
                {{$error[0]}}
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </errorp>
        </div>
        <div class="form-group">
            <button id="submit" type="submit" ripple>ورود</button>
        </div>
        {!! Form::close() !!}
    @if(!empty(session('error_login')))
    <div class="error_log">
        {{session('error_login')}}
    </div>
    @endif

</div>

<p class="copyright">
    <span>تمامی حقوق مادی و معنوی این سامانه متعلق به مجموعه مسجد امام رضا(ع) شهرستان کاشمر می باشد.</span>
</p>

</body>

<script src={{asset("js/login.js")}}></script>

</html>
