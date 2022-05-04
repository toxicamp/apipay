<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Обработка поступающего запроса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() ) // Проверка, авторизован ли пользователь, и присвоена ли ему роль "Администратор
        {
            return $next($request); // Если проверка пройдена, продолжаем работу
        }
        return redirect('/'); // Если проверка не пройдена, перебрасываем пользователя на главную страницу
    }
}
