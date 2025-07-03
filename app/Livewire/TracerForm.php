<?php

namespace App\Livewire;

use App\Models\Alumni;
use App\Models\Tracer;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('components.layouts.app')]
class TracerForm extends Component
{
    public Alumni $alumni;

    public $nim;
    
    public $nama;

    public $email;

    public $telepon;

    public $alamat;

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

    public $modalDisplay = 'hidden';

    public array $statusOptions = ['Bekerja', 'Lanjut Studi', 'Wiraswasta', 'Belum Bekerja', 'Lainnya'];

    public array $keselarasanOptions = ['Sangat Erat', 'Erat', 'Cukup Erat', 'Kurang Erat', 'Tidak Erat'];

    public array $jenisInstansiOptions = ['Instansi Pemerintah', 'Instansi Swasta', 'BUMN/BUMD', 'Organisasi Non-Profit', 'Perusahaan Sendiri', 'Lainnya'];

    public function mount()
    {
        $this->isVerified = session('is_verified', false);

        if (!$this->isVerified) {
            redirect()->route('tracerstudy.verification');
        } else {
            $this->nim = session('nim');
            $this->nomor_ijazah = session('nomor_ijazah');
            $this->alumni = Alumni::where('nim', $this->nim)
                ->where('nomor_ijazah', $this->nomor_ijazah)
                ->first();
            $this->nama = $this->alumni->nama;
            $this->foto_ijazah = $this->alumni->foto_ijazah;
            $this->email = $this->alumni->email;
            $this->telepon = $this->alumni->telepon;
            $this->alamat = $this->alumni->alamat;
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
            
        $this->modalDisplay = '';
        $this->modal('fotoIjazah')->show();        
    }
    
    public function backToHome()
    {
        $this->reset();
        $this->modalDisplay = 'hidden';
        redirect()->route('home');
        session()->forget(['is_verified', 'nim', 'nomor_ijazah']);
    }

    public function render()
    {
        return view('livewire.tracer-form');
    }
}
