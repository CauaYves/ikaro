<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Baixar Recebimento</label>
    <select class="custom-select" name="status">
      <option value="0" {{(isset($pagar->status) && $pagar->status == '0'  ? 'selected' : '')}}>Em aberto</option>
      <option value="1" {{(isset($pagar->status) && $pagar->status == '1'  ? 'selected' : '')}}>Pago</option>
    </select>
  </div>
</div>