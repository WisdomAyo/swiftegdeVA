<?php


namespace App\Helpers;


use App\Models\ArtisanServices;
use App\Models\CustomerRating;
use App\Models\ServiceRating;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;

class CommonHelpers
{


    /**
     * @param $title
     * @param string $separator
     * @param string $language
     * @return string
     */
    public static function str_slug($title, string $separator = '-', string $language = 'en') : string
    {
        return Str::slug($title, $separator, $language);
    }

    /**
     * @param $string
     * @param $table
     * @param $field
     * @param $key
     * @param $value
     * @return array|string|string[]|null
     */
    public static function create_unique_slug($string, $table,$field,$key=NULL,$value=NULL){

        $slug = strtolower(self::str_slug($string));
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
        if($key)$params["$key !="] = $value;

        while (DB::table($table)->where($params)->count()) {
            if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
            }
            $params [$field] = $slug;
        }
        return $slug;

    }


    /**
     * @param $request
     * @return CustomerRating
     */
    public static function StoreReviews($request) : CustomerRating {

        $data = new CustomerRating();
        $data->fullname = $request->fullname;
        $data->email    = $request->email;
        $data->review   = $request->review;
        $data->user_id  = $request->identity ?? null;
        $data->rating   = $request->rating ?? 5;
        $data->save();


        // updating user table
        $numbers_of_rating =  CustomerRating::where('user_id',$request->identity)->sum('rating');
        $number_of_people_rating = CustomerRating::where('user_id',$request->identity)->count();

        $user_ids = User::where('identity',$request->identity)->value('id');
        $data_ = User::find($user_ids);

        if($number_of_people_rating == 0){
            $data_->rating = 0;
        }else {
            $final_rating = $numbers_of_rating / $number_of_people_rating;
            $data_->rating =  $data_->rating + $final_rating;
        }
        $data_->update();
        return $data;
    }

    /**
     * @param $type
     * @return string
     */
    public static function generateCramp($type) :string
    {
        $mt = explode(' ', microtime());
        $rand = time() . rand(10, 99);
        $time = ((int)$mt[1]) * 1000000 + ((int)round($mt[0] * 1000000));
        $generated = $rand . $time;

        switch ($type) {
            case "comments" :
                return "3060" . $generated;
                break;
            case "post" :
                return "3061" . $generated;
                break;
            case "user" :
                return "3062" . $generated;
                break;
            default:
                return "3069" . $generated;
                break;
        }
    }

    /**
     * @param $service_id
     * @return float
     */
    public static function rating($service_id) : float {
        $numbers_of_rating =  ServiceRating::where('service_id',$service_id)->where('type','service')->sum('rating');
        $number_of_people_rating = ServiceRating::where('service_id',$service_id)->where('type','service')->count();

        if($number_of_people_rating == 0){
            $final_rating =  0;
        }else {
            $final_rating = $numbers_of_rating / $number_of_people_rating;
        }
        return $final_rating;
    }


    /**
     * @param $user_id
     * @return float
     */
    public static function freelancerRating($user_id) : float {
        $numbers_of_rating =  ServiceRating::where('user_id',$user_id)->where('type','freelancer')->sum('rating');
        $number_of_people_rating = ServiceRating::where('user_id',$user_id)->where('type','freelancer')->count();

        if($number_of_people_rating == 0){
            $final_rating =  0;
        }else {
            $final_rating = $numbers_of_rating / $number_of_people_rating;
        }
        return $final_rating;
    }

    /**
     * @param $l
     * @param string $c
     * @return string
     */
    public static function code_ref ($l, string $c = '1234567890') : string {
        for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
        return $s;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function valid_email($email): bool
    {
        return !!filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param $phone
     * @return bool
     */
    public static  function validate_phone_number($phone): bool
    {
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    public static function seoTemplate($type, $title_ = null) : array {

        $title = "SwiftedgeVA is an online blue-collar recruitment agency for companies in Nigeria.";
        $desc = "SwiftedgeVA connects local services such as cleaning, plumbing, electrical, carpentry, painting,
                            beauty, home appliances repairs, etc to homes and offices using the quickest technology with great customer experience.";
        $post_url = url('/');
        $post_image = asset('SwiftedgeVA.png');
        $listed = null;

        switch ($type){
            case "home" :
                $listed = ["title" => $title,"desc" => $desc, "post_url" => $post_url,"post_image" => $post_image];
                break;
            case "about-us":
                $desc_ ="At SwiftedgeVA we make it easy for businesses to hire bluecollar workers across Nigeria. Currently we have verified professionals in over 30 categories ranging from tailors, to beauticians, to plumbers, and tailors. Through the use of technology we unlock important career tools such as digital profiles, product galleries, customer reviews, and more.";
                $listed = ["title" => "SwiftedgeVA - ".ucwords($type),"desc" => $desc_, "post_url" => $post_url,"post_image" => $post_image];
                break;
            default:
                if(!empty($title_)){
                    $listed = ["title" => "SwiftedgeVA - ".ucwords($type), "desc" => $title_, "post_url" => $post_url,"post_image" => $post_image];
                }else {
                    $listed = ["title" => "SwiftedgeVA - ".ucwords($type), "desc" => $desc, "post_url" => $post_url,"post_image" => $post_image];
                }

        }
        return $listed;
    }


    /**
     * @param $business_category_id
     * @return Builder[]|Collection
     */
    public static function getServicesByCategory($business_category_id){
        $artisan_services = ArtisanServices::query()->where('business_category_id', $business_category_id)->get();
        foreach ($artisan_services as $row){
            $row["profile_image"] = User::query()->where('id', $row->user_id)->value('profile_image');
        }
        return $artisan_services;
    }


}
