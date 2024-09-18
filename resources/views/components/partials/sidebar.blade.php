<div :class="{ 'w-28 ': !isOpen, 'w-1/5 lg:w-2/12': isOpen }"
    class="hidden md:block bg-base-100 text-white shadow z-30 transition-width duration-300 fixed inset-y-0">

    <!-- Logo -->
    <div class="flex items-center justify-between my-3 text-base-content">
        <div :class="{ 'text-2xl': isOpen, 'hidden': !isOpen }" class=" w-1/2 text-base-content">
            <p class="text-center">Simple Projek</p>
        </div>
        <button @click="isOpen = !isOpen" class="p-2 ml-4">
            <!-- Toggle -->
            <div x-show="isOpen">
                <i class="far fa-caret-square-left text-2xl"></i>
            </div>
            <div x-show="!isOpen">
                <i class="far fa-caret-square-right text-2xl"></i>
            </div>
        </button>
    </div>

    <!-- Sidebar Content -->
    <ul class="menu text-sm lg:text-lg">
        <li>
            <a wire:navigate href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-4 my-1 {{ request()->routeIs('dashboard') ? 'glass rounded-md  bg-primary hover:bg-green-800 shadow-sm text-base-100' : ' text-base-content' }}">
                <i class="fas fa-home"></i>
                <span class="ml-2" x-show="isOpen">Dashboard</span>
            </a>
        </li>
        <li>
            <details
                {{ request()->routeIs('permissions.*') || request()->routeIs('roles.*') || request()->routeIs('users.*') ? 'open' : '' }}>
                <summary
                    class="px-4 py-4 text-base-content hover:bg-green-800 hover:glass rounded-md hover:text-base-100 ">
                    <i class="fa fa-solid fa-toolbox"></i>
                    <span class="ml-2" x-show="isOpen">Konfigurasi</span>
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

{{-- Sidebar Untuk Layar Bukan Laptop --}}
@include('components.partials.sidebar-mobile')
