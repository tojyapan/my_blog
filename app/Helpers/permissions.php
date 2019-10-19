<?php

function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
    // get current user

    $currentUser = $request->user();

    if ($actionName)
    {
      $currentActionName = $actionName;
    }
    else
    {
      $currentActionName = $request->route()->getActionName();
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Blog' => 'post',
        'Categories' => 'category',
        'Users' => 'user'
    ];

    foreach ($crudPermissionsMap as $permission => $methods)
    {
        if (in_array($method, $methods) && isset($classesMap[$controller]))
        {
            $className = $classesMap[$controller];

            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy']))
            {
                $id = !is_null($id) ? $id : $request->route('blog');

                if ( $id && ($currentUser->can('update-others-post') || !$currentUser->can('delete-others-post')))
                {
                    $post = \App\Post::withTrashed()->find($id);
                    if ($post->author_id !== $currentUser->id)
                    {
                        return false;
                    }
                }
            }
            elseif ( ! $currentUser->can("{$permission}-{$className}")) {
                return false;
            }
            break;
        }
    }

    return true;
  
}