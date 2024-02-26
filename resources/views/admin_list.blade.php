@extends('index')

@section('title')
    <title>لیست بسیجیان</title>
@endsection

@section('private_link')
    <link href={{asset("css/admin_list.css")}} rel="stylesheet">
@endsection



@section('main')

    <main>

        <button class="signin_button">
            <i class="fa-solid fa-user-plus"></i>
            ثبت مسئول جدید
        </button>

        <div class="search">
            {!! Form::open(['route' => 'home.admin_list.search' , 'method' => 'GET' , 'id' => 'search_form']) !!}
            @if (empty($search))
                {!! Form::text('search' , null , ['id' => 'search_box' , 'placeholder' => 'مسئولیت',
                'maxlength' => '16']) !!}
            @else
                {!! Form::text('search' , $search , ['id' => 'search_box' , 'placeholder' => 'مسئولیت',
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
                <td style="width: 25%">
                    کد ملی
                </td>
                <td style="width: 20%">
                    نام
                </td>
                <td style="width: 20%">
                    نام خانوادگی
                </td>
                <td style="width: 29%">
                    مسئولیت
                </td>
                </thead>
                @php($i = 0)
                @foreach( $admins['admins'] as $admin)
                    <tr>
                        <td>
                            {{$admin->id}}
                        </td>
                        <td>
                            {{$admins['users'][$i]->national_code}}
                        </td>
                        <td>
                            {{$admins['users'][$i]->fname}}
                        </td>
                        <td>
                            {{$admins['users'][$i]->lname}}
                        </td>
                        <td>
                            {{$admin->responsibility}}
                        </td>
                    </tr>
                    @php($i++)
                @endforeach
            </table>

        </div>
        {{$admins['admins']->links()}}
    </main>


@endsection


@section('private_script')
    <script src={{asset("js/admin_list.js")}}></script>
@endsection

