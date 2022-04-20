<?php

namespace App\Modules\Services\Client;

use App\Modules\Models\Client\Client;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ClientService extends Service
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->client->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Client $client) {
                return getTableHtml($client, 'image');
            })
            ->editColumn('title', function (Client $client) {
                if (!empty($client->title)) {
                    return '<strong>' . $client->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Client $client) {
                return getTableHtml($client, 'status');
            })
            ->editColumn('actions', function (Client $client) {
                $editRoute = route('admin.client.edit', $client->id);
                $deleteRoute = route('admin.client.destroy', $client->id);
                return getTableHtml($client, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $client = $this->client->create($data);
            return $client;
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

        return $this->client->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->client->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->client->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($clientId)
    {
        try {
            return $this->client->find($clientId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($clientId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $client = $this->client->find($clientId);
            $client = $client->update($data);
            return $client;
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
    public function delete($clientId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $client = $this->client->find($clientId);
            $data['is_deleted'] = 'yes';
            return $client = $client->update($data);
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
        return $this->client->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->client->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/client';
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

    public function updateImage($clientId, array $data)
    {
        try {

            $client = $this->client->find($clientId);
            $client = $client->update($data);

            return $client;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
