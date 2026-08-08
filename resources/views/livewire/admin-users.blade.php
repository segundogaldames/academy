<div>
    <div class="card">
        <div class="card-header">
            <input wire:model.live="search" type="text" class="form-control w-100" placeholder="Escriba un usuario">
        </div>
        @if ($users->count())

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Id</th>
                            <th class="col-4">Nombre</th>
                            <th class="col-4">Email</th>
                            <th class="col-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>

                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="btn btn-secondary mr-2">Editar</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-info">No hay usuarios registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <p class="text-info ml-3">No hay registros</p>
        @endif
    </div>
</div>
