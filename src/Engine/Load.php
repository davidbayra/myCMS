<?php

namespace App\Engine;

class Load
{
    const MASK_MODEL_ENTITY = 'App\\%s\\Model\\%s\\%s';
    const MASK_MODEL_REPOSITORY = 'App\\%s\\Model\\%s\\%sRepository';

    public function model($modelName, $modelDir = null): \stdClass
    {
//        global $di;

        $model = new \stdClass();
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ?? $modelName;

        $namespaceEntity = sprintf(
            self::MASK_MODEL_ENTITY,
            ENV, $modelDir, $modelName
        );

        $namespaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $model->entity = $namespaceEntity;
        $model->repository = $namespaceRepository;

        return $model;
    }
}