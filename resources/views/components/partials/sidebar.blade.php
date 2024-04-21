<div :class="{ 'w-28 pt-20': !isOpen, 'w-48 lg:w-64 pt-20': isOpen }"
    class="hidden md:block bg-base-100 text-white shadow z-30 transition-width duration-300 fixed inset-y-0">
    <!-- Sidebar Content -->
    <ul class="menu text-lg">
        <li>
            <a wire:navigate href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-4 my-1 {{ request()->routeIs('dashboard') ? 'glass rounded-md active bg-base-100 shadow-sm text-neutral' : ' text-neutral' }}">
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
        <li
            class="{{ request()->routeIs('permissions.*') || request()->routeIs('role.*') || request()->routeIs('user.*') ? 'glass rounded-md' : '' }}">
            <details
                {{ request()->routeIs('permissions.*') || request()->routeIs('role.*') || request()->routeIs('user.*') ? 'open' : '' }}>
                <summary
                    class="px-4 py-4 my-1 text-base-content hover:bg-base-content glass rounded-md hover:text-base-100 ">
                    <i class="fa fa-solid fa-toolbox"></i>
                    <span class="ml-2" x-show="isOpen">Setting</span>
                </summary>
                <ul :class="{ 'ml-4 mt-2': isOpen, 'ml-1 mt-4': !isOpen }">
                    <li>
                        <a wire:navigate href="{{ route('permissions.index') }}"
                            class="flex items-center px-4 py-4 my-1 {{ request()->routeIs('permissions.index') ? 'glass rounded-md active bg-base-100 shadow-sm text-neutral' : ' text-neutral' }}">
                            <i class="fas fa-file-contract"></i>
                            <span class="ml-2" x-show="isOpen">Permission</span>
                        </a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('role.index') ? 'bg-gray-900 glass rounded-md' : '' }}">
                        <a wire:navigate href="{{ route('role.index') }}" class="flex items-center px-4 py-2 my-1 text-neutral">
                            <i class="fas fa-plus-circle"></i>
                            <span class="ml-2" x-show="isOpen">Role</span>
                        </a>
                    </li> --}}
                    {{-- <li class="{{ request()->routeIs('user.*') ? 'bg-gray-900 glass rounded-md' : '' }}">
                        <a wire:navigate href="{{ route('user.index') }}" class="flex items-center px-4 py-2 my-1 text-neutral">
                            <i class="fas fa-user"></i>
                            <span class="ml-2" x-show="isOpen">User</span>
                        </a>
                    </li> --}}
                </ul>
            </details>
        </li>
    </ul>
</div>
