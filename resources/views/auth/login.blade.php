<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class=" text-center">
          <h3>大正製薬 ファイトステーション管理ツール</h3>
          <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Name -->
          <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <!-- Password -->
          <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <!-- Remember Me -->
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
              <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>
          <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
              {{ __('Log in') }}
            </x-primary-button>
          </div>
        </form>
    </x-auth-card>
</x-guest-layout>
