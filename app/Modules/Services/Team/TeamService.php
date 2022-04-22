<?php

namespace App\Modules\Services\Team;

use App\Modules\Models\Team\Team;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TeamService extends Service
{
    protected $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->team->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Team $team) {
                return getTableHtml($team, 'image');
            })
            ->editColumn('title', function (Team $team) {
                if (!empty($team->title)) {
                    return '<strong>' . $team->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Team $team) {
                return getTableHtml($team, 'status');
            })
            ->editColumn('actions', function (Team $team) {
                $editRoute = route('admin.team.edit', $team->id);
                $deleteRoute = route('admin.team.destroy', $team->id);
                return getTableHtml($team, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $team = $this->team->create($data);
            return $team;
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * Paginate all User
     *
     * @param array $filter
     * @return Collection
     */
    public function paginate(array $filter = [])
    {
        $filter['limit'] = 25;

        return $this->team->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->team->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->team->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($teamId)
    {
        try {
            return $this->team->find($teamId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($teamId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $team = $this->team->find($teamId);
            $team = $team->update($data);
            return $team;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }

    /**
     * Delete a User
     *
     * @param Id
     * @return bool
     */
    public function delete($teamId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $team = $this->team->find($teamId);
            $data['is_deleted'] = 'yes';
            return $team = $team->update($data);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * write brief description
     * @param $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->team->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->team->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/team';
            return $fileName = $this->uploadFromAjax($file);
        }
    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {
        }
    }

    public function updateImage($teamId, array $data)
    {
        try {

            $team = $this->team->find($teamId);
            $team = $team->update($data);

            return $team;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
