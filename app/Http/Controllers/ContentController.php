<?php

namespace App\Http\Controllers;

use App\Http\Resources\Contentful\EntryResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Services\Contentful\Contentful;
use Exception;

class ContentController extends Controller
{
    use ResponseTrait;
    public function entries()
    {
       try {
        $response = Contentful::getAllEntries();
        $value = $response ?? []; 
        $data = [
         'id' => $value['items'][0]['sys']['id'],
         'title' => $value['items'][0]['fields']['storyTitle'],
         'sub_heading' => $value['items'][0]['fields']['subHeading'],
         'author' => $value['items'][0]['fields']['author'],
         'body' => $value['items'][0]['fields']['body'],
         'date' => $value['items'][0]['fields']['datePublished'],
         'feature_image' => 'https:'.$value['includes']['Asset'][0]['fields']['file']['url'],
        ];
        return $this->okResponse('All Enteries', $data);
       } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
       }
       
    }

    public function singleEntry($id)
    {
        try {
            $response = Contentful::getSingleEntry($id);
            $value = $response ?? []; 
            $data = [
                'id' => $value['items'][0]['sys']['id'],
                'title' => $value['items'][0]['fields']['storyTitle'],
                'sub_heading' => $value['items'][0]['fields']['subHeading'],
                'author' => $value['items'][0]['fields']['author'],
                'body' => $value['items'][0]['fields']['body'],
                'date' => $value['items'][0]['fields']['datePublished'],
                'feature_image' => 'https:'.$value['includes']['Asset'][0]['fields']['file']['url'],
               ];
            return $this->okResponse('Entry', $data);
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }
}
