@extends('index')

@section('title')
    <title>سامانه شهید فخری زاده</title>
@endsection

@section('private_link')
    <link rel="stylesheet" type="text/css" href={{asset("css/home.css")}}>
@endsection

@section('main')
<main>
    <div class="log">
        جناب آقای
        <span>
            {{$adminInfo->fname}}
            {{" "}}
            {{$adminInfo->lname}}
        </span>
        {{$admin->responsibility}} پایگاه امام خمینی (ره) به سامانه هوشمند شهید فخری زاده خوش آمدید.
    </div>

    <div class="massage_box">
        <span>پیام ها:</span>
        <span>
            هیچ پیامی ندارید!
        </span>
    </div>

    <div class="general_info">
        <div class="statistics">
            <div class="chart" style="background: conic-gradient(rgb(110,200,255) 0 40%, rgb(200,200,200) 0 60%);" id="chart"></div>
            <span>
                <i class="fa-solid fa-square" style="color: rgb(200,200,200);"></i>
                بسیجیان عادی:
                900 نفر
            </span>
            <span>
                <i class="fa-solid fa-square" style="color: rgb(110,200,255);"></i>
                بسیجیان فعال:
                350 نفر
            </span>
        </div>

    </div>


</main>

@endsection


@section('private_script')
    <script src={{asset("js/first_page.js")}}></script>
@endsection
