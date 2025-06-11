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
            redirect()->route('form.tracerstudy');
        } else if ($alumni && $alumni->mengisi_tracer == true) {
            $this->modal('filled')->show();
        } else {
            $this->modal('notFound')->show();
        }
    }

    public function render()
    {
        return view('livewire.verify-form');
    }
}
