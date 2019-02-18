<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class manufacturerController extends Controller {

    public function addManufacturer() {
        return view('admin.home.manufacturer.addManufacturer');
    }

    public function saveManufacturer(Request $request) {
        $this->validate($request, [
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
        ]);

        /*
          $manufacturer=new Manufacturer;
          $manufacturer->manufacturerName = $request->manufacturerName;
          $manufacturer->manufacturerDescription = $request->manufacturerDescription;
          $manufacturer->publicationStatus = $request->publicationStatus;
          $manufacturer->save();
          //return ('Data Save Succesfully.');
          //return  redirect('backEnd.manufacturer.addCategory','message','Data Save Succesfully');
          //return view('backEnd.manufacturer.addCategory');
         * */
        // if i use facade for inserting i must have to use 
        // -protected $fillable=['manufacturerName','manufacturerDescription','publicationStatus'];
        // -in model
        Manufacturer::create($request->all());
        return redirect('/manufacturer/add')->with('message', 'Manufacturer Save Succesfully');

        /*
          DB::table('manufacturers')->insert([
          'manufacturerName' => $request->manufacturerName,
          'manufacturerDescription' => $request->manufacturerDescription,
          'publicationStatus' => $request->publicationStatus,
          ]);
         * */
    }

    public function manageManufacturer() {
        $manufacturer = Manufacturer::all();
        return view('admin.home.manufacturer.manageManufacturer', ['data' => $manufacturer]);
    }

    public function editManufacturer($id) {
        $manufacturerByID = Manufacturer::where('id', $id)->first();
        return view('admin.home.manufacturer.editmanufacturer', ['data' => $manufacturerByID]);
    }

    public function updatemanufacturer(Request $request) {
        // dd($request->all()); * it shows the all request form data

        $manufacturer = Manufacturer::find($request->manufacturerID);
        
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer Update Succesfully');
    }

    public function deleteManufacturer($id) {

        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('message', 'Manufacturer Delete Succesfully');
    }

}
