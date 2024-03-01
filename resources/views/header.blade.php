
<header>

    <a href={{route('home')}}>
        <span>
            سامانه
        <span style="color: rgb(240,70,70)">شهید فخری زاده</span>
        </span>
    </a>

    <div id="user_name">
        <i class="fa-solid fa-chevron-down"></i>
        <span>
            {{$adminInfo->fname}}
            {{" "}}
            {{$adminInfo->lname}}
        </span>
        <i class="fa-regular fa-circle-user"></i>
    </div>
    <div>
        <span>
            <i class="fa-solid fa-user-tie"></i>
            مسئولیت:
        </span>
        <span style="margin-right: 6px">
            {{$admin->responsibility}}
        </span>
    </div>

    <ul class="left_list" id="left_list">
        <a>
            <li>پروفایل</li>
        </a>
        <a>
            <li>تغییر رمز عبور</li>
        </a>
        <li>
            <form method="POST" action={{ route('logout') }} style="height: 100%; width: 100%">
                @csrf
                <button type="submit" style="">خروج</button>
            </form>
        </li>

    </ul>

    <ul class="right_list" id="right_list">
        <a href={{route('home.user_list')}}>
            <li>
                <i class="fa-solid fa-users"></i>
                لیست بسیجیان
            </li>
        </a>
        <a href={{route('home.admin_list')}}>
            <li>
                <i class="fa-solid fa-user-tie"></i>
                لیست مسئولین
            </li>
        </a>
        <a>
            <li id="present">
                <i class="fa-solid fa-list-check"></i>
                حضور و غیاب
            </li>
        </a>
        <li class="sub_menu present">
            <a href="{{route('create.present')}}">
                <i class="fa-solid fa-caret-down fa-rotate-90"></i>
                ثبت حضور و غیاب
            </a>
            <hr>
        </li>
        <li class="sub_menu present">
            <a href="{{route('show.reportGroups')}}">
                <i class="fa-solid fa-caret-down fa-rotate-90"></i>
                گزارش حضور و غیاب حلقه ها
            </a>
            <hr>
        </li>
        <li class="sub_menu present">
            <a>
                <i class="fa-solid fa-caret-down fa-rotate-90"></i>
                بررسی حضور اشخاص
            </a>
            <hr>
        </li>
        <li class="sub_menu present">
            <a>
                <i class="fa-solid fa-caret-down fa-rotate-90"></i>
                بررسی حضور اشخاص
            </a>
            <hr>
        </li>
        <li class="sub_menu present">
            <a>
                <i class="fa-solid fa-caret-down fa-rotate-90"></i>
                بررسی حضور اشخاص
            </a>
            <hr>
        </li>
        <a href={{route('home.group_list')}}>
            <li>
                <i class="fa-solid fa-dice"></i>
                حلقه های صالحین
            </li>
        </a>
        <a href={{route('home.session_list')}}>
            <li>
                <i class="fa-solid fa-dice"></i>
                لیست جلسات
            </li>
        </a>
        <a>
            <li>
                <i class="fa-solid fa-file-lines"></i>
                ایجاد فرم
            </li>
        </a>

    </ul>
</header>
