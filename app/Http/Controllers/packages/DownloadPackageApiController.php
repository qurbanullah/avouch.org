<?php

namespace App\Http\Controllers\packages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadPackageApiController extends Controller
{
    public $arch = 'x86_64';
    public $distribution = 'avh030';

    function downloadPackage($package)
    {
        $headers = [
            'Content-Type' => 'application/avhp.tar.zst',
         ];

        if (Storage::disk('packages')->exists($this->distribution . '/' . $this->arch . '/' . $package)) {
            return Storage::disk('packages')->download($this->distribution . '/' . $this->arch . '/' . $package, $package, $headers);
        }
    }

    function downloadPackagesDatabase($packageDatabaseFile)
    {
        $headers = [
            'Content-Type' => 'application/tar.zst',
         ];

        if (Storage::disk('packages-database')->exists($this->distribution . '/' . $this->arch . '/' . $packageDatabaseFile)) {
            return Storage::disk('packages-database')->download($this->distribution . '/' . $this->arch . '/' . $packageDatabaseFile, $packageDatabaseFile, $headers);
        }
    }

    function downloadPackagesFilesDatabase($packageFilesDatabaseFile)
    {
        $headers = [
            'Content-Type' => 'application/tar.gz',
         ];

        if (Storage::disk('packages-database')->exists($this->distribution . '/' . $this->arch . '/' . $packageFilesDatabaseFile)) {
            return Storage::disk('packages-database')->download($this->distribution . '/' . $this->arch . '/' . $packageFilesDatabaseFile, $packageFilesDatabaseFile, $headers);
        }
    }

    function downloadPackagesInfoFiles($packageInfoFile)
    {
        $headers = [
            'Content-Type' => 'application/xml',
         ];

        if (Storage::disk('packages-info-files')->exists($this->distribution . '/' . $this->arch . '/' . $packageInfoFile)) {
            return Storage::disk('packages-info-files')->download($this->distribution . '/' . $this->arch . '/' . $packageInfoFile, $packageInfoFile, $headers);
        }
    }
}
