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
            $number = $request->input('id');
            $package = NormalPackage::where('nomberOrder', $number )->firstOrFail();


        } catch (\Exception $e) {

            return view('searchForm', ['error'=> 'Can\'t find shipment with this num or shipment haven\'t been packed yet']);
        }
        return redirect()->route('register', ['id' => $package->id]);


    }
    public function showRegister($id)
    {

        $package = NormalPackage::find($id)->firstOrFail();
        $user = $package->user()->firstOrFail();


       return view('registerForm')->with([ 'id_nomber' => $id,
           'name_client'=> $user->name,
           'type_package' => $package->typePackages,
           'nomber_partner'=> $package->nomber_partners,
           'error' => ''

       ]);
    }


    public function registerPost(Request $request, $id)
    {

        return dd($id);
    }


}
