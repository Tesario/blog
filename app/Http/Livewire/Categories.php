<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categories as CategoriesModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Categories extends Component
{
    use WithPagination;

    private $filter_id;
    private $posts;
    public $newPosts = '';

    public function changeCategory($id = 0)
    {
        $this->resetPage();
        $this->filter_id = $id;
    }

    public function mount($posts)
    {
        $this->posts = $posts;
        $this->newPosts = $posts;
    }

    private function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function render()
    {
        $this->posts = $this->newPosts->sortByDesc('created_at');

        $categories = CategoriesModel::all();
        $title = "All";

        if ($this->filter_id != 0) {
            $this->posts = $this->posts->where('category_id', $this->filter_id);
            $title = CategoriesModel::findOrFail($this->filter_id)->name;
        }
        $this->posts = $this->paginate($this->posts, 3);


        return view('livewire.categories', ['posts' =>  $this->posts, 'categories' => $categories, 'title' => $title]);
    }
}
