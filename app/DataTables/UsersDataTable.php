<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id')
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data', 'query'))->render();
            })->addIndexColumn()->rawColumns(['action']);
    }

    public function actions($id)
    {
        return  [
            [
                'title' => 'Hapus',
                'icon' => 'bi bi-trash',
                'route' => route('users.destroy', $id),
                'type' => 'delete',
            ],
            [
                'title' => 'Edit',
                'icon' => 'bi bi-pen',
                'route' => 'as',
                'type' => '',
            ],
        ];
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
        // ->parameters([
        //     'dom'       => 'Bfrtip',
        //     'stateSave' => true,
        //     'order'     => [[0, 'desc']],
        //     'buttons'   => [

        //         [
        //             'extend' => 'create',
        //             'className' => 'text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
        //             'text' => '<i class="fa fa-plus"></i> ' . __('Buttons.Create') . ''
        //         ],
        //         [
        //             'extend' => 'export',
        //             'className' => 'text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
        //             'text' => '<i class="fa fa-download"></i> ' . __('Buttons.Export') . ''
        //         ],
        //         [
        //             'extend' => 'print',
        //             'className' => 'text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
        //             'text' => '<i class="fa fa-print"></i> ' . __('Buttons.Print') . ''
        //         ],
        //         [
        //             'extend' => 'reset',
        //             'className' => 'text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
        //             'text' => '<i class="fa fa-undo"></i> ' . __('Buttons.Reset') . ''
        //         ],
        //         [
        //             'extend' => 'reload',
        //             'className' => 'text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2',
        //             'text' => '<i class="fa fa-sync-alt"></i> ' . __('Buttons.Reload') . ''
        //         ],
        //     ],
        // ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action')->title(__('field.action'))->orderable(false),

        ];
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
