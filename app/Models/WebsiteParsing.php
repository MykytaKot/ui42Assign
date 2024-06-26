<?php

namespace App\Models;

use simplehtmldom\HtmlWeb;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteParsing extends Model
{
    use HasFactory;


    public function getDistricts($url)
    {
        try {
            $return = [];
            $webParser = new HtmlWeb();
            $htmlDoc = $webParser->load($url);
            if (!$htmlDoc) {
                echo ("error loading page");
                return 0;
            }
            //finding all links with class okreslink
            foreach ($htmlDoc->find('.okreslink') as $anchor) {
                $return[$anchor->plaintext] = $anchor->href;
            }

            return $return;
        } catch (\Exception $e) {
            echo ("error getting districts $url with exeption " . $e->getMessage() . " \n");
            return 0;
        }
    }

    public function getPlaces($url)
    {
        try {
            $return = [];
            $webParser = new HtmlWeb();
            $htmlDoc = $webParser->load($url);
            if (!$htmlDoc) {
                echo ("error loading places $url");
                return 0;
            }
            $tables = $htmlDoc->find('table');
            //goes through all tables and finds the one with border 0 cellspacing 3 and cellpadding 3
            foreach ($tables as $table) {
                $attributes =  $table->getAllAttributes();
                if (isset($attributes['border']) && isset($attributes["cellspacing"]) && isset($attributes["cellpadding"])) {
                    if ($attributes['border'] == '0' && $attributes["cellspacing"] == '3' && $attributes["cellpadding"] == "3") {
                        foreach ($table->find('a') as $anchor) {
                            //return only names and links that are not #
                            if ($anchor->href != "#") {
                                $return[$anchor->plaintext] = $anchor->href;
                            }
                        }
                    }
                }
            }
            return $return;
        } catch (\Exception $e) {
            echo ("error getting places $url with exeption " . $e->getMessage() . " \n");
            return 0;
        }
    }
    public function saveImage($url)
    {

        $img = file_get_contents($url);
        $img_name = basename($url);
        $img_path = public_path('images\\' . $img_name);
        $directory = dirname($img_path);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        file_put_contents($img_path, $img);
        echo ("image saved $img_path \n");
        return 'images\\' . $img_name;
    }

    public function getInfoAboutPlace($url)
    {
        try {
            $img_path = "";
            $name = "";
            $mayor_name = "";
            $city_hall_address = "";
            $phone = "";
            $mobile_phone = "";
            $email = "";
            $fax = "";
            $area = "";
            $website = "";
            $boss = "";
            $ico = "";
            $people = "";
            $region = "";
            $district = "";
            $appeared_at = "";
            $autonomous_region = "";
            $webParser = new HtmlWeb();
            $htmlDoc = $webParser->load($url);
            if (!$htmlDoc) {
                echo ("error loading place $url");
                return 0;
            }
            //parsing image url
            $images = $htmlDoc->find('img');
            foreach ($images as $img) {
                if (str_contains($img->alt, "Erb ")) {
                    $img_path = $img->src;
                }
            }
            echo ($img_path);
            //finding a main td element to parse 
            $maintd = null;
            foreach ($htmlDoc->find('td') as $td) {
                $attributes = $td->getAllAttributes();
                if (isset($attributes['height']) && isset($attributes["valign"])) {
                    if ($attributes['height'] == '29' && $attributes["valign"] == 'top') {
                        $maintd = $td;
                        break;
                    }
                }
            }
            //check if not found
            if ($maintd == null) {
                echo ("district with link $url not found or broken");
                return 0;
            }

            //fisrt part of parsing  - name and address telephone fax email and website
            $firstdatatable = $maintd->find('table', 0);
            $name = $firstdatatable->find('td', 0)->find('h1')[0]->plaintext;
            $phone = $firstdatatable->find('td', 8)->plaintext;
            $fax = $firstdatatable->find('td', 11)->plaintext;
            $city_hall_address = $firstdatatable->find('td', 12)->plaintext . "," . $firstdatatable->find('td', 15)->plaintext;
            $emails = $firstdatatable->find('td', 14);
            $emailarray = [];
            //making a string from all websites links separated by comma
            foreach ($emails->find('a') as $email) {
                $emailarray[] = $email->plaintext;
            }
            $email = implode(",", $emailarray);
            $websites = $firstdatatable->find('td', 17);
            $webarray = [];
            //making a string from all websites links separated by comma
            foreach ($websites->find('a') as $web) {
                $webarray[] = $web->href;
            }
            $website = implode(",", $webarray);
            //second information table parsing
            $seconddatatable = $maintd->find('table', 3);
            $autonomous_region = $seconddatatable->find('tr', 0)->find('td', 1)->plaintext;
            $district = $seconddatatable->find('tr', 1)->find('td', 1)->plaintext;
            $region = $seconddatatable->find('tr', 2)->find('td', 1)->plaintext;
            $ico = $seconddatatable->find('tr', 3)->find('td', 1)->plaintext;
            $people = $seconddatatable->find('tr', 4)->find('td', 1)->plaintext;
            $area = $seconddatatable->find('tr', 5)->find('td', 1)->plaintext;
            $appeared_at = $seconddatatable->find('tr', 6)->find('td', 1)->plaintext;
            $mayor_name = $seconddatatable->find('tr', 7)->find('td', 1)->plaintext;
            //check if there is a 9th row
            if ($seconddatatable->find('tr', 8) != null) {
                //check if it is a mobile phone or boss
                if ($seconddatatable->find('tr', 8)->find('td', 0)->plaintext == 'Prednosta:') {
                    //if boss is not empty, set it to boss
                    $boss = $seconddatatable->find('tr', 8)->find('td', 1)->plaintext;
                    //if it was boss then check if 10th row exists
                    if ($seconddatatable->find('tr', 9) != null) {
                        $mobile_phone = $seconddatatable->find('tr', 9)->find('td', 1)->plaintext;
                    }
                } else {
                    $mobile_phone = $seconddatatable->find('tr', 8)->find('td', 1)->plaintext;
                }
            }
            //putting place info into array
            $placeInfo = array(
                "img_path" => $this->saveImage($img_path),
                "name" => $name,
                "mayor_name" => $mayor_name,
                "city_hall_address" => $city_hall_address,
                "phone" => $phone,
                "mobile_phone" => $mobile_phone,
                "email" => $email,
                "fax" => $fax,
                "area" => $area,
                "website" => $website,
                "ico" => $ico,
                "people" => $people,
                "region" => $region,
                "boss" => $boss,
                "district" => $district,
                "appeared_at" => $appeared_at,
                "autonomous_region" => $autonomous_region
            );
            echo ("$name parsed!\n");
            return $placeInfo;
        } catch (\Exception $e) {
            echo ("error parsing place $url with exeption " . $e->getMessage() . " \n");
            return 0;
        }
    }
}
