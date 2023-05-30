<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employeeModel extends CI_Model
{

	public function get_employees()
	{
		$this->db->order_by('name', 'asc');
		$query = $this->db->get('employees');
		return $query;
	}

	public function get_employeesDetails()
	{
		// $this->db->order_by('id', 'desc');
		$this->db->select('emp.*,emps.id as empsid,sum(emps.credit_amount) AS TotalCredit,max(emps.credit_amount) AS HighestCredit')->from('employee_salary emps');
		$this->db->join('employees emp', 'emps.emp_id=emp.id','inner');
		$this->db->group_by("emp.id");
		$query = $this->db->get();

		// print_r($query->result_array());
		// die;
		return $query;
	}

	public function get_employeeSalaries($emp_id)
    {
        $this->db->where('emp_id', $emp_id);
        $q = $this->db->get('employee_salary');

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }
}
