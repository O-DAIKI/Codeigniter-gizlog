<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    <?= form_open('reports', ['method' => 'POST']); ?>
      <div class="form-group form-size-small <?php if (form_error('reporting_time')): ?> has-error <?php endif; ?>">
        <?= form_input(['name' => 'reporting_time', 'type' => 'date', 'class' => 'form-control']); ?>
          <span class="help-block"><?= form_error('reporting_time'); ?></span>
      </div>
      <div class="form-group <?php if (form_error('title')): ?> has-error <?php endif; ?>">
        <?= form_input(['name' => 'title', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Title']); ?>
          <span class="help-block"></span>
      </div>
      <div class="form-group <?php if (form_error('content')): ?> has-error <?php endif; ?>">
        <?= form_textarea(['name' => 'content', 'class' => 'form-control', 'placeholder' => 'Content', 'cols' => 50, 'rows' => 10]); ?>
          <span class="help-block"></span>
      </div>
      <?= form_button(['name' => 'submit', 'type' => 'submit'], 'Add', ['class' => 'btn btn-success pull-right']); ?>
    </form>
  </div>
</div>