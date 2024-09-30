@if($businesses->hasPages())
    <div class="d-flex justify-content-between align-items-center">
        <div id="showing-counter" class="text-center mb-4">
            Showing {{ $businesses->firstItem() }} to {{ $businesses->lastItem() }} of {{ $businesses->total() }} results
        </div>
        <div class="pagination">
            {{ $businesses->appends(['per_page' => request('per_page')])->links() }}
        </div>
    </div>
@endif
