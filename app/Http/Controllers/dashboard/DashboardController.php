<?php

namespace App\Http\Controllers\dashboard;
use Illuminate\Validation\Validator; 
use App\Models\SidebarSub;
use App\Models\esh2\user\User;
use App\Helpers\helper;
use App\Events\StatusLiked;
use Session;
use Hash;
use Str;
use Redirect;
use Response;
use Auth;
use App\Models\FeesDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller

{
    
    public function index(){
        event(new StatusLiked('ok',1));
        // $device_token = 'fc_xeGhzaPzFzrENCI7FcO:APA91bGpqiJDfZUzsgteT4lvJVnD-LhsH1UkZkK3iewXuk1O9rVgG8Fb3TP61Zk3UktWOPDB5BGQzAlyR3cwCG2PtGOCDX5IgbxPAbqL3dliuOfaZMDmWamc-uNCSbtWbP4JAjuSh2LH';
      
        //     $title = "Test Message";
        //     $body = "Test Message";
        //     $image = "https://www.netsolutions.com/insights/wp-content/uploads/2020/12/the-10-best-rideshare-apps-of-2021.webp";
        //     $icon = "https://www.netsolutions.com/insights/wp-content/uploads/2020/12/the-10-best-rideshare-apps-of-2021.webp";
        //     $click_action = "https://abizobindia.com/about";
            
        //     Helper::sendFcm($device_token, $title, $body, $image, $icon, $click_action);
        
        return view('dashboards.index');
    }

	
}
