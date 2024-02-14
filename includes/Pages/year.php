<style type="text/css">
  .nav-tabs .nav-link {
  border: none;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.nav-tabs .nav-link.active {
  border-color: #dee2e6 #dee2e6 #fff;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}
.nav-tabs .nav-item.show .nav-link:focus, .nav-tabs .nav-link.active:focus {
  box-shadow: none;
}

.tab-content > .tab-pane {
  display: none;
  height: 0;
  overflow: hidden;
}
.tab-content > .active {
  display: block;
  height: auto;
  overflow: visible;
}

</style>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#tab1">Tab 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab2">Tab 2</a>
    </li>
  </ul>
  <div class="tab-content">
    <div id="tab1" class="tab-pane active">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#subtab1">Subtab 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#subtab2">Subtab 2</a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="subtab1" class="tab-pane active">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#subsubtab1">Subsubtab 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#subsubtab2">Subsubtab 2</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="subsubtab1" class="tab-pane active">
              <h3>Subsubtab 1 content goes here</h3>
            </div>
            <div id="subsubtab2" class="tab-pane">
              <h3>Subsubtab 2 content goes here</h3>
            </div>
          </div>
        </div>
        <div id="subtab2" class="tab-pane">
          <h3>Subtab 2 content goes here</h3>
        </div>
      </div>
    </div>
    <div id="tab2" class="tab-pane">
      <h3>Tab 2 content goes here</h3>
    </div>
  </div>
</div>
