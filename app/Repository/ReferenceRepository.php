<?php

namespace App\Repository;

use App\Reference;

class ReferenceRepository extends AbstractRepository
{
    protected function getClassName(): string
    {
       return Reference::class;
    }

    public function getReferencesWithCompany($limit)
    {
       return $this->getModel()->with('company')
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    public function getReferenceWithCompany(int $id)
    {
        return $this->getModel()
            ->with('company')
            ->where('id', $id)
            ->first();
    }
}
