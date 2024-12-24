<?php

namespace App\Http\Controllers;

use App\Services\MimSmsService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SmsController extends Controller
{
    public function sendSms($phone, $book_title)
    {
        
        // ___________ sending sms to customer start
        $phone = "88".$phone; // Example phone number
        // $new_otp = rand(100000, 999999); // Example OTP generation

        $message = "ধন্যবাদ। কুইক-ডিজিটাল থেকে '$book_title' বইটির অর্ডার কনফার্ম হয়েছে।";
        $queryParams = [
                "UserName" => "neoshah121@gmail.com",  // MiMSMS registered email
                "Apikey" => "81GE7QJJS4KIGIY",        // MiMSMS API Key
                "MobileNumber" => $phone,             // Must be in international format
                "CampaignId" => "null",               // Keep it 'null' unless required
                "SenderName" => "BOOTCAMP",           // Provided by "Company Name"
                "TransactionType" => "T",             // 'T' for transactional messages
                "Message" =>  $message,  // Valid message
        ];


        $url = "https://api.mimsms.com/api/SmsSending/Send";

        try {
            $client = new Client();
            $response = $client->get($url, [
                'query' => $queryParams, // Send query parameters
            ]);

            // Decode the response body
            $responseBody = json_decode($response->getBody(), true);

            $smsSent = true;
            return $smsSent;

            // return response()->json([
            //     'success' => true,
            //     'response' => $responseBody,
            // ]);
            
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
        // ___________ sending sms to customer start
    }





    public function sendSmsNewUser($phone, $book_title)
    {
        
        // ___________ sending sms to customer start
        $phone = "88".$phone; // Example phone number
        // $new_otp = rand(100000, 999999); // Example OTP generation

        $message = "ধন্যবাদ। কুইক-ডিজিটাল থেকে '$book_title' বইটির অর্ডার কনফার্ম হয়েছে। অর্ডার সম্পর্কে জানতে ই-মেইল চেক করুন";
        $queryParams = [
                "UserName" => "neoshah121@gmail.com",  // MiMSMS registered email
                "Apikey" => "81GE7QJJS4KIGIY",        // MiMSMS API Key
                "MobileNumber" => $phone,             // Must be in international format
                "CampaignId" => "null",               // Keep it 'null' unless required
                "SenderName" => "BOOTCAMP",           // Provided by "Company Name"
                "TransactionType" => "T",             // 'T' for transactional messages
                "Message" =>  $message,  // Valid message
        ];


        $url = "https://api.mimsms.com/api/SmsSending/Send";

        try {
            $client = new Client();
            $response = $client->get($url, [
                'query' => $queryParams, // Send query parameters
            ]);

            // Decode the response body
            $responseBody = json_decode($response->getBody(), true);

            $smsSent = true;
            return $smsSent;

            // return response()->json([
            //     'success' => true,
            //     'response' => $responseBody,
            // ]);
            
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
        // ___________ sending sms to customer start
    }





    // _______________________________________________________ SEND USER PAS TO AFFILIATOR
    public function sendAffiliatorCred($phone, $email, $default_pass)
    {
        
        // ___________ sending sms to customer start
        $phone = "88".$phone; // Example phone number
        // $new_otp = rand(100000, 999999); // Example OTP generation

        $message = "স্বাগতম। কুইক-ডিজিটাল থেকে। আপনাকে কুইক ব্যবসায় অন্তর্ভুক্ত করা হয়েছে। আপনার ইউজার-আইডি জানতে মেইল চেক করুন";
        $queryParams = [
                "UserName" => "neoshah121@gmail.com",  // MiMSMS registered email
                "Apikey" => "81GE7QJJS4KIGIY",        // MiMSMS API Key
                "MobileNumber" => $phone,             // Must be in international format
                "CampaignId" => "null",               // Keep it 'null' unless required
                "SenderName" => "BOOTCAMP",           // Provided by "Company Name"
                "TransactionType" => "T",             // 'T' for transactional messages
                "Message" =>  $message,  // Valid message
        ];


        $url = "https://api.mimsms.com/api/SmsSending/Send";

        try {
            $client = new Client();
            $response = $client->get($url, [
                'query' => $queryParams, // Send query parameters
            ]);

            // Decode the response body
            $responseBody = json_decode($response->getBody(), true);

            $smsSent = true;
            return $smsSent;

            // return response()->json([
            //     'success' => true,
            //     'response' => $responseBody,
            // ]);
            
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
        // ___________ sending sms to customer start
    }


}
