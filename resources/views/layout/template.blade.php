<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      @yield('title')
    </h2>
  </x-slot>
  <main class="py-4">
    @yield('content')
  </main>
</x-app-layout>