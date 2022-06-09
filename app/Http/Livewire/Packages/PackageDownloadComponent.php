<?php

namespace App\Http\Livewire\Packages;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PackageDownloadComponent extends Component
{
    public $arch = 'x86_64';

    public function mount($package)
    {

        $headers = [
            'Content-Type' => 'application/avh.tar.zst',
         ];

        if (Storage::disk('packages')->exists($this->arch . '/' . $package)) {
            return Storage::disk('packages')->download($this->arch . '/' . $package, $package, $headers);
        }
    }
    public function render()
    {
        return view('livewire.packages.package-download-component');
    }
}
