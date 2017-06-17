<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NormalPackage;

class ExtractController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        try
        {
            $id = $request->input('id');
            $package = NormalPackage::where('nomberOrder', $id )->firstOrFail();


        } catch (\Exception $e) {

            return view('searchForm', ['error'=> 'Can\'t find shipment with this num or shipment haven\'t been packed yet']);
        }
        return redirect()->route('register', ['id' => $package]);


    }

    public function register(Request $request, $id)
    {

        return dd($id);
    }


}
