<div class="mb-2">
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="card w-full card-side bg-base-100 shadow-xl h-fit">
            <!-- Upload photo_profile -->
            <div class="mb-2 p-4 basis-1/3">
                <label class="form-control">
                    <div class="mb-2 relative">
                        <label for="photo_profile" class="cursor-pointer flex items-center justify-center">
                            <!-- Background untuk gambar yang diunggah -->
                            <div class="shadow-lg w-full h-96 rounded-lg flex items-center justify-center bg-cover bg-center"
                                style="background-image: url('@if ($form->photo_profile && !is_string($form->photo_profile)) {{ $form->photo_profile->temporaryUrl() }} @else {{ asset($form->photo_profile) }} @endif');">
                                <!-- Icon untuk memilih gambar -->
                                @if (!$form->photo_profile)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="z-10 h-12 w-12 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                @endif
                            </div>
                        </label>
                        <!-- Input file yang disembunyikan -->
                        <input type="file" id="photo_profile" wire:model="form.photo_profile" accept="image/*"
                            class="file-input hidden">
                    </div>
                    <span class="label-text mb-2">Upload Photo Profile</span>
                </label>
            </div>
            <div class="card-body basis-2/3">
                {{-- @if (session()->has('success'))
                    <div x-data="{ showNotification: true }" x-show="showNotification" x-init="setTimeout(() => showNotification = false, 5000)">
                        <!-- Notifikasi disini -->
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif --}}
                <div class="grid grid-cols-2 gap-x-2">
                    <!-- Nama Depan -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Nama Depan</span>
                            <input type="text" wire:model="form.nama_depan" placeholder="Masukkan nama depan"
                                class="input input-bordered rounded-lg bg-gray-100 text-gray-900 input-accent @error('form.nama_depan') border-red-500 @enderror"
                                autofocus />
                            @error('form.nama_depan')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Nama Belakang -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Nama Belakang</span>
                            <input type="text" wire:model="form.nama_belakang" placeholder="Masukkan nama belakang"
                                class="input input-bordered rounded-lg bg-gray-100 text-gray-900 input-accent @error('form.nama_belakang') border-red-500 @enderror" />
                            @error('form.nama_belakang')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Tanggal Lahir</span>
                            <input type="date" wire:model="form.tanggal_lahir"
                                class="input input-bordered rounded-lg bg-gray-100 text-gray-900 input-accent @error('form.tanggal_lahir') border-red-500 @enderror" />
                            @error('form.tanggal_lahir')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Nomor Telepon</span>
                            <input type="tel" wire:model="form.nomor_telepon" placeholder="Masukkan nomor telepon"
                                class="input input-bordered rounded-lg bg-gray-100 text-gray-900 input-accent @error('form.nomor_telepon') border-red-500 @enderror" />
                            @error('form.nomor_telepon')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Jenis Kelamin</span>
                            <select wire:model="form.jenis_kelamin" name="jenis_kelamin" id="jenis_kelamin"
                                class="select select-bordered rounded-lg bg-gray-100 text-gray-900 select-accent @error('form.jenis_kelamin') border-red-500 @enderror">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                            @error('form.jenis_kelamin')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Agama -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Agama</span>
                            <select wire:model="form.agama" name="agama" id="agama"
                                class="select select-bordered rounded-lg bg-gray-100 text-gray-900 select-accent @error('form.agama') border-red-500 @enderror">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            @error('form.agama')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Provinsi -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Provinsi</span>
                            <select wire:change="getKota" wire:model="form.provinsi"
                                class="select select-bordered rounded-lg bg-gray-100 text-gray-900 select-accent @error('form.provinsi') border-red-500 @enderror">
                                <option value="">Pilih Provinsi</option>
                                <!-- Tambahkan opsi untuk provinsi -->
                                @foreach ($dataProvinsi as $provinsi)
                                    <option value="{{ $provinsi->code }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                            @error('form.provinsi')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- kota -->
                    <div class="mb-2">
                        <label class="form-control">
                            <span class="label-text mb-2">Kota</span>
                            <select wire:model="form.kota"
                                class="select select-bordered rounded-lg bg-gray-100 text-gray-900 select-accent @error('form.kota') border-red-500 @enderror">
                                <option value="">Pilih Kota</option>
                                <!-- Tambahkan opsi untuk kota -->
                                @if ($dataKota)
                                    @foreach ($dataKota as $kota)
                                        <option value="{{ $kota->code }}">{{ $kota->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('form.kota')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                </div>
                <!-- Alamat -->
                <div class="mb-2">
                    <label class="form-control">
                        <span class="label-text mb-2">Alamat</span>
                        <textarea wire:model="form.alamat" placeholder="Masukkan alamat"
                            class="textarea textarea-bordered rounded-lg bg-gray-100 text-gray-900 textarea-accent @error('form.alamat') border-red-500 @enderror"></textarea>
                        @error('form.alamat')
                            <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-full text-lg">Kirim</button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
    </form>

    <div>
        <x-sweet-alert />
        <x-modal-sweet-alert />
        <x-confirm-delete />
    </div>
</div>
