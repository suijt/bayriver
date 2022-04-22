<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CountryRequest;
use App\Modules\Services\Country\CountryService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class CountryController extends Controller
{
    protected $country;

    function __construct(CountryService $country)
    {
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.country.index');
    }

    public function getAllData()
    {
        return $this->country->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        // dd($request->all());
        if ($country = $this->country->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $country, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $country, 'banner_image');
            }
            if ($request->hasFile('secondary_image')) {
                $this->uploadFile($request, $country, 'secondary_image');
            }
            if ($request->hasFile('handbook_file')) {
                $this->uploadFile($request, $country, 'handbook_file');
            }

            Toastr::success('Country created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.country.index');
        }
        Toastr::error('Country cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = $this->country->find($id);
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        if ($this->country->update($id, $request->all())) {
            $country = $this->country->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $country, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $country, 'banner_image');
            }
            if ($request->hasFile('secondary_image')) {
                $this->uploadFile($request, $country, 'secondary_image');
            }
            if ($request->hasFile('handbook_file')) {
                $this->uploadFile($request, $country, 'handbook_file');
            }
            Toastr::success('Country updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.country.index');
        }
        Toastr::error('Country cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->country->delete($id)) {
            Toastr::success('Country deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.country.index');
        }
        Toastr::error('Country cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.country.index');
    }

    function uploadFile(Request $request, $country, $type = null)
    {
        $file = $request->file($type);
        $fileName = $this->country->uploadFile($file);
        if (!empty($country->image))
            $this->country->__deleteImages($country);


        $data[$type] = $fileName;
        $this->country->updateImage($country->id, $data);
    }
}
