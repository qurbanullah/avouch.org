<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use Spatie\Sitemap\SitemapGenerator;

use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

use App\Models\Group;
use App\Models\Package;
use App\Models\Post;

use Exception;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            $fileName = 'sitemap.xml';

            // modify this to your own needs
            // SitemapGenerator::create(config('app.url'))
            //     ->writeToFile(public_path('sitemap.xml'));

            Sitemap::create('https//avouch.org/')
                ->add(Url::create('/home'))
                ->add(Url::create('/download-releases'))
                ->add(Url::create('/packages/home'))
                ->add(Url::create('/packages/groups'))
                ->add(Url::create('/contact-us'))
                ->add(Group::all())
                ->add(Package::all())
                ->add(Post::all())
                ->writeToFile(public_path($fileName));

            // Ping Script Sitemapt
            // Submit you sitemaps automatically too Google, Bing/MSN and Ask

            // Location to Sitemap
            // $sitmapUrl = 'https//avouch.org/' . $fileName;
            // decoded or encoded url by using the tool https://www.urlencoder.org/
            // $encodedSitemapUrlForGoogle = "https%2F%2Favouch.org%2Fsitemap.xml";

            // cUrl handler to ping the Sitemap submission URLs for Search Engines…
            // function uploadSiteMap($url)
            // {
            //     $curlHandler = curl_init();
            //     curl_setopt($curlHandler,CURLOPT_URL,$url);
            //     curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT,2);
            //     curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER,1);
            //     curl_exec($curlHandler);
            //     $httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);
            //     curl_close($curlHandler);
            //     return $httpCode;

            // }

            // function submitSitemap($url, $sitmapurl)
            // {
            //     $url1 = $url.htmlentities($sitmapurl);
            //     $response = file_get_contents($url1);

            //         if($response){
            //             echo $response;
            //         }else{
            //             echo "Failed to submit sitemap";
            //         }
            // }

            // function uploadSiteMap($url)
            // {
            //   $ch = curl_init($url);
            //   curl_setopt($ch, CURLOPT_HEADER, 0);
            //   curl_exec($ch);
            //   $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //   curl_close($ch);
            //   return $httpCode;
            // }


            // Sitemap for Google
            // $url = "https://www.google.com/ping?sitemap=";
            // dd($url);
            // $data = file_get_contents($url);
            // $status = ( strpos($data,"Sitemap Notification Received") !== false ) ? "OK" : "ERROR";
            // submitSitemap($url, $sitmapUrl);

            // $returnCode = uploadSiteMap($url);
            // echo "return code: $returnCode";
            // if ($returnCode == 200) {
            //     echo "<p>Google Sitemap has been pinged (return code: $returnCode).</p><br>";
            // } else {
            //     echo "Google sitemap submission failed";
            // }
            // Sitemap for Bing / MSN
            // $url = "http://www.bing.com/ping?sitemap=" . $sitmapUrl;
            // $returnCode = uploadSiteMap($url);
            // if ($returnCode == 200) {
            //     echo "<p>Bing / MSN Sitemap has been pinged (return code: $returnCode).</p><br>";
            // } else {
            //     echo "<p>Bing / MSN sitemap submission failed</p>";
            // }

            // Sitemap for Ask
            // $url = "http://submissions.ask.com/ping?sitemap=" . $sitmapUrl;
            // $returnCode = uploadSiteMap($url);
            // echo "<p>Ask Sitemaps has been pinged (return code: $returnCode).</p><br>";


        }catch (Exception $e) {
            Log::error($e);
        }
    }
}
