
        <li class="nav__item">
            <a href="{{ route('profile_index') }}" class="nav__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Статистика</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_transactions') }}" class="nav__link {{ request()->routeIs('profile_transactions') ? 'nav__link--active' : '' }}">Транзакции</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_conclusions') }}" class="nav__link nav__link-conclusions {{ request()->routeIs('profile_conclusions') ? 'nav__link--active' : '' }}">Выводы
                <span class="nav__link-conclusions-value">+1</span>
            </a>
        </li>

        <li class="nav__item">
            <a href="{{ route('profile_currencies') }}" class="nav__link nav__link-conclusions {{ request()->routeIs('profile_currencies') ? 'nav__link--active' : '' }}">Валюты ввод
                <span class="nav__link-conclusions-value">+1</span>
            </a>
        </li>

        <li class="nav__item">
            <a href="{{ route('profile_currencies') }}" class="nav__link @link-admin8 {{ request()->routeIs('profile_currencies') ? 'nav__link--active' : '' }}" >Валюты вывод</a>
        </li>
        <li class="nav__item">
            <a href="/admin/users" class="nav__link ">Пользователи</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_discount') }}" class="nav__link @link-admin9 {{ request()->routeIs('profile_discount') ? 'nav__link--active' : '' }}" >Скидка</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_affilProgram') }}" class="nav__link nav__link--active0 {{ request()->routeIs('profile_affilProgram') ? 'nav__link--active' : '' }}">Партнерка</a>
        </li>
        <li class="nav__item">
            <span class="nav__link ">Обмен валют</span>
            <ul class="submenu">
                <li class="submenu__item">
                    <a href="{{ route('index') }}" class="submenu__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Заявки</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link @sublink-admin2 {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Пользователи</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Направления обмена</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link @sublink-admin4 {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Валюты</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Отзывы</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Партнерка</a>
                </li>
                <li class="submenu__item">
                    <a href="{{ route('profile_index') }}" class="submenu__link {{ request()->routeIs('profile_index') ? 'nav__link--active' : '' }}">Настройки</a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <a href="{{ route('profile_fastOutput') }}" class="nav__link {{ request()->routeIs('profile_fastOutput') ? 'nav__link--active' : '' }}">Быстрый вывод</a>
        </li>

