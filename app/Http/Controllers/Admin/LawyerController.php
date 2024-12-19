<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lawyers\LawyerRepositoryInterface;
use App\Repositories\Organizations\OrganizationRepositoryInterface;

class LawyerController extends Controller
{
    protected $organizationRepos;
    protected $lawyerRepos;

    public function __construct(
        OrganizationRepositoryInterface $organizationRepos,
        LawyerRepositoryInterface $lawyerRepos,
    ) {
        $this->organizationRepos = $organizationRepos;
        $this->lawyerRepos = $lawyerRepos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = [
            'submenu' => 'personnel-manager',
            'sidebar' => 'lawyers',
            'title' => 'Thêm luật sư',
            'breadcrumb' => ['Nhân sự', 'Quản lý luật sư', 'Thêm luật sư'],
        ];

        $organizations = $this->organizationRepos->getAll();

        return view('admin.sections.lawyers.create')->with([
            'organizations' => $organizations,
            'menu' => $menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'fullname' => 'required',
            'card_number' => 'required',
            'workplace' => 'required',
            'organization_id' => 'nullable',
        ],[
            'fullname.required' => 'Chưa nhập họ & tên',
            'card_number.required' => 'Chưa nhập số thẻ',
            'workplace.required' => 'Chưa nhập nơi làm việc',
        ]);

        $params['slug'] = Str::slug($request->input('fullname'));
        $params['profile_pic'] = str_replace(asset(''), '', $request->input('profile_pic'));
        $params['birthday'] = Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->format('Y-m-d');
        $params['card_issuance_date'] = Carbon::createFromFormat('d/m/Y', $request->input('card_issuance_date'))->format('Y-m-d');

        $this->lawyerRepos->create($params);

        return redirect()->route('admin.lawyers.index')->with('noty', [
            'type' => 'success',
            'message' => 'Đã thêm luật sư',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lawyer = $this->lawyerRepos->find($id);

        $menu = [
            'submenu' => 'personnel-manager',
            'sidebar' => 'lawyers',
            'title' => 'Sửa thông tin luật sư',
            'breadcrumb' => ['Nhân sự', 'Quản lý luật sư', 'Sửa thông tin luật sư'],
        ];

        $organizations = $this->organizationRepos->getAll();

        return view('admin.sections.lawyers.edit')->with([
            'lawyer' => $lawyer,
            'organizations' => $organizations,
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->validate([
            'fullname' => 'required',
            'card_number' => 'required',
            'workplace' => 'required',
            'organization_id' => 'nullable',
        ],[
            'fullname.required' => 'Chưa nhập họ & tên',
            'card_number.required' => 'Chưa nhập số thẻ',
            'workplace.required' => 'Chưa nhập nơi làm việc',
        ]);

        $params['slug'] = Str::slug($request->input('fullname'));
        $params['profile_pic'] = str_replace(asset(''), '', $request->input('profile_pic'));
        $params['birthday'] = Carbon::createFromFormat('d/m/Y', $request->input('birthday'))->format('Y-m-d');
        $params['card_issuance_date'] = Carbon::createFromFormat('d/m/Y', $request->input('card_issuance_date'))->format('Y-m-d');

        $lawyer = $this->lawyerRepos->find($id);
        $lawyer->update($params);

        return redirect()->route('admin.lawyers.index')->with('noty', [
            'type' => 'success',
            'message' => 'Đã cập nhật thông tin luật sư',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
