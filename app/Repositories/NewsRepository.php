<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\News;

/**
 * Class NewsRepository.
 */
class NewsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return News::class;
    }

    public function list($first, $page, $sort = [], array $param = [])
    {
        $this->newQuery()->eagerLoad();

        $this->query->select('*');

        if (!empty($param)) {

        /*    foreach ($param as $key => $value){
                $this->query->where($key , $value);

            }*/
        }
        if (!empty($sort)) {

            foreach ($sort as $value){
                $this->query->orderBy($value['column'], $value['order'] );
            }
        }

        $data = $this->query->paginate($first, ['*'], 'page', $page);

        return $data;
    }
}
