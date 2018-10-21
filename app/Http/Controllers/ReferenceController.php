<?php

namespace App\Http\Controllers;

use App\Helper\Generator;
use App\Http\Requests\storeCompanyRequest;
use App\Http\Requests\StoreReferenceRequest;
use App\Repository\ReferenceRepository;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    private $referenceRepository;

    public function __construct(ReferenceRepository $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;
    }

    public function index()
    {
        $references = $this->referenceRepository->getReferencesWithCompany(15);

        return view('companies.references.list', compact(['references']));
    }

    public function getReference(int $id)
    {
        $reference = $this->referenceRepository->getReferenceWithCompany($id);

        return view('companies.references.single', compact(['reference']));
    }

    public function storeReference(StoreReferenceRequest $request)
    {
        $request->flash();
        $this->referenceRepository->create([
            'title' => $request->input('title'),
            'job_description' => $request->input('job_description'),
            'reference' => $request->input('reference'),
            'email' => $request->input('email'),
            'company_id' => Generator::getRealValue($request->input('company_hash'))
        ]);
        $request->flush();

        return back();
    }
}
