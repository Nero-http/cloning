<?php

namespace App\Services;

use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class PublisherService
{
    public function paginate(
        ?string $search = null,
        int $perPage = 10
    ): LengthAwarePaginator {
        return Publisher::query()
            ->search($search)
            ->latestFirst()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data): Publisher
    {
        $data = $this->sanitizeData($data);

        return DB::transaction(
            fn () => Publisher::create($data)
        );
    }

    public function update(
        Publisher $publisher,
        array $data
    ): Publisher {
        $data = $this->sanitizeData($data);

        return DB::transaction(function () use ($publisher, $data) {
            $publisher->update($data);

            return $publisher->refresh();
        });
    }

    public function delete(Publisher $publisher): bool
    {
        return DB::transaction(
            fn () => $publisher->delete()
        );
    }

    private function sanitizeData(array $data): array
    {
        if (isset($data['publisher_name'])) {
            $data['publisher_name'] = trim(
                preg_replace(
                    '/\s+/u',
                    ' ',
                    strip_tags($data['publisher_name'])
                )
            );
        }

        return $data;
    }
}