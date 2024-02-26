@extends('index')

@section('title')
    <title>لیست بسیجیان</title>
@endsection

@section('private_link')
    <link href={{asset("css/user_list.css")}} rel="stylesheet">
@endsection



@section('main')
    @if(!empty($massage))
        @if ( $massage != null )
            <div class="massage_successful" on="massage()" id="alert">
                <div>
                    <i class="fa-solid fa-circle-check" style="margin-left: 4px;"></i>
                    {{$massage}}
                </div>
            </div>
        @endif
    @endif
<main>

    <a href="{{route('create.user')}}">
    <button class="signin_button">
        <i class="fa-solid fa-user-plus"></i>
        ثبت نام
    </button>
    </a>

    <div class="search">
        {!! Form::open(['route' => 'home.user_list.search' , 'method' => 'GET' , 'id' => 'search_form']) !!}
        @if (empty($search))
            {!! Form::text('search' , null , ['id' => 'search_box' , 'placeholder' => 'کد ملی، نام، نام خانوادگی، نام پدر...',
            'maxlength' => '16']) !!}
        @else
            {!! Form::text('search' , $search , ['id' => 'search_box' , 'placeholder' => 'کد ملی، نام، نام خانوادگی، نام پدر...',
            'maxlength' => '16']) !!}
        @endif
            <label><i class="fa-solid fa-magnifying-glass"></i></label>
            {!! Form::submit(null,['class'=>"search_butten"]) !!}
        {!! Form::close() !!}

    </div>

    <div class="user_list">
        <table>
            <thead>
            <td style="width: 6%">
                ردیف
            </td>
            <td style="width: 18%">
                کد ملی
            </td>
            <td style="width: 14%">
                نام
            </td>
            <td style="width: 18%">
                نام خانوادگی
            </td>
            <td style="width: 14%">
                نام پدر
            </td>
            <td style="width: 20%">
                حلقه صالحین
            </td>
            <td style="width: 10%">
                وضعیت پرونده
            </td>
            </thead>
            @php($i = 0)
            @foreach( $users['users'] as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->national_code}}
                    </td>
                    <td>
                        {{$user->fname}}
                    </td>
                    <td>
                        {{$user->lname}}
                    </td>
                    <td>
                        {{$user->father}}
                    </td>
                    <td>
                        {{$users['groups'][$i]->name}}
                    </td>
                    <td>
                        {{$user->case_status}}
                    </td>
                </tr>
                @php($i++)
            @endforeach
        </table>

    </div>
    {{$users['users']->links()}}
</main>


@endsection


@section('private_script')
<script src={{asset("js/user_list.js")}}></script>
@endsection
