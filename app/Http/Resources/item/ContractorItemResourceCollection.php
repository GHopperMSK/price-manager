<?php

namespace App\Http\Resources\item;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContractorItemResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $column = $request->input('column');
        if ($column && !in_array($column, ['real_article', 'name', 'relation_name', 'price'])) {
            $column = 'name';
        }

        $order = $request->input('order');
        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'asc';
        }

        return [
            'data' => $this->collection,
            'columns' => [
                [
                    'class' => ['text-center'],
                    'sortable' => true,
                    'sort' => ($column === 'real_article') ? $order : false,
                    'type' => 'text',
                    'code' => 'real_article',
                    'title' => 'Артикул'
                ],
                [
                    'class' => '',
                    'sortable' => true,
                    'sort' => ($column === 'name') ? $order : false,
                    'type' => 'text',
                    'code' => 'name',
                    'title' => 'Наименование товара'
                ],
                [
                    'class' => '',
                    'sortable' => true,
                    'sort' => ($column === 'relation_name') ? $order : false,
                    'type' => 'text',
                    'code' => 'relation_name',
                    'title' => 'Связь'
                ],
                [
                    'class' => ['text-center'],
                    'sortable' => true,
                    'sort' => ($column === 'price') ? $order : false,
                    'type' => 'text',
                    'code' => 'price',
                    'title' => 'Цена'
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
