<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-input-format :value="__('Name must contain no numbers')" />
            <input class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full @error('name') border-red-500 @enderror'
                      id="name"
                     type="text"
                     name="name"
                     value="{{ old('name') }}"
                     required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-format :value="__('Email format: jondoe@example.com')" />
            <input class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full @error('email') border-red-500 @enderror'
                   id="email"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required autocomplete="email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-input-format :value="__('Minimum 8 characters length')" />
            <input class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full @error('password') border-red-500 @enderror'
                id="password"
                   type="password"
                   name="password"
                   required autocomplete="new-password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input-format :value="__('Must match password')" />
            <input class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full @error('password_confirmation') border-red-500 @enderror'
                     id="password_confirmation"
                     type="password"
                     name="password_confirmation"
                     required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        const form = document.querySelector('form');
        form.addEventListener('focusout', (event) => {
            if (event.target.tagName !== 'INPUT') return;
            checkForEmptyFields(event.target);
        });
        function checkForEmptyFields(target) {
            if (target.value === '') {
                if (!target.classList.contains('border-red-500')) {
                    const newNode = document.createElement('span');
                    newNode.classList.add('text-red-500', 'text-xs', 'italic');
                    newNode.textContent = 'This field is required';
                    newNode.id = 'jsError' + target.name;
                    target.classList.add('border-red-500');
                    target.parentNode.insertBefore(newNode, target.nextSibling);
                }
            } else {
                target.classList.remove('border-red-500');
                target.parentNode.removeChild(document.querySelector('#jsError' + target.name));
            }
        }
    </script>
</x-guest-layout>
