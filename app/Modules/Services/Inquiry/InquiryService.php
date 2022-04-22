<?php

namespace App\Modules\Services\Inquiry;

use App\Modules\Models\Inquiry\Inquiry;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InquiryService extends Service
{
    protected $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->inquiry->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $inquiry = $this->inquiry->create($data);
            return $inquiry;
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

        return $this->inquiry->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->inquiry->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->inquiry->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($inquiryId)
    {
        try {
            return $this->inquiry->find($inquiryId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($inquiryId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $inquiry = $this->inquiry->find($inquiryId);
            $inquiry = $inquiry->update($data);
            return $inquiry;
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
    public function delete($inquiryId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $inquiry = $this->inquiry->find($inquiryId);
            $data['is_deleted'] = 'yes';
            return $inquiry = $inquiry->update($data);
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
        return $this->inquiry->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->inquiry->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/inquiry';
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

    public function updateImage($inquiryId, array $data)
    {
        try {

            $inquiry = $this->inquiry->find($inquiryId);
            $inquiry = $inquiry->update($data);

            return $inquiry;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
