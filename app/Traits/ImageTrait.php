<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageTrait {
    public function verifyAndUpload(Request $request, $fieldname = 'featured_image', $directory = 'featured_images' ) {
        if( $request->hasFile( 'featured_image') ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();

            }

            return $request->file($fieldname)->store($directory, 'public');

        }

        return null;

    }
}