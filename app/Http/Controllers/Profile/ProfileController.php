<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\CabinetController;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function React\Promise\all;

class ProfileController extends CabinetController
{


    public function __construct()
    {
        //$this->middleware(['auth','2fa']);
        $tmp = 1;
    }

    /**
     * Отображает список ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->with('transactions')->withTrashed()->orderByDesc('id')->paginate(10);
        $users->each(function ($item, $key) {
            $item->trans=$item->transactions->groupBy('currency');
        });

        return view('users.index', [
            'users'=>$users
        ]);
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Помещает созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => User::USER,

        ]);

        return redirect()->route('users.index')->with('success','Пользователь создан!');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->withTrashed()->first();

        return view('users.show',compact('user'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->withTrashed()->first();
        dd($user);

        return view('users.edit',compact('user'));
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::where('id', $id)->withTrashed()->first();

        if (!$request->get('status')){
            $request->request->set('status', 0);
            $user->restore();
        }
        elseif ($request->has('status')){
            $request->request->set('status', 1);
            $user->delete();
        }
        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('success','Пользователь обновлен!');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('users')->where('id', $id)->delete();

        return redirect()->route('users.index')
            ->with('success','Пользователь удален!');
    }


}
