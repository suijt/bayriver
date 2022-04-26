<?php

namespace App\Modules\Services\FAQ;

use App\Modules\Models\FAQ\Faq;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class FAQService extends Service
{
    protected $faq;

    public function __construct(
        Faq $faq
    ) {
        $this->faq = $faq;
    }


    /*For DataTable*/
    public function getAllData($type)
    {
         $query = $this->faq->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('actions', function (Faq $faq) {
                $editRoute = route('admin.faq.edit', [$faq->id, $faq->type]);
                $deleteRoute = route('admin.faq.destroy', [$faq->id, $faq->type]);
                $optionRoute = '';
                return getTableHtml($faq, 'actions', $editRoute, $deleteRoute, '', $optionRoute, '');
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function create(array $data, $type)
    {
        try {
            $data['created_by'] = Auth::user()->id;
            $data['type'] = $type;
//            dd($data);
            $faq = $this->faq->create($data);
            return $faq;
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

    public function all()
    {
        return $this->faq->get();
    }

    /**
     * Get all User
     *
     * @return Collection
     */

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($faqId)
    {
        try {
            return $this->faq->find($faqId);
        } catch (Exception $e) {
            return null;
        }
    }



    public function update($faqId, array $data)
    {
        try {
            $data['last_updated_by'] = Auth::user()->id;
            $faq= $this->faq->find($faqId);

            $faq = $faq->update($data);

            return $faq;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Delete a User
     *
     * @param Id
     * @return bool
     */
    public function delete($faqId)
    {
        try {

            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $faq = $this->faq->find($faqId);
            $data['is_deleted'] = 'yes';
            return $faq = $faq->update($data);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByName($name)
    {
        return $this->faq->whereName($name);
    }


}
