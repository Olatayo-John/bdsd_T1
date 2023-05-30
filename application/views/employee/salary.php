<div class="wrapper">
    <input type="hidden" class="csrf_token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

    <table class='table-borderless' id="logstable" data-toggle="table" data-search="true" data-show-export="true" data-buttons-prefix="btn-sm btn" data-buttons-align="right" data-pagination="true">
        <thead>
            <tr>
                <th data-field="emp_name" data-sortable="true">Employee Name</th>
                <th data-field="t_credit" data-sortable="true">Total Credit</th>
                <th data-field="h_credit" data-sortable="true">Highest Credit</th>
                <th data-field="action" data-sortable="false"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eList->result() as $emp) : ?>
                <tr>
                    <td><?php echo $emp->name ?></td>
                    <td><?php echo $emp->TotalCredit ?></td>
                    <td><?php echo $emp->HighestCredit ?></td>
                    <td class='w-25'>
                        <div class="tableActions">
                            <button class="btn-dark getSalaries" emp_id="<?php echo $emp->id ?>">Salaries</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal smodal fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <table id="salaryTable" data-search="true" data-show-export="true" data-buttons-prefix="btn-md btn" data-buttons-align="right" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-field="credit_amount" data-sortable="true">Credit Amount</th>
                                <th data-field="credit_date" data-sortable="true">Credit Date</th>
                                <th data-field="month" data-sortable="true">Month</th>
                                <th data-field="remarks" data-sortable="true">Remarks</th>
                                <th data-field="created_at" data-sortable="true" class="text-danger">Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    var csrfName = $('.csrf_token').attr('name');
    var csrfHash = $('.csrf_token').val();

    $(document).ready(function() {
        $('.getSalaries').on('click', function(e) {
            e.preventDefault();

            var emp_id = $(this).attr('emp_id');

            $.ajax({
                method: 'post',
                url: '<?php echo base_url("get-employee-salaries") ?>',
                dataType: 'json',
                data: {
                    [csrfName]: csrfHash,
                    emp_id: emp_id
                },
                beforeSend: function() {
                    clearAlert();

                    $('#salaryTable').bootstrapTable('destroy');
                },
                success: function(res) {
                    $(".csrf_token").val(res.token);

                    if (res.status === true) {

                        //populate salariesTable
                        $(function() {
                            var data = res.salaries;
                            $('#salaryTable').bootstrapTable({
                                data: data
                            });

                        });

                        $(".smodal").modal("show");
                    } else if (res.status === false) {
                        $(".ajax_res_err").append(res.msg);
                        $(".ajax_err_div").fadeIn();
                    } else {
                        window.location.reload();
                    }
                },
                error: function(res) {

                }
            })
        });

    });
</script>