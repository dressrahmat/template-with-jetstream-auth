<div class="md:hidden absolute z-50">
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content mt-5 mx-4">
            <!-- Page content here -->
            <label for="my-drawer" class="drawer-button">
                <i class="fas fa-bars text-2xl"></i>
            </label>
        </div>
        <div class="drawer-side">
            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu text-sm lg:text-lg bg-primary relative top-28">
                <li>
                    <a wire:navigate href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-4 my-1 {{ request()->routeIs('dashboard') ? 'glass rounded-md bg-primary hover:bg-green-800 shadow-sm text-base-100' : ' text-base-content' }}">
                        <i class="fas fa-home"></i>
                        <span class="ml-2" x-show="isOpen">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="py-2 {{ request()->routeIs('blog.index') ? 'glass rounded-md' : '' }}">
            <a wire:navigate href="{{ route('blog.index') }}" class="flex items-center px-4 py-2 my-1 text-neutral">
                <i class="far fa-newspaper"></i>
                <span class="ml-2" x-show="isOpen">Blog</span>
            </a>
        </li> --}}
                <li>
                    <details
                        {{ request()->routeIs('permissions.*') || request()->routeIs('roles.*') || request()->routeIs('users.*') ? 'open' : '' }}>
                        <summary
                            class="px-4 py-4 text-base-content hover:bg-base-content hover:glass rounded-md hover:text-base-content ">
                            <i class="fa fa-solid fa-toolbox"></i>
                            <span class="ml-2" x-show="isOpen">Setting</span>
                        </summary>
                        <ul :class="{ 'mt-2': isOpen, 'ml-0 mt-4': !isOpen }"
                            class="{{ request()->routeIs('permissions.*') || request()->routeIs('roles.*') || request()->routeIs('users.*') ? 'glass rounded-md' : '' }}">
                            <li class="pr-1.5">
                                <a wire:navigate href="{{ route('permissions.index') }}"
                                    class="flex items-center py-4 my-1 {{ request()->routeIs('permissions.index') ? 'glass rounded-md bg-primary hover:bg-green-800 shadow-sm text-base-100' : ' text-base-content' }}">
                                    <i class="fas fa-file-contract"></i>
                                    <span class="ml-2" x-show="isOpen">Hak Akses</span>
                                </a>
                            </li>
                            <li class="pr-1.5">
                                <a wire:navigate href="{{ route('roles.index') }}"
                                    class="flex items-center py-4 my-1 {{ request()->routeIs('roles.index') ? 'glass rounded-md bg-primary hover:bg-green-800 shadow-sm text-base-100' : ' text-base-content' }}">
                                    <i class="fas fa-plus-circle"></i>
                                    <span class="ml-2" x-show="isOpen">Jabatan</span>
                                </a>
                            </li>
                            <li class="pr-1.5">
                                <a wire:navigate href="{{ route('users.index') }}"
                                    class="flex items-center py-4 my-1 {{ request()->routeIs('users.index') ? 'glass rounded-md bg-primary hover:bg-green-800 shadow-sm text-base-100' : ' text-base-content' }}">
                                    <i class="fas fa-users"></i>
                                    <span class="ml-2" x-show="isOpen">User</span>
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</div>
