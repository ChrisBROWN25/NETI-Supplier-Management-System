<div>
    @inject('Suppliers', App\Models\User::class)
    @inject('ArchivedAccounts', App\Models\ArchivedAccount::class)
    <div class="table-responsive rounded-3" style="height: 70vh;">
        <table class="table table-hover table-borderless">
            <thead class="bg-white sticky-top">
                <tr>
                    <td>
                        <form wire:submit='SearchSupplier'>
                            <div class="input-group input-group-sm">
                                <input wire:model.lazy='searchedSupplier' id="searchSupplierInput" type="text"
                                    class="form-control bg-white border-dark-subtle"
                                    placeholder="Enter supplier name ...">
                                <button wire:click='ResetSearch' type="button" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16" fill="currentColor">
                                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            </thead>
            {{-- Supplier List --}}
            @inject('ArchivedAccounts', App\Models\ArchivedAccount::class)
            <tbody>
                @foreach ($supplierList as $supplier)
                @if (count($ArchivedAccounts::where('user_id', $supplier->id)->get()) == 0)
                <tr>
                    <td
                        class="p-3 pt-1 pb-1 ps-3 text-start @if($selectedSupplierId == $supplier->id) fw-bold table-active @endif">
                        <a wire:click='SelectSupplier({{$supplier->id}})'
                            class="selectSupplierLink link-primary text-decoration-none">{{$supplier->name}}</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .selectSupplierLink:hover {
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</div>