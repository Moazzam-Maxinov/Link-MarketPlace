<nav class="bg-white border-gray-200 dark:bg-gray-900 border-b-2" data-role="{{ $role }}">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-6 px-12">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/images/logo.jpg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LinkMarket</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- React Toggle Switch will be injected here -->
            @viteReactRefresh
            @vite('resources/js/components/user/RoleToggleSwitch.jsx')
            <div id="react-toggle-switch"></div>

            <!-- User Icon -->
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom-end">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="/images/user.svg" alt="user photo">
            </button>

            <!-- User Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 border-2 w-48"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-base text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span
                        class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-house class="w-4 h-4 mr-2 text-gray-500" />
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-contact class="w-4 h-4 mr-2 text-gray-500" />
                            Profile
                        </a>
                    </li>
                    <li class="divide-y divide-gray-100">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <x-lucide-wallet class="w-4 h-4 mr-2 text-gray-500" />
                            Wallet
                        </a>
                    </li>
                </ul>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center w-full px-4 py-2 text-base text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <x-lucide-log-out class="w-4 h-4 mr-3 text-gray-500" />
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <button id="services-dropdown-button" data-dropdown-toggle="services-dropdown"
                        data-dropdown-placement="bottom"
                        class="flex items-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Services
                        <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Services Dropdown menu -->
                    <div class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                        id="services-dropdown">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="services-dropdown-button">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Link
                                    Purchase</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Link
                                    Sale</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- @push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleSwitch = document.getElementById('role-toggle');
        const roleLabel = document.getElementById('role-label');

        // Set the initial state of the toggle based on the data-role attribute
        const navElement = document.querySelector('nav[data-role]');
        const currentRole = navElement.getAttribute('data-role');
        toggleSwitch.checked = currentRole === 'publisher';

        // Add event listener for the toggle switch
        toggleSwitch.addEventListener('change', function() {
            const newRole = toggleSwitch.checked ? 'publisher' : 'vendor';

            // Send a POST request to switch the role
            fetch('/api/switch-role', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
                    },
                    body: JSON.stringify({
                        role: newRole
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reload the page to reflect the new role
                        window.location.reload();
                    } else {
                        console.error('Failed to switch role:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
@endpush --}}
