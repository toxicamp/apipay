<?php

namespace App\Classes\Authorization;

use Dlnsk\HierarchicalRBAC\Authorization;


/**
 *  This is example of hierarchical RBAC authorization configiration.
 */

class AuthorizationClass extends Authorization
{
    public function getPermissions() {

        return [
            'menu-own-show' =>['description' => 'Открывается меню админа'],

            'menu-own-read' =>['description' =>'открываеться меню пользователя']
        ];
//        return [
//            'update-post' => [
//                // Необязательное свойство "описание"
//                'description' => 'Редактирование любых статей',
//                // Используется для создания цепи (иерархии) операций
//                'next' => 'update-post-in-category',
//            ],
//            'update-post-in-category' => [
//                'description' => 'Редактирование статей в определенной категории',
//                'next' => 'update-own-post',
//            ],
//            'update-own-post' => [
//                'description' => 'Редактирование собственных статей',
//                // Здесь цепь заканчивается
//            ],
//            // Избранное
//            'add-to-favorites' => [
//                'description' => 'Добавление статьи в список избранных',
//            ],
//        ];
    }

    public function getRoles() {
        return [
            'admin' => [
                'update-post',
                'menu-own-show'
            ],

            'user' => [
                'update-own-post',
                'add-to-favorites',
                'menu-own-read'
            ],
        ];
    }


	/**
	 * Methods which checking permissions.
	 * Methods should be present only if additional checking needs.
	 */

	public function editOwnPost($user, $post) {
		// This is a helper method for getting the model if $post is id
		// $post = $this->getModel(\App\Post::class, $post);

		return $user->id === $post->user_id;
	}

    public function menuOwnShow($user, $menu, $permission){
        return $user->isAdmin();

    }

    public function menuOwnRead($user, $menu, $permission){
        return $user->isUser();
    }



}
