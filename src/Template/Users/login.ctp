<?php
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
?>
<div class="login-box">
  <div class="login-logo">
  <strong><?= Configure::read('nome'); ?></strong>
  <h5><?= Configure::read('slogan'); ?></h5>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?= $this->Flash->render() ?>
    <p class="login-box-msg">Faça login para iniciar sua sessão</p>
    <?= $this->Form->create() ?>
      <div class="form-group has-feedback">
        <?= $this->Form->control('username',['placeholder' => 'Digite seu usário']) ?>
      </div>
      <div class="form-group has-feedback">
      <?= $this->Form->control('password',['placeholder' => 'Digite sua senha']) ?>
      </div>
      <div class="row">
        <div class="col-xs-4">          
          <?= $this->Form->button('Login') ?>
        </div>
        <!-- /.col -->
      </div>
      <?= $this->Form->end() ?>
    <a href="#">Esqueci minha senha</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->