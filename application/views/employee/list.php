<div class="wrapper">
    <table class='table-borderless' id="logstable" data-toggle="table" data-search="true" data-show-export="true" data-buttons-prefix="btn-sm btn" data-buttons-align="right" data-pagination="true">
        <thead>
            <tr>
                <th data-field="emp_name" data-sortable="true">Employee Name</th>
                <th data-field="emp_email" data-sortable="true">Employee Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eList->result() as $emp) : ?>
                <tr>
                    <td><?php echo $emp->name ?></td>
                    <td><?php echo $emp->email ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>