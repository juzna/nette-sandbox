<?php
use Nette\Application\UI\Form;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

	protected function createComponentMessageFilterForm($name)
	{
		$frm = new Form($this, $name); // Error: this calls attached, isSubmitted, getHttpData and loads data from POST
		$frm->setMethod('GET');        // ... while it should be get
		$frm->addText('q');
		$frm->addSubmit('search', 'Hledej');
		$frm->onSuccess[] = $this->onMessageFilterFormSubmitted;
		return $frm;
	}

	public function onMessageFilterFormSubmitted()
	{
		die("submitted!");
	}
}
