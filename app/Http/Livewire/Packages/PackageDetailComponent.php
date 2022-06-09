<?php

namespace App\Http\Livewire\Packages;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

use App\Models\BuiltPackage;
use Exception;
use Livewire\Component;

class PackageDetailComponent extends Component
{
    public $slug;
    public $pkgname;
    public $packageId;
    public $arch = 'x86_64';
    public $pkgDistribution = 'avh030';
    public $extsion = '.avh.tar.zst';
    public $pkgFileToDownload;

    public $baseName;
    public $name;
    public $version;
    public $release;
    public $distribution;
    public $architecture;
    public $description;
    public $sourceUrl;
    public $license;
    public $dateCreated;
    public $provides;
    public $conflicts;
    public $groups;
    public $dependancies;
    public $optionalDependancies;
    public $makeDependancies;
    public $checkDependancies;
    public $requiredBy;
    public $optionalRequiredBy;
    public $makeRequiredBy;
    public $checkRequiredBy;
    public $maintainers;
    public $contributors;
    public $installedSize;
    public $files;



    public function mount($package_id)
    {
        try {
            $decrypted = Crypt::decrypt($package_id);
        } catch (DecryptException $e) {
            $message = "Decryption failed with error $e";
        }

        $this->packageId = $decrypted;
        // dd($this->packageId);
        // $this->pkgname = $package_name;
    }

        /**
     * return the array of provided string.
     *
     * @param  mixed $string
     * @return string
    */
    public function converStringToArray($string)
    {
        if ($string) {
            $array = [];
            $array = explode(" ", $string);
            if($array) {
                if(count($array) > 1) {
                    return $array;
                }
                else {
                    return $string;
                }
            }
        }
        else {
            return null;
        }
    }

    /**
     * return the array provided Xml file.
     *
     * @param
     * @return array
    */
    public function getPackageContentFromXmlFile($file)
    {
        $filePath = Storage::disk('package-xml-files')->path($file);

        // dd($filePath);
        $xmlDataString = file_get_contents($filePath);
        $xmlObject = simplexml_load_string($xmlDataString);

        $json = json_encode($xmlObject);
        $phpDataArray = json_decode($json, true);

        // dd($phpDataArray);
        $this->phpDataArray = $phpDataArray;

        return $phpDataArray;
    }

    /**
     * return the value of provided Xml Tag.
     * arg 1 = packageXmlFile
     * arg 2 = xmlTagName
     *
     * @param  mixed $xmlTagName
     * @return string
    */
    public function getXmlFileTagsContent($packageXmlFile, $xmlTagName)
    {
        $packageXmlFileContent = $this->getPackageContentFromXmlFile($packageXmlFile);
        // $xmlTagName = 'Files';
        // dd($packageXmlFileContent);

        try {
            if (isset($packageXmlFileContent[$xmlTagName]) && !empty($packageXmlFileContent[$xmlTagName])) {
                // if more than one element in the array then
                // convert array to string with implode function
                // saparater will be single space so as original data uploaded
                if(is_array($packageXmlFileContent[$xmlTagName])){
                    $value = $packageXmlFileContent[$xmlTagName];
                    return implode(" ", $value);
                }
                else {
                    return $packageXmlFileContent[$xmlTagName];
                }
            }
        } catch (Exception $e) {
            $message = "XML File read error $e";
        }
    }



    public function getPackageContentFromDatabase()
    {
        $package = BuiltPackage::where('id', $this->packageId)->first();
        // dd($package);
        if(isset($package->base_name)){
            $this->baseName = $package->base_name;
        }
        $this->name = $package->name;
        $this->version = $package->version;
        $this->release = $package->release;
        $this->distribution = $package->distribution;
        $this->architecture = $this->converStringToArray($package->architecture);
        $this->description = $package->description;
        $this->sourceUrl = $package->source_url;
        $this->license = $this->converStringToArray($package->license);
        $this->dateCreated = $package->date_created;
        $this->provides = $this->converStringToArray($package->provides);
        $this->conflicts = $this->converStringToArray($package->conflicts);
        $this->groups = $this->converStringToArray($package->groups);
        $this->dependancies = $this->converStringToArray($package->dependancies);
        $this->optionalDependancies = $this->converStringToArray($package->optional_dependancies);
        $this->makeDependancies = $this->converStringToArray($package->make_dependancies);
        $this->checkDependancies = $this->converStringToArray($package->check_dependancies);
        $this->requiredBy = $this->converStringToArray($package->required_by);
        $this->optionalRequiredBy = $this->converStringToArray($package->optional_required_by);
        $this->makeRequiredBy = $this->converStringToArray($package->make_required_by);
        $this->checkRequiredBy = $this->converStringToArray($package->check_required_by);
        $this->maintainers = $this->converStringToArray($package->maintainers);
        $this->contributors = $this->converStringToArray($package->contributors);
        $this->installedSize = $package->installed_size;
        if ($package->package_xml_file) {
            $this->files = $this->getXmlFileTagsContent($package->package_xml_file, 'File');
            $this->files = $this->converStringToArray($this->files);
        }
        else {
            $this->files = $this->converStringToArray($package->files);
        }
        $this->pkgFileToDownload = $this->name . '-' . $this->version . '-' . $this->release . '-' . $this->distribution . '-' . $this->architecture . $this->extsion;

        // dd($this->pkgFileToDownload);
        return $package;

    }

    public function download()
    {
        // dd(Storage::disk('packages')->exists($this->distribution . '/' . $this->arch . '/' . $this->pkgFileToDownload));
        $headers = [
            'Content-Type' => 'application/avh.tar.zst',
         ];

        if (Storage::disk('packages')->exists($this->distribution . '/' . $this->arch . '/' . $this->pkgFileToDownload)) {
            return Storage::disk('packages')->download($this->distribution . '/' . $this->arch . '/' . $this->pkgFileToDownload, $this->pkgFileToDownload, $headers);
        }
    }

    public function render()
    {
        $this->getPackageContentFromDatabase();
        return view('livewire.packages.package-detail-component');
    }
}
