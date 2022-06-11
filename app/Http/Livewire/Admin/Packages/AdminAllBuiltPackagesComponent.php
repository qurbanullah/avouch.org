<?php

namespace App\Http\Livewire\Admin\Packages;

use App\Models\User;
use App\Models\Group;
use App\Models\BuiltPackage;
use App\Models\Package;
use App\Models\Maintainable;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Exception;

class AdminAllBuiltPackagesComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $packageModelId;
    public $builtPackageModelId;
    public $recordsToDisplay;
    public $query = '';
    public $highlightIndex;
    public $isActive = 1;

    public $packageXmlFile;
    public $packageXmlFileUploaded;
    public $imageUploaded;

    public $phpDataArray;

    public $error_message;


    public $baseName;
    public $name;
    public $slug;
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
    public $maintainersEmail;
    public $contributors;
    public $contributorsEmail;
    public $installedSize;
    public $files;

    public $maintainerId;
    public $maintainableId;
    public $maintainableType;

    public $contributorId;
    public $contributableId;
    public $contributableType;


    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
        $this->resetVariables();
        $this->recordsToDisplay = 100;
    }

    public function resetVariables()
    {
        $this->query = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        // if ($contact) {
        //     $this->redirect(route('admin.categories.main-category-detail', $contact['id']));
        // }
    }

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function readDatabaeForSearchQuery()
    {
        if(!empty($this->query)) {
            return BuiltPackage::select('*')
                        ->where('name', 'like', '%' . $this->query . '%')
                        ->paginate($this->recordsToDisplay);
        }
    }

        /**
    * The readbusinessCategory function.
    *
    * @return void
    */
    public function readGroupDatabase()
    {
        return Group::get();
    }

    /**
     * The readmainCategory function.
     *
     * @return void
     */
    public function readPackageDatabase()
    {
        return BuiltPackage::paginate($this->recordsToDisplay);
    }

    /**
     * get group id
     *
     * @return void
     */
    public function getGroupId($groupName)
    {
        $getGroupId = Group::where('name', $groupName)->first();
        return $getGroupId->id;
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'version' => 'required',
        ];
    }

    /**
     * Runs everytime the title
     * variable is updated.
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    /**
    * Runs everytime the pageBannerPhotoPath
    * variable is updated.
    *
    * @return void
    */
    public function updatedPackageXmlFile()
    {
        $this->validate([
            'packageXmlFileUploaded' => 'xml', // 1MB Max
        ]);
    }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->builtPackageModelId = $id;
        $this->modalFormVisible = true;
        $this->loadModelPackage();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->builtPackageModelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

        /**
     * return the array provided Xml file.
     *
     * @param
     * @return array
    */
    public function uploadFile()
    {
        try {
            $this->packageXmlFile = md5($this->packageXmlFileUploaded . microtime()).'.'.$this->packageXmlFileUploaded->extension();
            $this->packageXmlFileUploaded->storeAs('public/package-xml-files', $this->packageXmlFile);

            $filePath = Storage::disk('package-xml-files')->path($this->packageXmlFile);

            return $filePath;

        } catch (Exception $e) {
            $this->error_message = "File upload error";
            session()->flash('error_message', $this->error_message);
        }

    }

    /**
     * return the array provided Xml file.
     *
     * @param
     * @return array
    */
    public function getPackageContentFromXmlFile()
    {
        try {
            $this->packageXmlFile = md5($this->packageXmlFileUploaded . microtime()).'.'.$this->packageXmlFileUploaded->extension();
            $this->packageXmlFileUploaded->storeAs('public/package-xml-files', $this->packageXmlFile);

            $filePath = Storage::disk('package-xml-files')->path($this->packageXmlFile);

            // dd($filePath);
            $xmlDataString = file_get_contents($filePath);
            $xmlObject = simplexml_load_string($xmlDataString);

            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true);

            // dd($phpDataArray);
            $this->phpDataArray = $phpDataArray;

            return $phpDataArray;

        } catch (Exception $e) {
            $error_message = "XML File upload / read error";
            session()->flash('error_message', $error_message);
        }

    }

    /**
     * return the value of provided Xml Tag.
     *
     * @param  mixed $xmlTagName
     * @return string
    */
    public function getXmlFileTagsContent($xmlTagName)
    {
        $packageXmlFileContent = $this->phpDataArray;

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
            $error_message = "XML Tag read error";
            session()->flash('error_message', $error_message);
        }


    }

    /**
     * return the value of provided Xml Tag.
     *
     * @param  mixed $xmlTagName
     * @return string
    */
    public function convertToString($value)
    {
        try {
            if ($value && !empty($value)) {
                // if more than one element in the array then
                // convert array to string with implode function
                // saparater will be single space so as original data uploaded
                if(is_array($value)){
                    return implode(" ", $value);
                }
                else {
                    return $value;
                }
            }
        } catch (Exception $e) {
            $error_message = "Conversion to string error";
            session()->flash('error_message', $error_message);
        }


    }

    /**
     * Upload package xml file to database.
     *
     * @param  mixed $id
     * @return void
    */
    public function uploadPackageXmlFileToDatabase()
    {
        $packageXmlFileContent = $this->getPackageContentFromXmlFile();
        if (isset($packageXmlFileContent['Package']) && !empty($packageXmlFileContent['Package'])){
            foreach($packageXmlFileContent['Package'] as $content){

                if (isset($content['BaseName']) && !empty($content['BaseName'])) {
                    // if more than one element in the array then
                    // convert array to string with implode function
                    // saparater will be single space so as original data uploaded
                    if(is_array($content['BaseName'])){
                        $baseName = $content['BaseName'];
                        $this->baseName = implode(" ", $baseName);
                    }
                    else {
                        $this->baseName = $content['BaseName'];
                    }
                }

                if (isset($content['Name']) && !empty($content['Name'])) {
                    if(is_array($content['Name']) > 1){
                        $name = $content['Name'];
                        $this->name = implode(" ", $name);
                    }
                    else {
                        $this->name = $content['Name'];
                    }
                }

                if (isset($content['Version']) && !empty($content['Version'])) {
                    if(is_array($content['Version'])){
                        $version = $content['Version'];
                        $this->version = implode(" ", $version);
                    }
                    else {
                        $this->version = $content['Version'];
                    }
                }

                if (isset($content['Release']) && !empty($content['Release'])) {
                    if(is_array($content['Release']) > 1){
                        $release = $content['Release'];
                        $this->release = implode(" ", $release);
                    }
                    else {
                        $this->release = $content['Release'];
                    }
                }

                if (isset($content['Distribution']) && !empty($content['Distribution'])) {
                    if(is_array($content['Distribution'])){
                        $distribution = $content['Distribution'];
                        $this->distribution = implode(" ", $distribution);
                    }
                    else {
                        $this->distribution = $content['Distribution'];
                    }
                }

                if (isset($content['Architecture']) && !empty($content['Architecture'])) {
                    if(is_array($content['Architecture'])){
                        $architecture = $content['Architecture'];
                        $this->architecture = implode(" ", $architecture);
                    }
                    else {
                        $this->architecture = $content['Architecture'];
                    }
                }

                if (isset($content['Description']) && !empty($content['Description'])) {
                    if(is_array($content['Description'])){
                        $description = $packageXmlFileContent['Description'];
                        $this->description = implode(" ", $description);
                    }
                    else {
                        $this->description = $content['Description'];
                    }
                }

                if (isset($content['SourceUrl']) && !empty($content['SourceUrl'])) {
                    if(is_array($content['SourceUrl'])){
                        $sourceUrl = $packageXmlFileContent['SourceUrl'];
                        $this->sourceUrl = implode(" ", $sourceUrl);
                    }
                    else {
                        $this->sourceUrl = $content['SourceUrl'];
                    }
                }

                if (isset($content['License']) && !empty($content['License'])) {
                    if(is_array($content['License'])){
                        $license = $content['License'];
                        $this->license = implode(" ", $license);
                    }
                    else {
                        $this->license = $content['License'];
                    }
                }

                if (isset($content['DateCreated']) && !empty($content['DateCreated'])) {
                    if(is_array($content['DateCreated'])){
                        $dateCreated = $packageXmlFileContent['DateCreated'];
                        $this->dateCreated = implode(" ", $dateCreated);
                    }
                    else {
                        $this->dateCreated = $content['DateCreated'];
                    }
                }

                if (isset($content['Provide']) && !empty($content['Provide'])) {
                    if(is_array($content['Provide']) > 1){
                        $provides = $content['Provide'];
                        $this->provides = implode(" ", $provides);
                    }
                    else {
                        $this->provides = $content['Provide'];
                    }
                }

                if (isset($content['Conflict']) && !empty($content['Conflict'])) {
                    if(is_array($content['Conflict']) > 1){
                        $conflicts = $content['Conflict'];
                        $this->conflicts = implode(" ", $conflicts);
                    }
                    else {
                        $this->conflicts = $content['Conflict'];
                    }
                }

                if (isset($content['Group']) && !empty($content['Group'])) {
                    if(is_array($content['Group'])){
                        $groups = $content['Group'];
                        $this->groups = implode(" ", $groups);
                    }
                    else {
                        $this->groups = $content['Group'];
                    }
                }

                if (isset($content['Dependancy']) && !empty($content['Dependancy'])) {
                    if(is_array($content['Dependancy'])){
                        $dependancies = $content['Dependancy'];
                        $this->dependancies = implode(" ", $dependancies);
                    }
                    else {
                        $this->dependancies = $content['Dependancy'];
                    }
                }

                if (isset($content['OptionalDependancy']) && !empty($content['OptionalDependancy'])) {
                    if(is_array($content['OptionalDependancy'])){
                        $optionalDependancies = $content['OptionalDependancy'];
                        $this->optionalDependancies = implode(" ", $optionalDependancies);
                    }
                    else {
                        $this->optionalDependancies = $content['OptionalDependancy'];
                    }
                }

                if (isset($content['MakeDependancy']) && !empty($content['MakeDependancy'])) {
                    if(is_array($content['MakeDependancy'])){
                        $makeDependancies = $content['MakeDependancy'];
                        $this->makeDependancies = implode(" ", $makeDependancies);
                    }
                    else {
                        $this->makeDependancies = $content['MakeDependancy'];
                    }
                }

                if (isset($content['CheckDependancy']) && !empty($content['CheckDependancy'])) {
                    if(is_array($content['CheckDependancy']) > 1){
                        $checkDependancies = $content['CheckDependancy'];
                        $this->checkDependancies = implode(" ", $checkDependancies);
                    }
                    else {
                        $this->checkDependancies = $content['CheckDependancy'];
                    }
                }

                if (isset($content['RequiredBy']) && !empty($content['RequiredBy'])) {
                    if(is_array($content['RequiredBy'])){
                        $requiredBy = $content['RequiredBy'];
                        $this->requiredBy = implode(" ", $requiredBy);
                    }
                    else {
                        $this->requiredBy = $content['RequiredBy'];
                    }
                }

                if (isset($content['OptionalRequiredBy']) && !empty($content['OptionalRequiredBy'])) {
                    if(is_array($content['OptionalRequiredBy'])){
                        $optionalRequiredBy = $content['OptionalRequiredBy'];
                        $this->optionalRequiredBy = implode(" ", $optionalRequiredBy);
                    }
                    else {
                        $this->optionalRequiredBy = $content['OptionalRequiredBy'];
                    }
                }

                if (isset($content['MakeRequiredBy']) && !empty($content['MakeRequiredBy'])) {
                    if(is_array($content['MakeRequiredBy'])){
                        $makeRequiredBy = $content['MakeRequiredBy'];
                        $this->makeRequiredBy = implode(" ", $makeRequiredBy);
                    }
                    else {
                        $this->makeRequiredBy = $content['MakeRequiredBy'];
                    }
                }

                if (isset($content['CheckRequiredBy']) && !empty($content['CheckRequiredBy'])) {
                    if(is_array($content['CheckRequiredBy'])){
                        $checkRequiredBy = $content['CheckRequiredBy'];
                        $this->checkRequiredBy = implode(" ", $checkRequiredBy);
                    }
                    else {
                        $this->checkRequiredBy = $content['CheckRequiredBy'];
                    }
                }

                if (isset($content['Maintainer']) && !empty($content['Maintainer'])) {
                    if(is_array($content['Maintainer'])){
                        $maintainer = $content['Maintainer'];
                        $this->maintainers = implode(" ", $maintainer);
                    }
                    else {
                        $this->maintainers = $content['Maintainer'];
                    }
                }

                if (isset($content['MaintainerEmail']) && !empty($content['MaintainerEmail'])) {
                    if(is_array($content['MaintainerEmail'])){
                        $maintainer = $content['MaintainerEmail'];
                        $this->maintainers = implode(" ", $maintainer);
                    }
                    else {
                        $this->maintainers = $content['MaintainerEmail'];
                    }
                }

                if (isset($content['Contributor']) && !empty($content['Contributor'])) {
                    if(is_array($content['Contributor'])){
                        $contributor = $content['Contributor'];
                        $this->contributors = implode(" ", $contributor);
                    }
                    else {
                        $this->contributors = $content['Contributor'];
                    }
                }

                if (isset($content['ContributorEmail']) && !empty($content['ContributorEmail'])) {
                    if(is_array($content['ContributorEmail'])){
                        $contributor = $content['ContributorEmail'];
                        $this->contributors = implode(" ", $contributor);
                    }
                    else {
                        $this->contributors = $content['ContributorEmail'];
                    }
                }

                if (isset($content['InstalledSize']) && !empty($content['InstalledSize'])) {
                    if(is_array($content['InstalledSize'])){
                        $installedSize = $content['InstalledSize'];
                        $this->installedSize = implode(" ", $installedSize);
                    }
                    else {
                        $this->installedSize = $content['InstalledSize'];
                    }
                }

                if (isset($content['File']) && !empty($content['File'])) {
                    if(is_array($content['File'])){
                        $files = $content['File'];
                        $this->files = implode(" ", $files);
                    }
                    else {
                        $this->files = $content['File'];
                    }
                }
                // Get group Id
                $groupIdLocal = $this->getGroupId($this->groups);
                If(!empty($groupIdLocal)) {
                    $this->groupId = $groupIdLocal;
                }
                // dd($this->groupId);
                $this->create();
            }
        }
        else{
            // $this->baseName = $this->getXmlFileTagsContent('BaseName');
            $this->name = $this->getXmlFileTagsContent('Name');
            $this->version = $this->getXmlFileTagsContent('Version');
            $this->release = $this->getXmlFileTagsContent('Release');
            $this->distribution = $this->getXmlFileTagsContent('Distribution');
            $this->architecture = $this->getXmlFileTagsContent('Architecture');
            $this->description = $this->getXmlFileTagsContent('Description');
            $this->sourceUrl = $this->getXmlFileTagsContent('SourceUrl');
            $this->license = $this->getXmlFileTagsContent('License');
            $this->dateCreated = $this->getXmlFileTagsContent('DateCreated');
            $this->provides = $this->getXmlFileTagsContent('Provide');
            $this->conflicts = $this->getXmlFileTagsContent('Conflict');
            $this->groups = $this->getXmlFileTagsContent('Group');
            $this->dependancies = $this->getXmlFileTagsContent('Dependancy');
            $this->optionalDependancies = $this->getXmlFileTagsContent('OptionalDependancy');
            $this->makeDependancies = $this->getXmlFileTagsContent('MakeDependancy');
            $this->checkDependancies = $this->getXmlFileTagsContent('CheckDependancy');
            $this->requiredBy = $this->getXmlFileTagsContent('RequiredBy');
            $this->optionalRequiredBy = $this->getXmlFileTagsContent('OptionalRequiredBy');
            $this->makeRequiredBy = $this->getXmlFileTagsContent('MakeRequiredBy');
            $this->checkRequiredBy = $this->getXmlFileTagsContent('CheckRequiredBy');
            $this->maintainers = $this->getXmlFileTagsContent('Maintainer');
            $this->maintainersEmail = $this->getXmlFileTagsContent('MaintainerEmail');
            $this->contributors = $this->getXmlFileTagsContent('Contributor');
            $this->contributorsEmail = $this->getXmlFileTagsContent('ContributorEmail');
            $this->installedSize = $this->getXmlFileTagsContent('InstalledSize');
            // $this->files = $this->getXmlFileTagsContent('File');

            // dd($this->name);

            // Get group Id
            $groupIdLocal = $this->getGroupId($this->groups);
            If(!empty($groupIdLocal)) {
                $this->groupId = $groupIdLocal;
            }
            $this->create();
        }
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $package = Package::where('name', $this->name)->first();
        if(empty($package)){
            $this->createPackage();
        }
        else {
            $this->packageModelId = $package->id;
            $this->updatePackage();
        }

        $builtPackage = BuiltPackage::where('name', $this->name)->first();
        if(empty($builtPackage)){
            $this->createBuiltPackage();
        }
        else{
            if ($builtPackage->version == $this->version && $builtPackage->release == $this->release && $builtPackage->distribution == $this->distribution && $builtPackage->architecture == $this->architecture) {
                $this->builtPackageModelId = $builtPackage->id;
                $this->updateBuiltPackage();
            }
            else {
                $this->createBuiltPackage();
            }
        }
    }

        /**
     * The create function.
     *
     * @return void
     */
    public function createPackage()
    {
        $package = Package::create($this->modelDataPackage());

        if($package){
            if(!empty($this->maintainersEmail)){
                // convert into array with php explode function
                $mEmail = explode(" ", $this->maintainersEmail);
                if(is_array($mEmail)) {
                    foreach($mEmail as $key => $value) {
                        $maintainer = User::where('email', $value)->first();
                        if($maintainer){
                            $this->maintainerId = $maintainer->id;
                            $package->maintainers()->attach($this->maintainerId);

                            // $this->dispatchBrowserEvent('alert',
                            // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                        }
                        else{
                            $this->dispatchBrowserEvent('alert',
                            ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                        }
                    }
                }
                else{
                    $maintainer = User::where('email', $this->maintainersEmail)->first();
                    if($maintainer){
                        $this->maintainerId = $maintainer->id;
                        $package->maintainers()->attach($this->maintainerId);

                        // $this->dispatchBrowserEvent('alert',
                        // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                    }
                    else{
                        $this->dispatchBrowserEvent('alert',
                        ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                    }
                }
            }
            else{
                $maintainer = User::where('name', $this->maintainers)->first();

                if($maintainer){
                    $this->maintainerId = $maintainer->id;
                    $package->maintainers()->attach($this->maintainerId);

                    // $this->dispatchBrowserEvent('alert',
                    // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                }
                else{
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                }
            }

            if(!empty($this->contributorsEmail)){
                $cEmail = explode(" ", $this->contributorsEmail);
                if(is_array($cEmail)) {
                    foreach($cEmail as $key => $value) {
                        $contributor= User::where('email', $value)->first();
                        if($contributor){
                            $this->contributorId = $contributor->id;
                            $package->contributors()->attach($this->contributorId);

                            // $this->dispatchBrowserEvent('alert',
                            // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                        }else{
                            $this->dispatchBrowserEvent('alert',
                            ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                        }
                    }
                }
                else{
                    $contributor = User::where('email', $this->contributorsEmail)->first();
                    if($contributor){
                        $this->contributorId = $contributor->id;
                        $package->contributors()->attach($this->contributorId);

                        // $this->dispatchBrowserEvent('alert',
                        // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                    }else{
                        $this->dispatchBrowserEvent('alert',
                        ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                    }
                }
            }
            else{
                $contributor = User::where('name', $this->contributors)->first();
                if($contributor){
                    $this->contributorId = $contributor->id;
                    $package->contributors()->attach($this->contributorId);

                    // $this->dispatchBrowserEvent('alert',
                    // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                }else{
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                }
            }
            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Package created successfully.']);
        }
        else{
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning',  'message' => 'Error Creating Package.']);
        }
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function createBuiltPackage()
    {
        $builtPackage = BuiltPackage::create($this->modelDataBuiltPackage());

        if($builtPackage){
            if(!empty($this->maintainersEmail)){
                $mEmail = explode(" ", $this->maintainersEmail);
                if(is_array($mEmail)) {
                    foreach($mEmail as $key => $value) {
                        $maintainer = User::where('email', $value)->first();
                        if($maintainer){
                            $this->maintainerId = $maintainer->id;
                            $builtPackage->maintainers()->attach($this->maintainerId);

                            // $this->dispatchBrowserEvent('alert',
                            // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                        }
                        else{
                            $this->dispatchBrowserEvent('alert',
                            ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                        }
                    }
                }
                else{
                    $maintainer = User::where('email', $this->maintainersEmail)->first();
                    if($maintainer){
                        $this->maintainerId = $maintainer->id;
                        $builtPackage->maintainers()->attach($this->maintainerId);

                        // $this->dispatchBrowserEvent('alert',
                        // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                    }
                    else{
                        $this->dispatchBrowserEvent('alert',
                        ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                    }
                }
            }else{
                $maintainer = User::where('name', $this->maintainers)->first();

                if($maintainer){
                    $this->maintainerId = $maintainer->id;
                    $builtPackage->maintainers()->attach($this->maintainerId);

                    // $this->dispatchBrowserEvent('alert',
                    // ['type' => 'success',  'message' => 'Maintainer Attached With Package.']);
                }
                else{
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning',  'message' => 'Maintainer Not Found in Database.']);
                }
            }

            if(!empty($this->contributorsEmail)){
                $cEmail = explode(" ", $this->contributorsEmail);
                if(is_array($cEmail)) {
                    foreach($cEmail as $key => $value) {
                        $contributor= User::where('email', $value)->first();
                        if($contributor){
                            $this->contributorId = $contributor->id;
                            $builtPackage->contributors()->attach($this->contributorId);

                            // $this->dispatchBrowserEvent('alert',
                            // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                        }
                        else{
                            $this->dispatchBrowserEvent('alert',
                            ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                        }
                    }
                }else{
                    $contributor = User::where('email', $this->contributorsEmail)->first();
                    if($contributor){
                        $this->contributorId = $contributor->id;
                        $builtPackage->contributors()->attach($this->contributorId);

                        // $this->dispatchBrowserEvent('alert',
                        // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                    }
                    else{
                        $this->dispatchBrowserEvent('alert',
                        ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                    }
                }
            }else{
                $contributor = User::where('name', $this->contributors)->first();
                if($contributor){
                    $this->contributorId = $contributor->id;
                    $builtPackage->contributors()->attach($this->contributorId);

                    // $this->dispatchBrowserEvent('alert',
                    // ['type' => 'success',  'message' => 'Contributor Attached With Package.']);
                }
                else{
                    $this->dispatchBrowserEvent('alert',
                    ['type' => 'warning',  'message' => 'Contributor Not Found in Database.']);
                }
            }
            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Built Package created successfully.']);
        }
        else{
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning',  'message' => 'Error Creating Package.']);
        }
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function updatePackage()
    {
        try{
            // Package::find($this->packageModelId)->update($this->modelDataPackage());
            $package = Package::where('name', $this->name)->first();

            // $this->maintainableId = $package['id'];
            // $this->maintainableType = 'App\Models\Package';
            // $this->createMaintainable();

            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Package Updated Successfully!']);

        }
        catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Updating Package.']);
        }
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function updateBuiltPackage()
    {
        try{
            BuiltPackage::find($this->builtPackageModelId)->update($this->modelDataBuiltPackage());
            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Built Package updted Successfully!']);

        }
        catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Updating Built Package.']);
        }
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        try{
            BuiltPackage::destroy($this->builtPackageModelId);
            $this->modalConfirmDeleteVisible = false;
            $this->resetPage();
            $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Built Package Deleted Successfully!']);

        }
        catch(Exception $e){
            $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Error Deleting Built Package.']);
        }
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModelBuiltPackage()
    {
        $data = BuiltPackage::find($this->builtPackageModelId);
        $this->baseName = $data->base_name;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->version = $data->version;
        $this->release = $data->release;
        $this->distribution = $data->distribution;
        $this->architecture = $data->architecture;
        $this->description = $data->description;
        $this->sourceUrl = $data->source_url;
        $this->license = $data->license;
        $this->dateCreated = $data->date_created;
        $this->provides = $data->provides;
        $this->conflicts = $data->conflicts;
        $this->groups = $data->groups;
        $this->group_id = $data->groupId;
        $this->dependancies = $data->dependancies;
        $this->makeDependancies = $data->make_dependancies;
        $this->checkDependancies = $data->check_dependancies;
        $this->requiredBy = $data->required_by;
        $this->optionalRequiredBy = $data->optional_required_by;
        $this->makeRequiredBy = $data->make_required_by;
        $this->checkRequiredBy = $data->check_required_by;
        $this->maintainers = $data->maintainers;
        $this->contributors = $data->contributors;
        $this->installedSize = $data->installed_size;
        $this->packageXmlFile = $data->package_xml_file;
        // $this->files = $data->files;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelDataPackage()
    {
        return [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'base-name' => Str::slug($this->baseName),
            'short_description' => $this->description,
            'groups' => $this->groups,
            'group_id' => $this->groupId,
        ];
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelDataBuiltPackage()
    {
        return [
            'base_name' => $this->baseName,
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'version' => $this->version,
            'release' => $this->release,
            'distribution' => $this->distribution,
            'architecture' => $this->architecture,
            'description' => $this->description,
            'source_url' => $this->sourceUrl,
            'license' => $this->license,
            'date_created' => $this->dateCreated,
            'provides' => $this->provides,
            'conflicts' => $this->conflicts,
            'groups' => $this->groups,
            'group_id' => $this->groupId,
            'dependancies' => $this->dependancies,
            'make_dependancies' => $this->makeDependancies,
            'check_dependancies' => $this->checkDependancies,
            'required_by' => $this->requiredBy,
            'optional_required_by' => $this->optionalRequiredBy,
            'make_required_by' => $this->makeRequiredBy,
            'check_required_by' => $this->checkRequiredBy,
            'maintainers' => $this->maintainers,
            'contributors' => $this->contributors,
            'installed_size' => $this->installedSize,
            'package_xml_file' => $this->packageXmlFile,
            // 'files' => $this->files,
        ];
    }

    /**
     * Dispatch event
     *
     * @return void
     */
    // public function dispatchEvent()
    // {
    //     $this->dispatchBrowserEvent('event-notification', [
    //         'eventName' => 'Sample Event',
    //         'eventMessage' => 'You have a sample event notification!',
    //     ]);
    // }


    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.packages.admin-all-built-packages-component', [
            'data' => $this->readPackageDatabase(),
            'searchedData' => $this->readDatabaeForSearchQuery(),
            'groups' => $this->readGroupDatabase(),
        ]);
    }
}
