<?php
namespace Payments\Wizard;


abstract class RequestWizard extends BaseWizard
{
    abstract public function getRequest();
}
