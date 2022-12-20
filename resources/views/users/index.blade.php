<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans("users.title") }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-8">
        <x-splade-form :default="$user">
            <x-splade-input name="name" label="User Name" placeholder="Your Name" />
            <x-splade-input name="email" label="Email" type="email" placeholder="Your Email Address" />
        </x-splade-form>

        <div class="py-12">
            <x-splade-table :for="$users" />
        </div>
    </div>
</x-app-layout>
