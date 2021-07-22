<h1 class="brand-header">日報詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <?= date('Y/m/d (D)', strtotime($daily_report['reporting_time'])) ?>の日報
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text"><?= $daily_report['title'] ?></td>
          </tr>
          <tr>
            <th class="table-column">Content</th>
            <td class='td-text'><?= $daily_report['content'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    <a class="btn btn-edit" href="<?= $action['edit'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="btn-delete">
      <?= form_open($action['delete'], ['method' => 'POST']); ?>
        <?= form_button(['name' => 'submit', 'type' => 'submit'], '<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger']); ?>
      <?= form_close(); ?>
    </div>
  </div>
</div>