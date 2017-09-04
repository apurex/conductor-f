
<div class="col-md-8">
<form class="form-horizontal" action="{{ route('store_payout_path') }}" method="POST">

    {{ csrf_field() }}


    <!-- Description Input -->
    <div class="form-group">
        <label for="Plan">Plan:</label>
        <select class="form-control" name=plan>
            <option value="1">Basico</option>
            <option value="2">Mensual</option>
            <option value="3">VIP</option>
        </select>
    </div>
    <div class="form-group">
        <label for="num_ref">Numero de Ref:</label>
        <input class="form-control" type="text" name="num_ref" value="{{ $payout->num_ref or old('num_ref')}}">
    </div>
    <div class="form-group">
        <label for="last_payout">MOnto de pago</label>
        <input class="form-control" type="text" name="last_payout" value="{{ $payout->last_payout or old('last_payout')}}">
    </div>

    <div class="form-group">
        <button type="submit" class='btn btn-primary'>Enviar</button>
    </div>
</form>
</div>

