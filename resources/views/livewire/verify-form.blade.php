<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="flex flex-col min-w-xl p-6">
        @include('sweetalert2::index')
        <form wire:submit="verify" class="space-y-6">
            <flux:heading size="xl">Cek Ijazah</flux:heading>                    
            <flux:input wire:model="nim" type="text" label="Nomor Induk Mahasiswa" placeholder="Masukkan NIM Anda"/>
            <flux:input wire:model="nomor_ijazah" type="text" label="Nomor Ijazah" placeholder="Masukkan nomor ijazah Anda" />
            <flux:button type="submit" variant="primary" class="w-full mt-2 cursor-pointer">Lanjut</flux:button>
        </form>
        <flux:modal name="notFound" class="flex flex-col p-8 space-y-4">
            <flux:heading size="xl">Data Tidak Ditemukan</flux:heading>
            <flux:text>Pastikan data yang anda masukan benar, lalu coba lagi.</flux:text>
        </flux:modal>
        <flux:modal name="filled" class="space-y-4">
            <flux:heading size="xl">Sudah Mengisi</flux:heading>
            <flux:text>Anda sudah mengisi form sebelumnya, terima kasih.</flux:text>
        </flux:modal>
    </div>
</div>
