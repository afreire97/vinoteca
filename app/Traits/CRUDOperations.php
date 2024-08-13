<?php

namespace App\Traits;
use App\Services\UploadService;

trait CRUDOperations {
    public function model($slug = null) {
        if ($slug) {
            return $this->model::whereSlug($slug)->firstOrFail();
        }
        return app($this->model);
    }

    public function paginate($counts = [], $relationships = [], $perPage = 10) {
        return $this->model::query()
            ->with($relationships)
            ->withCount($counts)
            ->paginate($perPage);
    }

    public function create($data) {
        //path a la imagen en nuestro servidor
        $image = UploadService::upload(data_get($data, 'image'), strtolower(class_basename($this->model)));
        return $this->model::create(array_merge($data, ['image' => $image]));
    }

    public function update($data, $model) {
        if (data_get($data, 'image')) {
            UploadService::delete($model->image);
            data_set(
                $data,
                'image',
                UploadService::upload(data_get($data, 'image'), strtolower(class_basename($this->model)))
            );
        }
        $model->update($data);
    }

    public function delete($model): ?bool {

        if (method_exists($this, 'deleteChecks')) {
            $this->deleteChecks($model);
        }

        UploadService::delete($model->image);
        return $model->delete();
    }
}
