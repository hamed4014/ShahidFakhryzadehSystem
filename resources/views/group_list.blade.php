@extends('index')

@section('title')
    <title>لیست بسیجیان</title>
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




        <a href="{{route('create.group')}}">
        <button class="signin_button">
            <i class="fa-solid fa-user-plus"></i>
            ایجاد حلقه جدید
        </button>
        </a>
        <div class="search">
            {!! Form::open(['route' => 'home.group_list.search' , 'method' => 'GET' , 'id' => 'search_form']) !!}
            @if (empty($search))
                {!! Form::text('search' , null , ['id' => 'search_box' , 'placeholder' => 'نام حلقه یا نام سرگروه',
                'maxlength' => '16']) !!}
            @else
                {!! Form::text('search' , $search , ['id' => 'search_box' , 'placeholder' => 'نام حلقه یا نام سرگروه',
                'maxlength' => '16']) !!}
            @endif
            <label><i class="fa-solid fa-magnifying-glass"></i></label>
            {!! Form::submit(null,['class'=>"search_butten"]) !!}
            {!! Form::close() !!}
        </div>

        <div class="user_list">
            <table>
                <thead>
                <td style="width: 10%">
                    ردیف
                </td>
                <td style="width: 45%">
                    نام حلقه صالحین
                </td>
                <td style="width: 45%">
                     نام سرگروه
                </td>
                </thead>
                @php($i = 0)
                @foreach( $groups as $group)
                    @php($i++)
                    <tr>
                        <td>
                            {{$group->id}}
                        </td>
                        <td>
                            {{$group->name}}
                        </td>
                        <td>
                            {{$group->teacher}}
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        {{$groups->links()}}
    </main>


@endsection


@section('private_script')
    <script src={{asset("js/user_list.js")}}></script>
@endsection

