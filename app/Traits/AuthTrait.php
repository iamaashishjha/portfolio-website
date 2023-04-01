<?php

namespace App\Traits;

use App\Models\User;
use ReflectionClass;
use App\Models\Student;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{

    public static function checkPermissionInputFields($permission, $role)
    {
        $permissionIdArr = $role->permissions->pluck('id')->toArray();
        $checkStatus = in_array($permission->id, $permissionIdArr);
        if (($checkStatus)) {
            return "checked";
        }
        return "";
    }


    public function checkCRUDPermission($modelName, $method)
    {
        $reflection = new ReflectionClass($modelName);
        $user = User::find(Auth::id());
        $permission = $user->hasPermissionTo($method . ' ' . Str::lower($reflection->getShortName()));
        if ($permission) {
            return;
        } else {
            abort(403);
        }
    }

    public function checkPermission($method)
    {
        $reflection = new ReflectionClass($this->model);
        $user = User::find(Auth::id());
        $permission = $user->hasPermissionTo($method . ' ' . Str::lower($reflection->getShortName()));
        if ($permission) {
            return;
        } else {
            abort(403);
        }
    }

    public function getModelData($value, $id)
    {
        $data = get_class($this)::find($id);
        if ($data) {
            return $data->$value;
        } else {
            return "No " . $value . " Found";
        }
    }

    public static function artisanCommands()
    {
        return [
            'migrate:fresh' => "Delete all Database Data",
            'migrate:fresh --seed' => "Delete all Database Data and reload Default Data",
            'optimize:clear' => "Optimize Application",
        ];
    }

    public static function jsonArtisanCommands()
    {
        return response()->json(self::artisanCommand());
    }

    public static function checkListPermission($modelNameArr, $dropDownMenuName = null)
    {
        if (!$dropDownMenuName) {
            $dropDownMenuName = 'Menu';
        }
        $permArr = [];
        if (!$modelNameArr) {
            return false;
        }
        foreach ($modelNameArr as $modelName) {
            $user = User::find(Auth::id());
            $permission = $user->hasPermissionTo('list ' . $modelName);
            if (!$permission) {
                return false;
            }
            array_push($permArr, $modelName);
        }
        if (count($permArr) <= 1) {
            $sidebarContent = "
                                <li>
                                    <a href='/' class='side-menu side-menu--active'>
                                        <div class='side-menu__icon'> <i data-feather='home'></i> </div>
                                        <div class='side-menu__title'> Dashboard </div>
                                    </a>
                                </li>
                            ";
        } else {
            $sidebarContent = "
                                <li>
                                    <a href='javascript:;' class='side-menu'>
                                        <div class='side-menu__icon'>
                                            <i data-feather='box'></i>
                                        </div>
                                        <div class='side-menu__title'>
                                        " . $dropDownMenuName . "
                                        <i data-feather='chevron-down'class='side-menu__sub-icon'></i>
                                        </div>
                                    </a>
                                    <ul class=''>
                            ";
            foreach ($permArr as $permission) {
                $menuTitle = Str::plural(Str::ucfirst($permission));
                $route = route('admin.' . $permission . '.index');
                $sidebarContent .= "
                                        <li>
                                            <a href='" . $route . "' class='side-menu'>
                                                <div class='side-menu__icon'> <i data-feather='activity'></i> </div>
                                                <div class='side-menu__title'> " . $menuTitle . " </div>
                                            </a>
                                        </li>
                            ";
            }
            $sidebarContent .= "
                                    </ul>
                                </li>
                            ";
        }
        return $sidebarContent;
    }

    public static function loadSideBarMenuItems()
    {
        $icon_list_parent = [
            'Authentication' => 'fa-solid fa-users',
        ];

        $menu_mappings = [
            "Authentication" => [
                'user', 'role', 'permission',
            ],
        ];
        if (!$menu_mappings) {
            $dropDownMenuName = 'Menu';
        }

        if (request()->ajax()) {
            $user = User::find(Auth::id());
            $permissions = $user->getAllPermissions()->pluck('name')->toArray();
            $permArr = [];
            foreach ($permissions as $permission) {
                if (Str::startsWith($permission, 'list')) {
                    array_push($permArr, $permission);
                }
            }
            $menu_data = [];
            foreach ($menu_mappings as $key => $item) {
                foreach ($permArr as $d) {
                    $d = Permission::where('name', $d)->first();
                    $d->model_name = Str::lower($d->model_name);
                    $modelName = Str::lower($d->model_name);
                    if (in_array($modelName, $menu_mappings[$key])) {
                        $menu_data[$key][] = $modelName;
                    }
                }
            }
            foreach ($menu_data as $key => $item) {
                $initialMenuData = "
                <li>
                <a href='/' class='side-menu side-menu--active'>
                    <div class='side-menu__icon'> <i data-feather='home'></i> </div>
                    <div class='side-menu__title'> Dashboard </div>
                </a>
            </li>
                ";
                if (count($item) <= 1) {
                    $route = route('admin.' . $item[0] . '.index');
                    $sidebarContent = $initialMenuData . "
                                        <li>
                                            <a href='" . $route . "' class='side-menu side-menu--active'>
                                                <div class='side-menu__icon'>
                                                    <i class='" . $icon_list_parent[$key] . "'></i>
                                                </div>
                                                <div class='side-menu__title'> " . $key . " </div>
                                            </a>
                                        </li>
                                    ";
                } else {
                    $sidebarContent = $initialMenuData . "
                                        <li>
                                            <a href='javascript:;' class='side-menu'>
                                                <div class='side-menu__icon'>
                                                    <i data-feather='box'></i>
                                                </div>
                                                <div class='side-menu__title'>
                                                " . $key . "
                                                <i data-feather='chevron-down'class='side-menu__sub-icon'></i>
                                                </div>
                                            </a>
                                            <ul class=''>
                                    ";
                    foreach ($item as $permission) {

                        $menuTitle = Str::plural(Str::ucfirst($permission));
                        $route = route('admin.' . $permission . '.index');
                        $sidebarContent .= "
                                                <li>
                                                    <a href='" . $route . "' class='side-menu'>
                                                        <div class='side-menu__icon'> <i data-feather='activity'></i> </div>
                                                        <div class='side-menu__title'> " . $menuTitle . " </div>
                                                    </a>
                                                </li>
                                    ";
                    }
                    $sidebarContent .= "
                                            </ul>
                                        </li>
                                    ";
                }
            }


            return  [
                'status' => 'success',
                'sidebarContent' => $sidebarContent,
            ];
        } else {
            return [
                'status' => 'failure',
                'message' => "Method not allowed",
            ];
        }
    }
}
