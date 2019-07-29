<?php

namespace App\Controllers\User\Common;

use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{
	/**
	 * Disabled section container
	 * 
	 * @var array
	 */
	//private $disabledSection = [];

	/**
	 * Render the layout with the given view object
	 * 
	 * @param \System\View\ViewInterface $view
	 */
	/*public function render(ViewInterface $view)
	{
		$data['content'] = $view;
		$sections = ['header', 'sidebar', 'footer'];
		foreach ($sections as $section) {			
			$data[$section] = in_array($section, $this->disabledSection) ? '' : $this->load->controller('Blog/Common/' . ucfirst($section))->index();
		}
		$data['header'] = $this->load->controller('Blog/Common/Header')->index();
		$data['sidebar'] = $this->load->controller('Blog/Common/Sidebar')->index();
		$data['footer'] = $this->load->controller('Blog/Common/Footer')->index();

		return $this->view->render('blog/common/layout', $data);
	}*/

	/**
	 * Check what will be not displayed in layout page
	 * 
	 * @param string $section
	 * @return $this
	 */
	/*public function disabled($section)
	{
		$this->disabledSection[] = $section;
		return $this;
	}*/


	/**
	 * Render the layout with the given view object
	 * 
	 * @param \System\View\ViewInterface $view
	 */
	public function render(ViewInterface $view)
	{
		$data['content'] = $view;
		$data['header'] = $this->load->controller('User/Common/Header')->index();
		$data['footer'] = $this->load->controller('User/Common/Footer')->index();

		return $this->view->render('user/common/layout', $data);
	}
}