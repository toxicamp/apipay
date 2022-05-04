
        <li class="nav__item">
            <a href="{{ route('profile_statUser') }}" class="nav__link nav__link--active">Статистика</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_userTransact') }}" class="nav__link ">Транзакции</a>
        </li>
        <li class="nav__item">
            <span class="nav__link nav__link--active">Выводы</span>
            <ul class="submenu">
                <li class="submenu__item">
                    <a href="{{ route('profile_conclusionsCreate') }}" class="submenu__link submenu__link--active">Создать</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_conclusions') }}" class="submenu__link ">История</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_conclusionsPays') }}" class="submenu__link ">Массовые выплаты</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_sample') }}" class="submenu__link ">Шаблоны</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_discUser') }}" class="submenu__link @sublink5">Скидка</a>
                </li>
            </ul>
        </li>

        <li class="nav__item">
            <a href="#" class="nav__link nav__link-conclusions ">Api
                <span class="nav__link-conclusions-value">+1</span>
            </a>
        </li>

        <li class="nav__item">
            <a href="/doc/index.html" class="nav__link @link-admin8">Документация</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_arbitraryPayment') }}" class="nav__link ">Произвольный платеж</a>
        </li>
        <li class="nav__item">
            <a href="" class="nav__link ">Техническая поддержка</a>
        </li>

