<form>
    <div class="form-group mb-3">
        <label for="postName">Título:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="postName" placeholder="Escreva o título" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="PostDescription">Descrição</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="PostDescription" wire:model="description" placeholder="Escreva a descrição"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Salvar</button>
    </div>
</form>
