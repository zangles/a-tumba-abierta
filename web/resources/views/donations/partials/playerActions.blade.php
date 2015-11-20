<div class="ibox float-e-margins">
    <div class="ibox-content">
        @if($player->status == \App\Player::ENABLED)
            <form action="{{ route('players.destroy',$player) }}" method="post" style="display: inline-block" id="deleteform">
                {{csrf_field()}}
                {{method_field('DELETE')}}

                @if ($player->hasDonations())
                    <button type="submit" class="btn btn-danger delete">Desactivar</button>
                @else
                    <button type="submit" href="#" class="btn btn-danger delete">Borrar</button>
                @endif
            </form>

            <a href="{{ url('players/blacklist/'.$player->id) }}" class="btn btn-warning">Mover a lista negra</a>
        @else
            @if($player->status != \App\Player::BLACK_LIST)
                <a href="{{ url('players/active/'.$player->id) }}" class="btn btn-primary">Activar</a>
            @endif
        @endif

        @if($player->status == \App\Player::BLACK_LIST)
            <a href="{{ url('players/blacklist/'.$player->id) }}" class="btn btn-primary">Sacar de lista negra</a>
        @endif

    </div>
</div>