<?php

namespace App\Http\Resources\item;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemShopResourceCollection extends ResourceCollection
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
        if ($column && !in_array($column, ['article', 'name', 'price', 'stock'])) {
            $column = null;
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
                    'sort' => ($column === 'article') ? $order : false,
                    'type' => 'text',
                    'code' => 'article',
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
                    'class' => ['text-center'],
                    'sortable' => true,
                    'sort' => ($column === 'price') ? $order : false,
                    'type' => 'html',
                    'code' => 'price',
                    'title' => 'Цена'
                ],
                [
                    'class' => ['text-center'],
                    'sortable' => true,
                    'sort' => ($column === 'stock') ? $order : false,
                    'type' => 'text',
                    'code' => 'stock',
                    'title' => 'Остаток'
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
