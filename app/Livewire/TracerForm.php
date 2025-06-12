<?php

namespace App\Livewire;

use App\Models\Alumni;
use App\Models\Tracer;
use Flux\Flux;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
class TracerForm extends Component
{
    public Alumni $alumni;

    public $nim;
    
    public $nama;

    public $nomor_ijazah;

    public $foto_ijazah;

    public $isVerified;

    #[Validate('required')]
    public $status;
    
    #[Validate('required')]
    public $waktu_tunggu;
    
    #[Validate('required')]
    public $keselarasan;
    
    #[Validate('required')]
    public $nama_instansi;
    
    #[Validate('required')]
    public $jenis_instansi;
    
    #[Validate('required')]
    public $kota_instansi;
    
    #[Validate('required')]
    public $alamat_instansi;
    
    #[Validate('required')]
    public $pendapatan;
    
    #[Validate('required')]
    public $jabatan;

    public function mount()
    {
        $this->isVerified = session('is_verified', false);

        if (!$this->isVerified) {
            redirect()->route('form.verify');
        } else {
            $this->nim = session('nim');
            $this->nomor_ijazah = session('nomor_ijazah');
            $this->alumni = Alumni::where('nim', $this->nim)
                ->where('nomor_ijazah', $this->nomor_ijazah)
                ->first();
            $this->nama = $this->alumni->nama;
            $this->foto_ijazah = $this->alumni->foto_ijazah;
        }
    }

    public function save()
    {
        $this->validate();

        Tracer::create([
            'nim' => $this->nim,
            'status' => $this->status,
            'waktu_tunggu' => $this->waktu_tunggu,
            'keselarasan' => $this->keselarasan,
            'nama_instansi' => $this->nama_instansi,
            'jenis_instansi' => $this->jenis_instansi,
            'kota_instansi' => $this->kota_instansi,
            'alamat_instansi' => $this->alamat_instansi,
            'pendapatan' => $this->pendapatan,
            'jabatan' => $this->jabatan,
        ]);

        Alumni::where('nim', $this->nim)
            ->where('nomor_ijazah', $this->nomor_ijazah)
            ->update(['mengisi_tracer' => true]);

        Flux::toast(
            heading: 'Sukses',
            text: 'Data berhasil disimpan.',
            variant: 'success',
            duration: 3000,
        ); 
            
        $this->modal('fotoIjazah')->show();        
    }
    
    public function backToHome()
    {
        $this->reset();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.tracer-form');
    }
}
