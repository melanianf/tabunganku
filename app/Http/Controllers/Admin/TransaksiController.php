<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaksi\BulkDestroyTransaksi;
use App\Http\Requests\Admin\Transaksi\DestroyTransaksi;
use App\Http\Requests\Admin\Transaksi\IndexTransaksi;
use App\Http\Requests\Admin\Transaksi\StoreTransaksi;
use App\Http\Requests\Admin\Transaksi\UpdateTransaksi;
use App\Models\Transaksi;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransaksiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTransaksi $request
     * @return array|Factory|View
     */
    public function index(IndexTransaksi $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Transaksi::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'kode_transaksi', 'nis', 'jenis_tabungan', 'jenis_transaksi', 'nominal'],

            // set columns to searchIn
            ['id', 'kode_transaksi', 'nis', 'jenis_tabungan', 'jenis_transaksi']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.transaksi.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.transaksi.create');

        return view('admin.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTransaksi $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTransaksi $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Transaksi
        $transaksi = Transaksi::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/transaksis'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/transaksis');
    }

    /**
     * Display the specified resource.
     *
     * @param Transaksi $transaksi
     * @throws AuthorizationException
     * @return void
     */
    public function show(Transaksi $transaksi)
    {
        $this->authorize('admin.transaksi.show', $transaksi);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Transaksi $transaksi
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Transaksi $transaksi)
    {
        $this->authorize('admin.transaksi.edit', $transaksi);


        return view('admin.transaksi.edit', [
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTransaksi $request
     * @param Transaksi $transaksi
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTransaksi $request, Transaksi $transaksi)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Transaksi
        $transaksi->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/transaksis'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/transaksis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTransaksi $request
     * @param Transaksi $transaksi
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTransaksi $request, Transaksi $transaksi)
    {
        $transaksi->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTransaksi $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTransaksi $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Transaksi::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
