<?php

namespace App\Http\Controllers;

use App\Helper\Generator;
use App\Http\Requests\StoreCompanyRequest;
use App\Repository\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct()
    {
        $this->companyRepository = new CompanyRepository();
    }

    public function index()
    {
        $companies = $this->companyRepository->paginate(15);

        return view('companies.list', compact(['companies']));
    }

    public function getCompany(int $id)
    {
        $company = $this->companyRepository->getCompanyWithReferences($id);
        $companyIdHash = Generator::generate($id);

        return view('companies.single', compact(['company', 'companyIdHash']));
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->flash();
        $this->companyRepository->create([
            'name' => $request->input('name')
        ]);
        $request->flush();

        return back();
    }
}
