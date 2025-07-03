<?php

namespace App\Livewire;

use App\Models\Alumni;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
class VerifyForm extends Component
{
    #[Validate('required|min:12')]
    public $nim;

    #[Validate('required|min:15')]
    public $nomor_ijazah;

    public $modalIcon = 'exclamation-circle';
    public $modalTitle = '';
    public $modalText = '';

    public function verify()
    {
        $this->validate();

        $alumni = Alumni::where('nim', $this->nim)
            ->where('nomor_ijazah', $this->nomor_ijazah)
            ->first();

        if($alumni && $alumni->mengisi_tracer == false) {
            session([
                'is_verified' => true,
                'nim' => $this->nim,
                'nomor_ijazah' => $this->nomor_ijazah,
            ]);
            redirect()->route('tracerstudy.form');
        } else if ($alumni && $alumni->mengisi_tracer == true) {
            $this->modalIcon = 'exclamation-circle';
            $this->modalTitle = 'Form Sudah Terisi';
            $this->modalText = 'Anda sudah mengisi form ini sebelumnya.';
            $this->modal('verificationResult')->show();
        } else {
            $this->modalIcon = 'x-circle';
            $this->modalTitle = 'Data Tidak Ditemukan';
            $this->modalText = 'Pastikan data yang Anda masukkan benar, lalu coba lagi.';
            $this->modal('verificationResult')->show();
        }
    }

    public function render()
    {
        return view('livewire.verify-form');
    }
}
