<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="flex flex-col min-w-3xl max-w-screen p-6 space-y-4">
        <flux:heading size="xl">Kuesioner Tracer Study</flux:heading>
        <flux:separator />
        <div class="mt-3 grid gap-x-4 gap-y-1 grid-cols-2">
            <flux:input wire:model="nim" variant="filled" label="NIM" type="text" readonly />
            <flux:input wire:model="nomor_ijazah" variant="filled" label="Nomor Ijazah" type="text" readonly />
        </div>
        <flux:input wire:model="nama" variant="filled" label="Nama Lengkap" type="text" readonly/>
        <form wire:submit="save">
            <div class="mt-2 grid gap-x-4 gap-y-1 grid-cols-3">
                <flux:select wire:model="status" label="Status saat ini" placeholder="Pilih status saat ini">
                    <flux:select.option>Bekerja</flux:select.option>
                    <flux:select.option>Lanjut Studi</flux:select.option>
                    <flux:select.option>Wiraswasta</flux:select.option>
                    <flux:select.option>Belum Bekerja</flux:select.option>
                    <flux:select.option>Lainnya</flux:select.option>
                </flux:select>
                <flux:input wire:model="waktu_tunggu" label="Waktu Tunggu" type="number" placeholder="Lama waktu tunggu (bulan)"/>
                <flux:select wire:model="keselarasan" label="Keselarasan" placeholder="Keselarasan pendidikan terhadap karir">
                    <flux:select.option>Sangat Erat</flux:select.option>
                    <flux:select.option>Erat</flux:select.option>
                    <flux:select.option>Cukup Erat</flux:select.option>
                    <flux:select.option>Kurang Erat</flux:select.option>
                    <flux:select.option>Tidak Erat</flux:select.option>
                </flux:select>
                <flux:input wire:model="nama_instansi" label="Nama Instansi" type="text" placeholder="Nama instansi/perusahaan/organisasi"/>
                <flux:select wire:model="jenis_instansi" label="Jenis Instansi" placeholder="Pilih jenis instansi">
                    <flux:select.option>Instansi Pemerintah</flux:select.option>
                    <flux:select.option>Instansi Swasta</flux:select.option>
                    <flux:select.option>BUMN/BUMD</flux:select.option>
                    <flux:select.option>Organisasi Non-Profit</flux:select.option>
                    <flux:select.option>Perusahaan Sendiri</flux:select.option>
                    <flux:select.option>Lainnya</flux:select.option>
                </flux:select>
                <flux:input wire:model="pendapatan" label="Pendapatan per bulan (dalam Rupiah)" type="number" value=0 />
                <flux:input wire:model="jabatan" label="Jabatan" type="text" placeholder="Jabatan/posisi Anda"/>
                <flux:input wire:model="kota_instansi" label="Kota Instansi" type="text" placeholder="Asal kota instansi/perusahaan/organisasi"/>
                <flux:input wire:model="alamat_instansi" label="Alamat Instansi" type="text" placeholder="Alamat instansi/perusahaan/organisasi"/>
            </div>
            <flux:button wire:click="save" variant="primary" class="w-full mt-6 cursor-pointer">SUBMIT</flux:button>
        </form>
        {{-- <flux:link href="#" variant="subtle" class="text-sm text-center">Laporkan kesalahan data</flux:link> --}}
    </div>
</div>
