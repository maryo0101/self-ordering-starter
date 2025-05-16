<?php

namespace App\Services\Menu;

use Illuminate\Support\Collection;
use Revolution\Ordering\Contracts\Menu\MenuData;
use App\Models\Menu;

class DatabaseMenu implements MenuData
{
    public function __invoke(): Collection
    {
        return Menu::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'category' => $item->category,
                'text' => $item->text ?? '',
                'image' => $item->image ? asset('images/' . $item->image) : null,
                'sold_out_until' => $item->sold_out_until,
            ];
        });
    }
}
