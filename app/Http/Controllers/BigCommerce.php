<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;


class BigCommerce extends Controller
{
    //


    //https://api.bigcommerce.com/stores/99oa2tso/v3/catalog/

    public function get(Request $request, $name)
    {
        $add = "?";
        if ($request->limit) {
            $add = $add . 'limit=' . $request->limit;
        }
        if ($request->page) {
            $add = $add . '&page=' . $request->page;
        }
        if ($request->keyword) {
            $add = $add . '&keyword=' . $request->keyword;
        }
        if ($request->sort) {
            $add = $add . '&sort=' . $request->sort;
        }
        if ($request->direction) {
            $add = $add . '&direction=' . $request->direction;
        }
        if ($request->availability) {
            $add = $add . '&availability=' . $request->availability;
        }

        if ($request->brand_id) {
            $add = $add . '&brand_id=' . $request->brand_id;
        }

        if ($request->categories) {
            $add = $add . '&categories=' . $request->categories;
        }
        // return ($name . $add); 
        return $this->guzzleRequest($name . $add);
    }

    public function getId(Request $request, $name, $id)
    {

        // return ($name . $add); 
        return $this->guzzleRequest($name . "/" . $id);
    }

    public function getIdVar(Request $request, $name, $id, $var)
    {

        // return ($name . $add); 
        return $this->guzzleRequest($name . "/" . $id . "/" . $var);
    }


    public function guzzleRequest($url)
    {
        $client = new GuzzleHttp\Client();
        $subResponse = $client->get(env('API') . $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Auth-Token' => env('X_TOKEN')
            ]
        ]);

        return $subResponse->getBody();
    }

    public function GuzzlePostRequest($data, $url)
    {
        $client = new GuzzleHttp\Client();
        $client->setDefaultOption('headers', [
            'Content-Type' => 'application/json',
            'customer_name' => 'test',
            'customer_key' => 's324ghe7cf77f652ef2f030b9f26'
        ]);

        $subResponse = $client->post(env('API') . $url, ['form_params' => $data]);

        return $subResponse;
    }

    public function GuzzlePutRequest($data, $url)
    {
        $client = new GuzzleHttp\Client();
        $client->setDefaultOption('headers', [
            'Content-Type' => 'application/json',
            'customer_name' => 'test',
            'customer_key' => 's324ghe7cf77f652ef2f030b9f26'
        ]);

        $subResponse = $client->put(env('API') . $url, ['body' => $data]);

        return $subResponse;
    }
}
