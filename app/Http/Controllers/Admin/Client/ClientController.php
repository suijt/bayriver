<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Requests\Admin\Client\ClientRequest;
use App\Modules\Services\Client\ClientService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class ClientController extends Controller
{

    protected $client;

    function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->paginate();
        return view('admin.client.index', compact('clients'));
    }

    public function getAllData()
    {
        return $this->client->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //        dd($request->all());
        if ($client = $this->client->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $client);
            }

            Toastr::success('Client Image created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.client.index');
        }
        Toastr::error('Client Image cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.client.index');
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
        $client = $this->client->find($id);
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        if ($this->client->update($id, $request->all())) {
            if ($request->hasFile('image')) {
                $client = $this->client->find($id);
                $this->uploadFile($request, $client);
            }
            Toastr::success('Client Image updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.client.index');
        }
        Toastr::error('Client Image cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->client->delete($id)) {
            Toastr::success('Client Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.client.index');
        }
        Toastr::error('Client Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.client.index');
    }

    function uploadFile(Request $request, $client)
    {
        $file = $request->file('image');
        $fileName = $this->client->uploadFile($file);
        if (!empty($client->image))
            $this->client->__deleteImages($client);


        $data['image'] = $fileName;
        $this->client->updateImage($client->id, $data);
    }
}
