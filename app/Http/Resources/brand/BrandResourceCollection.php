<?php

namespace App\Http\Resources\brand;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $column = $request->input('column', 'name');
        if (!in_array($column, ['name'])) {
            $column = 'name';
        }

        $order = $request->input('order', 'asc');
        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'asc';
        }

        return [
            'data' => $this->collection,
            'columns' => [
                [
                    'class' => '',
                    'sortable' => true,
                    'sort' => ($column === 'name') ? $order : false,
                    'type' => 'text',
                    'code' => 'name',
                    'title' => 'Наименование бренда'
                ],
                [
                    'class' => ['text-center'],
                    'sortable' => false,
                    'type' => 'component',
                    'code' => 'func',
                    'title' => 'Функции',
                ],
            ],
        ];
    }
}
