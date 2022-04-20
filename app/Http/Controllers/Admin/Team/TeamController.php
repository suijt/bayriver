<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Requests\Admin\Team\TeamRequest;
use App\Modules\Services\Team\TeamService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class TeamController extends Controller
{

    protected $team;

    function __construct(TeamService $team)
    {
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->team->paginate();
        return view('admin.team.index', compact('teams'));
    }

    public function getAllData()
    {
        return $this->team->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        //        dd($request->all());
        if ($team = $this->team->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $team, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $team, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $team, 'icon_image');
            }

            Toastr::success('Team/Service Image created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.team.index');
        }
        Toastr::error('Team/Service Image cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.team.index');
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
        $team = $this->team->find($id);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {
        if ($this->team->update($id, $request->all())) {
            $team = $this->team->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $team, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $team, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $team, 'icon_image');
            }
            Toastr::success('Team/Service Image updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.team.index');
        }
        Toastr::error('Team/Service Image cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->team->delete($id)) {
            Toastr::success('Team/Service Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.team.index');
        }
        Toastr::error('Team/Service Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.team.index');
    }

    function uploadFile(Request $request, $team, $type = null)
    {
        $file = $request->file($type);
        $fileName = $this->team->uploadFile($file);
        if (!empty($team->image))
            $this->team->__deleteImages($team);


        $data[$type] = $fileName;
        $this->team->updateImage($team->id, $data);
    }
}
