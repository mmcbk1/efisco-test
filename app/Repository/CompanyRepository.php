<?php

namespace App\Repository;

use App\Company;

class CompanyRepository extends AbstractRepository
{
    protected function getClassName(): string
    {
        return Company::class;
    }

    public function getCompanyWithReferences(int $id)
    {
        return $this->getModel()
            ->with('references')
            ->where('id', $id)
            ->first();
    }
}
