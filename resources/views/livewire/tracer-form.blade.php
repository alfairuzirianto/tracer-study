<div class="flex flex-col items-center min-h-screen p-4">
    <div class="flex flex-col max-w-screen md:min-w-2xl lg:min-w-3xl p-6">
        <flux:heading size="xl" class="text-center font-semibold text-lg md:text-2xl">Kuesioner Tracer Study</flux:heading>
        <flux:separator class="mt-2 mb-6"/>
        <div class="grid gap-x-4 gap-y-2 lg:gap-y-6 grid-cols-1 lg:grid-cols-3 mb-2 lg:mb-6">
            <flux:input wire:model="nim" variant="filled" label="NIM" type="text" readonly />
            <flux:input wire:model="nama" variant="filled" label="Nama Lengkap" type="text" readonly />
            <flux:input wire:model="nomor_ijazah" variant="filled" label="Nomor Ijazah" type="text" readonly />
        </div>
        <form wire:submit="save">
            <div class="grid gap-x-4 gap-y-2 lg:gap-y-6 grid-cols-1 lg:grid-cols-3">
                <flux:input wire:model="email" label="Email" type="email" />
                <flux:input wire:model="telepon" label="Nomor Telepon" type="number" placeholder="628xxxxxxx" />
                <flux:input wire:model="alamat" label="Alamat tempat tinggal" type="text" />
                <flux:select wire:model="status" label="Status saat ini">
                    <flux:select.option value="">-- Pilih status --</flux:select.option>
                    @foreach ($statusOptions as $item)
                    <flux:select.option>{{ $item }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model="waktu_tunggu" label="Waktu Tunggu" type="number" placeholder="Lama waktu tunggu (bulan)"/>
                <flux:select wire:model="keselarasan" label="Keselarasan pendidikan">
                    <flux:select.option value="">-- Pilih keselarasan --</flux:select.option>
                    @foreach ($keselarasanOptions as $item)
                    <flux:select.option>{{ $item }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model="nama_instansi" label="Nama Instansi" type="text" placeholder="Nama instansi/perusahaan/organisasi"/>
                <flux:select wire:model="jenis_instansi" label="Jenis Instansi">
                    <flux:select.option value="">-- Pilih jenis instansi --</flux:select.option>
                    @foreach ($jenisInstansiOptions as $item)
                    <flux:select.option>{{ $item }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:field>
                    <flux:label>Pendapatan per bulan</flux:label>
                    <flux:input.group>
                        <flux:input.group.prefix>IDR</flux:input.group.prefix>
                        <flux:input wire:model="pendapatan" placeholder="Pendapatan per bulan"/>
                    </flux:input.group>
                    <flux:error name="pendapatan" />
                </flux:field>
                <flux:input wire:model="jabatan" label="Jabatan" type="text" placeholder="Jabatan/posisi Anda"/>
                <flux:input wire:model="kota_instansi" label="Kota Instansi" type="text" placeholder="Asal kota instansi/perusahaan/organisasi"/>
                <flux:input wire:model="alamat_instansi" label="Alamat Instansi" type="text" placeholder="Alamat instansi/perusahaan/organisasi"/>
            </div>
            <flux:button wire:click="save" variant="primary" class="w-full mt-8 cursor-pointer font-semibold">SUBMIT</flux:button>
        </form>
        <div class="{{ $modalDisplay }}">
            <flux:modal name="fotoIjazah" wire:close="backToHome" class="flex flex-col p-8 space-y-4 justify-center items-center" :dismissible="false">
                <flux:icon.check-badge class="size-8" />
                <flux:heading size="xl">Ijazah Anda Asli!</flux:heading>
                <img width="150" src="{{ asset('storage/') . '/' . $foto_ijazah }}" alt="Foto ijazah" class="pointer-events-none" />
            </flux:modal>
        </div>
    </div>
</div>
