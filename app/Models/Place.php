<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Place extends Model
{
    use HasFactory;
    private $img_path = "";
    private $name = "";
    private $mayor_name = "";
    private $city_hall_address = "";
    private $phone = "";
    private $mobile_phone = "";
    private $email = "";
    private $fax = "";
    private $area = "";
    private $website = "";
    private $ico = "";
    private $people = "";
    private $region = "";
    private $district = "";
    private $appeared_at = "";
    private $autonomous_region = "";
    private $latitude = "";
    private $longitude = "";

    public function __construct($array = null)
    {

        if ($array != null) {
            $this->img_path = $array['img_path'];
            $this->name = $array['name'];
            $this->mayor_name = $array['mayor_name'];
            $this->city_hall_address = $array['city_hall_address'];
            $this->phone = $array['phone'];
            $this->mobile_phone = $array['mobile_phone'];
            $this->email = $array['email'];
            $this->fax = $array['fax'];
            $this->area = $array['area'];
            $this->website = $array['website'];
            $this->ico = $array['ico'];
            $this->people = $array['people'];
            $this->region = $array['region'];
            $this->district = $array['district'];
            $this->appeared_at = $array['appeared_at'];
            $this->autonomous_region = $array['autonomous_region'];
            if (isset($array['latitude'])) {
                $this->latitude = $array['latitude'];
            }
            if (isset($array['longitude'])) {
                $this->longitude = $array['longitude'];
            }
        }
    }

    public function save_to_database()
    {
        try {
            $get = DB::table('places')->where('name', $this->name)->get();
            if ($get->count() > 0) {
                //update 
                DB::table('places')->where('name', $this->name)->update([
                    'img_path' => $this->img_path,
                    'name' => $this->name,
                    'mayor_name' => $this->mayor_name,
                    'city_hall_address' => $this->city_hall_address,
                    'phone' => $this->phone,
                    'mobile_phone' => $this->mobile_phone,
                    'email' => $this->email,
                    'fax' => $this->fax,
                    'area' => $this->area,
                    'website' => $this->website,
                    'ico' => $this->ico,
                    'people' => $this->people,
                    'region' => $this->region,
                    'district' => $this->district,
                    'appeared_at' => $this->appeared_at,
                    'autonomous_region' => $this->autonomous_region,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                return 0;
            } else {

                $id = DB::table('places')->insertGetId([
                    'img_path' => $this->img_path,
                    'name' => $this->name,
                    'mayor_name' => $this->mayor_name,
                    'city_hall_address' => $this->city_hall_address,
                    'phone' => $this->phone,
                    'mobile_phone' => $this->mobile_phone,
                    'email' => $this->email,
                    'fax' => $this->fax,
                    'area' => $this->area,
                    'website' => $this->website,
                    'ico' => $this->ico,
                    'people' => $this->people,
                    'region' => $this->region,
                    'district' => $this->district,
                    'appeared_at' => $this->appeared_at,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'autonomous_region' => $this->autonomous_region,
                    'created_at' => date('Y-m-d H:i:s')

                ]);
                return $id;
            }
        } catch (\Exception $e) {
            echo ("error saving place to database " . $e->getMessage() . " \n");
            return 0;
        }
    }
    public function getName(){
        return $this->name;
    }

    public function getPlace($name)
    {
        $place = DB::table('places')->where('name', $name)->get();
        if ($place->count() > 0) {
            return $place->first();
        } else {
            return 0;
        }
    }

    public function getPlacesByDistrict($district)
    {
        $places = DB::table('places')->where('district', $district)->get();
        if ($places->count() > 0) {
            return $places;
        } else {
            return 0;
        }
    }
    public function getPlacesByRegion($region)
    {
        $places = DB::table('places')->where('region', $region)->get();
        if ($places->count() > 0) {
            return $places;
        } else {
            return 0;
        }
    }
    public function getPlacesByAutonomousRegion($autonomous_region)
    {
        $places = DB::table('places')->where('autonomous_region', $autonomous_region)->get();
        if ($places->count() > 0) {
            return $places;
        } else {
            return 0;
        }
    }

    public function getPlaceById($id)
    {
        $place = DB::table('places')->where('id', $id)->get();
        if ($place->count() > 0) {
            return $place->first();
        } else {
            return 0;
        }
    }

    public function geocode()
    {
        try{
        $address = $this->city_hall_address;

        $queryString = http_build_query([
            'access_key' => env('POSITIONSTACK_API_KEY'),
            'query' => $address,
            'country'=>'SK',
            'output' => 'json',
            'limit' => 1,
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        $apiResult = json_decode($json, true);
        $this->latitude = $apiResult['data'][0]['latitude'];
        $this->longitude = $apiResult['data'][0]['longitude'];
        $this->save_to_database();
        return 1;
    }catch(\Exception $e){
        echo("error geocoding place " . $e->getMessage() . " \n");
        return 0;
    }
    }
}
