<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Profil</h2>
    </x-slot>

    <div class="p-4">
        @if (session('status'))
            <div class="text-green-600">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div>
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <button type="submit">Simpan</button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('DELETE')

            <div>
                <label>Konfirmasi Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit" class="text-red-600">Hapus Akun</button>
        </form>
    </div>
</x-app-layout>
