<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Employee extends Employee_Controller
{
	public function index()
	{
		redirect('employees');
	}

	public function list()
	{
		$data['title'] = 'employee list';
		$data['eList'] = $this->employeeModel->get_employees();

		$this->load->view('templates/header', $data);
		$this->load->view('employee/list');
		$this->load->view('templates/footer');
	}

	public function salary()
	{
		$data['title'] = 'employee salaries';
		$data['eList'] = $this->employeeModel->get_employeesDetails();

		$this->load->view('templates/header', $data);
		$this->load->view('employee/salary');
		$this->load->view('templates/footer');
	}

	public function get_employeeSalaries()
	{
		$emp_id = htmlentities($_POST['emp_id']);

		if ($emp_id  && isset($emp_id) && !empty($emp_id)) {
			$data['status'] = true;
			$data['msg'] = "";
			$data['salaries'] = $this->employeeModel->get_employeeSalaries($emp_id);
		} else {
			$data['status'] = false;
			$data['msg'] = "Missing Parameter";
		}

		$data['token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}
}
