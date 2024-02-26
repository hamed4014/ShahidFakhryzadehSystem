@extends('index')

@section('title')
    <title>لیست جلسات</title>
@endsection

@section('private_link')
    <link href={{asset("css/user_list.css")}} rel="stylesheet">
@endsection



@section('main')
    @if ( $massage != null )
        <div class="massage_successful" on="massage()" id="alert">
            <div>
                <i class="fa-solid fa-circle-check" style="margin-left: 4px;"></i>
                {{$massage}}
            </div>
        </div>
    @endif

    <main>




        <a href="{{route('create.session')}}">
            <button class="signin_button">
                <i class="fa-solid fa-file-lines"></i>
                ثبت جلسه جدید
            </button>
        </a>
        <div class="search">
            {!! Form::open(['route' => 'home.session_list.search' , 'method' => 'GET' , 'id' => 'search_form']) !!}
            @if (empty($search))
                {!! Form::text('search' , null , ['id' => 'search_box' , 'placeholder' => 'تاریخ',
                'maxlength' => '10']) !!}
            @else
                {!! Form::text('search' , $search , ['id' => 'search_box' , 'placeholder' => 'تاریخ',
                'maxlength' => '10']) !!}
            @endif
            <label><i class="fa-solid fa-magnifying-glass"></i></label>
            {!! Form::submit(null,['class'=>"search_butten"]) !!}
            {!! Form::close() !!}
        </div>

        <div class="user_list">
            <table>
                <thead>
                <td style="width: 20%">
                    ردیف
                </td>
                <td style="width: 80%">
                    تاریخ
                </td>
                </thead>
                @php($i = 0)
                @foreach( $sessions as $session)
                    @php($i++)
                    <tr>
                        <td>
                            {{$session->id}}
                        </td>
                        <td>
                            {{$session->date}}
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        {{$sessions->links()}}
    </main>


@endsection


@section('private_script')
    <script src={{asset("js/user_list.js")}}></script>
@endsection


