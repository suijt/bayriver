<?php

namespace App\Http\Controllers\Admin\FAQ;
use App\Http\Requests\Admin\FAQ\FAQRequest;
use App\Modules\Services\FAQ\FAQService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class FAQController extends Controller
{
    protected $faq;
    function __construct(FAQService $faq)
    {
        $this->faq = $faq;
    }
    public function index()
    {

        return view('admin.faq.index');
    }
    public function create($type = null)
    {
        return view('admin.faq.create', compact('type'));
    }
    public function getAllData($type = null)
    {
        return $this->faq->getAllData($type);
    }
    public function store(FAQRequest $request, $type = null)
    {
        if ($faq = $this->faq->create($request->all(), $type)) {

            Toastr::success('FAQ created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.faq.index', $type);
        }
        Toastr::error('FAQ cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.faq.index', $type);
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $type = null)
    {
        $faq = $this->faq->find($id);

        return view('admin.faq.edit', compact('faq'));
    }

    public function update(FAQRequest $request, $id, $type = null)
    {
        if ($this->faq->update($id, $request->all())) {

            Toastr::success('FAQ updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.faq.index');
        }
        Toastr::error('FAQ cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.faq.index');
    }

    public function destroy($id, $type = null)
    {
        if ($this->faq->delete($id)) {
            return response()->json(['success' => 'record deleted']);
        }

        return response()->json(['error' => 'record cannot be deleted']);
    }
}
