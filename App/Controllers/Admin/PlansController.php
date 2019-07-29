<?php 

namespace App\Controllers\Admin;

use System\Controller;

class PlansController extends Controller
{
	/**
	 * Dispaly Nutrtion Plans list
	 * 
	 * @return mixed
	 */
	public function index()
	{
		$this->html->setTitle('Nutrtion Plans');
        $data['plans'] = $this->load->model('NutrtionPlan')->all();
        $data['success'] = $this->session->has('success') ? $this->session->pull('success') : null;
		$view = $this->view->render('admin/nutrtion-plans/list', $data);
		return $this->adminLayout->render($view);
    }
    
    /**
     * delete Nutrtion Plan 
     *
     * @param int $id
     * @return void
     */
	public function delete($id)
	{
		$this->load->model('NutrtionPlan')->delete($id);
		$this->session->set('success', 'Nutrtion Plan Has Been Deleted Successfully');
		return $this->url->redirectTo('/admin/plans');
	}
}