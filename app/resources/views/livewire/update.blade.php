<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group mb-3">
        <label for="postName">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="postName" placeholder="Enter Name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="postDescription">Description:</label>
            <textarea class="form-control
                    @error('description')
                    is-invalid @enderror"
                    id="postDescription"
                    wire:model="description"
                    placeholder="Enter description">
            </textarea>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>
