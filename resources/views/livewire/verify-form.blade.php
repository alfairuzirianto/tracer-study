<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="flex flex-col max-w-md md:w-lg p-6">
        <form wire:submit="verify" class="space-y-6">
            <flux:heading size="xl" class="text-center font-semibold">CEK IJAZAH</flux:heading>                    
            <flux:input size="sm" wire:model="nim" type="text" label="Nomor Induk Mahasiswa" placeholder="Masukkan NIM Anda"/>
            <flux:input size="sm" wire:model="nomor_ijazah" type="text" label="Nomor Ijazah" placeholder="Masukkan nomor ijazah Anda" />
            <flux:button type="submit" variant="primary" class="w-full mt-2 cursor-pointer font-semibold">VERIFIKASI</flux:button>
        </form>
        <flux:modal name="verificationResult" class="w-56 md:w-fit flex flex-col space-y-4 justify-center items-center">
            <flux:icon name="{{ $modalIcon }}" class="size-10" />
            <flux:heading size="xl" class="text-center text-sm md:text-lg lg:text-xl">{{ $modalTitle }}</flux:heading>
            <flux:text class="text-center text-xs md:text-sm">{{ $modalText }}</flux:text>
        </flux:modal>
    </div>
</div>
