<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class WebNotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }

    public function storeToken(Request $request)
    {
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();

        $serverKey = 'AAAAq6VEb5w:APA91bGB3MKtnVSWsM6vUDswFs4rWB7eDULhW6ZZ_rM50E3AJXn_rcG4zNw4I58Z6TRY7CDmjhNU3jDDSJdr_1UwnvHNjq53NGKRCgVFL5w82m70J6EAltnAqSDk_igO2EssLldjH9zO';
        $data = [
            'priority' =>  "high",

            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                'image' => "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg",
            ]
        ];



        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}
