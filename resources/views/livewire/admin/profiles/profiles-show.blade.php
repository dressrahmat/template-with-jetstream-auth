<div>
    <div class="my-2">
        <a href="{{ route('users.index') }}" class="btn btn-warning">Kembali</a>
    </div>
    <div class="flex gap-4">
        <!-- Card Akun -->
        <div class="card basis-1/3 bg-white shadow-xl rounded-lg">
            <div class="card-body p-6">
                <h2 class="card-title text-xl font-semibold mb-4">Akun</h2>
                <div class="flex flex-col items-center">
                    @if ($user->profile)
                        <img src="{{ asset('storage/' . $user->profile->photo_profile) }}" alt="Foto Profil"
                            class="rounded-full w-48 h-48 object-cover mb-4">
                    @else
                        <img src="{{ asset('../assets/images/users/user.png') }}" alt="Foto Profil"
                            class="rounded-full w-48 h-48 object-cover mb-4">
                    @endif
                    <p class="text-center text-lg font-medium">Username: {{ $user->name }}</p>
                    <p class="text-center text-sm text-gray-600">Email: {{ $user->email }}</p>
                </div>
            </div>
        </div>

        <!-- Card Profile -->
        <div class="card basis-2/3 bg-white shadow-xl rounded-lg">
            <div class="card-body p-6">
                <h2 class="card-title text-xl font-semibold mb-4">Profile</h2>
                @if ($user->profile)
                    <table class="table-auto w-full text-lg">
                        <tbody>
                            <tr>
                                <td class="font-semibold w-1/3">Nama</td>
                                <td class="w-2/3">: {{ $user->profile->nama_depan }}
                                    {{ $user->profile->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Jenis Kelamin</td>
                                <td>: {{ $user->profile->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Tanggal Lahir</td>
                                <td>: {{ $user->profile->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Nomor Telepon</td>
                                <td>: {{ $user->profile->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Agama</td>
                                <td>: {{ $user->profile->agama }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Provinsi</td>
                                <td>: {{ $user->profile->provinsi }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Kota</td>
                                <td>: {{ $user->profile->kota }}</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Alamat</td>
                                <td>: {{ $user->profile->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <p class="text-lg text-gray-600">Belum ada profile</p>
                    <a wire:navigate href="{{ route('profiles.create', $user->id) }}"
                        class="btn btn-primary mt-4">Tambahkan Profile</a>
                @endif
                {{-- <a wire:navigate href="{{ route('profiles.edit', $user->id) }}" class="btn btn-secondary mt-4">Edit
                    Profile</a> --}}
            </div>
        </div>
    </div>

</div>
