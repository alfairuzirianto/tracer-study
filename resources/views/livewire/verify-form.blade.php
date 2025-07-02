<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="flex flex-col min-w-xl p-6">
        <form wire:submit="verify" class="space-y-6">
            <flux:heading size="xl">Cek Ijazah</flux:heading>                    
            <flux:input wire:model="nim" type="text" label="Nomor Induk Mahasiswa" placeholder="Masukkan NIM Anda"/>
            <flux:input wire:model="nomor_ijazah" type="text" label="Nomor Ijazah" placeholder="Masukkan nomor ijazah Anda" />
            <flux:button type="submit" variant="primary" class="w-full mt-2 cursor-pointer">VERIFIKASI</flux:button>
        </form>
        <flux:modal name="verificationResult" class="flex flex-col p-8 space-y-4 justify-center items-center">
            <flux:icon name="{{ $modalIcon }}" class="size-10" />
            <flux:heading size="xl">{{ $modalTitle }}</flux:heading>
            <flux:text>{{ $modalText }}</flux:text>
        </flux:modal>
    </div>
</div>
