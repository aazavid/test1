<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NormalPackage;
use App\BrakPackage;

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
        $this->validate($request, [
            'photo' => 'bail|image',
            'weight' => 'required',
        ]);
        $brak_package = new BrakPackage;
        $package = NormalPackage::find($id)->first();
        $user = $package->user()->first();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename  = str_random(6) . '.' . $file->getClientOriginalExtension();
            $path = public_path('/uploads/' . $filename);
            $brak_package->foto = $path;
        }

        $brak_package->weight   = $request->input('weight');
        $brak_package->trecing  = 'N/a';
        $brak_package->fromThis = 'См. детали посылки';

        $data = Carbon::now()->format('DDYYMM');
        $brak_package->nomberPackage     = $data . '-' . str_random(4);
        $brak_package->normal_package_id = $id;
        $brak_package->namePartner       = $package->nomber_partners;

        if($package->typePackages === 's')
        {
            $brak_package->comment = '1'; // первый способ
            Mail::send('emails.text1', ['numberpackage' => $brak_package->nomberPackage ], function ($m) use ($user) {
                $m->from('extraction@app.com', 'WE SHIP 2 YOU');

                $m->to($user->email, $user->name)->subject('Your Package!');
            });
        }
        else
        {
            $brak_package->comment = '2'; // второй способ
            Mail::send('emails.text2', ['numberpackage' => $brak_package->nomberPackage ], function ($m) use ($user) {
                $m->from('extraction@app.com', 'WE SHIP 2 YOU');

                $m->to($user->email, $user->name)->subject('Your Package!');
            });
        }


        $brak_package->save();




    }


}
