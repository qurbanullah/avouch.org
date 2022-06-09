<?php

namespace App\Http\Livewire\Downloads;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DownloadReleaseComponent extends Component
{
    public $arch = 'x86_64';
    public $distribution = 'avh02';

    public function download($file)
    {

        // ini_set('memory_limit', '512');
        $headers = [
            'Content-Type' => 'application/iso',
        ];

        if (Storage::disk('releases')->exists($this->distribution . '/' . $this->arch . '/' . $file)) {
            $filePath = Storage::disk('releases')->path($this->distribution . '/' . $this->arch . '/' . $file);
            // dd($filePath);
            $content = file_get_contents($filePath);
            dd($content);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($filePath)
            ]);
            // return Storage::disk('releases')->download($this->arch . '/' . $file, $file, $headers);
        }
        return redirect('/404');

        // return response()->download('/run/media/avouch/Avouch/Projects/Web/Laravel/avouch/avouch/storage/app/download/' . $file);
        // return Storage::download($file, $file, $headers);
    }

    public function render()
    {
        return view('livewire.downloads.download-release-component');
    }
}
