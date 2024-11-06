
<br>
<blockquote class="blockquote text-center">
  <p class="mb-0">Localização</p>
  <footer class="blockquote-footer">Studio Ikaro Graciano - <cite title="Source Title"> Como nos achar</cite></footer>
</blockquote>

<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-sm-12 col-md-12 col-lg-7">
    {{-- @foreach ($historia as $key => $h) --}}
      <div class="embed-responsive embed-responsive-16by9 z-depth-1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.7749442339928!2d-44.09590778549333!3d-22.512625585213755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9ea2ab5aa59e75%3A0xfd60445428aede71!2sStudio+de+Lutas+Ikaro+Graciano!5e0!3m2!1spt-BR!2sbr!4v1551206012281" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    {{-- @endforeach --}}
  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-sm-12 col-md-12 col-lg-5">
    <div class="card border-color-silver mb-3" style="max-width: 28rem;">
      {{-- <div class="card-header">Header</div> --}}
      <div class="card-body text-primary">
        <form action="#" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Entre com o seu nome completo...">
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Entre com um e-mail válido...">
            <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail com mais ninguém.</small>
          </div>
          <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control telefone">
          </div>
          <div class="form-group">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control celular">
          </div>
          <div class="form-group">
            <label>Mensagem</label>
            <textarea class="form-control" name="descricao" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-outline-primary">Enviar</button>
        </form>
      </div>
    </div>

  </div>
  <!--Grid column-->
