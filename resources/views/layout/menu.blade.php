<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1266f1;">
    <div class="container">
      <a class="navbar-brand" href="#">Harpia Laboratório</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('documentos_externos') }}">Documentos Externos</a>
            <a class="nav-link {{ request()->segment(1) == 'clientes' ? 'active' : '' }}" href="{{ route('clientes') }}">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'colaboradores' ? 'active' : '' }}" href="{{ route('colaboradores') }}">Colaboradores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('equipamentos') }}">Equipamentos</a>

            <a class="nav-link {{ request()->segment(1) == 'servicos' ? 'active' : '' }}" href="{{ route('servicos') }}">Serviços</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  @if(session('success'))
  <br>
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  @if(session('danger'))
  <br>
  <div class="alert alert-danger">
      {{ session('danger') }}
  </div>
@endif
</div>