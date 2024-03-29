<?php

namespace TALLKit\Components\Menus;

use TALLKit\Concerns\User;

class UserMenu extends MenuDropdown
{
    use User;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  bool|null  $inline
     * @param  string|bool|null  $name
     * @param  bool|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|bool|null  $iconName
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
     * @param  string|bool|null  $userName
     * @param  string|bool|null  $userAvatar
     * @param  string|bool|null  $avatarSearch
     * @param  string|bool|null  $avatarProvider
     * @param  string|bool|null  $avatarFallback
     * @param  string|bool|null  $avatarIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $inline = null,
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $iconName = null,
        $user = null,
        $guard = null,
        $userName = null,
        $userAvatar = null,
        $avatarSearch = null,
        $avatarProvider = null,
        $avatarFallback = null,
        $avatarIcon = null,
        $theme = null
    ) {
        $this->setUser($user, $guard);
        $this->setUserInfo($userName, $userAvatar, $avatarSearch, $avatarProvider, $avatarFallback, $avatarIcon);

        parent::__construct(
            $items ?? $this->getUserValue('userMenu'),
            $inline ?? false,
            $name,
            $show,
            $overlay,
            $closeable,
            $align ?? 'right',
            $iconName,
            $theme
        );
    }
}
