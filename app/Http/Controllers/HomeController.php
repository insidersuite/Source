<?php
    namespace App\Http\Controllers;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mailers\Mailer;
    use App\Models\Contact_message;
    use App\Models\Career;
    use App\Models\Blog;
    use App\Models\Blog_user;
    use App\Models\Offer;
    use App\Models\Partner;
    use App\Models\Book;
    use App\Models\Career_detail;
    use App\Models\Newsletters;
    use App\Models\TravelCompanion;
    use App\Models\Experience;
    use App\Models\ExperienceDetail;
    use App\Models\Accomodation;
    use App\Models\Accommodation_Image;
    use App\Models\Activity_Image;
    use App\Models\Promotion;
    use App\Models\Activity;
    use App\Models\Calendar_Accommodation;
    use App\Models\Calendar_Activity;
    use App\Models\AccommodationPractical;
    use App\Models\ActivityPractical;
    use App\Models\Accom_Exp;
    use App\Models\ExpDetailImage;
    use App\Models\Review_Mail;
    use App\Models\Review;
    use App\Mail\ContactUs;
    use App\Models\InviteMail;
    use App\User;
    use Auth;
    use File;
    use Illuminate\Validation\Rules\Exists;
    use Mockery\Exception;
    use function PHPSTORM_META\elementType;
    class HomeController extends Controller
    {
        protected $mailer;
        function __construct(Mailer $mailer){
            $this->mailer = $mailer;
        }
        public function giving_feedback($exp_id) {
            $reviews = Review_Mail::where('experience_id', $exp_id)->where('review_flag', 0)->get();
            // $latest = strtotime($reviews[0]->created_at);
            // $key = 0;
            // foreach ($reviews as $key => $review) {
            //     if ($latest < strtotime($review->created_at)) {
            //         $latest = strtotime($review->created_at);
            //         $key = $key;
            //     }
            // }
            if (count($reviews)>0) {
                $review = $reviews[0];
                // $user = User::where('username', $review->name)->first();
                // $offer = Offer::where('location_place', $review->location)->first();
                // $exp = Experience::where('exp_name', $review->experience_name)->where('city_id', $offer->id)->where('user_id', $user->user_id)->first();
                $exp_details = ExperienceDetail::where('experience_id', $exp_id)->get();
                $accom_ids = []; $act_ids = [];
                foreach ($exp_details as $sel) {
                    if ($sel->type == "accommodation") {
                        if (array_search($sel->type_id, $accom_ids) === false) {
                            array_push($accom_ids, $sel->type_id);
                        }
                    } else {
                        if (array_search($sel->type_id, $act_ids) === false ) {
                            array_push($act_ids, $sel->type_id);
                        }
                    }
                }
                $acts = []; $accoms = []; $act_imgs = []; $accom_imgs = [];
                foreach ($accom_ids as $id) {
                    $accom = Accomodation::where('id', $id)->first();
                    $accom_img = Accommodation_Image::where('accom_id', $id)->get();
                    array_push($accoms, $accom);
                    array_push($accom_imgs, $accom_img);
                }
                foreach ($act_ids as $id) {
                    $act = Activity::where('id', $id)->first();
                    array_push($acts, $act);
                    $act_img = Activity_Image::where('act_id', $id)->get();
                    array_push($act_imgs, $act_img);
                }
                $act_count = count($acts);
                $accom_count = count($accoms);
                return view('giving_review', compact('review', 'acts', 'accoms', 'act_imgs', 'accom_imgs', 'act_count', 'accom_count'));
            } else {
                return redirect('offers');
            }
        }
        public function confirm_review(Request $request) {
            $review = Review_Mail::where('id', $request->id)->first();
            return view('confirm_review', compact('review'));
        }
        public function home() {
            return view('home');
        }
        public function test() {
            return view('test');
        }
        public function offers_page() {
            $user = Auth::User();
            $offers = Offer::orderBy('updated_at', 'desc')->get();
            $count = Offer::count();
            return view('offers', compact('offers', 'count'));
        }
        public function experience() {
            return view('host_experience');
        }
        public function offer(Request $req){
            $user = Auth::User();
            $id=$req->id;
            return view('offer',compact('id'));
        }
        public function create_experience(Request $request) {
            $expid = $request->expid;
            $experience = Experience::where('user_id', Auth::User()->user_id)->where('id', $expid)->where('city_id', $request->id)->where('status', 'false')->first();
            $experience_count = Experience::where('user_id', Auth::User()->user_id)->where('id', $expid)->where('city_id', $request->id)->where('status', 'false')->count();
            $offer = Offer::where('id', $request->id)->first();
            if ($experience_count > 0) {
                $guests_nb = (isset($experience->guests_nb)) ? (int)$experience->guests_nb : 0;
                $query = Accomodation::where('city_id', $request->id)->where('status', 'true');
                $accoms = $query->orderBy('timestamp', 'ASC')->get();
            } else {
                $accoms = Accomodation::where('city_id', $request->id)->where('status', 'true')->orderBy('timestamp', 'ASC')->get();
            }
            $accom_images = Accommodation_Image::where('offer_id', $offer->id)->get();
            $prices_accom = Calendar_Accommodation::select('*')->get();
            $prices_accom_na = Calendar_Accommodation::where('price_a_discount', '=', 'NA')->where('price_b_discount', '=', 'NA')->get();
            $accom_ids = [];
            foreach($prices_accom as $price) {
                if (in_array($price['accomodation_id'], $accom_ids) == false) {
                    array_push($accom_ids, $price->accomodation_id);
                }
            }
            foreach($accoms as $key => $accom) {
                if (in_array($accom['id'], $accom_ids) == false) {
                    unset($accoms[$key]);
                }
            }
            $exp_accom = Accom_Exp::get();
            $accom_practical = AccommodationPractical::where('offer_id', $request->id)->get();
            $activities = Activity::where('city_id', $request->id)->where('status', 'true')->orderBy('timestamp', 'ASC')->get();
            $act_images = Activity_Image::where('offer_id', $offer->id)->get();
            $prices_act = Calendar_Activity::where('price_a_discount', '!=', 'NA')->where('price_b_discount', '!=', 'NA')->get();
            $act_ids = [];
            foreach($prices_act as $price) {
                if (array_search($price['activity_id'], $act_ids) == false) {
                    array_push($act_ids, $price->activity_id);
                }
            }
            foreach($activities as $key => $act) {
                if (in_array($act['id'], $act_ids) == false) {
                    unset($activities[$key]);
                }
            }
            $act_practical = ActivityPractical::where('offer_id', $request->id)->get();
            $type = "new";
            $_flags = [];
            $exp_link_imgs = ExpDetailImage::select()->orderBy('exp_id', 'ASC')->get();
            // fixed by dong
            $exp_link_imgs_categories = ExpDetailImage::selectRaw('id, category')->groupBy("category")->orderBy('id', 'ASC')->get();
            // end
            //var_dump($experience->id);die;
            if ($experience != null) {
                $accoms_sel = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'accommodation')->get();
                $acts_sel = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'activity')->get();
                $count_a = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'accommodation')->count();
                $count_c = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'activity')->count();
                for ($i =0; $i < count($accoms_sel); $i ++ ) {
                    if ($accoms_sel[$i]->check_in == $accoms_sel[$i]->check_out) {
                        $_flag = [
                        'price' => $accoms_sel[$i]->d_a_price,
                        'start_day' => $accoms_sel[$i]->check_in,
                        'end_day' => $accoms_sel[$i]->check_out
                        ];
                        $_flag = implode("k".$i, $_flag);
                        array_push($_flags, $_flag);
                    }
                }
                $type = "edit";
            } else {
                $accoms_sel = ExperienceDetail::where('experience_id', "0")->get();
                $acts_sel = ExperienceDetail::where('experience_id', "0")->get();
                $count_c = ExperienceDetail::where('experience_id', "0")->count();
                $count_a = $count_c;
            }
            $f_count = count($_flags);
            $_flags = implode("A",$_flags);
            $reviews = Review::get();
            return view('create_experience', compact('experience', 'offer', 'accoms', 'accom_images', 'prices_accom', 'prices_accom_na', 'exp_accom', 'accom_practical', 'act_practical', 'activities', 'act_images' ,'prices_act', 'accoms_sel', 'acts_sel', 'type', 'count_c', 'count_a', '_flags', 'f_count', 'exp_link_imgs', 'exp_link_imgs_categories', 'reviews'));
        }
        public function create_exp_accoms(Request $request) {
            $dates = explode("/" , $request->arrival_date);
            $start_date = Carbon::create($dates[2], $dates[1], $dates[0])->subDays(7);
            $end_date = Carbon::create($dates[2], $dates[1], $dates[0])->addDays(30);
            
            $experience = Experience::where('user_id', Auth::User()->user_id)->where('city_id', $request->id)->where('id', $request->exp_id)->where('status', 'false')->first();
            $experience_count = Experience::where('user_id', Auth::User()->user_id)->where('city_id', $request->id)->where('id', $request->exp_id)->where('status', 'false')->count();
            $offer = Offer::where('id', $request->id)->first();
            if ($experience_count > 0) {
                $guests_nb = (int)$request->get_guests_num;
                if ($guests_nb % 2 == 0) {
                    $guest_nb_min = $guests_nb / 2;
                    $query = Accomodation::where('city_id', $request->id)->where('status', 'true')->where('room_nb', '>=', $guest_nb_min)->where('room_nb', '<=', $guests_nb);
                } else {
                    $guest_nb_min = ($guests_nb + 1) / 2;
                    $query = Accomodation::where('city_id', $request->id)->where('status', 'true')->where('room_nb', '>=', $guest_nb_min)->where('room_nb', '<=', $guests_nb);
                }
                // $query = Accomodation::where('city_id', $request->id)->where('status', 'true')->where('max_capacity', '>=', $guests_nb);
                $accoms = $query->orderBy('timestamp', 'ASC')->get();
            } else {
                $accoms = Accomodation::where('city_id', $request->id)->where('status', 'true')->orderBy('timestamp', 'ASC')->get();
            }
            $accom_images = Accommodation_Image::where('offer_id', $offer->id)->get();
            $prices_accom = Calendar_Accommodation::where('price_a_discount', '!=', 'NA')->where('price_b_discount', '!=', 'NA')->where('check_in_date', '>=', $start_date)->where('check_out_date', '<=', $end_date)->get();
            $prices_accom_na = Calendar_Accommodation::where('price_a_discount', '=', 'NA')->where('price_b_discount', '=', 'NA')->where('check_in_date', '>=', $start_date)->where('check_out_date', '<=', $end_date)->get();
            $accom_ids = [];
            foreach($prices_accom as $price) {
                if (in_array($price['accomodation_id'], $accom_ids) == false) {
                    array_push($accom_ids, $price->accomodation_id);
                }
            }
            foreach($accoms as $key => $accom) {
                if (in_array($accom['id'], $accom_ids) == false) {
                    unset($accoms[$key]);
                }
                $destinationPath=public_path()."/assets/uploads/accom_content";
                if (file_exists($destinationPath."/accom_".$accom['id'].".txt")) {
                    $accom_content = File::get($destinationPath . "/accom_" . $accom['id'] . ".txt");
                    $accom["content"] = $accom_content;
                }else{
                    $accom["content"] = "";
                }
            }
            $exp_accom = Accom_Exp::get();
            $accom_practical = AccommodationPractical::where('offer_id', $request->id)->get();
            $activities = Activity::where('city_id', $request->id)->where('status', 'true')->orderBy('timestamp', 'ASC')->get();
            $act_images = Activity_Image::where('offer_id', $offer->id)->get();
            $prices_act = Calendar_Activity::where('price_a_discount', '!=', 'NA')->where('price_b_discount', '!=', 'NA')->where('check_in_date', '>=', $start_date)->get();
            $act_ids = [];
            foreach($prices_act as $price) {
                if (array_search($price['activity_id'], $act_ids) == false) {
                    array_push($act_ids, $price->activity_id);
                }
            }
            foreach($activities as $key => $act) {
                if (in_array($act['id'], $act_ids) == false) {
                    unset($activities[$key]);
                }
                $destinationPath=public_path()."/assets/uploads/act_content";
                if (file_exists($destinationPath."/act_".$act['id'].".txt")) {
                    $act_content = File::get($destinationPath."/act_".$act['id'].".txt");
                    $act["content"] = $act_content;
                }else{
                    $act["content"] = "";
                }
                // var_dump($act["content"]);
            }
            $act_practical = ActivityPractical::where('offer_id', $request->id)->get();
            $type = "new";
            $_flags = [];
            $exp_link_imgs = ExpDetailImage::select()->orderBy('exp_id', 'ASC')->get();
            // fixed by dong
            $exp_link_imgs_categories = ExpDetailImage::selectRaw('id, category')->groupBy("category")->orderBy('id', 'ASC')->get();
            // end
            if ($experience != null) {
                $accoms_sel = ExperienceDetail::where('experience_id', intval($experience->id))->where('type', 'accommodation')->get();
                $acts_sel = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'activity')->get();
                $count_a = ExperienceDetail::where('experience_id', intval($experience->id))->where('type', 'accommodation')->count();
                $count_c = ExperienceDetail::where('experience_id', $experience->id)->where('type', 'activity')->count();
                for ($i =0; $i < count($accoms_sel); $i ++ ) {
                    if ($accoms_sel[$i]->check_in == $accoms_sel[$i]->check_out) {
                        $_flag = [
                        'price' => $accoms_sel[$i]->d_a_price,
                        'start_day' => $accoms_sel[$i]->check_in,
                        'end_day' => $accoms_sel[$i]->check_out
                        ];
                        $_flag = implode("k".$i, $_flag);
                        array_push($_flags, $_flag);
                    }
                }
                $type = "edit";
            } else {
                $accoms_sel = ExperienceDetail::where('experience_id', "0")->get();
                $acts_sel = ExperienceDetail::where('experience_id', "0")->get();
                $count_c = ExperienceDetail::where('experience_id', "0")->count();
                $count_a = $count_c;
            }
            $f_count = count($_flags);
            $_flags = implode("A",$_flags);
            $reviews = Review::get();
            // var_dump($activities);
            return view('create_exp_accoms', compact('experience', 'offer', 'accoms', 'accom_images', 'prices_accom', 'prices_accom_na', 'exp_accom', 'accom_practical', 'act_practical', 'activities', 'act_images' ,'prices_act', 'accoms_sel', 'acts_sel', 'type', 'count_c', 'count_a', '_flags', 'f_count', 'exp_link_imgs', 'exp_link_imgs_categories', 'reviews'));
        }
        public function experience_invite() {
            $user = Auth::User();
            if (!isset($_GET['id'])) {
                return redirect('offers');
            } else {
                $exp_id = $_GET['id'];
                $inviteMail = InviteMail::where('user_id', $user->user_id)->where('exp_id', $exp_id)->first();
                if (isset($inviteMail)) {
                    return view('experience_invite', compact('inviteMail'));
                } else {
                    return redirect('offers');
                }
            }
            return view('experience_invite');
        }
        public function payment_error_page() {
            $user = Auth::User();
            if (isset($user)) {
                return view('payment_error_page');
            }
        }
        public function payment_error_page_gift() {
            $user = Auth::User();
            if (isset($user)) {
                return view('payment_error_page_gift');
            }
        }
        public function our_story() {
            return view('footer.our_story');
        }
        public function how_it_works() {
            return view('footer.how_it_works');
        }
        public function sponsor() {
            // require_once __DIR__.'/Facebook/autoload.php';
            // $facebook = new \Facebook\Facebook(array(
            //   'appId'  => '625441737790452',
            //   'secret' => '097a40ef5c6022fdad5d8d809b1778a7',
            //   'default_graph_version' => 'v3.2',
            //   'default_access_token' => '625441737790452|097a40ef5c6022fdad5d8d809b1778a7'
            // ));
            // $helper = $facebook->getRedirectLoginHelper();
            // $accessToken = $helper->getAccessToken();
            // dd($accessToken);
            // if (isset($accessToken)) {
            //     $url = "https://graph.facebook.com/v3.0/me/taggable_friends?fields=name,picture&limit=5000&access_token={$access_token}";
            //     $headers = array("Content-type: application/json");
            // }
            return view('footer.sponsor');
        }
        public function write_to_us() {
            return view('footer.write_to_us');
        }
        public function contact() {
            return view('footer.contact');
        }
        public function careers() {
            $careers = Career::orderBy('updated_at', 'desc')->paginate(30);
            $count = Career::count();
            return view('footer.career', compact('careers', 'count'));
        }
        public function legal_terms() {
            return view('footer.legal_terms');
        }
        public function gift_card() {
            return view('footer.gift_card');
        }
        public function blogs () {
            $blogs = Blog::orderBy('updated_at', 'desc')->paginate(30);
            $count = Blog::count();
            return view('footer.blog', compact('blogs', 'count'));
        }
        public function blog_detail (Request $request) {
            $id = $request->input('id');
            $blog = Blog::where("id", $id)->first();
            if (Auth::user()) {
                $blog_user = Blog_user::where('user_id', Auth::User()->user_id)->where('blog_id', $id)->first();
                if ($blog_user) {
                    $type = "true";
                } else {
                    $type = "false";
                }
            } else {
                $type = "false";
            }
            return view('footer.blog_detail', compact('type', 'blog'));
        }
        public function career_detail (Request $request) {
            $id = $request->input('id');
            $details = Career_detail::where('department_id', $id)->get();
            $career = Career::where('id', $id)->first();
            return view('footer.career_detail', compact('details', 'career'));
        }
        public function career_detail_info (Request $request) {
            $detail_info = Career_detail::where('id', $request->id)->first();
            $career = Career::where('id', $request->id)->first();
            return view('footer.career_detail_info', compact('detail_info', 'career'));
        }
        public function profile() {
            return view('account_menu.profile');
        }
        public function travel() {
            $user = Auth::User();
            $traveler = TravelCompanion::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->first();
            $count = TravelCompanion::where('user_id', $user->user_id)->count();
            return view('account_menu.travel-companion', compact('traveler', 'count'));
        }
        public function alert_page() {
            return view('account_menu.alerts');
        }
        public function subscription() {
            return view('account_menu.subscription');
        }
        public function mail_gift_card() {
            return view('account_menu.mail_gift_card_page');
        }
        private function send_mail($email, $details, $subject,$template) {
            $view = 'mail_templates.'.$template;
            $subject = $subject;
            $data['data'] = $details;
            $this->mailer->sendTo($email, $subject, $view, $data);
        }
        public function write_to_us_mail(Request $request) {
            $message = [
            'subject' => $request->subject,
            'email' => $request->email,
            'name' => $request->name,
            'content' => $request->content,
            'attached_file' => "",
            '_status' => 'unread'
            ];
            $mail = Contact_message::create($message);
            $email_contact = \Config::get('mail.email_contact');
            Mail::to($email_contact)->send(new ContactUs($message));
            return redirect()->back();
        }
        public function send_feedback(Request $request) {
            $email_contact = \Config::get('mail.email_contact');
            $this->send_mail($email_contact, $request,'Website Feedback','feedback');
            return redirect()->back();
        }
        public function send_newsletter(Request $request) {
            $this->send_mail($request->newsletter,$request,'Newsletter','newsletter');
            return redirect()->back();
        }
        public function notify_site_details(Request $request) {
            $email_contact = \Config::get('mail.email_contact');
            $this->send_mail($email_contact, $request,'Notify For Page Release','page_release');
            return redirect()->back();
        }
        public function login_status_change() {
            Auth::User()->change_login_status(Auth::User()->user_id);
        }
        public function charge(Request $request) {
            dd($request);
        }
        public function live_message(Request $request) {
            $message = [
            'email' => $request->email,
            'name' => $request->name,
            'content' => $request->content,
            'attached_file' => $request->attached_file,
            '_status' => 'unread',
            'subject' => 'null'
            ];
            $contact= Contact_message::create($message);
            $email_contact = \Config::get('mail.email_contact');
            Mail::to($email_contact)->send(new ContactUs($message));
            return redirect()->back();
        }
        public function dashboard() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $dend = date('Y-m-d');
            $partner_count = Partner::count();
            $sponsored_count = User::where('referal_count', '!=', 0)->count();
            $user_count = User::where('created_at','<=', $dend)->where('role', 1)->count();
            $unpaid_count = Experience::where('status', 'false')->count();
            $paid_count = Experience::where('status', 'true')->count();
            $city_count = Offer::count();
            $act_count = Activity::count();
            $accom_count = Accomodation::count();
            return view('private_admin.dashboard', compact('user_count', 'partner_count', 'paid_count', 'sponsored_count', 'act_count', 'accom_count', 'city_count', 'unpaid_count', 'dstart','dend'), ["title" => 'dashboard']);
        }
        public function dashboardSearch(Request $request){
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $dstart = $this->changeDateType($request->startDate);
            $dend = $this->changeDateType($request->endDate);
            $sponsored_count = User::where('referal_count', '!=', 0)->count();
            $partner_count = Partner::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $user_count = User::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->where('role', 1)->count();
            $book_count = Book::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $paid_count = Experience::where('status', 'true')->where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $unpaid_count = Experience::where('status', 'false')->where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $city_count = Offer::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $act_count = Activity::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            $accom_count = Accomodation::where('created_at', '>=', $dstart)->where('created_at','<=', $dend)->count();
            return view('private_admin.dashboard', compact('user_count', 'partner_count', 'paid_count', 'sponsored_count', 'act_count', 'accom_count', 'city_count', 'book_count', 'unpaid_count', 'dstart','dend'), ["title" => 'dashboard']);
        }
        public function changeDateType($date){
            $tempArray = explode('/',$date);
            return $tempArray[2]."-".$tempArray[0]."-".$tempArray[1];
        }
        public function admin_booking() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $datas = Experience::where('status', 'true')->paginate(30);
            $count = Experience::where('status', 'true')->count();
            $users = User::get();
            $offers = Offer::get();
            return view('private_admin.booking', compact('datas', 'count', 'users', 'offers'), ["title" => 'booking']);
        }
        public function admin_partners() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $partners = Partner::orderBy('updated_at', 'desc')->paginate(30);
            $count = Partner::count();
            return view('private_admin.partners', compact('partners', 'count'), ["title" => 'partners']);
        }
        public function admin_newsletters() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $datas = Newsletters::orderBy('updated_at', 'desc')->paginate(30);
            $count = Newsletters::count();
            return view('private_admin.newsletters', compact('datas', 'count'), ["title" => 'newsletters']);
        }
        public function admin_promos() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $datas = Promotion::orderBy('updated_at', 'desc')->paginate(30);
            $count = Promotion::count();
            return view('private_admin.promos', compact('datas', 'count'), ["title" => 'promos']);
        }
        public function admin_promo(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            if ($id == '0') {
                $data = Promotion::where('id', 0)->first();
                $type = "new";
            } else {
                $data = Promotion::where('id', $id)->first();
                $type = "old";
            }
            return view('private_admin.promo', compact('data', 'type'), ["title" => 'promos']);
        }
        public function admin_newsletter_detail(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $type = " ";
            if ($id == '0') {
                $newsletter = Newsletters::where('id', 0)->first();
                $detail = [
                "author" => Auth::User()->username,
                "status" => "saved",
                "content" => ""
                ];
                $new_one = Newsletters::create($detail);
                $new_id = $new_one->id;
                $type = "new";
            } else {
                $newsletter = Newsletters::where('id', $id)->first();
                $new_id = "0";
                $type = "old";
            }
            return view('private_admin.single-newsletter', compact('newsletter', 'type', 'new_id'), ['title' => 'Single newsletter']);
        }
        public function admin_blogs() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $blogs = Blog::orderBy('id', 'desc')->paginate(30);
            $count = Blog::count();
            return view('private_admin.blogs', compact('blogs', 'count'), ["title" => 'blog_articles']);
        }
        public function admin_blog_detail(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $type = "";
            if ($id == 0) {
                $type="new";
                $blog = Blog::where("id", "0")->first();
            } else {
                $type="old";
                $blog = Blog::where("id", $request->id)->first();
            }
            return view('private_admin.single-blog', compact('type', 'blog'), ['title' => 'newblog']);
        }
        public function admin_careers() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $careers = Career::orderBy('id', 'desc')->paginate(30);
            $count = Career::count();
            return view('private_admin.careers', compact('careers', 'count'), ["title" => 'career_articles']);
        }
        public function admin_career_detail(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $type = "";
            if ($id == 0) {
                $type="new";
                $career = Career::where("id", "0")->first();
            } else {
                $type="old";
                $career = Career::where("id", $request->id)->first();
            }
            return view('private_admin.single-career', compact('type', 'career'), ['title' => 'newcareer']);
        }
        public function pages() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $offers = Offer::orderBy('updated_at', 'desc')->paginate(30);
            $count = Offer::count();
            return view('private_admin.pages', compact('offers', 'count'), ["title" => 'pages']);
        }
        public function accomodation_page(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $accoms = Accomodation::where('city_id', $request->id)->orderBy('timestamp', 'ASC')->paginate(30);
            $count = Accomodation::where('city_id', $request->id)->count();
            return view('private_admin.accom_page', compact('accoms', 'count'), ["title" => 'accomodation_page']);
        }
        public function activity_page(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $datas = Activity::where('city_id', $request->id)->orderBy('timestamp', 'ASC')->paginate(30);
            $count = Activity::where('city_id', $request->id)->count();
            return view('private_admin.activity_offer', compact('datas', 'count'), ["title" => 'activity_page']);
        }
        public function create_accomodation_page(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $offer_id = $request->offer_id;
            if ($request->accom_id == 0) {
                $type = "new";
                $count = 0;
            } else {
                $type = "edit";
                $count = Accom_Exp::where('accom_id', $request['accom_id'])->count();
            }
            $practical = AccommodationPractical::where('offer_id', $request->offer_id)->where('accom_id', $request->accom_id)->first();
            $accom = Accomodation::where('id', $request->accom_id)->first();
            if($accom != null){
                $destinationPath=public_path()."/assets/uploads/accom_content";
                if (file_exists($destinationPath."/accom_".$request->accom_id.".txt")){
                    $accom_content = File::get($destinationPath."/accom_".$request->accom_id.".txt");
                    $accom["content"] = $accom_content;
                }else{
                    $accom["content"] = "";
                }
            }
            return view('private_admin.create_accom_page', compact('offer_id', 'accom', 'practical', 'type', 'count'), ["title" => 'create_accomodation_page']);
        }
        public function create_activity_page(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $offer_id = $request->offer_id;
            if ($request->act_id == 0) {
                $type = "new";
            } else {
                $type = "edit";
            }
            $practical = ActivityPractical::where('offer_id', $request->offer_id)->where('act_id', $request->act_id)->first();
            $activity = Activity::where('id', $request->act_id)->first();
            if($activity != null){
                $destinationPath = public_path()."/assets/uploads/act_content";
                if (file_exists($destinationPath."/act_".$request->act_id.".txt")){
                    $act_content = File::get($destinationPath."/act_".$request->act_id.".txt");
                    $activity["content"] = $act_content;
                }else{
                    $activity["content"] = "";
                }
            }
            return view('private_admin.create_activity_page', compact('offer_id', 'activity', 'type', 'practical'), ["title" => 'create_activity_page']);
        }
        public function messages() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $messages = Contact_message::orderBy('id', 'desc')->paginate(30);
            $count = Contact_message::count();
            return view('private_admin.messages', compact('messages', 'count'), ["title" => 'messages']);
        }
        public function admin_settings() {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            return view('private_admin.settings', ["title" => 'settings']);
        }
        public function admin_departments(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $career = Career::where('id', $id)->first();
            $department_id = $career->id;
            $department_name = $career->department;
            $departments = Career_detail::where('department_id', $id)->get();
            $count = Career_detail::where('department_id', $id)->count();
            return view('private_admin.departments', compact('departments', 'count', 'department_name', 'department_id'), ['title' => 'departments']);
        }
        public function admin_department_detail(Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $parent_id = $request->parent_id;
            $type = "";
            if ($id == 0) {
                $type="new";
                $position = Career_detail::where("id", "0")->first();
            } else {
                $type="old";
                $position = Career_detail::where("id", $request->id)->first();
            }
            return view('private_admin.single-position', compact('type', 'position', 'parent_id'), ['title' => 'newposition']);
        }
        public function edit_accom_experience (Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $datas = Accom_Exp::where('accom_id', $request->id)->get();
            $count = Accom_Exp::where('accom_id', $request->id)->count();
            return view('private_admin.edit-experiences', compact('datas', 'count', 'id'), ['title'=>'pages']);
        }
        public function slider_images (Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $offer_id = $request->offer_id;
            $datas = Accommodation_Image::where('accom_id', $request->id)->get();
            $count = Accommodation_Image::where('accom_id', $request->id)->count();
            return view('private_admin.slider-images', compact('datas', 'count', 'id', 'offer_id'), ['title'=>'pages']);
        }
        public function activity_slider_images (Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $offer_id = $request->offer_id;
            $datas = Activity_Image::where('act_id', $request->id)->get();
            $count = Activity_Image::where('act_id', $request->id)->count();
            return view('private_admin.activity-slider-images', compact('datas', 'count', 'id', 'offer_id'), ['title'=>'pages']);
        }
        public function upload_exp_image (Request $request) {
            if(!Auth::check() || Auth::User()->role != 0){
                return redirect()->route('home');
            }
            $id = $request->id;
            $categories = ExpDetailImage::selectRaw('id, category')->groupBy("category")->orderBy('id', 'ASC')->get();
            $categories_datas = [];
            foreach ($categories as $value) {
                $categories_array['name'] = $value->category;
                $categories_array['data'] = [];
                $single_datas = ExpDetailImage::where('exp_id', $id)->where('category', $value->category)->get();
                foreach ($single_datas as $single_data) {
                    array_push($categories_array['data'], $single_data);
                }
                array_push($categories_datas, $categories_array);
            }
            return view('private_admin.upload_exp_image', compact('id', 'categories', 'categories_datas'), ['title'=>'pages']);
        }
    }
